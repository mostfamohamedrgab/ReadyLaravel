@extends('admin.layouts.index')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           لوحه التحكم
           /
           الصفحات
          </h1>

          <hr style="border-color:#aaa"/>
          <a  class="btn btn-primary" href="{{ route('admin.Pages.create') }}" >
           اضافه صفحه
            <i class="fa fa-sitemap"></i>
          </a>
          </section>
          @include('layouts.msgs')
        <!-- Main content -->
        <section class="content">

          <table class="table">
            <thead>
              <tr >
                <td>#</td>
                <td>
                  عنوان الصفحه
                 </td>
                <td>اجراء<td>
              </tr>
            </thead>
            <tbody>
              @foreach($pages as $page)
              <tr>
                <td>{{$page->id}}</td>
                <td>{{$page->title}}</td>
               
                <td>

                <a class="btn btn-info" href="{{ route('admin.Pages.show',$page->id) }}">
                  مشاهدة <i class="fa fa-eye"></i></a>

                <a class="btn btn-info" href="{{ route('admin.Pages.edit',$page->id) }}">
                  تعديل <i class="fa fa-edit"></i></a>
                <form class="delete"
                style="display:inline-block"
                action="{{ route('admin.Pages.destroy',$page->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <input type="submit" class="btn btn-danger" value="حذف" />
                </form>

                </td>
              </tr>
              @endforeach
            </tbody>
            </table>


@endsection
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
