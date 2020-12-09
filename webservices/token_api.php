<?php
include "conexao_api.php";

$json = array();

if(isset($_GET["email"])){

    $currentEmail = $_GET["email"];

    $requisition = "SELECT password FROM users WHERE email = '{$currentEmail}'";
    $query = mysqli_query($conexao, $requisition);

    if($query){
        if($hash = mysqli_fetch_array($query)){
            $json['hashPassword'][] = $hash;
        }
            mysqli_close($conexao);
            echo json_encode($json);
    }else{
            echo "Nenhum registro para ";
            echo json_encode($json);
    }
}else{
            echo "Erro (002)-> Falha de inserção. Necessario o parametro email";

}
?>