@extends('admin.layouts.index')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          اضافة مدينة جديده
          </h1>
          <hr style="border-color:#aaa"/>
          @include('layouts.msgs')
        <!-- Main content -->
<section class="content">

    <form
    enctype="multipart/form-data"
    action="{{route('admin.News.update',$new->id)}}" method="post">
      @csrf
      @method('PUT')
    <div class="form-group">
      <label >عنوان الخبر</label>
      <input type="text" class="form-control" name="title" required value="{{ $new->title }}">
    </div>

    <div class="form-group">
      <label >صوره الخبر
        <small class="text-info">| في حال تركها فارغه لن تتغير</small>
        <img id="blah" src="{{asset('public/storage/imgs/'.$new->image)}}"
            style="width:70px;height:70px;border-radius:50%;margin:10px" />
      </label>
      <input id="imgInp" type="file" accept="image/*" class="form-control" name="image" >
    </div>



    <div class="form-group">
      <label >وصف قصير <small class="text-info">| اختياري</small></label>
      <input type="text" class="form-control" name="description"  value="{{ $new->description }}">
    </div>

    <div class="form-group">
      <label>المحتوي</label>
      <textarea name="content">{{ $new->content }}</textarea>
        <script>
          CKEDITOR.replace('content', {
              language: 'ar'
            });
        </script>
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

@push('js')
  <script>
        function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
      }

      $("#imgInp").change(function() {
        readURL(this);
      });

        function readURL2(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            $('#newblah').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
      }

      $("#newimgInp").change(function() {
        readURL2(this);
      });
  </script>
@endpush
