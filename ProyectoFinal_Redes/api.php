<?php 
session_start();
$correo = $_POST['c'];
$pass = $_POST['p'];
$tipo = $_POST['tipo'];
$_SESSION['correo'] = $correo;
if($tipo == "login"){
    $b = 0;
    $datos = file_get_contents("datos.json");
    $json_a = json_decode($datos,true);
    foreach($json_a as $a){
        if($a['correo'] == $correo && $a['password'] == $pass){
            $fecha = date("Y-m-d-h:i:sa");
            $dl = file_get_contents("login.json");
            $jl = json_decode($dl,true);
            array_push($jl,array("correo"=>$a['correo'],"date"=>$fecha));
            $jld = json_encode($jl);
            file_put_contents("login.json", $jld);
            $b = 1;
            break;
        }
    }
    echo $b;
}
if($tipo == "reg"){
    $b = 1;
    $datos = file_get_contents("datos.json");
    $json_a = json_decode($datos,true);
    foreach($json_a as $a){
        if($a['correo'] == $correo){
            $b = 0; //usuario ya existe
            break;
        }
    }
    if($b == 1){
      array_push($json_a,array("correo"=>$correo,"password"=>$pass));
      $json_d = json_encode($json_a);
      file_put_contents("datos.json", $json_d);
    }
    
    echo $b;
}
if($tipo == "exit"){
    session_destroy();
}

?>