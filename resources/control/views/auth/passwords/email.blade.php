@extends('control::layouts.base')

@section('content')
    <div class="app app-header-fixed ">
        <div class="container w-xl w-auto-xs">
            <a href class="navbar-brand block m-t">
                <img src="{{ asset('front/img/logo.svg') }}" alt="ring">
                Ring
            </a>
            <div class="m-b-lg">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @else
                    <div class="wrapper text-center">
                        <strong>Введіть емейл для відновлення пароля</strong>
                    </div>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="list-group list-group-sm">
                            <div class="list-group-item">
                                <input type="email" placeholder="Email"
                                    class="form-control no-border" name="email"
                                    value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary btn-block">
                            Відправити
                        </button>
                    </form>
                @endif
            </div>
            <div class="text-center" ng-include="'tpl/blocks/page_footer.html'">
                <p>
                    <small class="text-muted">Ring<br>&copy; {{ date('Y') }}</small>
                </p>
            </div>
        </div>
    </div>
@endsection
