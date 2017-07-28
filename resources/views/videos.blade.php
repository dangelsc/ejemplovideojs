
@extends('layouts.app')

@section('content')

<div class="container" ng-app="videoapp" ng-controller="videocontroller">
    <div class="panel"> 
    <video src="@{{'/video/'+select.id+'.'+select.formato}}" controls ></video>
    <div>
        <ul>
            <li ng-repeat="comen in listaco">@{{comen.comentario}}</li>
        </ul>
        <form >
            {{ csrf_field() }}
            <textarea  name="comentario" ng-model="comentario" id="" cols="30" rows="10"></textarea>
            <input type="button" ng-click="onclickcomentario()" value="enviar">
        </form>
    </div>
    </div>
    <ul>
        <li class="" style='cursor:pointer' ng-repeat="item in listavideo" ng-click="onclickSelect(item)">@{{item.formato}} - @{{item.visto}}</li>
    </ul>
    <div class="panel">   
        <form action="/subir" method="post" enctype="multipart/form-data" >
        {{ csrf_field() }}
            <input type="file" name="video">
            <input type="submit" value="enviar">
        </form>
    </div>
   
</div>
<script src="/js/angular.min.js"></script>
<script src="/js/angular-ui-route.js"></script>
<script src="/js/app.js"></script>

@endsection
