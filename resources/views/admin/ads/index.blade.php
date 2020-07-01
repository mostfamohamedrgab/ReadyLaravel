@extends('admin.layouts.index')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 >
          الاعلانات
          </h1>

          <hr style="border-color:#aaa"/>
          <button style="display:block;text-align:right" type="button" class=" btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          اعلان جديد
            <i class="fa fa-plus"></i>
          </button>
          </section>
          @include('layouts.msgs')
        <!-- Main content -->
        <section class="content">

    <table id="example" class="display" style="width:100%">
      <thead>
        <tr >
          <th>#</th>
          <th>الايقونه</th>
          <th>العنوان</th>
          <th>الوصف</th>
          <th>$</th>
        </tr>
      </thead>
      <tbody>
        @foreach($ads as $ad)
        <tr>
          <td>{{$ad->id}}</td>
          <td>
            <strong style="font-size:25px">{!! $ad->icon !!}</strong>
          </td>
          <td>{{$ad->title}}</td>
          <td>{{$ad->description}}</td>


          <td>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-{{$ad->id}}">
              تعديل <i class="fa fa-edit"></i>
            </button>


          <form class="delete"
          style="display:inline-block"
          action="{{ route('admin.Ads.destroy',$ad->id) }}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger" value="حذف" />
          </form>

          </td>
        </tr>


        <!--edit  Modal -->
      <div class="modal fade" id="edit-{{$ad->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">تعديل {{$ad->title}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="text-align:right;">

              <form method="post" action="{{route('admin.Ads.update',$ad->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label>
                    الايقونه
                    <a target="_blank"
                    href="https://fontawesome.com/icons?d=gallery&q=global">موقع الايقونات </a>
                    | <small class="text-info">تضمين ك htmlCode</small>
                  </label>
                  <input type="text" class="form-control" required name="icon" value="{{$ad->icon }}">
                </div>

                <div class="form-group">
                  <label>
                    العنوان
                  </label>
                  <input type="text" class="form-control"  value="{{$ad->title }}" required name="title">
                </div>

                <div class="form-group">
                  <label>الوصف</label>
                  <textarea class="form-control" name="description">{{$ad->description}}</textarea>
                </div>


                <button type="submit" class="btn btn-primary">حفظ</button>
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
          <h5 class="modal-title" id="exampleModalLabel">اعلان جديد</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="post" action="{{route('admin.Ads.store')}}">
            @csrf
            <div class="form-group">
              <label>
                الايقونه
                <a target="_blank"
                href="https://fontawesome.com/icons?d=gallery&q=global">موقع الايقونات </a>
                | <small class="text-info">تضمين ك htmlCode</small>
              </label>
              <input type="text" class="form-control" required name="icon" value="{{old('icon')}}">
            </div>

            <div class="form-group">
              <label>
                العنوان
              </label>
              <input type="text" class="form-control"  value="{{old('title')}}" required name="title">
            </div>

            <div class="form-group">
              <label>الوصف</label>
              <textarea class="form-control" name="description">{{old('description')}}</textarea>
            </div>


            <button
            type="submit" class="btn btn-primary">حفظ</button>
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
