@extends('layouts.master')

@section('title')
    Product
@endsection
@section('pageHeader')
    Product
@endsection
@section('content')
<section class="content">
    <div class="row">
      <div class="col-md-7">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">General Informations</h3>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="inputName">Product Name</label>
              <input type="text" id="inputName" class="form-control">
            </div>
            <div class="form-group">
                <label for="inputName">Product SKU</label>
                <input type="text" id="inputName" class="form-control">
              </div>
     
          </div>
          <div class="card-header">
            <h3 class="card-title">Description</h3>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="inputName">Short Description</label>
              <input type="text" id="inputName" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputDescription">Full Description</label>
              <textarea id="inputDescription" class="form-control" rows="4"></textarea>
            </div>
          </div>
          <div class="card-header">
            <h3 class="card-title">Price</h3>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="inputName">Purchase Price</label>
              <input type="text" id="inputName" class="form-control">
            </div>
            <div class="form-group">
                <label for="inputName">Sale Price</label>
                <input type="text" id="inputName" class="form-control">
              </div> 
              <div class="form-group">
                <label for="inputName">Wholesale Price</label>
                <input type="text" id="inputName" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputName">Purchase Price</label>
                <input type="text" id="inputName" class="form-control">
              </div>
          </div>
          <div class="card-header">
            <h3 class="card-title">Production Date</h3>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="inputName">Production Date</label>
              <input type="text" id="inputName" class="form-control">
            </div>
            <div class="form-group">
                <label for="inputName">Expare Date</label>
                <input type="text" id="inputName" class="form-control">
              </div>
          </div>
          <!-- /.card-body -->
          <div class="card-header">
            <h3 class="card-title">Attributes</h3>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="inputName">Project Name</label>
              <input type="text" id="inputName" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputDescription">Project Description</label>
              <textarea id="inputDescription" class="form-control" rows="4"></textarea>
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <div class="col-md-5">
        <div class="card card-secondary">
          <div class="card-header">
            <h3 class="card-title">Categories</h3>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="inputEstimatedBudget">Estimated budget</label>
              <input type="number" id="inputEstimatedBudget" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputSpentBudget">Total amount spent</label>
              <input type="number" id="inputSpentBudget" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputEstimatedDuration">Estimated project duration</label>
              <input type="number" id="inputEstimatedDuration" class="form-control">
            </div>
          </div>

          <!-- /.card-body -->
          <div class="card-header">
            <h3 class="card-title">Band</h3>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="inputEstimatedBudget">Estimated budget</label>
              <input type="number" id="inputEstimatedBudget" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputSpentBudget">Total amount spent</label>
              <input type="number" id="inputSpentBudget" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputEstimatedDuration">Estimated project duration</label>
              <input type="number" id="inputEstimatedDuration" class="form-control">
            </div>
          </div>
          <div class="card-header">
            <h3 class="card-title">Photos</h3>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="inputEstimatedBudget">Estimated budget</label>
              <input type="number" id="inputEstimatedBudget" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputSpentBudget">Total amount spent</label>
              <input type="number" id="inputSpentBudget" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputEstimatedDuration">Estimated project duration</label>
              <input type="number" id="inputEstimatedDuration" class="form-control">
            </div>
          </div>
        </div>
        <!-- /.card -->
      
    </div>
    <div class="row">
      <div class="col-12">
        <a href="#" class="btn btn-secondary">Cancel</a>
        <input type="submit" value="Create new Porject" class="btn btn-success float-right">
      </div>
    </div>
  </section>
@endsection
@section('script')
@endsection