@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="active">Roles</li>
                </ol>
                <div class="card-header">Roles</div>
                <div class="card">
                    @include('layouts.notifications')
                    <div class="card-body pull-left">
                        <a href="{{ route('roles.create') }}" class="btn btn-primary">Add New</a>
                    </div>
                </div>
                <div class="card-body">
                    @if(isset($roles))
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Updated At</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($roles as $role)
                                    <tr>
                                        <td>{{ substr($role->_id, 10) }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($role->created_at)->format('F d, y H:i:a') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($role->updated_at)->format('F d, y H:i:a') }}</td>
                                        <td>
                                            <a href="{{ route('roles.edit', [$role->_id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('roles.show', [$role->_id]) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                            <form action="{{ route('roles.delete', [$role->_id]) }}" method="POST" style="display: inline">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <p>No Record Found!</p>
                                @endforelse
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
