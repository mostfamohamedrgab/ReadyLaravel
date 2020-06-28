@push('css')
  <link rel="stylesheet" href="{{ asset('public/css/challnegs.css') }}"></link>
@endpush
@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="text-center">التحديات <i class="fas fa-tasks"></i>
  </h2>

  <hr />
  <!-- start taks -->
  @foreach($cats as $cat)
  <div class="row cat-container">
    <h2 class="cat-title">{{$cat->name}}</h2>
    @foreach($cat->challenges as $challenge)


    <div class="col-md-3 col-sm-12">
      <a class="item-link" href="#" data-toggle="modal" data-target="#Modal-{{$challenge->id}}">
        <div class="item">
          <h4>{{$challenge->name}}</h4>
          <p>{{$challenge->points}}</p>
          <hr />
          @if($challenge->type == 'teams')
            <i class="fa fa-object-group"></i>
            فرق
          @elseif($challenge->type == 'users')
            <i class="fa fa-users"></i>
            اعضاء
          @else
            <i class="fa fa-globe"></i>
            عام
          @endif
        </div>
      </a>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="Modal-{{$challenge->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{$challenge->name}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>المطلوب </p>
            {!! $challenge->content !!} <hr/>
            @if($challenge->file)
              <a
              style="color:#fff"
              href="{{asset('public/storage/files/'. $challenge->file)}}"
                class="btn btn-info"
                >
                الاطلاع علي الملف
              </a>
              <hr />
            @endif
          </div>
          <div class="modal-footer">
          <form action="{{ route('challenges.slove') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="value">القيمة الصحيحة</label>
              <input type="text" name="value" required="required" class="form-control" id="value">
            </div>
            <!--- check if user login -->
            @if(auth()->user())
              <!-- check if user verification -->
              @if(auth()->user()->email_verified_at)

                <!-- check if user pass it before -->
                @php
                  $UserSloved = auth()->user()->sloves->pluck('challenge_id');
                @endphp
                @if( ! in_array($challenge->id,$UserSloved->toArray()) )
                <input type="hidden" name="challenge_id" value="{{$challenge->id}}" />
                <input type="submit" class="btn btn-info" value="ارسال" />
                @else
                  <p class="text-info text-center">
                    <strong>ملحوظه</strong>
                    لقد قمت بحل التحدي سابقا
                  </p>
                @endif

              @else
              <a class="d-block" href="{{ route('verification.notice') }}">
                يجب عليك تاكيد الحساب اولا
              </a>
              @endif
            @else
            <a class="d-block" href="{{route('login')}}">
              يرجي تسجيل الدخول للمشاركة
            </a>
            @endif
          </form>

          </div>
        </div>
      </div>
    </div>
    <!-- end model -->
    @endforeach
  </div><div style="clear:both"></div>
  @endforeach
  <!-- end tasks -->
</div>

@endsection
@push('js')
  <script>
  $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
    })
  </script>
@endpush
