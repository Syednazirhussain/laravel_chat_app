@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="active">Peoples</li>
                </ol>
                <div class="card-header">Peoples</div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li class="list-item">
                            <div class="content">
                                <h3 class="text-info pull-left">Nazir</h3>
                                <button class="btn btn-primary pull-right"><i class="fa fa-plus"></i>&nbsp;Add Friend</button>
                                
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
