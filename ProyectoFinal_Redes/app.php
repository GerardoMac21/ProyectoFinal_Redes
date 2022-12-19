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
            <p id="show-correo"> <?= $_SESSION['correo']; ?></p>
            <a href="#" id="salir"> Salir </a>
         </div>
      </div>
      <div class="main">
         <div class="col-md-12 col-sm-12 mt-3 mr-3">
                <h4>Api de giphy (Imágen random)</h4>
                <div> 
                 <input type="text" class="form-control w-50" id="text_random" placeholder="Buscar imagen random...">
                 <button type="submit" id="img_random" class="btn btn-black w-50 mt-0">Buscar</button>
                 <div id="img" class="m-2"></div>
                </div>
         </div>
         <div class="col-md-12 col-sm-12">
             <h2>API de la nasa (Imágen del día)</h2>
             <input type="date" class="form-control w-50" id="date-nasa" max="<?= date("Y-m-d"); ?>" placeholder="Buscar imagen random...">
                 <button type="submit" id="search-date" class="btn btn-black w-50 mt-0">Buscar</button>
             <div id="img-nasa" class="m-2"></div>
         </div>
      </div>
      <script>
            $(document).ready(function(){
                $('#salir').click(function(){
                    $.post("api.php",{ c: "", p: "", tipo: "exit" }, function( data ) {
                        alert("Sesión terminada");
                        window.location.href = "index.php";
                    });
                });

                $('#img_random').click(function(){
                    let b = $('#text_random').val();
                    $.get("https://api.giphy.com/v1/gifs/random?api_key=2Lh6sFRXO2nuEnegkI5u3UN4zzhLxRdG&tag="+b+"&rating=g", function( data ) {
                       let img = data['data']['images']['480w_still']['url'];
                       console.log(img);
                       $('#img').html('<img src="'+img+'" width="300" height="300">');
                       let correo = $('#show-correo').text();
                       $.post( "consumoapi.php",{ n_api:1,value:b,img:img,correo:correo}, function( data ) {
                            console.log(data);
                        });
                    });

                    
                });
                $('#search-date').click(function(){
                    let dat =  $('#date-nasa').val();
                    $.get("https://api.nasa.gov/planetary/apod?api_key=cr9C9ek6B6mJzm61NBACqeDtLRf9yqGUSgtRtsJT&date="+dat, function( data ) {
                       let img = data['url'];
                       console.log(img);
                       $('#img-nasa').html('<img src="'+img+'" width="300" height="300">');
                       let correo = $('#show-correo').text();
                       $.post( "consumoapi.php",{ n_api:2,value:dat,img:img,correo:correo }, function( data ) {
                            console.log(data);
                        });
                    });
                });
               
            });
      </script>
</body>
</html>