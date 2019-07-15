@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fa fa-edit"></i>Edit&nbsp;{{ $role->name }}</div>
                @include('layouts.notifications')
                <div class="card-body">
                    <form action="{{ route('roles.update', [$role->_id]) }}" method="POST">
                        @include('roles.field')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
