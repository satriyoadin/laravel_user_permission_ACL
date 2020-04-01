@extends('adminlte::page')
 
@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="card-header" style="background-color:#000080;">
                    <strong style="color:white;">Product List</strong>
                </div>
                <div class="card-body">
                <div class="table-content" style="margin-left: 50px;margin-right: 50px;">
                @can('product-create')
                <a href="{{ route('products.create') }}" class="btn" style="background-color:#E7E6E6;margin-top:10px;">Add New Product</a>
                @endcan
                <hr>
                <div class="table-responsive">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Details</th>
                        <th width="280px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($products as $product)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            @can('product-edit')
                            <a class="btn btn-primary" href="{{ route('products.edit',['id'=>$product->id]) }}">Edit</a>
                            @endcan
                            @can('product-delete')
                            <a class="btn btn-danger" href="{{ route('products.delete',['id'=>$product->id]) }}">Delete</a>
                            @endcan
                            
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">No product available, please add using <a href="{{route('products.create')}}">This link</a>.</td>
                    </tr>

                    @endforelse
                    </tbody>
                </table>
                </div>
                {!! $products->links() !!}
                </div>
            </div>
        </div>        
    </div>            
</div>
      
@endsection