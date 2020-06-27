@extends('admin.layouts.index')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 >
            لوحة التحكم
            /
          الفرق
          </h1>

          <hr style="border-color:#aaa"/>
          <button style="display:block;text-align:right" type="button" class=" btn btn-primary" data-toggle="modal" data-target="#exampleModal">
           فريق جديد
            <i class="fa fa-steam-square"></i>
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
          <td>أنشأ بوسطة</td>
          <td>النقاط</td>
          <td>أنشأ في</td>
          <td>اجراء<td>
        </tr>
      </thead>
      <tbody>
        @foreach($teams as $team)
        <tr>
          <td>{{$team->id}}</td>
          <td>{{$team->name}}</td>
          <td>{{$team->theCreator->name}}</td>
          <td>
            {{$team->ApprovedUsers->sum('points')}}
          </td>
          <td>{{$team->created_at->diffForHumans()}}</td>


          <td>
            <a href="{{ route('admin.Teams.update',$team->id) }}" class="btn btn-info">
              مشاهده <i class="fa fa-eye"></i>
            </a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-{{$team->id}}">
              تعديل <i class="fa fa-edit"></i>
            </button>


          <form class="delete"
          style="display:inline-block"
          action="{{ route('admin.Teams.destroy',$team->id) }}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger" value="حذف" />
          </form>

          </td>
        </tr>


        <!--edit  Modal -->
      <div class="modal fade" id="edit-{{$team->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">تعديل {{$team->name}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <form method="post" action="{{route('admin.Teams.update',$team->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label>الاسم</label>
                  <input type="text" class="form-control" required name="name" value="{{ $team->name }}">
                </div>

                <div class="form-group">
                  <label >المنشأ</label>
                  <select class="form-control" required name="creator">
                    @foreach($users as $user)
                    <option
                    value="{{$user->id}}"
                    {{$team->creator == $user->id ? 'selected' : ''}}
                    >{{ $user->name }}</option>
                    @endforeach
                  </select>
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
            أضافه فريق جديد
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="post" action="{{route('admin.Teams.store')}}">
            @csrf
            <div class="form-group">
              <label>الاسم</label>
              <input type="text" class="form-control" required name="name" value="{{old('name')}}">
            </div>

            <div class="form-group">
              <label >المنشأ</label>
              <select class="form-control" required name="creator">
                @foreach($users as $user)
                <option
                value="{{$user->id}}"
                {{ old('creator') == $user->id ? 'selcted' : ''}}
                >{{ $user->name }}</option>
                @endforeach
              </select>
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
