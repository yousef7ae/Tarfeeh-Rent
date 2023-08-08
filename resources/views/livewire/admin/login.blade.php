<div>
    <div class="login vh-100 bg-primary">
        <div class="row g-0 h-100 justify-content-center">
            <form class="col-xl-4 col-lg-5 col-md-6 col-10 align-self-center" wire:submit="login" method="post">
                {{csrf_field()}}
                <div class="card card-body bg-light rounded-4">
                    <div class="text-center py-3">
                        <img class="img-fluid" width="180" src="{{asset('dashboard/images/loge2.svg')}}" alt="logo">
                    </div>
                    <div class="mb-3">
                        <label class="mb-2" for="Email">{{__('Email')}}</label>
                        <input type="email" wire:model.live="email"
                               class="form-control text-start py-2 text-primary @error('email') is-invalid @enderror "
                               id="Email" placeholder="example@email.com">
                        @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="mb-2" for="Email">{{__('Password')}}</label>
                        <input type="password" wire:model.live="password"
                               class="form-control py-2 @error('password') is-invalid @enderror " id="password"
                               placeholder="********">
                        @error('password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn w-50 btn-primary">{{__('Sign in')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
