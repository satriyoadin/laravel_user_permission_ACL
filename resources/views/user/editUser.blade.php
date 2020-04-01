@extends('adminlte::page')
   
@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color:#000080;">
                    <strong style="color: white;">Edit Product</strong>
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
  
                {!! Form::model($user, ['method' => 'PATCH','route' => ['user.update', $user->id]]) !!}
                    @csrf
                     <div class="form-wrapper" style="margin-top: 10px;">
                        <div class="form-group" style="margin-left: 50px;margin-right: 50px;">
                        <strong>Name:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group" style="margin-left: 50px;margin-right: 50px;">
                        <strong>Email:</strong>
                        {!! Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control')) !!}
                    </div>
                    <div class="form-group" style="margin-left: 50px;margin-right: 50px;">
                        <strong>Pasword:</strong>
                        {!! Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control')) !!}
                    </div>
                    <div class="form-group" style="margin-left: 50px;margin-right: 50px;">
                        <strong>Confirm Password:</strong>
                        {!! Form::password('password', array('placeholder' => 'Confirm Password', 'class' => 'form-control')) !!}
                    </div>
                    <div class="form-group" style="margin-left: 50px;margin-right: 50px;">
                        <strong>Confirm Password:</strong>
                        {!! Form::select('role[]', $role,$userRole, array('class' => 'form-control','multiple')) !!}
                    </div>
                    <div class="form-group" style="margin-left: 50px;margin-right: 50px;">
                        <button type="submit" class="btn" style="background-color:#E7E6E6;"><i class="fas fa-plus-square"></i> Submit</button>
                        <a href="{{ route('user.index') }}" class="btn btn-primary float-right">User List</a>
                    </div>
                    </div>
               
                {!! Form::close() !!}
            </div>
        </div> 
    </div>
</div>
@endsection