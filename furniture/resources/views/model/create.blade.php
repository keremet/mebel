@extends('layouts/backend')

@section('models-nav')
<li class="active">
    <a href="/model"><i class="fa fa-fw fa-file"></i> Models</a>
</li>
@endsection

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Add Model
        </h1>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
      <form method="post" action="/model" enctype="multipart/form-data">
        <div class="form-group">
          <label for="inputTitle">Title</label>
          <input name="title" type="text" class="form-control" id="inputTitle" placeholder="Title">
        </div>
        <div class="form-group">
          <label for="inputDescription">Description</label>
          <textarea name="description" class="form-control" id="inputDescription" rows="10" placeholder="Descriptions..."></textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputAmount">Price</label>
          <div class="input-group col-xs-4">
            <div class="input-group-addon">$</div>
            <input name="price" type="text" class="form-control" id="exampleInputAmount" placeholder="Price">
            <div class="input-group-addon">.00</div>
          </div>
        </div>        
        <div class="form-group">
          <label for="inputPhoto">Photo</label>
          <input name="photo" type="file" id="inputPhoto">
          <p class="help-block">Please upload the main picture of new model.</p>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">        
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
</div>
<!-- /.row -->
@endsection