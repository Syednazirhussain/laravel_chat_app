@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <table class="table">
                    <tr>
                        <td>Id</td>
                        <td>@if(isset($role)){{ $role->id }}@endif</td>
                    </tr>
                    <tr>
                        <td>Name: </td>
                        <td>@if(isset($role)){{ $role->name }}@endif</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <a href="{{ route('roles.index') }}" class="btn btn-default"> <i class="fa fa-return"></i>  Back</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
