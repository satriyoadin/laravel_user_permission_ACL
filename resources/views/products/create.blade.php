@extends('products.layout')
  
@section('content')
<div class="row justify-content-between" style="margin-top:50px;">
    <div class="col-12">
        <div class="card">
            <div class="card-header" style="background-color:#000080;">
                <strong style="color:white;">Add New Product</strong>
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
   
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    <div class="form-wrapper" style="margin-top: 10px;">
                    <div class="form-group" style="margin-left: 50px;margin-right: 50px;">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group" style="margin-left: 50px;margin-right: 50px;">
                        <strong>Detail:</strong>
                        <textarea class="form-control" style="height:150px" name="description" placeholder="Detail"></textarea>
                    </div>
                    <div class="form-group" style="margin-left: 50px;margin-right: 50px;">
                        <button type="submit" class="btn" style="background-color:#E7E6E6;"><i class="fas fa-plus-square"></i>Submit</button>
                        <a href="{{ route('products.index') }}" class="btn btn-primary pull-right">Product List</a>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>        
</div>
@endsection