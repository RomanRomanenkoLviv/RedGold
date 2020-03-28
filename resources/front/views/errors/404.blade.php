@extends('front::layouts.base')

@section('page-title', '404')

@section('main')

  <section class="c-error"> 
    <div class="c-error-wrap">
      <span class="c-error-number">404</span>

      <div class="c-error-text">
        <p>We couldn`t find the page you`re looking for.</p>

        <a href="" class="btn btn-secondary">Go home</a>
      </div>
    </div>
  </section>

  @endsection