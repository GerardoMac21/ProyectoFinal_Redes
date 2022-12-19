<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title>APP GERARDO</title>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>
<body>
<div class="sidenav">
         <div class="login-main-text">
            <h2>GERARDO<br> APP</h2>
            <p> LOGIN/REGISTER</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form>
                  <div class="form-group">
                     <label>Correo electrónico</label>
                     <input type="text" class="form-control" id="correo" placeholder="Correo electrónico">
                  </div>
                  <div class="form-group">
                     <label>Contraseña</label>
                     <input type="password" class="form-control" id="pass" placeholder="Contraseña">
                  </div>
                  <button type="submit" id="login" class="btn btn-black">Iniciar Sesión</button>
                  <button type="submit" id="reg" class="btn btn-secondary">Registrarse   </button>
               </form>
            </div>
         </div>
      </div>
      <script>
        $(document).ready(function(){
            $('#login').click(function(){
                let correo = $('#correo').val();
                let pass = $('#pass').val();
                $.post( "api.php",{ c: correo, p: pass, tipo: "login" }, function( data ) {
                   if(data == 0){
                     alert("Usuario y/o contraseña no validos");
                   }else{
                        window.location.href = "app.php";
                   }
                });
            });
            
            $('#reg').click(function(){
                let correo = $('#correo').val();
                let pass = $('#pass').val();
                $.post( "api.php",{ c: correo, p: pass, tipo: "reg" }, function( data ) {
                    if(data == 0){
                     alert("Usuario ya existe");
                   }else{
                        alert("Nuevo usuario registrado con exito");
                        window.location.href = "app.php";
                   }
                });
            });

        });
      </script>
</body>
</html>