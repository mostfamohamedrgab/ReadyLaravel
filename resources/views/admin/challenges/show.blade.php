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

      <div class="text-r modal-content">

        <div class="modal-body">
          <h4>اسم التحدي </h4>
          <h5>{{$challenge->name}}.</h5>
          <hr />
          <h4>
            القسم
          </h4>
          <h5>{{$challenge->cat}}.</h5>
          <hr />
          <h4>المحتوي</h4>
          {!! $challenge->content !!}
          <hr />
          @if($challenge->file)
          <h4>الملف</h4>
          <a href="{{ asset('storage/file/'.$challenge->file) }}">
              الملف
          </a>
          <hr />
          @endif
           <h4>
            القيمه الصحيحه
          </h4>
          <h5>{{$challenge->value}}.</h5>
          <hr />
           <h4>
            النقاط
          </h4>
          <h5>{{$challenge->points}}.</h5>
          <hr />
           <h4>
          تاريخ الانتهاء
          </h4>
          <h5>{{$challenge->end_at}}.</h5>
          <hr />
        </div>

      </div>


@endsection
