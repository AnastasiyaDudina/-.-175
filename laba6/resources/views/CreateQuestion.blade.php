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
                    <q-card class="my-card flex-center" style="width:100%">
                    <br>
                    
                    <form method="POST" action="/CreateNewQuestion/{{$Test_id}}">
                    {{csrf_field() }}
                         <h5 class="text" style="text-align: center;">Окно создания нового вопроса</h5>
                     <br>
                     <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label " style="margin-left:40px">Содержание вопроса</label>

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
                        <div class="input_fields_wrap" style="margin-left:40px">
                          <div class="add_field_button" style="background-color: #4CAF50; border: none;color: white;padding: 8px 34px;text-align: center;text-decoration: none;width:300px;cursor: pointer;" name="wwwww" v-on:click.once="sendq($event)">Добавить ответ</div>
                        </div>
                        <br>
                        
                        <div class="form-group row mb-0" style="margin: 16px;">
                            <div class="" style="margin: auto;">
                                <q-btn type="submit" class="btn btn-primary" color="primary">
                                Готово
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <script>
    new Vue({
      el: '#app',
      data: function () {
        return {
          drawerState: false
        }
      },
      methods: {
        launch: function (url) {
          Quasar.utils.openURL(url)
        },
        sendq: function(e) {
          
          var wrapper = $(".input_fields_wrap"); //Fields wrapper
          var add_button = $(".add_field_button"); //Add button ID
    
          $(add_button).click(function(e){ //on add input button click
           
            $(wrapper).append('<div id="divs"><input type="hidden" name="isDisvount[]" value="0"><input type="checkbox" name="isDisvount[]" value="1"><br><input style="width:700px" type="text" name="otvet[]" placeholder="При взаимодействии с нашим отделом этот сотрудник конструктивно решает вопросы"><a href="#" id="rm" class="remove_field">Удалить</a></div>'); //add input box
       
          });
          $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
          
            $(this).parent().remove();
          });
        },
      }
    })
  </script>
@endsection