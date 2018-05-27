@extends('layouts/frontend')

@section('css')
  @parent
  <!-- Custom styles for this template -->
  <link href="/css/home.css" rel="stylesheet">
  <link href="/css/executors.css" rel="stylesheet">
@endsection

@section('executors-active')
class="active"
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Производитель
        </h1>
        <ol class="breadcrumb">
            <li><a href="/">Главная</a>
            </li>
            <li><a href="/executors">Производители</a></li>
            <li class="active">{{$user->title}}</li>
        </ol>
    </div>
  </div>
  <div class="row executor">
      <div class="col-md-4">
        <a href="/executor/{{$user->id}}">
          <img class="img-responsive img-hover img-circle" src="/photo/{{$user->photo}}" alt="" width="140" height="140">
        </a>
      </div>
      <div class="col-md-8">
        <h3>{{$user->title}}</h3>
        <p>Email: {{$user->email}}</p>
        <p>Адрес: {{$user->address}}</p>
        <p>Телефон: {{$user->phone_number}}</p>
        <p>Описание:</p>
        <p>{{$user->description}}</p>
      </div>
  </div>
  <hr>

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
</div>
@endsection
