@extends('adminlte::page')


@section('content_header')

 @if ($message = Session::get('info'))
      <div class="alert alert-info alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>	
      <strong>{{ $message }}</strong>
      </div>

 @endif

@stop

@section('css')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@stop

@section('js')
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript" src="{{ asset('vendor/adminlte/dist/js/form1.js') }}"></script>
    <!--<script type="text/javascript" src="{{ asset('vendor/adminlte/dist/js/validate.js') }}"></script>-->
@stop