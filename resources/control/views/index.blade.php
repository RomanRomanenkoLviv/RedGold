@extends ('control::layouts.base')

@section ('content')
    <index
        id="app"
        style="height: 100%;"
        data-user='@json($userResource)'
    ></index>

@endsection
