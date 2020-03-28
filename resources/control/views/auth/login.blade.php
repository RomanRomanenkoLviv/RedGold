@extends('control::layouts.base')

@section('content')
    <div class="app app-header-fixed ">
        <div class="container w-xxl w-auto-xs">
            <a href class="navbar-brand block m-t">
                <img src="{{ asset('front/img/logo.svg') }}" alt="ring">
                {{ _('Ring') }}
            </a>
            <div class="m-b-lg">
                <div class="wrapper text-center">
                    <strong>
                        {{ _('Авторизуйтесь у систему') }}
                    </strong>
                </div>
                @error('tokenMismatch')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <form name="form" class="form-validation" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="list-group list-group-sm">
                        <div class="list-group-item {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input placeholder="Email" type="email"
                                class="form-control no-border"
                                name="email" value="{{ old('email') }}" autofocus >

                        </div>
                        <div class="list-group-item {{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="password" type="password" placeholder="Пароль"
                            class="form-control no-border"
                            name="password" >
                        </div>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary btn-block">
                        {{ _('Авторизуватись') }}
                    </button>
                    <div class="text-center m-t m-b">
                        <a href="{{ route('password.request') }}">
                            {{ _('Забули пароль?') }}
                        </a>
                    </div>
                </form>
            </div>
            <div class="text-center" ng-include="'tpl/blocks/page_footer.html'">
                <p>
                  <small class="text-muted">Ring &copy; {{ date('Y') }}</small>
                </p>
            </div>
        </div>
    </div>
@endsection
