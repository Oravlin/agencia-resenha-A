<?php
// inserindo arquivo de conexão
include "conexao.php";

// verifica se os dados foram enviados pelo método post
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = trim($_POST['nome']);
    $email = trim($_POST('email'));
    $senha = $_POST['senha'];
    $tipo_perfil = $_POST['tipo_perfil'];

    $_verifica_email = "select id from tbl_usuarios where email = :email";
    $prepara_consulta_email = $cn->prepare($_verifica_email);
    $prepara_consulta_email->bindValue(':email', '$email', PDO::PARAM_STR);
    $prepara_consulta_email->execute();

    if ($prepara_consulta_email->rowCount() > 0){
        echo "<script> 
                alert('O email informado já está cadastrado no sistema! Informe outro email!');
                window.location.href = 'login.php';
            </script>";
    }
} else{
    header('location:casastro.php');
}
?>