@extends('admin.layouts.index')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 >
            لوحة التحكم 
            / 
            الاقسام
          </h1>

          <hr style="border-color:#aaa"/>
          <button style="display:block;text-align:right" type="button" class=" btn btn-primary" data-toggle="modal" data-target="#exampleModal">
           	اضافة قسم
            <i class="fa fa-th-list"></i>
          </button>
          </section>
          @include('layouts.msgs')
        <!-- Main content -->
        <section class="content">

    <table class="table">
      <thead>
        <tr >
          <td>#</td>
          <td>الاسم</td>
          <td>اجراء<td>
        </tr>
      </thead>
      <tbody>
        @foreach($cats as $cat)
        <tr>
          <td>{{$cat->id}}</td>
          <td>{{$cat->name}}</td>


          <td>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-{{$cat->id}}">
              تعديل <i class="fa fa-edit"></i>
            </button>


          <form class="delete"
          style="display:inline-block"
          action="{{ route('admin.Sections.destroy',$cat->id) }}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger" value="حذف" />
          </form>

          </td>
        </tr>


        <!--edit  Modal -->
      <div class="modal fade" id="edit-{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">تعديل {{$cat->name}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <form method="post" action="{{route('admin.Sections.update',$cat->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label>الاسم</label>
                  <input type="text" class="form-control" required name="name" value="{{ $cat->name }}">
                </div>

                <button type="submit" class="btn btn-primary">تعديل</button>
          </form>

            </div>
          </div>
        </div>
      </div>
        <!-- end edit model --->

        @endforeach
      </tbody>
    </table>
    <!-- start add model --->
    <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
          	أضافة قسم جيد
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="post" action="{{route('admin.Sections.store')}}">
            @csrf
            <div class="form-group">
              <label>الاسم</label>
              <input type="text" class="form-control" required name="name" value="{{old('name')}}">
            </div>
        
            <button type="submit" class="btn btn-primary">حفظ</button>
      </form>

        </div>
      </div>
    </div>
  </div>
    <!-- end add model --->
@stop
@push('css')
  <style type="text/css">
      form {
        text-align: right !important
      }
  </style>
@endpush
@push('js')
  <script>

    $(document).on('click','.delete', function (e){

      if( confirm('تاكيد ؟') )
      {
        return true;
      }else{
        return false;
      }

    });

    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    })

  </script>
@endpush
