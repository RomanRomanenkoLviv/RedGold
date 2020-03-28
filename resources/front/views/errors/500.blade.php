@extends('front::layouts.errors')

@section('page-title', '500')

@section('main')

  <section class="c-error"> 
    <div class="c-error-wrap">
      <span class="c-error-number">500</span>

      <div class="c-error-text">
        <p>The server was unable to complete your request.</p>

        <a href="" class="btn btn-secondary">Go home</a>
      </div>
    </div>
  </section>

  @endsection