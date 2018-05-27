@extends('layouts/frontend')

@section('css')
  @parent
  <!-- Custom styles for this template -->
  <link href="/css/home.css" rel="stylesheet">
  <link href="/css/search.css" rel="stylesheet">
@endsection

@section('models-active')
class="active"
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Модели
        <form class="form-inline pull-right" method="get">
          <div class="form-group">
            <label class="sr-only" for="inputSearch">Модель ...</label>
            <div class="input-group">
              <input name="q" type="text" class="form-control" id="inputSearch" placeholder="Модель ...">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Искать</button>
        </form>
        </h1>


        <ol class="breadcrumb">
            <li><a href="/">Главная</a>
            </li>
            <li class="active">Модели</li>
        </ol>
    </div>
  </div>

  @foreach ($models as $model)
  <div class="row featurette">
    <div class="col-md-6">
      <img class="featurette-image img-responsive center-block" src="/model_photo/{{$model->main_photo}}" alt="Generic placeholder image">
    </div>
    <div class="col-md-6">
      <h2 class="featurette-heading">{{$model->title}}</h2>
      <p class="lead">{{$model->description}}</p>
      <p><span class="price">{{$model->price}} $</span>&nbsp; &nbsp; <a class="btn btn-default" href="/model/{{$model->id}}" role="button">Подробности</a></p>
    </div>
  </div>   
  <hr>
  @endforeach

  {!! $models->render() !!}
</div>
@endsection
