@extends('layouts.default')
@section('title')
  <title>EWM1 – Analytics</title>
@stop

@section('content')
<main id="main-content-{{ Request::segment(1) }}" class="container animated fadeIn">

  <h1 class="visible-print-block">Analytics</h1>

  <div class="row">
    <div class="col-lg-6">
      @include('analytics.partials.live-visitors')
    </div>
    <div class="col-lg-6">
      @include('analytics.partials.semester-visitors')
    </div>
    <div class="col-lg-6">
      @include('analytics.partials.downloads')
    </div>
    <div class="col-lg-6">
      @include('analytics.partials.plays')
    </div>
  </div>
  <div class="clearfix visible-lg"></div>
</main>
@stop
