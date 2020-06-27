@push('css')
  <style type="text/css">
      .list-group {
        padding-right: 0;
        box-shadow: 2px 2px 5px #eee, -2px -2px 5px #eee;
      }
      .list-group:hover {
        box-shadow: 2px 2px 15px #eee, -2px -2px 15px #eee;
      }
      .list-group a {
        text-decoration: none;
      }
  </style>
@endpush
<ul class="list-group">
  <li class="list-group-item">صفحات الموقع
    <i class="fa fa-home"></i>
  </li>
  <li class="list-group-item">
    <a href="{{ url('/') }}">الرئيسيه</a>
  </li>
  <li class="list-group-item">
    <a href="{{ route('challenges.view') }}">التحديات</a>
  </li>

</ul>
