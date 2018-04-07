@extends('layouts/backend')

@section('profile-nav')
<li class="active">
    <a href="/profile"><i class="fa fa-fw fa-user"></i> Профиль</a>
</li>
@endsection

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Профиль
        </h1>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
      <form method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="inputUsername">Логин</label>
          <input name="username" type="text" class="form-control" id="inputUsername" placeholder="Логин" value="{{ $user->name }}">
        </div>
        <div class="form-group">
          <label for="inputEmail">Email</label>
          <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
          <label for="nputPassword">Пароль</label>
          <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Пароль">
        </div>
        <div class="form-group">
          <label for="inputTitle">Название</label>
          <input name="title" type="text" class="form-control" id="inputTitle" placeholder="Название" value="{{ $user->title }}">
        </div>
        <div class="form-group">
          <label for="inputPhone">Телефон</label>
          <input name="phone" type="text" class="form-control" id="inputPhone" value="{{ $user->phone_number }}">
        </div>
        <div class="form-group">
          <label for="inputAddr">Адрес</label>
          <input name="address" type="text" class="form-control" id="inputAddr" placeholder="Адрес" value="{{ $user->address }}">
        </div>
        <div class="form-group">
          <label for="inputDescription">Описание</label>
          <textarea name="description" class="form-control" id="inputDescription" rows="10" placeholder="Описание..."> {{ $user->description }}</textarea>
        </div>
        <div class="form-group">
          <label for="inputPhoto">Фото</label>
          <input name="photo" type="file" id="inputPhoto">
          <p class="help-block">Пожалуйста, загрузите фото своего профиля</p>
          <img src="/photo/{{ $user->photo }}" class="img-thumbnail" alt="140x140" style="width: 140px; height: 140px;">
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">        
        <button type="submit" class="btn btn-default">Отправить</button>
      </form>
    </div>
</div>
<!-- /.row -->
@endsection
