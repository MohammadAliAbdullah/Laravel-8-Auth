@extends('layouts.master')

@section('title')
    Role
@endsection
@section('pageHeader')
    Role
@endsection
@section('content')
        <div class="row">
            <div class="col-12">
                <a href="{{ url('/role/create') }}"><button class="btn btn-info"
                        style="margin: 10px;float:right;width:150px">Add
                        Role</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr align="center">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Display Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=0; ?>
                                @foreach ($roles as $role)
                                <?php $no=$no +  $role->status;?>
                                    <tr  align="center">
                                        <!-- <td>{{ $loop->index + 1 }}</td> -->
                                        <td>{{ $role->id }}</td>
                                        @if ($role->name == 'admin')
                                            <td> <strong style="color:red">{{ $role->name }}</strong></td>
                                        @else
                                            <td> {{ $role->name }}</td>
                                        @endif
                                        <td>{{ $role->display_name }}</td>
                                        <td>{{ $role->description }}</td>
                                        <td>{{ $role->status }}</td>
                                        <td align="center">
                                            <button class="btn btn-primary">Edit</button>
                                            <button class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                                {{-- {{ $no }} --}}
                            </tbody>
                        </table>
                        {{ $roles->links() }}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    <!-- /.row -->

@endsection

@section('script')

@endsection
