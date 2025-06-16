@extends('layouts.FrontendLayout')
@section('signUp')
@section('title','Sign Up')
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
                <a href="./signup.html" class="activ">Create Account</a>
             </li>
           </ul>
        </div>
     </section>
     <!-- Breadcrumbs End Hear -->
 <!-- Sign In start Here -->
 <section id="signUp">
     <section id="signIn">
        <div class="container">
           <div class="row">
                 <div class="signInForm">
                    <h2 class="text-center">Create Account</h2>
                    <form method="POST" action="{{ request()->routeIs('register') ? route('register') : route('customer.register.req') }} ">
                     @csrf
                     <div class="formGroup">
                        <input type="text" id="name" name="name" class="@error('name') is-invalid @enderror"  name="name" value="{{ old('name') }}" placeholder="Username">
                     </div>   
                     @error('name')
                     <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                    
                       <div class="formGroup">
                          <input type="email" class="@error('email') is-invalid @enderror" id="email" name="email" placeholder="Email">
                       </div>                      
                      @error('email')
                       <div class="alert alert-danger">{{ $message }}</div>
                       @enderror 
                      
                    <div class="formGroup formGroupPassword">
                        <input class="password" name="password" type="password" placeholder="Password">
                        <button type="button" class="passwordToggler"><i class="bi bi-eye-slash"></i></button>
                    </div>
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="formGroup formGroupPassword">
                        <input class="password" name="password_confirmation" type="password" placeholder="Confirm Password">
                        <button type="button" class="passwordToggler"><i class="bi bi-eye-slash"></i></button>
                    </div>
                     <div class="formGroup">
                          <input type="text" class="@error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Phone">
                       </div>                      
                      @error('phone')
                       <div class="alert alert-danger">{{ $message }}</div>
                       @enderror 
                       <div class="formGroup d-flex justify-content-between align-items-center">
                          <div class="check-remember">
                            <input type="checkbox" id="rememberMe">
                            <label for="rememberMe">Accept all terms & Conditions</label>
                          </div>
                          <a class="forgot" href="#">Forgot Password?</a>
                       </div>
                       <div class="formGroup">
                        <button class="login" type="submit">Create Account</button>
                     </div>
                      <div class="formGroup">
                          <p class="text-center sign-text">Already have account<a href="{{ route('login') }}"> Login</a></p>
                        </div>
                    </form>
                 </div>
               </div>
             </div>
      </section>
 </section>
 <!-- Sign In End Here --> 
     
  <script>
    let passwordTogglers = document.querySelectorAll(".passwordToggler");
    function passwordShow(event) {
        let toggler = event.currentTarget;
        let passwordInput = toggler.closest(".formGroup").querySelector(".password");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggler.innerHTML = '<i class="bi bi-eye"></i>';
        } else {
            passwordInput.type = "password";
            toggler.innerHTML = '<i class="bi bi-eye-slash"></i>';
        }
    }
    passwordTogglers.forEach(toggler => {
        toggler.addEventListener("click", passwordShow);
    });
</script>
@endsection