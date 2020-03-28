@extends('control::layouts.base')

@section('content')
    <div class="app app-header-fixed ">
        <div class="container w-xl w-auto-xs">
            <a href class="navbar-brand block m-t">
                <img src="{{ asset('front/img/logo.svg') }}" alt="ring">
                Ring
            </a>
            <div class="m-b-lg">
                <div class="wrapper text-center">
                    <strong>Відновлення пароля</strong>
                </div>
                <form method="POST" action="{{ route('password.request') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">
            {{-- <div class="list-group-item">
              <input type="email" placeholder="Email" class="form-control no-border" ng-model="user.email" required>
            </div> --}}

                    <div class="list-group-item {{ $errors->has('email') ? 'has-error' : '' }}">
                        <input id="email" type="email" class="form-control no-border"
                            name="email" placeholder="Емейл" value="{{ $email or old('email') }}"
                            required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="list-group-item {{ $errors->has('password') ? 'has-error' : '' }}">
                        <input id="password" placeholder="Пароль" type="password"
                            class="form-control no-border" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="list-group-item {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <input id="password-confirm" type="password" class="form-control no-border"
                            name="password_confirmation" placeholder="Підтвердження пароля" required>

                        @if ($errors->has('password_confirmation'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-lg btn-primary btn-block">
                        Відправити
                    </button>
                </form>
            </div>
            <div class="text-center" ng-include="'tpl/blocks/page_footer.html'">
                <p>
                    <small class="text-muted">Ring<br>&copy; {{ date('Y') }}</small>
                </p>
            </div>
        </div>
    </div>
@endsection
