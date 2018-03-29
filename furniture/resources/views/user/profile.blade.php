@extends('layouts/backend')

@section('profile-nav')
<li class="active">
    <a href="/profile"><i class="fa fa-fw fa-user"></i> Profile</a>
</li>
@endsection

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Profile
        </h1>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
      <form method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="inputUsername">Username</label>
          <input name="username" type="text" class="form-control" id="inputUsername" placeholder="Username" value="{{ $user->name }}">
        </div>
        <div class="form-group">
          <label for="inputEmail">Email address</label>
          <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
          <label for="nputPassword">Password</label>
          <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password">
        </div>
        <div class="form-group">
          <label for="inputTitle">Title</label>
          <input name="title" type="text" class="form-control" id="inputTitle" placeholder="Title" value="{{ $user->title }}">
        </div>
        <div class="form-group">
          <label for="inputPhone">Phone</label>
          <input name="phone" type="text" class="form-control" id="inputPhone" placeholder="000-0000-0000" value="{{ $user->phone_number }}">
        </div>
        <div class="form-group">
          <label for="inputAddr">Address</label>
          <input name="address" type="text" class="form-control" id="inputAddr" placeholder="Address" value="{{ $user->address }}">
        </div>
        <div class="form-group">
          <label for="inputDescription">Description</label>
          <textarea name="description" class="form-control" id="inputDescription" rows="10" placeholder="Descriptions..."> {{ $user->description }}</textarea>
        </div>
        <div class="form-group">
          <label for="inputPhoto">Photo</label>
          <input name="photo" type="file" id="inputPhoto">
          <p class="help-block">Please upload your profile photo</p>
          <img src="/photo/{{ $user->photo }}" class="img-thumbnail" alt="140x140" style="width: 140px; height: 140px;">
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">        
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
</div>
<!-- /.row -->
@endsection