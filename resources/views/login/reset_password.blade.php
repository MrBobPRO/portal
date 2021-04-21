@extends('login.master')
@section('content')
    
    <div class="reset-password">
      <b class="title">Change your password</b>
      <p class="text">
         Enter a new password below to change your password.
      </p>
      <form action="/reset_password" method="POST">
         @csrf
         <label class="new-password" for="password">
            <input type="hidden" name="token" value="{{$token}}">
            <input id="password" name="password" type="password" placeholder="New password">
            <span id="new-password-visibility" class="material-icons-outlined">visibility</span>
         </label>
         <label for="confirm-password">
            <input id="confirm-password" name="confirm-password" type="password" placeholder="Re-enter new password">
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