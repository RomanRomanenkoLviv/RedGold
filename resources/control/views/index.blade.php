@extends ('control::layouts.base')

@section ('content')
    <index
        id="app"
        style="height: 100%;"
        :data='@json([
            'user' => Auth::guard('control')->user()
        ])'
    ></index>

@endsection
