@extends('admin.layouts.index')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            لوحه التحكم / الرسائل
          </h1>

          <hr style="border-color:#aaa"/>
          </section>
          @include('layouts.msgs')
        <!-- Main content -->
        <section class="content">

    <table class="table">
      <thead>
        <tr>
          <td scope="col">#</td>
          <td scope="col">الاسم</td>
          <td scope="col">الايميل</td>
          
          <td scope="col">الرساله</td>
          <td scope="col">اجراء</td>
        </tr>
      </thead>
      <tbody>
        @foreach($msgs as $msg)
        <tr>
          <td scope="row">{{$msg->id}}</td>
          <td>{{$msg->name}}</td>
          <td>{{$msg->email}}</td>
          
          <td>{{$msg->msg}}</td>
          <td>
            <form
            class="delete"
            action="{{ route('admin.Contact.destroy',$msg->id) }}" method="post">
              @csrf
              @method('DELETE')
              <input type="submit" class="btn btn-danger" value="حذف" />
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>



@stop
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


  </script>
@endpush
