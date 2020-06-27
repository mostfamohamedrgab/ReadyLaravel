@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <i class="fa fa-check"></i>
                  تحقق من عنوان بريدك الإلكتروني</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                          تم إرسال رابط تحقق جديد إلى عنوان بريدك الإلكتروني
                        </div>
                    @endif

                    قبل المتابعة ، يرجى التحقق من بريدك الإلكتروني للحصول على رابط التحقق
                    <hr />
                    إذا لم تستلم البريد الإلكتروني, <a href="{{ route('verification.resend') }}">
                    اضغط هنا للارسال مرة اخري
                    </a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
