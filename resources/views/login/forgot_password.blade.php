@extends('login.master')
@section('content')
    
   <div class="reset-password-request">
      <img src=" {{ asset('img/login/password.png') }} " alt="img">
      <b class="title"> Forgot your password? </b>
      <p class="text">
         Enter your email address and we will send 
         you instructions to reset your password.
      </p>
      <form action="#">
         @csrf
         <input type="text">
         <button type="submit">Continue</button>
      </form>
      <a href="#">Back to app</a>
   </div>

   <div class="reset-password-email">
      <span class="material-icons-outlined">mail</span>
      <b>Check your email</b>
      <p>
         Please check the email address for 
         instructions to reset your password.
      </p>
      <form action="#">
         @csrf
         <button class="visually-hidden" type="submit">Resend email</button>
      </form>
   </div>

    <div class="reset-password">
      <b>Change your password</b>
      <p>
         Enter a new password below to change your password.
      </p>
      <form action="#">
         @csrf
         <input type="password">
         <input type="password">
      </form>
    </div>

@endsection