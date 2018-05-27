@extends('layouts/frontend')

@section('css')
  @parent
  <!-- Custom styles for this template -->
  <link href="/css/home.css" rel="stylesheet">
@endsection

@section('executors-active')
class="active"
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Производители
        </h1>
        <ol class="breadcrumb">
            <li><a href="/">Главная</a>
            </li>
            <li class="active">Производители</li>
        </ol>
    </div>
  </div>

  @foreach($users as $user)
  <div class="row executor">
      <div class="col-md-4">
        <a href="/executor/{{$user->id}}">
          <img class="img-responsive img-hover img-circle" src="/photo/{{$user->photo}}" alt="" width="140" height="140">
        </a>
      </div>
      <div class="col-md-8">
        <h3>{{$user->title}}</h3>
        <p>{{$user->description}}</p>
        <a class="btn btn-primary" href="/executor/{{$user->id}}">Перейти в профиль</a>
      </div>
  </div>
  <hr>
  @endforeach
  {!! $users->render() !!}
</div>
@endsection
