<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($role))
    <input type="hidden" name="_method" value="PUT">
@endif

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="@if(isset($role)){{ $role->name }}@else {{ old('name') }} @endif">
        </div>
        <div class="clearfix"></div>
        <button type="submit" class="btn btn-primary">@if(isset($role)) <i class="fa fa-refresh"></i>&nbsp;Update @else <i class="fa fa-save"></i> Insert @endif</button>
        <a href="{{ route('roles.index') }}" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
    </div>
</div>