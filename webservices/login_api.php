<?php
    include "conexao_api.php";
    $json = array();

    if(isset($_GET["email"]) && isset($_GET["password"])){
        $Email = $_GET["email"];
        $PassWord = $_GET["password"];
        $consultaUser = "SELECT email, password FROM users WHERE email = '{$Email}' AND password = '{$PassWord}' ";
        
        $ResultadoBusca = mysqli_query($conexao, $consultaUser);
        if($ResultadoBusca){
            if($RegistroBusca = mysqli_fetch_array($ResultadoBusca)){
                $json['usuario'][] = $RegistroBusca;
                
            }
                mysqli_close($conexao);
                echo json_encode ($json);
                
        }else{
                echo "Erro01</br>";
                $result["email"]     = 'Erro ao inserir' ;
                $result["password"]  = 'Erro ao inserir'; 
                $json ['usuario'][]    = $result;
                echo json_encode ($json);
            
            }
                    
    }else{
                    echo "Erro02 </br>";
                    $result["email"]     = 'Erro ao inserir' ;
                    $result["password"]  = 'Erro ao inserir'; 
                    $json ['usuario'][]    = $result;
                    echo json_encode ($json);

    }
?>