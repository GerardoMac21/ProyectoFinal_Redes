
<?php 
    session_start();
    $n_api = $_POST['n_api'];
    $value = $_POST['value'];
    $correo = $_POST['correo'];
    $img = $_POST['img'];
    $name = "doc/api".$n_api.".json";
    $nameapi = $n_api = 1 ? "Api de giphy (Imágen random)" : "API de la nasa (Imágen del día)";
    $file = file_get_contents($name);
    $arrayjson = json_decode($file,true);
    array_push($arrayjson,array("name"=>$nameapi,"value"=>$value,"correo"=>$correo,"img"=>$img));
    $jn = json_encode($arrayjson);
    file_put_contents($name, $jn);
    echo "okk";
?>