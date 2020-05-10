@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
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
          drawerState: false
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