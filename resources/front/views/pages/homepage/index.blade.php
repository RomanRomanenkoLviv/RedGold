@extends('front::layouts.base')

@section('page-title', 'Home page')

@section('page-id', 'home')
{{-- @section('body-class', 'is-home is-top') --}}
{{-- @section('main-class', '') --}}

{{-- @section('head-styles')
    @include('front::critical.home')
    @include('front::critical.style-loader')
@endsection --}}

@section('main')
    <div class="o-box">
        <h1>Welcome to Red Gold</h1>
    </div>
@endsection

{{-- @section('modals')
@endsection --}}

{{-- @section('aditional-scripts')
  <script async="async" defer="defer" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAkBbi3GfzWCWsRbqly6lYisejpTh_Afs&callback=initMap&language={{ app()->getLocale() }}"></script>
@endsection --}}
