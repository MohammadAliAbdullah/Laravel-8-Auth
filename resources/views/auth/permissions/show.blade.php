@extends('layouts.master')

@section('title')
Permission
@endsection
@section('pageHeader')
Permission
@endsection
@section('content')
        <div class="row">
            <div class="col-12">
                <a href="{{ url('/permission/create') }}"><button class="btn btn-info"
                        style="margin: 10px;float:right;width:150px">Add
                        Permission</button></a>
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
                                @foreach ($permissions as $permission)
                                    <tr  align="center">
                                        <!-- <td>{{ $loop->index + 1 }}</td> -->
                                        <td>{{ $permission->id }}</td>
                                        @if ($permission->name == 'admin')
                                            <td> <strong style="color:red">{{ $role->name }}</strong></td>
                                        @else
                                            <td> {{ $permission->name }}</td>
                                        @endif
                                        <td>{{ $permission->display_name }}</td>
                                        <td>{{ $permission->description }}</td>
                                        <td>{{ $permission->status }}</td>
                                        <td align="center">
                                            <button class="btn btn-primary">Edit</button>
                                            <button class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $permissions->links() }}
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
