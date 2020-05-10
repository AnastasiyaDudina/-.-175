@extends('layouts.app')

@section('content')
<div class="container flex-center">
    <div class="row justify-content-center">
        <div class="col-md-8 flex-center">
            <div class="card flex-center">
                

                <div class="card-body flex-center">
                <div class="q-pa-md row items-start q-gutter-md flex-center">
    <q-card class="my-card flex-center" style="width:520px">
    <br>
                    <form method="POST" action="{{ route('stat') }}">
                        @csrf
                        <h4 class="text" style="text-align: center;">Регистрация</h3>
      <br>
 
                        <br>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label " style="margin-left:40px">ФИО</label>

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
 
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label " style="margin-left:40px">E-Mail</label>

                            <div class="col-md-6">
                                <q-input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                               
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label " style="margin-left:40px">Пароль</label>

                            <div class="col-md-6">
                                <q-input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-sm-3 col-form-label " style="margin-left:40px">Подтвердите пароль</label>

                            <div class="col-md-6">
                                <q-input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row mb-0" style="margin: 16px;">
                            <div class="col-md-8 offset-md-4">
                                <q-btn type="submit" class="btn btn-primary" color="primary">
                                Зарегистрироваться
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
          selected1: '',
          selected2:'',
        }
      },
      methods: {
        launch: function (url) {
          Quasar.utils.openURL(url)
        }
      }
    })
  </script>
@endsection