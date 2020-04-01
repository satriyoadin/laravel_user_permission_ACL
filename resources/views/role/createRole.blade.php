@extends('adminlte::page')
  
@section('content')
<div class="row justify-content-between">
    <div class="col-12">
        <div class="card">
            <div class="card-header" style="background-color:#000080;">
                <strong style="color:white;">Add New Role</strong>
            </div>
            <div class="card-body"> 
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
   
                {!! Form::open(array('route' => 'role.store','method' => 'POST')) !!}
                    @csrf
                    <div class="form-wrapper" style="margin-top: 10px;">
                        <div class="form-group" style="margin-left: 50px;margin-right: 50px;">
                            <strong>Name:</strong>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        </div>
                        <div class="form-group" style="margin-left: 50px;margin-right: 50px;">
                            <strong>Permission:</strong>
                            <br/>
                            @foreach($permission as $p)
                            <label>{{ Form::checkbox('permission[]', $p->id, false, array('class' => 'name')) }} {{$p->name}}</label><br>
                            @endforeach
                        </div>
                        <div class="form-group" style="margin-left: 50px;margin-right: 50px;">
                            <button type="submit" class="btn" style="background-color:#E7E6E6;"><i class="fas fa-plus-square"></i> Submit</button>
                            <a href="{{ route('role.index') }}" class="btn btn-primary float-right">Role List</a>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>        
</div>
@endsection