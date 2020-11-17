@extends('layouts.master')

@section('title')
    Menu
@endsection
@section('pageHeader')
    Menu
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <button style="margin: 10px;float:right;width:150px" type="button" class="btn btn-primary" data-toggle="modal"
                data-target="#staticBackdrop">
                Add Main Menu
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
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap" id="menu_table">
                        <thead>
                            <tr align="center">
                                <th>Add Sub Menu</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>URL</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menus as $menu)
                                <tr align="center">
                                    <td style="width: 50px">
                                        <button class="btn btn-success add_sub_menu" title="Add Sub Menu"> <i
                                                class="fas fa-plus"></i></button>
                                        <button class="btn btn-danger cancel" style="display: none;" title="Cancel"> <i
                                                class="fas fa-times"></i></button>
                                        <button class="btn btn-info save" title="Save" style="display: none;"> <i
                                                class="fas fa-save"></i></button>
                                    </td>
                                    <!-- <td>{{ $loop->index + 1 }}</td> -->
                                    <td>
                                        <span class="addSpan id">{{ $menu->id }}</span>
                                        {{-- <span class="addInput" style="display: none;">{{ $menu->id }}</span> --}}
                                        <input class="addInput sub_id form-control input-sm" type="text" name="sub_id"
                                        value="{{ $menu->id }}" hidden>
                                        <span class="editInput" style="display: none;">{{ $menu->id }}</span>
                                        <input class="editInput name form-control input-sm" type="text" name="first_name"
                                            value="" hidden>
                                    </td>
                                    <td>
                                        <span class="addSpan name">{{ $menu->name }}</span>
                                        <input class="addInput sub_name form-control input-sm" type="text" name="sub_name"
                                            value="" style="display: none;">
                                        <input class="editInput name form-control input-sm" type="text" name="first_name"
                                            value="{{ $menu->name }}" style="display: none;">
                                    </td>
                                    <td>
                                        <span class="addSpan url">{{ $menu->url }}</span>
                                        <input class="addInput sub_url form-control input-sm" type="text" name="sub_url"
                                            value="" style="display: none;">
                                        <input class="editInput name form-control input-sm" type="text" name="first_name"
                                            value="{{ $menu->url }}" style="display: none;">
                                    </td>
                                    <td>
                                        <div class="icheck-success d-inline addSpan">
                                            <input type="checkbox" id="checkboxSuccess{{ $menu->name }}" class="addSpan"
                                                @if ($menu->status == 1)
                                            checked
                                        @else
                            @endif
                            >
                            <label for="checkboxSuccess{{ $menu->name }}">
                                @if ($menu->status == 1)
                                    Enable
                                @else
                                    Disable
                                @endif
                            </label>
                </div>
                </td>
                <td align="center">
                    <button class="btn btn-primary edit_menu" title="Edit Menu"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-info edit_save" title="Save" style="display: none;"> <i
                            class="fas fa-save"></i></button>
                    <button class="btn btn-danger edit_cancel" style="display: none;" title="Cancel"> <i
                            class="fas fa-times"></i></button>
                </td>
                </tr>
                @endforeach
                </tbody>
                </table>
                {{-- {{ $menus->links() }} --}}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    </div>

    <!-- /.row -->
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Main Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- Insert Main Menu Data --}}
                    <form>
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control name" id="name" required>
                            <span id="name_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="fontasome" class="col-form-label">Fontasome:</label>
                            <input type="text" class="form-control fontasome" id="fontasome">
                        </div>
                        <input type="text" id="url" class="url" value="#" hidden>
                        <input type="text" id="parent_id" class="parent_id" value="0" hidden>
                        <input type="text" id="level_no" class="level_no" value="1" hidden>
                        {{-- end --}}
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

            $('.add_sub_menu').on('click', function() {
                //hide sub menu span
                $(this).closest("tr").find(".addSpan").hide();

                //show sub menu input
                $(this).closest("tr").find(".addInput").show();

                //hide sub menu button
                $(this).closest("tr").find(".add_sub_menu").hide();

                //show sub menu button
                $(this).closest("tr").find(".save").show();
                $(this).closest("tr").find(".cancel").show();
                $(this).closest("tr").find(".edit_menu").attr('disabled', true);

                $(this).closest("tr").find(".save").click(function(e) {
                    e.preventDefault();
                    
                    var sub_name =  $(this).closest("tr").find(".sub_name").val();
                    var sub_fontasome = 'far fa-circle';
                    var sub_menuUrl = $(this).closest("tr").find(".sub_url").val();
                    var sub_parent_id = $(this).closest("tr").find(".sub_id").val();
                    var sub_level_no = '2';
                    var sub_url = "{{ URL::to('/') }}" + '/submenu';
                    var sub_status = '1';
                    var sub_created_by = '1';
                    var sub_updated_by = '1';
                    var sub_created_at = '2020-10-24';
                    var sub_updated_at = '2020-10-24';
                    var sub_branch_id = '1';
                    var sub_organization_id = '1';
                    // let _url = `/posts`;
                    // let _token = $('meta[name="csrf-token"]').attr('content');
                    // alert(sub_menuUrl);
                    // var url = "{{ route('menu.store') }}";
                    // if (name !== '') {
                        $.ajax({
                            type: "POST",
                            url: sub_url,
                            data: {
                                name: sub_name,
                                url: sub_menuUrl,
                                font_awsome: sub_fontasome,
                                parent_id: sub_parent_id,
                                level_no: sub_level_no,
                                status: sub_status,
                                created_by: sub_created_by,
                                updated_by: sub_updated_by,
                                created_at: sub_created_at,
                                updated_at: sub_updated_at,
                                branch_id: sub_branch_id,
                                organization_id: sub_organization_id
                            },
                            dataType: "text",
                            success: function(response) {
                                // success message 
                                alert(response);
                                console.log(response);
                            },
                            error: function(response) {
                                // error message
                                console.log(response);
                                alert('fail');
                            }
                        });
                    // } else {
                    //     $('#name_error').html(
                    //         '<strong style="color:red"> *Please Fill in the Menu name</strong>');
                    //     $('#name').css({
                    //         "color": "black",
                    //         "border": "2px solid red"
                    //     });
                    // }


                });


            });
            $('.cancel').on('click', function() {
                //hide sub menu span
                $(this).closest("tr").find(".addSpan").show();

                //show sub menu input
                $(this).closest("tr").find(".addInput").hide();

                //hide sub menu button
                $(this).closest("tr").find(".add_sub_menu").show();

                //show sub menu button
                $(this).closest("tr").find(".save").hide();
                $(this).closest("tr").find(".cancel").hide();
                $(this).closest("tr").find(".edit_menu").attr('disabled', false);
            });

            // edit 
            $('.edit_menu').on('click', function() {
                //hide edit menu span
                $(this).closest("tr").find(".addSpan").hide();

                //show edit menu input
                $(this).closest("tr").find(".editInput").show();

                //hide edit menu button
                $(this).closest("tr").find(".edit_menu").hide();

                //show edit menu button
                $(this).closest("tr").find(".edit_save").show();
                $(this).closest("tr").find(".edit_cancel").show();
                $(this).closest("tr").find(".add_sub_menu").attr('disabled', true);

            });

            // edit cancel
            $('.edit_cancel').on('click', function() {
                //hide edit menu span
                $(this).closest("tr").find(".addSpan").show();

                //show edit menu input
                $(this).closest("tr").find(".editInput").hide();

                //hide edit menu button
                $(this).closest("tr").find(".edit_menu").show();

                //show edit menu button
                $(this).closest("tr").find(".edit_save").hide();
                $(this).closest("tr").find(".edit_cancel").hide();
                $(this).closest("tr").find(".add_sub_menu").attr('disabled', false);
            });

            // Add Main Menu 
            $('.add_main_menu').on('click', function(e) {

                e.preventDefault();
                var name = $('#name').val();
                var fontasome = $('#fontasome').val();
                var menuUrl = $('#url').val();
                var parent_id = $('#parent_id').val();
                var level_no = $('#level_no').val();
                var url = "{{ URL::to('/') }}" + '/menu';
                var status = '1';
                var created_by = '1';
                var updated_by = '1';
                var created_at = '2020-10-24';
                var updated_at = '2020-10-24';
                var branch_id = '1';
                var organization_id = '1';
                // let _url = `/posts`;
                // let _token = $('meta[name="csrf-token"]').attr('content');
                // alert(menuUrl);
                // var url = "{{ route('menu.store') }}";
                if (name !== '') {
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            name: name,
                            url: menuUrl,
                            font_awsome: fontasome,
                            parent_id: parent_id,
                            level_no: level_no,
                            status: status,
                            created_by: created_by,
                            updated_by: updated_by,
                            created_at: created_at,
                            updated_at: updated_at,
                            branch_id: branch_id,
                            organization_id: organization_id
                        },
                        dataType: "text",
                        success: function(response) {
                            // success message 
                            alert(response);
                            if (response) {
                                alert(response.name);
                            }
                            $('#menu_table tbody').prepend(
                                '<tr align="center"><td style="width: 50px"><button class="btn btn-success add_sub_menu" title="Add Sub Menu"><i class="fas fa-plus"></i></button><button class="btn btn-danger cancel" style="display: none;" title="Cancel"><i class="fas fa-times"></i></button><button class="btn btn-info save" title="Save" style="display: none;"><i class="fas fa-save"></i></button></td><td>' +
                                1 + '</td><td>' + name + '</td><td>' + menuUrl +
                                '</td><td><div class="icheck-success d-inline addSpan"><input type="checkbox" id="checkboxSuccess" class="addSpan" checked><label for="checkboxSuccess">Enable</label></div></td><td><button class="btn btn-primary edit_menu" title="Edit Menu"><i class="fa fa-edit"></i></button><button class="btn btn-info edit_save" title="Save" style="display: none;"><i class="fas fa-save"></i></button><button class="btn btn-danger edit_cancel" style="display: none;" title="Cancel"><i class="fas fa-times"></i></button></td><tr>'
                            );

                            console.log(response);
                            // alert("sucessfully!");
                            $('.modal').modal('hide');
                        },
                        error: function(response) {
                            // error message
                            console.log(response);
                            alert('fail');
                        }
                    });
                } else {
                    $('#name_error').html(
                        '<strong style="color:red"> *Please Fill in the Menu name</strong>');
                    $('#name').css({
                        "color": "black",
                        "border": "2px solid red"
                    });
                }
            });
        });

    </script>
@endsection
