<?php
// inserindo arquivo de conexão
include "conexao.php";

// verifica se os dados foram enviados pelo método post
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];
    $tipo_perfil = $_POST['tipo_perfil'];

    $_verifica_email = "select id from tbl_usuarios where email = :email";
    $prepara_consulta_email = $cn->prepare($_verifica_email);
    $prepara_consulta_email->bindValue(':email', $email, PDO::PARAM_STR);
    $prepara_consulta_email->execute();

    if ($prepara_consulta_email->rowCount() > 0){
        echo "<script> 
                alert('O email informado já está cadastrado no sistema! Informe outro email!');
                window.location.href = 'login.php';
            </script>";
            exit;
    } else{
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $inserirUsuario = "insert into tbl_Usuarios(nome, email, senha, tipo_perfil) 
                            values (:nome, :email, :senha, :perfil)"; 
        try{
            $preparaInsert = $cn->prepare($inserirUsuario);
            $preparaInsert->bindValue(':nome', $nome, PDO::PARAM_STR);
            $preparaInsert->bindValue(':email', $email, PDO::PARAM_STR);
            $preparaInsert->bindValue(':senha', $senhaHash, PDO::PARAM_STR);
            $preparaInsert->bindValue(':perfil', $tipo_perfil, PDO::PARAM_STR);
            $preparaInsert->execute();

            echo "<script>
                    alert('Usuário cadastrado com sucesso! Clique ok para voltar para tela de login.');
                    window.location.href='login.php';
                </script>";
        } catch(PDOException $error){
            echo "ocorreu um erro aqui" . $error->getMessage();
        }
    }
} else {
    header('location:cadastro.php');
    exit;
}
?>