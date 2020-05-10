<?php
  $colorDrawer = 'white';
  $colorToolbar = 'white';
  $colorText = 'black';
?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.25.0/slimselect.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.25.0/slimselect.min.css" rel="stylesheet"></link>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.proto.js"></script>
  

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  
</head>
<body>

  <div id="app">
    <q-layout view="lHh Lpr fff">
      <q-layout-header>
        <q-toolbar style="background: #37474f;">
          <q-btn flat round dense @click="drawerState = !drawerState" icon="menu"></q-btn>
          <q-toolbar-title>
          Cистема тестирования
          </q-toolbar-title>
          @if(Route::has('login'))
            
          <div>
          @if(Auth::check())
          <div style="position: absolute;margin-left: -300px;margin-top: 8px;text-align:  center;">
          <a href="/home" target="_self" style=" text-decoration: none;color:white">{{Auth::user()->name}}</a>
          <br>
          <a href="/logout" target="_self" style=" text-decoration: none;color:white">Выйти</a>
          </div>
          <div>
          <q-avatar >
          <img src="https://cdn.quasar.dev/img/avatar.png"style="width:50px; border-radius: 50%;">
          </q-avatar>
          </div>
          @else
          <div><a href="/reg" style=" text-decoration: none;color:white">Регистрация/</a>  </div>
          <div><a href="/login" style=" text-decoration: none;color:white">Авторизация</a>  </div>  
          @endif
          </div>
          @endif
        </q-toolbar>
      </q-layout-header>

      <q-layout-drawer v-model="drawerState" content-class="bg-{{$colorDrawer}}">
        <q-list>
          <q-list-header><img src="{{asset('images\mstile.png')}}" style="width: 46px;"></q-list-header>
          
          @if(Auth::check())
          
        
          <a href="/home" style=" text-decoration: none;color:black">
          <q-item >
            <q-item-side icon=""></q-item-side>
            <q-item-main label="Главная"></q-item-main>
          </q-item></a>

          

          <a href="/CreateTest" style=" text-decoration: none;color:black">
          <q-item>
            <q-item-side icon=""></q-item-side>
            <q-item-main label="Создать тест" sublabel=""></q-item-main></a>
          </q-item>

    
          
          @endif
        </q-list>
      </q-layout-drawer>

    <q-page-container style="margin:30px">
     <!--  <div class="flex row">
      <component1 class='col'>Main Layout</component1>
      <component2 class='col'>Main Layout</component2>
      <component3 class='col'>Main Layout</component3>
    </div>-->
        @yield('content')
      </q-page-container>
    </q-layout>

  </div>

  <!-- Scripts -->
  @yield('script')
</body>
</html>
