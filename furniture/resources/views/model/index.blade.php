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
            Модели
        <a class="btn btn-primary pull-right" href="/model/create" role="button">Добавить модель</a>
        </h1>

    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="5%">Номер</th>
                        <th width="30%">Название</th>
                        <th width="10%">Фото</th>
                        <th width="10%">Производители</th>
                        <th width="10%">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($models as $model)
                    <tr>
                        <td>{{ $model->id }}</td>
                        <td>{{ $model->title }}</td>
                        <td>{{ count($model->photos) }}</td>
                        <td>{{ count($model->connections) }}</td>
                        <td>
                            <form method="post" action="/model/{{$model->id}}">
                                <a class="btn btn-info btn-sm" href="/model/{{$model->id}}/edit">Изменить</a> 
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="delete">
                                <button type="submit" class="btn btn-danger btn-sm">Удалить</a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.row -->
@endsection

