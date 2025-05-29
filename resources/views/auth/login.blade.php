@extends('layouts.FrontendLayout')
@section('signIn')
@section('title','Sign In')
              <!-- Breadcrumbs Start Here -->
      <section id="Breadcrumbs">
        <div class="container">
           <ul>
              <li class="d-flex align-items-center">
                 <a href="index.html" class="homeIcom">
                    <iconify-icon icon="fluent:home-16-regular" width="20" height="22"></iconify-icon>
                 </a>
                 <iconify-icon icon="formkit:right" width="15" height="15" style="color: #999"></iconify-icon>
              </li>
              <li class="d-flex align-items-center">
                 <a href="#" class="activ">Account</a>
              </li>
              <li class="d-flex align-items-center">
                <iconify-icon icon="formkit:right" width="15" height="15" style="color: #999"></iconify-icon>
                <a href="./signin.html" class="activ">Login</a>
             </li>
           </ul>
        </div>
     </section>
      <!-- Breadcrumbs End Hear -->
      <!-- Sign In start Here -->
      <section id="signIn">
        <div class="container">
           <div class="row">
                 <div class="signInForm">
                    <h2 class="text-center">Sign In</h2>
                    <form method="POST" action="{{ route('login') }}">
                      @csrf
                       <div class="formGroup">
                          <input type="email" id="email" name="email" placeholder="Email">
                       </div>
                       @error('email')
                          <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                       <div class="formGroup formGroupPassword">
                          <input class="password" name="password" type="password" id="password" placeholder="Password">
                          <button type="button" class="passwordToggler"><i class="bi bi-eye-slash"></i></button>
                       </div>  
                       @error('password')
                          <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                       <div class="formGroup d-flex justify-content-between align-items-center">
                          <div class="check-remember">
                            <input type="checkbox" id="rememberMe">
                            <label for="rememberMe">Remember me</label>
                          </div>
                          <a class="forgot" href="#">Forgot Password?</a>
                       </div>

                       <div class="formGroup">
                        <button class="login" type="submit">  {{ __('Login') }}</button>
                     </div>

                      <div class="formGroup">
                          <p class="text-center sign-text">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
                        </div>
                    </form> 
                 </div>
               </div>
             </div>
      </section>
     <!-- Sign In End Here -->

   
<script>
     $(document).ready(function() {
      $('.venobox').venobox(); // Initialize VenoBox
    });
  </script>
  <script>
    // PASSWORD TOGGLER ICON
let passwordToggler = document.querySelector(".passwordToggler");
let passwordInput = document.querySelector(".formGroup .password");

function passwordShow(){
  if(passwordInput.type == "password"){
  passwordInput.type = "text";
  passwordToggler.innerHTML = '<i class="bi bi-eye"></i>'
  } else{
    passwordInput.type = "password";
     passwordToggler.innerHTML = '<i class="bi bi-eye-slash"></i>'
  }
}
passwordToggler.addEventListener("click", passwordShow);
  </script>
@endsection