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
            Добавить модель
        </h1>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
      <form method="post" action="/model" enctype="multipart/form-data">
        <div class="form-group">
          <label for="inputTitle">Название</label>
          <input name="title" type="text" class="form-control" id="inputTitle" placeholder="Название">
        </div>
        <div class="form-group">
          <label for="inputDescription">Описание</label>
          <textarea name="description" class="form-control" id="inputDescription" rows="10" placeholder="Описание..."></textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputAmount">Цена</label>
          <div class="input-group col-xs-4">
            <div class="input-group-addon">Р</div>
            <input name="price" type="text" class="form-control" id="exampleInputAmount" placeholder="Цена">
          </div>
        </div>        
        <div class="form-group">
          <label for="inputPhoto">Фото</label>
          <input name="photo" type="file" id="inputPhoto">
          <p class="help-block">Пожалуйста загрузите главное фото новой модели.</p>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">        
        <button type="submit" class="btn btn-default">Отправить</button>
      </form>
    </div>
</div>
<!-- /.row -->
@endsection
