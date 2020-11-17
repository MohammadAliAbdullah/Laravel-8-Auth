@extends('layouts.master')

@section('title')
    Role create
@endsection
@section('pageHeader')
    Role create
@endsection
@section('content')
    <div class="col-12">
        <button style="margin: 10px;float:right;width:150px" type="button" class="btn btn-primary" data-toggle="modal"
            data-target="#staticBackdrop">
            Add Main Menu
        </button>
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
                            <input type="text" class="form-control name" id="name">
                            @error('name')
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="fontasome" class="col-form-label">Display Name:</label>
                            <input type="text" class="form-control display_name" id="display_name">
                            @error('display_name')
                            <div class="alert alert-danger">{{ $errors->first('display_name') }}</div>
                            @enderror
                        </div>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Add Main Menu 
        $('.add_main_menu').on('click', function(e) {
            e.preventDefault();

            var name = $('#name').val();
            var display_name = $('#display_name').val();
            var url = "{{ URL::to('/') }}" + '/role';
            var status = '1';
            var created_by = '1';
            var updated_by = '1';
            var created_at = '2020-10-24';
            var updated_at = '2020-10-24';
            var branch_id = '1';
            var organization_id = '1';
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    name: name,
                    display_name: display_name,
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
                    // if (response.success) {
                    //     alert(response.message);
                    //     // location.reload();
                    // }
                    // console.log(response);
                    // alert("sucessfully!");
                },
                error: function(response) {
                    // error message
                    console.log(response);
                    alert(response);
                }
            });
        });

    </script>
@endsection
