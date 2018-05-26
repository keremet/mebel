@extends('layouts/frontend')

@section('css')
  @parent
    <!-- Custom styles for this template -->
  <link href="/css/home.css" rel="stylesheet">
@endsection

@section('home-active')
class="active"
@endsection

@section('content')
    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Подробная информация</h1>
              <p>Мы хотим, чтобы информация об изделиях была максимально подробной, чтобы оценить их качество и сравнить по характеристикам друг с другом</p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Не изобретайте велосипед</h1> 
              <p>Используйте готовые модели мебели</p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    

      <!-- START THE FEATURETTES -->
      <div class="container-fluid">
		<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Модели</h2>
				</div>
			</div>

      @foreach ($models as $index=>$model)
      @if ($index % 2 == 0)
      <div class="row featurette">
        <div class="col-md-6">
          <h2 class="featurette-heading">{{$model->title}}</h2>
          <p class="lead">{{$model->description}}</p>
          <p><span class="price">{{$model->price}} $</span></p>          
        </div>
        <div class="col-md-6">
          <a href="/model/{{$model->id}}"><img class="featurette-image img-responsive center-block" src="/model_photo/{{$model->main_photo}}" alt="Generic placeholder image"></a>
        </div>
      </div>
      @else
      <div class="row featurette">
        <div class="col-md-6 col-md-push-6">
          <h2 class="featurette-heading">{{$model->title}}</h2>
          <p class="lead">{{$model->description}}</p>
          <p><span class="price">{{$model->price}} $</span></p>
        </div>
        <div class="col-md-6 col-md-pull-6">
          <a href="/model/{{$model->id}}"><img class="featurette-image img-responsive center-block" src="/model_photo/{{$model->main_photo}}" alt="Generic placeholder image"></a>
        </div>
      </div>
      @endif
      @endforeach
      <!-- /END THE FEATURETTES -->
</div>
      <!-- Three columns of text below the carousel -->
      <div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Исполнители</h2>
				</div>
			</div>
      <div class="row executors">
      @foreach ($users as $user)
        <div class="col-lg-3">
          <a href="/executor/{{$user->id}}"><img class="img-circle" src="/photo/{{$user->photo}}" alt="Generic placeholder image" width="140" height="140"></a>
          <h2>{{$user->title}}</h2>
          <p>{{$user->email}}</p>
          <p>{{$user->phone_number}}</p>
        </div><!-- /.col-lg-4 -->
      @endforeach
      </div><!-- /.row -->
      <hr class="featurette-divider">

    </div><!-- /.container -->

@endsection
