@extends('layouts.app')

@section('content')
<style>
a {
    text-decoration: none; /* Убирает подчеркивание для ссылок */
   } 
   a:hover { 
    text-decoration: none; /* Добавляем подчеркивание при наведении курсора на ссылку */
    
   } 
</style>

<div class="container flex-center">
    <div class="row justify-content-center">
        <div class="col-md-8 flex-center">
            <div class="card flex-center">
                

                <div class="card-body flex-center">
                <div class="q-pa-md row items-start q-gutter-md flex-center">
                    <q-card class="my-card flex-center" style="width:600px">
                    <br>
                    <form method="POST" action="/CreateTest">
                    {{csrf_field() }}
                         <h5 class="text" style="text-align: center;">Создание нового проекта</h5>
                     <br>
 
                        <br>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label " style="margin-left:40px">Название</label>

                            <div class="col-md-6">
                                <q-input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        
                
                        
                        <div class="form-group row mb-0" style="margin: 16px;">
                            <div class="" style="margin: auto;">
                                <q-btn type="submit" class="btn btn-primary" color="primary">
                                Далее
                                </q-btn>
                            </div>
                        </div>
                    </form>
                    </q-card>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://unpkg.com/quasar-framework@0.15.6/dist/umd/quasar.mat.umd.min.js"></script>
<script>
    new Vue({
      el: '#app',
      data: function () {
        return {
          drawerState: false,
          selected: '',
          selected1: ''
        }
      },
      methods: {
        launch: function (url) {
          Quasar.utils.openURL(url)
        }
      }
    })
  </script>
  <script>
let slim1 = new SlimSelect({
  select: '#expert',
  closeOnSelect: false,
  allowDeselect: true
}) 
let slim2 = new SlimSelect({
  select: '#admin',
  closeOnSelect: false,
  allowDeselect: true
}) 
</script>
@endsection
