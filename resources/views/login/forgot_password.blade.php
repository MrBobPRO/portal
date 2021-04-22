@extends('login.master')
@section('content')
   <section class="forgot-password-page">
      <div class="reset-password-request">
         <img src=" {{ asset('img/login/password.png') }} " alt="img">
         <b class="title"> Forgot your password? </b>
         <p class="text">
            Enter your email address and we will send 
            you instructions to reset your password.
         </p>
         <form method="POST" onsubmit="ajax_forgot_password()">
            @csrf
            <label id="email-label" for="email">Email address</label>
            <input name="email" onfocus="resetStyle()" type="text" id="email" placeholder="Enter your email">
            <button id="send-link-btn" type="submit">Continue
            {{-- Spinner --}}
               <div class="spinner">
                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  Loading...
               </div>
            </button>
         </form>
         <a href="{{route('login')}}">Back to My App</a>
         {{-- Success card --}}
         <div class="reset-password-email">
            <div class="icon">
               <span class="material-icons-outlined">mail</span>
            </div>
            <b class="title">Check your email</b>
            <p class="text">
               Please check the email address for 
               instructions to reset your password.
            </p>
            <button onclick="resendEmail()" id="resend-email" type="button">Resend email</button>
         </div>

      </div>
   </section>
@endsection