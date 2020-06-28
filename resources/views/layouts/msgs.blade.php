

@if( session()->has('success') )
  <div class="alert alert-success text-center">{{ session()->get('success') }}</div>
@endif

@if( session()->has('error') )
  <div class="alert alert-danger text-center">{{ session()->get('error') }}</div>
@endif

@if( session()->has('danger') )
  <div class="alert alert-danger text-center">{{ session()->get('danger') }}</div>
@endif

@if( session()->has('info') )
  <div class="alert alert-info text-center">{{ session()->get('info') }}</div>
@endif

@if($errors->any())
  <ul class="list-group">
    @foreach($errors->all() as $e)
      <li class="list-group-item list-group-item-danger">{{$e}}</li>
    @endforeach
  </ul>
@endif
