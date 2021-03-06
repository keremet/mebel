@extends('layouts/frontend')

@section('css')
  @parent
  <!-- Custom styles for this template -->
  <link href="/css/executors.css" rel="stylesheet">
  <link href="/css/model.css" rel="stylesheet">
  <link href="/css/home.css" rel="stylesheet">
@endsection

@section('models-active')
class="active"
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
        </h1>
        <ol class="breadcrumb">
            <li><a href="/">Главная</a>
            </li>
            <li><a href="/models">Модели</a></li>
            <li class="active">{{$model->title}}</li>
        </ol>
    </div>
  </div>
  <div class="row model">
    <div class="col-lg-5">
      <ul class="mainimage">
        <li>
          <img src="/model_photo/{{$model->main_photo}}" alt="" title="" style="display: block;">
        </li>
      </ul>
      <ul class="thumbnails">
        @foreach ($model->photos as $photo)
        <li class="producthtumb">
          <a class="thumbnail">
            <img src="/model_photo/{{$photo->photo}}" alt="" title="">
          </a>
        </li>
        @endforeach
      </ul>
    </div>  
    <div class="col-lg-7">
      <h2 class="featurette-heading">{{$model->title}}</h2>
      <br/>
      <div class="lead">{{$model->description}}</div>
      <p><div class="price">{{$model->price}} р.</div></p>
      @if (count($model->files) > 0)
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Files</h3>
        </div>
        <div class="panel-body">
          @foreach ($model->files as $file)
          <p><a href="/model_file/{{$file->hash}}">{{$file->filename}}</a></p>
          @endforeach
        </div>
      </div>
      @endif
      @if (isset($auth_user))
        @if ($model->isConnected($auth_user->id))
        <p>
        <form method="post" action="/model/execute/{{$model->id}}?can=false"> 
        <input type="hidden" name="_token" value="{{ csrf_token() }}">        
        <button id="not_execute" type="submit" class="btn btn-default"role="button">Не могу изготовить</button>
        </form>
        </p>
        @else
        <p><button id="can_execute" class="btn btn-default" href="/model/execute/{{$model->id}}?can=ture" role="button" data-toggle="modal" data-target="#executeModal">Могу изготовить</button></p>
        @endif        
      @endif
    </div>
  </div>

  <h1 class="heading1">Могут изготовить</h1>

  @foreach($users as $index=>$user)
  <div class="row executor">
      <div class="col-md-3">
        <a href="/executor/{{$user->id}}">
          <img class="img-responsive img-hover img-circle" src="/photo/{{$user->photo}}" alt="" width="140" height="140">
        </a>
      </div>
      <div class="col-md-6">
        <h3>{{$user->title}}
        @if ($index == 0)
        <span class="badge">Разместил</span>
        @endif
        </h3>
        <p>{{$user->description}}</p>
      </div>
      <div class="col-md-3">
        <p><span class="price">{{$user->price}} р.</span></p>      
        <a class="btn btn-primary" href="/executor/{{$user->id}}">Профиль производителя</a>
      </div>      
  </div>
  <hr>
  @endforeach

</div>

<div class="modal fade" id="executeModal" tabindex="-1" role="dialog" aria-labelledby="executeModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="executeModalLabel">Могут изготовить</h4>
      </div>
        <form method="post" action="/model/execute/{{$model->id}}?can=true">
        <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="control-label">Цена:</label>
              <input name="price" type="text" class="form-control" id="recipient-name">
            </div>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
          <button type="submit" class="btn btn-primary">Отправить</button>
        </div>
        </form>
    </div>
  </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
  jQuery('document').ready(function(){
    jQuery('.producthtumb img').click(function(e){
      jQuery('.mainimage img').attr('src', jQuery(this).attr('src'));
    });
  });
</script>
@endsection
