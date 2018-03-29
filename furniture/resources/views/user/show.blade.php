@extends('layouts/frontend')

@section('css')
  @parent
  <!-- Custom styles for this template -->
  <link href="/css/executors.css" rel="stylesheet">
@endsection

@section('executors-active')
class="active"
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Executor
        </h1>
        <ol class="breadcrumb">
            <li><a href="/">Home</a>
            </li>
            <li><a href="/executors">Executors</a></li>
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
        <p>Address: {{$user->address}}</p>
        <p>Phone: {{$user->phone_number}}</p>
        <p>Description:</p>
        <p>{{$user->description}}</p>
      </div>
  </div>
  <hr>

  @foreach ($models as $model)
  <div class="row featurette">
    <div class="col-md-6">
      <a href="/model/{{$model->id}}"><img class="featurette-image img-responsive center-block" src="/model_photo/{{$model->main_photo}}" alt="Generic placeholder image"></a>
    </div>
    <div class="col-md-6">
      <h2 class="featurette-heading">{{$model->title}}</h2>
      <p class="lead">{{$model->description}}</p>
      <p><span class="price">{{$model->price}} $</span>&nbsp;&nbsp;<a class="btn btn-default" href="#" role="button">Order Now</a>&nbsp;&nbsp;<a class="btn btn-default" href="/model/{{$model->id}}" role="button">View Details</a></p>          
    </div>
  </div>   
  <hr>
  @endforeach
</div>
@endsection