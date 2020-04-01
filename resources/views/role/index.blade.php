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
                    <strong style="color:white;">Role List</strong>
                </div>
                <div class="card-body">
                <div class="table-content" style="margin-left: 50px;margin-right: 50px;">
                @can('role-create')
                <a href="{{ route('role.create') }}" class="btn" style="background-color:#E7E6E6;margin-top:10px;">Add New Role</a>
                @endcan
                <hr>
                <div class="table-responsive">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th width="280px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($role as $key => $r)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $r->name }}</td>
                        <td>
                            @can('role-edit')
                            <a class="btn btn-primary" href="{{ route('role.edit',['id'=>$r->id]) }}">Edit</a>
                            @endcan
                            @can('role-delete')
                            <a class="btn btn-danger" href="{{ route('role.delete',['id'=>$r->id]) }}">Delete</a>
                            @endcan
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">No roles available, please add using <a href="{{route('role.create')}}">This link</a>.</td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
                {!! $role->render() !!}
                </div>
                </div>
            </div>
        </div>        
    </div>            
</div>
      
@endsection