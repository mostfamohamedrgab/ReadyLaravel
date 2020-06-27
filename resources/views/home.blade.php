@push('css')
  <link rel="stylesheet" href="{{ asset('public/css/home.css') }}"></link>
@endpush
@extends('layouts.app')

@section('content')
<!-- start sliders -->
<section class="slider"></section>
<!-- end sliders --->
@endsection
@push('js')
  <script type="text/javascript">
  $(document).ready( function (){

$(".slider").height($(document).height() - ($('.navbar').height() + 20) );
  });
  </script>
@endpush
