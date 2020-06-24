@extends('admin.layouts.index')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            لوحة التحكم / الاخبار
          </h1>

          <hr style="border-color:#aaa"/>
          <a  class="btn btn-primary" href="{{ route('admin.News.create') }}" >
            اضافة خبر <i class="fa fa-building-o"></i>
          </a>
          </section>
          @include('layouts.msgs')
        <!-- Main content -->
        <section class="content">

          <table class="table">
            <thead>
              <tr >
                <td>#</td>
                <td>عنوان الخبر</td>
                <td>وصف قصير<td>
                <td>صوره الخبر</td>
                <td>اجراء<td>
              </tr>
            </thead>
            <tbody>
              @foreach($news as $new)
              <tr>
                <td>{{$new->id}}</td>
                <td>{{$new->title}}</td>
                <td>{{$new->description}}</td>
                <td>
                  <img style="margin:auto;display:block;width:50px;height:50px;"
                    src="{{asset('storage/imgs/'.$new->image)}}" />
                </td>
                <td>{{$new->date}}</td>
                <td>

                <a class="btn btn-info" href="{{ route('admin.News.show',$new->id) }}">
                  مشاهدة <i class="fa fa-eye"></i></a>

                <a class="btn btn-info" href="{{ route('admin.News.edit',$new->id) }}">
                  تعديل <i class="fa fa-edit"></i></a>
                <form class="delete"
                style="display:inline-block"
                action="{{ route('admin.News.destroy',$new->id) }}" method="post">
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
