@extends('layouts.master')

@section('title')
    User
@endsection
@section('pageHeader')
    Add User
@endsection
@section('content')
    <div class="container" style="margin-top: 30px;">
        <form>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" placeholder="Name">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">User Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" placeholder="User Email">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="description" placeholder="Password">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="description" placeholder="Confirm Password">
                </div>
            </div>
        </form>
    </div>
    <div>
        <div class="icheck-primary btn">
            <input type="checkbox" id="checkboxPrimarysell">
            <label for="checkboxPrimarysell">
                Select All
            </label>
        </div>
        <div class="icheck-primary btn">
            <input type="checkbox" id="checkboxPrimaryall">
            <label for="checkboxPrimaryall">
                Unselect All
            </label>
        </div>
    </div>
    <div style="margin: 10px;">
        <button class="btn btn-info">Create</button>
        <button class="btn btn-info">Read</button>
        <button class="btn btn-info">Update</button>
        <button class="btn btn-info">Delete</button>
    </div>
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div style="margin: 5px;">
                    <div class="icheck-primary btn">
                        <input type="checkbox" id="checkboxPrimary">
                        <label for="checkboxPrimary">
                            Select All
                        </label>
                    </div>
                    <div class="icheck-primary btn">
                        <input type="checkbox" id="checkboxPrimar">
                        <label for="checkboxPrimar">
                            Unselect All
                        </label>
                    </div>
                </div>

                <div class="row" style="margin:20px">

                    @foreach ($permissions as $permission)
                        <div class="col-4">
                            <div class="icheck-primary">
                                <input type="checkbox" id="checkboxPrimary{{ $loop->index + 1 }}">
                                <label for="checkboxPrimary{{ $loop->index + 1 }}">
                                    {{ $permission->name }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
                </table>
            </div>
            <div style="padding-bottom: 10px">
                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Save Now !">
                <input type="submit" name="submit" class="btn btn-secondary" value="Cancel !">
            </div>
        </div>
    </div>
    </div>
@endsection

@section('script')

@endsection
