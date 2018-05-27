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

  <div class="row">
  @foreach ($models as $model)
			<div class="col-md-4">
                <div class="card">
					<center><img height="300px" src="/model_photo/{{$model->main_photo}}"></center>
                    <div class="box ">							
                    <div class="card-block">
                        <a href="/model/{{$model->id}}">
							<h4 class="card-title">{{$model->title}}</h4>
                        </a>
                        
                        <div class="card-text crop">
                            {{$model->description}}
                        </div>
                    </div>
                    <div class="card-footer">
						<p class="pricemain">{{$model->price}} р.</p>
						<a href="/model/{{$model->id}}">
							<button class="btn btn-info btn-sm">Подробнее...</button>
						</a>

                        
                    </div>
                </div>
            </div>
            </div>
  @endforeach
  </div> 

  {!! $models->render() !!}
</div>
@endsection
