<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  
  <style type="text/css">

    body {
  background: #f0efef;
  font-family: 'Open Sans', sans-serif;
}


.login {
 
  width: 500px;
  margin: 16px auto;
  font-size: 16px;
}

/* Reset top and bottom margins from certain elements */
.login-header,
.login p {
  margin-top: 0;
  margin-bottom: 0;
}

/* The triangle form is achieved by a CSS hack */
.login-triangle {
  width: 0;
  margin-right: auto;
  margin-left: auto;
  border: 12px solid transparent;
  border-bottom-color: #28d;
}

.login-header {
  background: #28d;
  padding: 10px;
  font-size: 1.4em;
  font-weight: normal;
  text-align: center;
  color: #fff;
}

 h4 {
    font-family:eras, "Century Gothic", verdana;
}

.login-container {
  background: #ebebeb;
  padding: 12px;
}

/* Every row inside .login-container is defined with p tags */
.login p {
  padding: 12px;
}

.login input {
  box-sizing: border-box;
  display: block;
  width: 100%;
  border-width: 1px;
  border-style: solid;
  padding: 10px;
  outline: 0;
  font-family: inherit;
  font-size: 0.95em;
}

.login input[type="email"],
.login input[type="password"] {
  background: #fff;
  border-color: #bbb;
  color: #555;
}

/* Text fields' focus effect */
.login input[type="email"]:focus,
.login input[type="password"]:focus {
  border-color: orange;
}

.login input[type="submit"] {
  background: #28d;
  border-color: transparent;
  border-radius: 4px;
  color: #fff;
  cursor: pointer;
}

.login input[type="submit"]:hover {
  background: #17c;
}

/* Buttons' focus effect */
.login input[type="submit"]:focus {
  border-color: #05a;
}

.help{
    color:red;
    margin-left: 14px;
}

  </style>
  
</head>

<body>
  <div class="login">
  <div class="login-triangle"></div>
  
  <h4 class="login-header">Laboratoire de Recherche Scientifique</h4>

  <form class="login-container" role="form" method="POST" action="{{ route('login') }}">
   {{ csrf_field() }}

    <p><input type="email" placeholder="Email" name="email" required></p>
    @if ($errors->has('email'))
       <span class="help">
         {{ $errors->first('email') }}
        </span>
    @endif
    <p><input type="password" placeholder="Password" name="password"required></p>
     @if ($errors->has('password'))
        <span class="help">
          {{ $errors->first('password') }}
        </span>
     @endif
    <p><input type="submit" value="Log in"></p>
  </form>
</div>
  

  
</body>
</html>
