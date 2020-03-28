@extends('front::layouts.base')

@section('page-title', 'Posts Page')

{{-- @section('head-styles')
    @include('front::critical.post')
    @include('front::critical.style-loader')
@endsection --}}

@section('main')
    <div class="o-box">
        <h1>
            @include('front::pages.posts.partials.item')
            <small>show</small>
        </h1>

        <br>

        @include('front::pages.posts.partials.nav')
    </div>
@endsection
