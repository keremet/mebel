@extends('layouts/backend')

@section('models-nav')
<li class="active">
    <a href="/model"><i class="fa fa-fw fa-file"></i> Модели</a>
</li>
@endsection

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Редактирование модели
        </h1>
    </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h2 class="panel-title">Основные свойства</h3>
  </div>
  <div class="panel-body">
    <div class="row">
        <div class="col-lg-12">
          <form method="post" action="/model/{{$model->id}}" enctype="multipart/form-data">
            <div class="form-group">
              <label for="inputTitle">Название</label>
              <input name="title" type="text" class="form-control" id="inputTitle" placeholder="Название" value="{{$model->title}}">
            </div>
            <div class="form-group">
              <label for="inputDescription">Описание</label>
              <textarea name="description" class="form-control" id="inputDescription" rows="10" placeholder="Описание...">{{$model->description}}</textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputAmount">Цена</label>
              <div class="input-group col-xs-4">
                <div class="input-group-addon">Р</div>
                <input name="price" type="text" class="form-control" id="exampleInputAmount" placeholder="Цена" value="{{$price}}">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputAmount">Главное фото<span id="mainPhotoChange"></span></label>
              <div class="input-group col-xs-4">
                <img src="/model_photo/{{$model->main_photo}}" class="img-thumbnail" alt="200x140" style="width: 200px; height: 140px;">
                <input type="hidden" name="main_photo" id="inputMainPhoto" value="{{$model->main_photo}}">
              </div>
            </div>
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-default">Отправить</button>
          </form>
        </div>
    </div>
  </div>
</div>
<p>
<div class="panel panel-default">
  <div class="panel-heading">
    <h2 class="panel-title">Фотографии</h3>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-lg-12">
        <form method="post" action="/model/photo/add/{{$model->id}}" enctype="multipart/form-data">
          <div class="form-group">
            <label for="inputPhoto">Добавить фото</label>
            <input name="photo" type="file" id="inputPhoto">
            <p class="help-block">Пожалуйста загрузите дополнительные фотографии модели.</p>
            <input type="hidden" name="redirectTo" value="/model/{{$model->id}}/edit">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-default">Загрузить</button>
          </div>
        </form>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th width="5%">Номер</th>
                    <th width="50%">Фото</th>
                    <th width="45%">Действия</th>
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
                      <button type="submit" class="btn btn-success btn-sm">Сделать главным фото</button>
                    </form>
                    <p>
                    @endif
                    <form method="post" action="/model/photo/delete/{{$photo->id}}">
                      <input type="hidden" name="redirectTo" value="/model/{{$model->id}}/edit">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                    </form>
                </td>
                </tr>
              @endforeach
            </tbody>
        </table>
      </div>
    </div>
    <!-- /.row -->
  </div>
</div>
<p>
<div class="panel panel-default">
  <div class="panel-heading">
    <h2 class="panel-title">Файлы</h3>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-lg-12">
        <form method="post" action="/model/file/add/{{$model->id}}" enctype="multipart/form-data">
          <div class="form-group">
            <label for="inputFile">Добавить файл</label>
            <input name="file" type="file" id="inputFile">
            <p class="help-block">Пожалуйста загрузите файл(не фото)</p>
            <input type="hidden" name="redirectTo" value="/model/{{$model->id}}/edit">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-default">Загрузить</button>
          </div>
        </form>
        {{ $file_error }}
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th width="5%">Номер</th>
                    <th width="70%">Файл</th>
                    <th width="25%">Действия</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($files as $file)
                <tr>
                    <td>{{ $file->id }}</td>
                    <td><a href="/model_file/{{ $file->hash }}">{{$file->filename}}</a></td>
                    <td>
                    <form method="post" action="/model/file/delete/{{$file->id}}">
                      <input type="hidden" name="redirectTo" value="/model/{{$model->id}}/edit">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                    </form>
                </td>
                </tr>
              @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.row -->
@endsection

@section('javascript')
@endsection
