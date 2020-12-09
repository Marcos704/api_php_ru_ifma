<?php
// Receba email e Retornar Email e senha para o usuario que digitou o email
include "conexao_api.php";

$json = array();
if(isset($_GET["email"])){
    $localEmail = $_GET["email"];
    //Fazendo a minha query em sql
    $requisicao = "SELECT password FROM users WHERE email = '{$localEmail}'";
    $query = mysqli_query($conexao, $requisicao);
    if($query){
        if($Registro = mysqli_fetch_array($query)){
            $json['email and password'][] =$Registro;
            echo json_encode($json);
        }else {
            mysqli_close($conexao);
            echo json_encode($json);
            # code...
        }

    }else {
        # code...
        echo "ERRO -1";
    }

}else {
    # code...
    echo "ERRO -2";
}

?>