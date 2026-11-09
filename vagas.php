<?php
    include "conexao.php";
    
    $codVaga = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    $vagasSQL = "SELECT * from tbl_vagas
                where status = 'ativa'
                and id = :id";

    $prepararConsulta = $cn->prepare($vagasSQL);
    $prepararConsulta->bindValue(':id', "$codVaga", PDO::PARAM_INT);
    $prepararConsulta->execute();

    $filtrarVaga = $prepararConsulta->fetch();

    if(!$filtrarVaga){
        header("location:index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Vaga - AgênciaJobs</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

    <!-- TOPNAV -->
    <header class="header">
        <div class="container">
            <nav class="navbar">
                <a href="index.php" class="logo">AgênciaJobs</a>
                <ul class="nav-menu">
                    <li><a href="index.php" class="nav-link">Início</a></li>
                    <li><a href="index.php#vagas" class="nav-link">Vagas</a></li>
                    <li><a href="login.php" class="btn-login">Entrar / Cadastrar</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- CONTEÚDO PRINCIPAL DA VAGA -->
    <main class="container details-container">
        
        <!-- Botão para retornar à listagem -->
        <a href="index.php" class="btn-back">&larr; Voltar para as vagas</a>

        <article class="job-detail-card">
            
            <!-- Cabeçalho do Card -->
            <header class="job-detail-header">
                <span class="badge">Vaga <?= htmlspecialchars($filtrarVaga['status']); ?> </span>
                <h1 class="job-detail-title">Desenvolvedor <?= htmlspecialchars($filtrarVaga['titulo']); ?> </h1>
                <p class="job-detail-company">Oculto</p>
            </header>

            <!-- Painel de Metadados (Grade com Informações Rápidas) -->
            <div class="job-meta-grid">
                <div class="job-meta-item">
                    <span class="meta-label">Localização</span>
                    <span class="meta-value"><?= htmlspecialchars($filtrarVaga['localizacao']); ?> </span>
                </div>
                <div class="job-meta-item">
                    <span class="meta-label">Salário</span>
                    <span class="meta-value">R$ <?= number_format($filtrarVaga['salario'], 2, ",", ".")?></span>
                </div>
                <div class="job-meta-item">
                    <span class="meta-label">Publicado em</span>
                    <span class="meta-value"><?= date('d/m/Y', strtotime($filtrarVaga['data_criacao']));?></span>
                </div>
            </div>

            <hr class="divider">

            <!-- Descrição Completa -->
            <section class="job-section">
                <h2>Descrição da Vaga</h2>
                <p>Procuramos programador focado em PHP e MySQL para trabalhar em nossa equipe interna. Você atuará na criação e manutenção de APIs e sistemas web corporativos de grande porte.</p>
            </section>

            <!-- Requisitos do Cargo -->
            <section class="job-section">
                <h2>Requisitos Necessários</h2>
                <p>Conhecimento em PHP moderno, manipulação de banco de dados SQL via PDO, conceitos de segurança (XSS/SQLi) e versionamento com Git.</p>
            </section>

            <!-- Caixa de Ação -->
            <div class="job-action-box">
                <!-- O ID da vaga é repassado via GET para o fluxo de candidatura/login -->
                <a href="candidatar.php?id=1" class="btn-apply-large">Candidatar-se a esta Vaga</a>
            </div>

        </article>
    </main>

    <!-- RODAPÉ -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2026 AgênciaJobs. Desenvolvido para fins didáticos nas aulas de Desenvolvimento de Sistemas.</p>
        </div>
    </footer>

</body>
</html>