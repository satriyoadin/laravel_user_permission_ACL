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
                    <strong style="color:white;">User List</strong>
                </div>
                <div class="card-body">
                <div class="table-content" style="margin-left: 50px;margin-right: 50px;">
                <a href="{{ route('user.create') }}" class="btn" style="background-color:#E7E6E6;margin-top:10px;">Add New User</a>
                <hr>
                <div class="table-responsive">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($user as $key => $u)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>
                            @if(!empty($u->getRoleNames()))
                                @foreach($u->getRoleNames() as $r)
                                    <label class="badge badge-success">{{ $r }}</label>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('user.edit',['id'=>$u->id]) }}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('user.delete',['id'=>$u->id]) }}">Delete</a>
                            
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">No user available, please add using <a href="{{route('user.create')}}">This link</a>.</td>
                    </tr>

                    @endforelse
                    </tbody>
                </table>
                </div>
                {!! $user->links() !!}
                </div>
            </div>
        </div>        
    </div>            
</div>
      
@endsection