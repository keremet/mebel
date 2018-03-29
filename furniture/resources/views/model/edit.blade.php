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
            Edit Model
        </h1>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
      <form method="post" action="/model/{{$model->id}}" enctype="multipart/form-data">
        <div class="form-group">
          <label for="inputTitle">Title</label>
          <input name="title" type="text" class="form-control" id="inputTitle" placeholder="Title" value="{{$model->title}}">
        </div>
        <div class="form-group">
          <label for="inputDescription">Description</label>
          <textarea name="description" class="form-control" id="inputDescription" rows="10" placeholder="Descriptions...">{{$model->description}}</textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputAmount">Price</label>
          <div class="input-group col-xs-4">
            <div class="input-group-addon">$</div>
            <input name="price" type="text" class="form-control" id="exampleInputAmount" placeholder="Price" value="{{$price}}">
            <div class="input-group-addon">.00</div>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputAmount">MainPhoto<span id="mainPhotoChange"></span></label>
          <div class="input-group col-xs-4">
            <img src="/model_photo/{{$model->main_photo}}" class="img-thumbnail" alt="200x140" style="width: 200px; height: 140px;">
            <input type="hidden" name="main_photo" id="inputMainPhoto" value="{{$model->main_photo}}">
          </div>
        </div>
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
</div>
<p>
<div class="row">
    <div class="col-lg-12">
      <form method="post" action="/model/photo/add/{{$model->id}}" enctype="multipart/form-data">
        <div class="form-group">
          <label for="inputPhoto">Add Photo</label>
          <input name="photo" type="file" id="inputPhoto">
          <p class="help-block">Please upload a addtional picture of this model.</p>
          <input type="hidden" name="redirectTo" value="/model/{{$model->id}}/edit">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="btn btn-default">Upload</button>
        </div>
      </form>

      <table class="table table-bordered table-hover">
          <thead>
              <tr>
                  <th width="5%">Id</th>
                  <th width="50%">Photo</th>
                  <th width="45%">Action</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($photos as $photo)
              <tr>
                  <td>{{ $photo->id }}</td>
                  <td><img src="/model_photo/{{ $photo->photo }}" class="img-thumbnail" alt="200x140" style="width: 200px; height: 140px;"></td>
                  <td>
                  @if ($photo->photo != $model->main_photo)
                  <form method="post" action="/model/photo/main/{{$model->id}}">
                    <input type="hidden" name="redirectTo" value="/model/{{$model->id}}/edit">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="photo" value="{{$photo->photo}}">
                    <button type="submit" class="btn btn-success btn-sm">Set as Main Photo</button>
                  </form>
                  <p>
                  @endif
                  <form method="post" action="/model/photo/delete/{{$photo->id}}">
                    <input type="hidden" name="redirectTo" value="/model/{{$model->id}}/edit">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
              </td>
              </tr>
            @endforeach
          </tbody>
      </table>

        <div class="form-group">
          
        </div>
    </div>
</div>
<!-- /.row -->
@endsection

@section('javascript')
@endsection