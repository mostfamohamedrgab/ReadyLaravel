@extends('admin.layouts.index')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            لوحة التحكم
            /
            التحديات
          </h1>

          <hr style="border-color:#aaa"/>
          <a  class="btn btn-primary" href="{{ route('admin.Challenges.create') }}" >
          اضافة تحدي
            <i class="fa fa-bar-chart-o"></i>
          </a>
          </section>
          @include('layouts.msgs')
        <!-- Main content -->
        <section class="content">

          <table class="table">
            <thead>
              <tr >
                <td>#</td>
                <td>  الاسم</td>
                <td>  القسم  </td>
                <td>اضيف في  </td>
                <td>اجراء<td>

              </tr>
            </thead>
            <tbody>
              @foreach($challenges as $challenge)
              <tr>
                <td>{{$challenge->id}}</td>
                <td>{{$challenge->name}}</td>
                <td>{{$challenge->cat}}</td>

                <td>{{$challenge->created_at->diffForHumans() }}</td>
                <td>

                <a class="btn btn-info" href="{{ route('admin.Challenges.show',$challenge->id) }}">
                  مشاهدة <i class="fa fa-eye"></i></a>

                <a class="btn btn-info" href="{{ route('admin.Challenges.edit',$challenge->id) }}">
                  تعديل <i class="fa fa-edit"></i></a>
                <form class="delete"
                style="display:inline-block"
                action="{{ route('admin.Challenges.destroy',$challenge->id) }}" method="post">
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
