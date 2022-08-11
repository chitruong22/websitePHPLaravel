@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="text-center custom-login">
                <h3>ĐĂNG KÝ</h3>
            </div>
            <div class="hpanel">
                <div class="panel-body

">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="control-label">{{ __('Họ và tên') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback text-danger" role="alert">
                                    <strong style="font-style: italic">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name" class="control-label">{{ __('Username') }}</label>

                            <input id="name" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autocomplete="name" autofocus>

                            @error('username')
                            <span class="invalid-feedback text-danger" role="alert">
                                    <strong style="font-style: italic">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label">{{ __('Địa chỉ Email') }}</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback text-danger" role="alert">
                                    <strong style="font-style: italic">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="control-label">{{ __('Mật khẩu') }}</label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback text-danger" role="alert">
                                    <strong style="font-style: italic">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <input type="hidden" name="role" value="0">
                        <input type="hidden" name="avatar" value="avatar.png">
                        <div class="form-group">
                            <label for="password-confirm" class="control-label">{{ __('Xác nhận mật khẩu') }}</label>
                            <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">
                            @error('password_confirmation')
                            <span class="invalid-feedback text-danger" role="alert">
                                    <strong style="font-style: italic">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button class="btn btn-success loginbtn" style="width: 100%;">{{ __('Đăng ký') }}</button>
                        </div>
                    </form>
                    <div class="a-forms">
                        <a href="/login" >Bạn đã có tài khoản? <span>Đăng nhập ở đây!</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
    </div>
@endsection
