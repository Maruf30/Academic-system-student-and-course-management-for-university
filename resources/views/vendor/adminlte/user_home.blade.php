@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
  <div class="well col-md-4 ">
      <a href="{{route('courses.index')}}" class="btn btn-success btn-lg">Course Registration</a>

  </div>
@endsection
