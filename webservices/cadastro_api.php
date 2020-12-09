<?php
    include "conexao_api.php";
    $json = array();

    if(isset($_GET["firstName"]) && isset($_GET["lastName"]) && isset($_GET["email"]) &&isset($_GET["password"]) && isset($_GET["role"])
             && isset($_GET["birthday"]) && isset($_GET["createdAt"]) && isset($_GET["updatedAt"]) ){
                $firtNameData = $_GET["firstName"];
                $lastNameData = $_GET["lastName"];
                $emailData    = $_GET["email"];
                $passwordData = $_GET["password"];
                $roleData     = $_GET["role"];
                $birthDayData = $_GET["birthday"];
                $createdAtData= $_GET["createdAt"];
                $updatedAtData= $_GET["updatedAt"];

                $Dados = "INSERT INTO users (firstName, 
                                                     lastName,
                                                     email,
                                                     password,
                                                     role,
                                                     birthday,
                                                     createdAt,
                                                     updatedAt)
                                            VALUES  ('{$firtNameData}',
                                                     '{$lastNameData}',
                                                     '{$emailData}',
                                                     '{$passwordData}',
                                                     '{$roleData}',
                                                     '{$birthDayData}',
                                                     '{$createdAtData}',
                                                     '{$updatedAtData}')";

                $resultDados = mysqli_query($conexao, $Dados);

                if($resultDados){
                    $consulta    = "SELECT *FROM users WHERE email = '{$emailData}' AND password = '{$passwordData}'";
                    $resultado   = mysqli_query($conexao, $consulta);
                    if($registro = mysqli_fetch_array($resultado)){
                        $json ['aluno'][] = $registro;
                    }

                    mysqli_close($conexao);
                    echo json_encode ($json);
                }else{
                    $result["id"]        = 0;
                    $result["firstName"] = 'Erro ao inserir01' ;
                    $result["lastName"]  = 'Erro ao inserir';
                    $result["email"]     = 'Erro ao inserir' ;
                    $result["password"]  = 'Erro ao inserir'; 
                    $result["role"]      = 'Erro ao inserir' ;
                    $result["birthday"]  = 'Erro ao inserir' ;
                    $result["createdAt"] = 'Erro ao inserir' ;
                    $result["updatedAt"] = 'Erro ao inserir' ;
                    $json ['aluno'][]    = $result;
                    echo json_encode($json);
                }
    }else{
                    $result["id"]        = 0;
                    $result["firstName"] = 'Erro ao inserir' ;
                    $result["lastName"]  = 'Erro ao inserir';
                    $result["email"]     = 'Erro ao inserir' ;
                    $result["password"]  = 'Erro ao inserir'; 
                    $result["role"]      = 'Erro ao inserir' ;
                    $result["birthday"]  = 'Erro ao inserir' ;
                    $result["createdAt"] = 'Erro ao inserir' ;
                    $result["updatedAt"] = 'Erro ao inserir' ;
                    $json ['aluno'][]    = $result;
                    echo json_encode($json);
    }

?>