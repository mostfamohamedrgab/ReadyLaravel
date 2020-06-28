@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="text-center">
    البروفايل <i class="fa fa-user"></i>
      [{{$user->points}}]
      نقطة
  </h2>
  <hr />
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">تعديل الحساب</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('User.update',$user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">الاسم</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">البريد الالكتروني</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">كلمة السر الجديدة</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr />
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                تعديل
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<hr />
<!-- Teams -->
<div class="container">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">اسم الفريق</th>
      <th scope="col">المسؤول</th>
      <th scope="col">حالة الطلب</th>
      <th scope="col">أنشاء منذ</th>
      <th scope="col">#</th>
    </tr>
  </thead>
  <tbody>
    @foreach($user->Teams as $team)
    <tr>
      <td>{{$team->name}}</td>
      <td>{{$team->creator == $user->id ? 'انت' : $team->user->name}}</td>
      <td>{{$team->pivot->approved ? 'مقبول' : 'بانتظار المراجعه'}}</td>
      <td>{{$team->created_at->diffForHumans()}}</td>
      <td>
        @if($team->creator == $user->id)
        ادراه الفريق
        @else
        خروج
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection
