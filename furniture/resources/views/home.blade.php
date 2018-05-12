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
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Example headline.</h1>
              <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Another example headline.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>One more for good measure.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
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

    <div class="container marketing">
		<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Мы охуенны</h2>
					<p>Даже не представляете на сколько.</p>
				</div>
			</div>
      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-round" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2>Подробная информация</h2>
          <p>Мы хотим, чтобы информация об изделиях была максимально подробной</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-round" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2>Heading</h2>
          <p>Повышение производительности труда в мебельной отрасли</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-round" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->


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
