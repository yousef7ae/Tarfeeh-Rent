<form class="mt-2" method="post" wire:submit="store">
    {{csrf_field()}}
    <div class="row">
        <div class="col-md-12">

            <div class="row">

                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label class="control-label">{{ __('Name') }}</label>
                        <input value="" wire:model="user.name" placeholder="{{ __('Add Name') }}"
                               name="name"
                               class="form-control @error('user.name') is-invalid @enderror" type="text">
                        @error('user.name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>
                </div>

                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label class="control-label">{{__("Mobile")}}</label>
                        <input wire:model="user.mobile" placeholder="{{__("Add Mobile")}}"
                               class="form-control @error('user.mobile') is-invalid @enderror" type="number">
                        @error('user.mobile')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label class="control-label">{{__("Email")}}</label>
                        <input wire:model="user.email" placeholder="{{__("Add Email")}}"

                               class="form-control @error('user.email') is-invalid @enderror" type="email">
                        @error('user.email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>
                </div>

                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label class="control-label">{{__("Password")}} </label>
                        <input value="" wire:model="user.password" placeholder="{{__("Add Password")}}"
                               class="form-control @error('user.password') is-invalid @enderror" type="password">
                        @error('user.password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                @if (auth()->user()->hasRole('Admin'))
                    <div class="col-md-6 mb-2">
                        <div class="form-group">
                            <label class="control-label">{{__("Role")}}</label>
                            <select wire:model="user.role_id"
                                    class="form-control @error('form.role_id') is-invalid @enderror">
                                <option value="null">{{__("Select Role")}} ...</option>
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{ __($role->name) }}</option>
                                @endforeach
                            </select>
                            @error('form.role_id')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>



                    <div class="col-md-6 mb-2">
                        <div class="form-group">
                            <label class="control-label">{{__("Status")}}</label>
                            <select wire:model="user.status"
                                    class="form-control @error('form.status') is-invalid @enderror">
                                <option value="0">{{__("Select Status")}} ...</option>
                                @foreach(\App\Models\User::statusList(false) as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                            @error('form.status')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div>
        <div wire:loading>
            <i class="fas fa-sync fa-spin"></i>
            {{__("Loading please wait")}} ...
        </div>
    </div>

    <div class="modal-footer justify-content-center mt-2">
        <button id="btn" wire:loading.attr="disabled" class="btn btn-primary mx-4"
                type="submit">{{__("Store")}}</button>

        <button type="button" class="btn btn-danger close-btn" data-bs-dismiss="modal">{{__("Close")}}</button>
    </div>

</form>
