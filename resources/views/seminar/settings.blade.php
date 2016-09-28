@extends('layouts.default')

@section('title')
  <title>Audiocollage »Karlsruhe bildet«</title>
@stop

@section('content')


    {{-- @include ADMIN BACKEND --------------------------------------------------}}
    @if( Seminar::authorizedEditor($seminar_name) )

        {{-- Load create and edit Modals --}}

        @include('seminar.messages.create')

        @include('seminar.messages.edit')

    @endif
@stop
