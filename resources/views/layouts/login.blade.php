<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    body{
        width: 100%;
        height: auto;
        background: -webkit-linear-gradient(0deg, #3c96ff 0%, #2dfbff 100%);
        font-family: "Robato",sans-serif;
        font-size: 17px;
    }

    #logreg-forms{
        width:412px;
        margin:10vh auto;
        background-color:#ffffff4d;
        box-shadow: 0 7px 7px rgba(0, 0, 0, 0.12), 0 12px 40px rgba(0,0,0,0.24);
        transition: all 0.3s cubic-bezier(.25,.8,.25,1);
    }
    #logreg-forms form {
        width: 100%;
        max-width: 410px;
        padding: 15px;
        margin: auto;
    }
    #logreg-forms .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
    }
    #logreg-forms .form-control:focus { z-index: 2; }
    #logreg-forms .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }
    #logreg-forms .form-signin input[type="password"] {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }

    #logreg-forms .social-login{
        width:390px;
        margin:0 auto;
        margin-bottom: 14px;
    }
    #logreg-forms .social-btn{
        font-weight: 100;
        color:white;
        width:190px;
        font-size: 0.9rem;
    }

    #logreg-forms a{
        /* display: block; */
        padding-top:10px;
        color:#fff;
    }

    #logreg-form .lines{
        width:200px;
        border:1px solid red;
    }


    #logreg-forms button[type="submit"]{ margin-top:10px; }

    #logreg-forms .facebook-btn{
        background-color: #3C589C;
        margin: 0 auto;
        line-height: 22px;
        }

    #logreg-forms .google-btn{ background-color: #DF4B3B; line-height: 26px;}

    #logreg-forms .form-reset, #logreg-forms .form-signup{ display: none; }

    #logreg-forms .form-signup .social-btn{ width:210px; }

    #logreg-forms .form-signup input { margin-bottom: 2px;}

    .form-signup .social-login{
        width:210px !important;
        margin: 0 auto;
    }

    .submit{
    background: -webkit-linear-gradient(0deg,  #2dfbff 0%, #3c96ff 100%);
    color: #fff;
    }

    /* Mobile */

    @media screen and (max-width:500px){
    #logreg-forms{
        width:300px;
    }

    #logreg-forms  .social-login{
        width:200px;
        margin:0 auto;
        margin-bottom: 10px;
    }
    #logreg-forms  .social-btn{
        font-size: 1.3rem;
        font-weight: 100;
        color:white;
        width:200px;
        height: 56px;

    }
    #logreg-forms .social-btn:nth-child(1){
        margin-bottom: 5px;
    }
    #logreg-forms .social-btn span{
        display: none;
    }
    #logreg-forms  .facebook-btn:after{
        content:'Facebook';
    }

    #logreg-forms  .google-btn:after{
        content:'Google+';
    }

    }
</style>
<div id="logreg-forms">

 {{-- form login --}}
 <form action="{{ route('login-account') }}" method="post" class="form-signin" >
    {{ csrf_field() }}

    <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign in</h1>
    <div class="social-login">
        <a href="{{ route('githublogin') }}" class="btn facebook-btn social-btn"><span><i class="fab fa-facebook-f"></i> Sign in with Github</span></a>
        <a href="{{ route('googlelogin') }}" class="btn facebook-btn social-btn"><span><i class="fab fa-facebook-f"></i> Sign in with Google</span></a>

    </div>
    <p style="text-align:center"> OR  </p>
    <div class="input-group from-group">
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" @error('email') border-red-500 @enderror"
      value="{{ old('email') }}">

    </div>
    <div>
        @error('email')
        <div class="text-red-500 mt-2 text=sm">{{ $message }}</div>
       @enderror
    </div>
    <div class="input-group from-group">
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" @error('password') border-red-500 @enderror"
      value="{{ old('password') }}">
    </div>
    <div>
        @error('password')
        <div class="text-red-500 mt-2 text=sm">{{ $message }}</div>
       @enderror

    </div>
    <div class="input-group">
      <button class="btn btn-md btn-rounded btn-block form-control submit" type="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
    </div>
    <a href="#" id="forgot_pswd">Forgot password?</a>
    <hr>
    <!-- <p>Don't have an account!</p>  -->
    <button class="btn btn-primary btn-block" type="button" id="btn-signup"><i class="fas fa-user-plus"></i> <a href="{{ route('home.register') }}"> Sign up New Account</a></button>
</form>
 {{-- form reset --}}
 <form action="#" class="form-reset">
    <input type="email" id="resetEmail" class="form-control" placeholder="Email address" name="email" required="" autofocus="">
    <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
        <a href="#" id="cancel_reset"><i class="fas fa-angle-left"></i> Back</a>
</form>
</div>
