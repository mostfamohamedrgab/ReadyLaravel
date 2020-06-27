@extends('admin.layouts.index')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          اضافه تحدي جديد
          </h1>
          <hr style="border-color:#aaa"/>
          @include('layouts.msgs')
        <!-- Main content -->
<section class="content">

    <form
    enctype="multipart/form-data"
    action="{{route('admin.Challenges.store')}}" method="post">
      @csrf
    <div class="form-group">
      <label >
        اسم التحدي
      </label>
      <input type="text" class="form-control" name="name" required value="{{old('name')}}">
    </div>





    <div class="form-group">
      <label >القسم</label>
      <select class="form-control" required name="cat_id">
        @foreach($cats as $cat)
        <option
        value="{{$cat->id}}"
        {{ old('cat') == $cat->id ? 'selcted' : ''}}
        >{{ $cat->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label>المحتوي</label>
      <textarea name="content">{{old('content')}}</textarea>
        <script>
          CKEDITOR.replace('content', {
              language: 'ar'
            });
        </script>
    </div>

    <div class="form-group">
      <label >
       ملف
       <small class="text-info">اختياري</small>
      </label>
     <input type="file" name="file"  class="form-control">
    </div>

    <div class="form-group">
      <label >
        القيمه الصحيحه
      </label>
     <input type="text" name="value" required class="form-control" value="{{old('value')}}">
    </div>

    <div class="form-group">
      <label >
        النقاط
      </label>
     <input type="number" name="points" required class="form-control" value="{{old('points')}}">
    </div>

  <div class="form-group">
      <label >
       تاريخ الانتهاء
      </label>
     <input type="date" name="end_at" required class="form-control" value="{{old('end_at')}}">
    </div>



    <button type="submit" class="btn btn-primary">حفظ</button>
  </form>



@stop
@push('css')
  <style>
      form {
        padding: 20px;
        box-shadow: 1px 1px 2px #eee,-1px -1px 2px #eee;
        background: #fff;
        text-align:right;
      }
      form input {
        text-align:right;
      }
  </style>

  <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/translations/ar.js"></script>

@endpush
