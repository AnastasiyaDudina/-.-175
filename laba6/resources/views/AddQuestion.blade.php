@extends('layouts.app')

@section('content')
<style>
a {
    text-decoration: none; /* Убирает подчеркивание для ссылок */
   } 
   a:hover { 
    text-decoration: none; /* Добавляем подчеркивание при наведении курсора на ссылку */
    
   } 

/* Модальный (фон) */
.modal {
  display: none; /* Скрыто по умолчанию */
  position: fixed; /* Оставаться на месте */
  z-index: 1; /* Сидеть на вершине */
  padding-top: 100px; /* Расположение коробки */
  left: 0;
  top: 0;
  width: 100%; /* Полная ширина */
  height: 100%; /* Полная высота */
  overflow: auto; /* Включите прокрутку, если это необходимо */
  background-color: rgb(0,0,0); /* Цвет запасной вариант  */
  background-color: rgba(0,0,0,0.4); /*Черный с непрозрачностью */
}

/* Модальное содержание */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* Кнопка закрытия */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
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
                    <form method="POST" action="/AddQuestion/{{$Test_id}}">
                    {{csrf_field() }}
                         <h5 class="text" style="text-align: center;">Окно добавления вопросов к тесту</h5>
                     <br>
 
                
                        
                        <div class="form-group row mb-0" style="margin: 16px;">
                            <div class="" style="margin: auto;">
                                <q-btn type="submit" class="btn btn-primary" color="primary">
                                Добавить
                                </q-btn>
                            </div>
                        </div>
                        <br>
                        <div class="input_fields_wrap" style="margin-left:40px">
                          <div class="add_field_button" style="background-color: #4CAF50; border: none;color: white;padding: 8px 34px;text-align: center;text-decoration: none;width:300px;cursor: pointer;" name="wwwww" onClick="window.location.href='/home'">Сохранить</div>
                        </div>
                        <br>
                        
                    </form>
                    </q-card>
                    <div id="myBtn" style="background-color: #4CAF50; border: none;color: white;padding: 8px 34px;text-align: center;text-decoration: none;width:200px;cursor: pointer;" >Выйти</div>

<!-- Модальном окно -->
<div id="myModal" class="modal" style=' display: none;'>

  <!-- Модальное содержание -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <br><p>Открывается окно в котором пользователю предлагается сохранить тест.</p>
                        <div class="input_fields_wrap" style="margin-left:10px">
                          <div class="add_field_button" style="background-color: #4CAF50; border: none;color: white;padding: 8px 34px;text-align: center;text-decoration: none;width:200px;cursor: pointer;" name="wwwww" onClick="window.location.href='/home'">Сохранить</div>
                        </div>
                        <br>
  </div>

</div>

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
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
@endsection
