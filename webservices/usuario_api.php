<?php
    include "conexao_api.php";

    $json = array();

    if(isset($_GET["email"])){
        $localEmail = $_GET["email"];

        $consultaLocal = "SELECT *FROM users WHERE email = '{$localEmail}'";
        $queryLocal = mysqli_query($conexao, $consultaLocal);
        if($queryLocal){
            if($getData = mysqli_fetch_array($queryLocal)){
                $json ['usuarioLogado'][] = $getData;
            }
                mysqli_close($conexao);
                echo json_encode($json);
        }else{
            echo "Erro01</br>";
            $result["email"]     = 'Erro ao inserir' ;
            $result["password"]  = 'Erro ao inserir'; 
            $json ['usuario'][]    = $result;
            echo json_encode ($json);
        }
    }else{

            echo "Erro01</br>";
            $result["email"]     = 'Erro ao inserir' ;
            $result["password"]  = 'Erro ao inserir'; 
            $json ['usuario'][]    = $result;
            echo json_encode ($json);

    }

?>