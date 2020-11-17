@extends('layouts.master')

@section('title')
    Menu Permission
@endsection
@section('pageHeader')
    Menu Permission
@endsection
@section('content')
    <div class="container" style="margin-top: 30px;">
        <form action="{{ route('menu_permission.store') }}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-6">
                    <select type="text" class="form-control role" id="role" placeholder="Select Role" name="role">
                        <option value="">-- Select Role --</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div style="margin: 5px;">
                    <div class="icheck-primary btn select_all" id="select_all">
                        <input type="checkbox" id="checkboxPrimary">
                        <label for="checkboxPrimary">
                            Select All
                        </label>
                    </div>
                    <div class="icheck-primary btn unselect_all">
                        <input type="checkbox" id="checkboxPrimar">
                        <label for="checkboxPrimar">
                            Unselect All
                        </label>
                    </div>
                </div>

                <div class="row" style="margin:20px" id="menu_permission_from">

                    @foreach ($menus as $menu)
                        <div class="col-4">
                            <div class="icheck-primary">
                                <input type="checkbox" id="checkboxPrimary{{ $loop->index + 1 }}" class="menu"
                                    value="{{ $menu->id }}" name="menu_id[]">
                                <label for="checkboxPrimary{{ $loop->index + 1 }}">
                                    {{ $menu->name }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div style="padding-bottom: 10px">
                <input type="submit" name="submit" id="submit" class="btn btn-primary pull-right submit" value="Save Now !">
                <input type="submit" name="submit" class="btn btn-secondary" value="Cancel !">
            </div>
            </form>
            <h3>=============ajax=============</h3>
            <div style="padding-bottom: 10px">
                <input type="submit" name="submit" id="submit" class="btn btn-primary pull-right submit" value="Save Now !">
                <input type="submit" name="submit" class="btn btn-secondary" value="Cancel !">
            </div>
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

            // if ($(".select_all").is(':checked')) {}
            // var select_all = document.getElementById("select_all").checked;
            // // var select_all = $('.select_all').val();

            $('.select_all').on('click', function() {
                if (this.checked) {} else {
                    // alert('not checked');
                    $('.menu').attr('checked', true);
                }
                $('.menu').attr('checked', true);
                $('.unselect_all').attr('checked', false);
            });
            $('.unselect_all').on('click', function() {
                $('.menu').attr('checked', false);
                $('.select_all').attr('checked', false);

            });
            // submit 
            $('.submit').on('click', function() {
                var url = "{{ URL::to('/') }}" + '/menu_permission';
                var role = $('.role').val();
                var menu = $('.menu').val();
                // var menu = $("#menu_permission_from input:checkbox:checked").map(function() {
                //     return $(this).val();
                // }).get();
                // var created_by = '1';
                // var updated_by = '1';
                // var created_at = '2020-10-24';
                // var updated_at = '2020-10-24';
                // var branch_id = '1';
                // var organization_id = '1';
                // var test = 'abdullah';
                // alert(menu);
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        role: role,
                        menu: menu
                        // created_by: created_by,
                        // updated_by: updated_by,
                        // created_at: created_at,
                        // updated_at: updated_at,
                        // branch_id: branch_id,
                        // organization_id: organization_id
                    },
                    dataType: "text",
                    success: function(response) {
                        alert(response);
                        console.log(response);
                    },
                    error: function(response) {
                        console.error();
                    }

                });

            });
        });


        // 
        // $(document).ready(function() {
        //     $('#select_all').change(function() {
        //         if (this.checked) {
        //             alert('checked');
        //         } else {
        //             alert('not checked');
        //         }
        //     });
        // })

    </script>
@endsection
