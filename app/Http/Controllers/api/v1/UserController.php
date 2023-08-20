<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\forgetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{

    public function index()
    {

    }
    public function register()
    {

        $validator = Validator::make(request()->input(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'whatsapp_no' => 'required|unique:users,whatsapp_no',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'mobile' => 'required|unique:users,mobile',
        ]);

        if (!$validator->passes())
        {
            return response()->json([
                'status' => false ,
                'message' => $validator->errors()->first()
            ]);
        }
        $data = request()->input();

        $user = User::create($data);

        $user->syncRoles(['Tenant', 'Rented']);

        $user->update([
             'token' => $user->createToken('api-login')->plainTextToken
        ]);

        return response()->json([
            'status' => true ,
            'message' => 'User Registered Successfully' ,
            'date' => $user
            ]);



    }

    public function login(Request $request)
    {
        $validator = Validator::make(request()->input(), [
//            'email' => 'required|email',
            'mobile' => 'required',
            'password' => 'required',
            'fcm_token' => 'required',
        ]);

        if (!$validator->passes())
        {
            return response()->json([
                'status' => false ,
                'message' => $validator->errors()->first()
            ]);
        }

        if (Auth::attempt(['mobile' => request()->input('mobile'), 'password' => request()->input('password')]))
        {
          $user = Auth::user();
          $token = $user->createToken('api-login')->plainTextToken;

          $user->update([
              'fcm_token' => $request->fcm_token
          ]);

          return response()->json([
              'status' => true ,
              'message' => 'User Logged In Successfully' ,
              'data' => $user ,
          ]);

        }



    }

    public function forgetPassword()
    {
        $validator = Validator::make(request()->input(), [
            'email' => 'required|email|exists:users,email',
        ]);

        if (!$validator->passes())
        {
            return response()->json(['status' => false , 'message' => $validator->errors()->first()]);
        }


        $user = User::where('email', request()->input('email'))->first();
        $user->reset_code = rand(100, 999);
        $user->save();

        $user->notify(new forgetPassword($user->reset_code));

        return response()->json([
            'status' => true ,
            'message' => 'Reset Code Sent Successfully Check Your Email' ,
        ]);

    }

    public function resetPassword()
    {
        $validator = Validator::make(request()->input(), [
            'email' => 'required|email|exists:users',
            'code' => 'required|numeric',
            'new_password' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()->json(["status" => false, "message" => $validator->errors()->first()]);
        }

        $user = User::where('email', request('email'))->first();

        if ($user->reset_code != request('code')) {
            return response()->json(["status" => false, "message" => "error code"]);
        }

        $user->password = Hash::make(request('new_password'));
        $user->save();

//        $user->notify(new forgetPassword($user->reset_code));

        return response()->json([
            'status' => true ,
            'message' => 'Reset Password Successfully',
        ]);
    }
}
