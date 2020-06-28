@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="text-center">
    أنشاء فريق
     <i class="fa fa-plus"></i> </h2>
  <hr />
  <h5>
    قم بانشاء فريق وتحيقيق اعلي النقاط مع اصدقائك
  </h5>
  <hr />
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">أنشاء فريق جديد</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('Team.store') }}">
                        @csrf

                        <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right">اسم الفريق</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right">الاصدقاء</label>

                            <div class="col-md-6">
                                <select multiple class="form-control" name="users[]">
                                  @foreach($users as $user)
                                    <option
                                    value="{{$user->id}}"
                                    @if(old('users'))
                                      @if(in_array($user->id,old('users')))
                                      selected
                                      @endif
                                    @endif
                                    >
                                    {{$user->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>

                        <hr />

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                  أنشاء
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
