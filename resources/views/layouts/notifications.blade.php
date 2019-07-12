@if ($errors->any())
<div class="alert alert-danger">                            
    @foreach($errors->all() as $error)
        <ul class="list">
            <li class="list-item">{{ $error }}</li>
        </ul>
    @endforeach
</div>
@endif
@if(Session::has('error'))
<div class="alert alert-danger">
    {{ Session::get('error')  }}
</div>
@endif
@if(Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
</div>
@endif