<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


    <title>Document</title>
</head>
<body>
    <style>
        body {
    margin: 0;
    padding: 0;
    font-family: 'Roboto', sans-serif;
    text-align: center;
    }
    input[type="email"], input[type="password"]{
    outline: none;
    padding: 20px;
    display: block;
    width: 300px;
    border-radius: 3px;
    border: 1px solid #eee;
    margin: 20px auto;
   }
   input[type="submit"] {
   padding: 10px;
   color: #fff;
   background: #0098cb;
   width: 320px;
   margin: 20px auto;
   margin-top: 0;
   border: 0;
   border-radius: 3px;
   cursor: pointer;
   
  }
  input[type="submit"]:hover {
  background-color: #00b8eb;
 }
  header {
  border-bottom: 2px solid #eee;
  padding: 20px 0;
  margin-bottom: 10px;
  width: 100%;
  text-align: center;
}
  header {
  border-bottom: 2px solid #eee;
  padding: 20px 0;
  margin-bottom: 10px;
  width: 100%;
  text-align: center;
}



    </style>

   <h3>SISTEMA DE EMISION DE CERTIFICADOS</h3>

  <!-- <?=validation_errors(); ?>-->
    
    
<form action="<?= base_url('login/validate')?>" method="POST" id="frm_login">
  <div class="form-group" id='email'>
    <label for="exampleInputEmail1">Usuario:</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese su email">
    <small id="emailHelp" class="form-text text-muted">Ingrese su email ejempo@mail.com</small>
    <div class="invalid-feedback">
    
    </div>
  </div>

  <div class="form-group" id="password">
    <label for="exampleInputPassword1">Constraseña:</label>
    <input type="password"  name="password" class="form-control" id="exampleInputPassword1" placeholder="Ingrese su Contraseña">
    <div class="invalid-feedback">
    
    </div>
  </div>
  <div class='form-group'>
  <button type="submit" class="btn btn-primary">Ingresar</button>
  </div>
  <div class='form-group' id="alert">
  </div>
</form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?=base_url('assets/js/auth/login.js')?>"></script>
    </body>
</html>