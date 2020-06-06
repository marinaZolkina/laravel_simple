<!doctype html>
<html lang="{{ app()->getLocale() }}">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Laravel</title>
      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- Styles -->
      <style>
         html, body {
         color: #000;
         font-weight: 100;
         height: 100vh;
         margin: 0;
         }
         .full-height {
         height: 100vh;
         }
         .flex-center {
         align-items: center;
         display: flex;
         justify-content: center;
         }
         .position-ref {
         position: relative;
         }
         .top-right {
         position: absolute;
         right: 10px;
         top: 18px;
         }
         .content {
         text-align: center;
         }
         .title {
         font-size: 84px;
         }
         .links > a {
         color: #636b6f;
         padding: 0 25px;
         font-size: 12px;
         font-weight: 600;
         letter-spacing: .1rem;
         text-decoration: none;
         text-transform: uppercase;
         }
         .m-b-md {
         margin-bottom: 30px;
         }
      </style>
   </head>
   <body>
      <div class="flex-center position-ref full-height">
         @if (Route::has('login'))
         <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
            @endauth
         </div>
         @endif
         <div class="content">
            <h3>We will calculate the number of packages for your widgets </h3>
            <p>Please, input widgets</p>
            <form method="POST" action="{{ route('widget') }}" aria-label="{{ __('Widget') }}">
               @csrf
               <div class="form-group">
                  <input id="widgets" class="form-control" type="number"  name="widgets" value="{{ old('widgets') }}" placeholder="widgets" required autofocus>
                  @if ($errors->has('widgets'))
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('widgets') }}</strong>
                  </span>
                  @endif
               </div>
               <button type="submit" class="btn btn-primary">
               {{ __('Check it!') }}
               </button>
            </form>
         </div>
      </div>
   </body>
</html>