@extends('login.master')
@section('content')
    
   <div class="reset-password-request">
      <img src=" {{ asset('img/login/password.png') }} " alt="img">
      <b class="title"> Forgot your password? </b>
      <p class="text">
         Enter your email address and we will send 
         you instructions to reset your password.
      </p>
      <form method="POST" onsubmit="ajax_forgot_password()">
         @csrf
         <label for="email">Email address</label>
         <input name="email" type="text" id="email">
         <button type="submit">Continue</button>
      </form>
      <a href="{{route('login')}}">Back to My App</a>

      <div class="reset-password-email">
         <div class="icon">
            <span class="material-icons-outlined">mail</span>
         </div>
         <b class="title">Check your email</b>
         <p class="text">
            Please check the email address for 
            instructions to reset your password.
         </p>
         <button type="button">Resend email</button>
      </div>

   </div>

@endsection