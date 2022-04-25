@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            @isset($success)
                <h3>YESSSSSSS</h3>
            @endisset
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Восстановить пароль') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

{{--                    <form method="POST" action="{{ route('password.email') }}">--}}
                    <form method="POST" action="{{ route('reset_pass') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Почта') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>


                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Email введен неверно</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Отправить письмо на почту') }}
                                </button>
                            </div>
                        </div>
                    </form>

{{--                        <form method="POST" action="{{ route('reset_pass') }}">--}}
{{--                            @csrf--}}
{{--                        <div class="row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Send Password Reset Link') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        </form>--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
