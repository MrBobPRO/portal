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
         <label for="email-request">Email address</label>
         <input name="email-request" type="text">
         <button type="submit">Continue</button>
      </form>
      <a href="#">Back to My App</a>

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



    <div class="reset-password">
      <b class="title">Change your password</b>
      <p class="text">
         Enter a new password below to change your password.
      </p>
      <form action="#">
         @csrf
         <label class="new-password" for="new-password">
            <input id="new-password" name="new-password" type="password" placeholder="New password">
            <span id="new-password-visibility" class="material-icons-outlined">visibility</span>
         </label>
         <label for="confirm-new-password">
            <input id="confirm-new-password" name="confirm-new-password" type="password" placeholder="Re-enter new password">
            <span id="confirm-password-visibility" class="material-icons-outlined">visibility</span>
         </label>
         <button type="submit">Reset password</button>
      </form>

      <div class="reset-password-success">
         <div class="icon">
            <span class="material-icons-outlined">check_circle</span>
         </div>
         <b class="title">Password Changed</b>
         <p class="text">
            Your password has been changed successfully.
         </p>
         <a href="#">Back to My App</a>
      </div>

    </div>

@endsection