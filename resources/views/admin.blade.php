@extends('adminlte::page')


@section('content_header')

 @if ($message = Session::get('info'))
      <div class="alert alert-info alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>	
      <strong>{{ $message }}</strong>
      </div>

 @endif

@stop

@section('js')
    
    
    <script type="text/javascript" src="{{ asset('vendor/adminlte/dist/js/form1.js') }}"></script>
    <!--<script type="text/javascript" src="{{ asset('vendor/adminlte/dist/js/validate.js') }}"></script>-->
@stop