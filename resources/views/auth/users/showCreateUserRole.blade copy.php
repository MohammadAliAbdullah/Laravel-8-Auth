@extends('layouts.user')

@section('title')
    user
@endsection
@section('pageHeader')
    user
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <button style="margin: 10px;float:right;width:150px" type="button" class="btn btn-primary" data-toggle="modal"
                data-target="#staticBackdrop">
                Create New User
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap" id="ShowUser">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr align="center">
                                    <td class="userId">{{ $user->id }}</td>
                                    <td class="userName"> {{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td> <strong class="showRole">Admin</strong>
                                        <select name="" class="form-control role" style="display: none;">
                                            <option value="">-Select Role-</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td align="center">
                                        <button class="btn btn-primary assignRole">Assign Role</button>
                                        <button class="btn btn-danger assignRoleCancel"
                                            style="display: none;">Cancel</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
{{--  --}}

{{--  --}}

    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Create New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-form-label">User Name:</label>
                            <input type="text" class="form-control name" id="name" required>
                            <span id="name_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="fontasome" class="col-form-label">Email:</label>
                            <input type="text" class="form-control fontasome" id="fontasome">
                        </div>
                        <div class="form-group">
                            <label for="fontasome" class="col-form-label">Password:</label>
                            <input type="text" class="form-control fontasome" id="fontasome">
                        </div>
                        <div class="form-group">
                            <label for="fontasome" class="col-form-label">Confirm Password:</label>
                            <input type="text" class="form-control fontasome" id="fontasome">
                        </div>
                        <div class="form-group">
                            <label for="fontasome" class="col-form-label">Assign Role:</label>
                            <input type="text" class="form-control fontasome" id="fontasome">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_main_menu">Save Now!</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // header 
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // 
            $('.assignRole').on('click', function(e) {
                e.preventDefault;
                //hide sub menu span
                $(this).closest("tr").find(".role").show();
                $(this).closest("tr").find(".assignRoleCancel").show();
                //show sub menu input
                $(this).closest("tr").find(".showRole").hide();
                $(this).closest("tr").find(".assignRole").hide();
                // --------------------------
                // Assign Role
                $(this).closest("tr").find(".role").change(function(e) {
                    e.preventDefault();
                    var id = $(this).closest("tr").find(".userId").text();
                    var role = $(this).val();
                    var url = "{{ URL::to('/') }}" + '/user_role';
                    alert(id + '\n' + role);
                    $.ajax({
                        type: "post",
                        url: url,
                        data: {
                            user_id: id,
                            role_id: role
                        },
                        dataType: "text",
                        success: function(response) {
                            console.log(response);
                            alert(response);
                        },
                        error: function(response) {
                            console.log(response);
                        }
                    });
                });
                // end assign
                // --------------------------
            });
            $('.assignRoleCancel').on('click', function(e) {
                e.preventDefault;
                //hide sub menu span
                $(this).closest("tr").find(".role").hide();
                $(this).closest("tr").find(".assignRoleCancel").hide();
                //show sub menu input
                $(this).closest("tr").find(".showRole").show();
                $(this).closest("tr").find(".assignRole").show();

            });
        });

    </script>
@endsection
