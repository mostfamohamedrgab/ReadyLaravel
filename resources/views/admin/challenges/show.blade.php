@extends('admin.layouts.index')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            لوحه التحكم
            / {{$challenge->name}}
          </h1>

          <hr style="border-color:#aaa"/>

          </section>
          @include('layouts.msgs')
        <!-- Main content -->
<section class="content">

  <table class="table">
    <thead>
      <tr >
        <td>#</td>
        <td>العضو</td>
        <td>منذ</td>
        <td>تاريخ الحل</td>
      </tr>
    </thead>
    <tbody>
      @foreach($sloves as $slove)
      <tr>
        <td>{{$slove->id}}</td>
        <td>{{$slove->user->name}}</td>
        <td>{{$slove->created_at->diffForHumans() }}</td>
        <td>{{$slove->created_at }}</td>
      </tr>
      @endforeach
      </tbody>
    </table>
    <hr style="border-color:#fff"/>

@endsection
