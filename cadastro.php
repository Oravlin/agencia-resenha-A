<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - AgênciaJobs</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/css_cadastro.css">
    <link rel="stylesheet" href="css/css_login.css">
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
                </ul>
            </nav>
        </div>
    </header>

    <!-- CONTEÚDO PRINCIPAL: CADASTRO -->
    <main class="container login-container">
        <div class="login-card">
            <h1 class="login-title">Crie sua conta</h1>
            <p class="login-subtitle">Junte-se a nós para anunciar vagas ou encontrar seu novo emprego.</p>

            <!-- Formulário de Cadastro -->
            <form action="processa_cadastro.php" method="POST" class="login-form">

                <div class="form-group">
                    <label for="nome" class="form-label">Nome Completo / Razão Social</label>
                    <input type="text" id="nome" name="nome" class="form-input" placeholder="Digite seu nome ou o da empresa" required>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" id="email" name="email" class="form-input" placeholder="seu@email.com" required>
                </div>

                <div class="form-group">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" id="senha" name="senha" class="form-input" placeholder="Crie uma senha forte" required>
                </div>

                <!-- Seleção de Perfil (Mapeia para o ENUM do Banco) -->
                <div class="form-group">
                    <label class="form-label">Qual é o seu perfil?</label>
                    <div class="radio-group">
                        <label>
                            <input type="radio" name="tipo_perfil" value="candidato" required> 
                            Sou Candidato
                        </label>
                        <label>
                            <input type="radio" name="tipo_perfil" value="empresa" required> 
                            Sou Empresa
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn-submit-login">Finalizar Cadastro</button>
            </form>

            <hr class="divider">

            <!-- Voltar para o Login -->
            <div class="register-box">
                <p>Já possui uma conta?</p>
                <a href="login.php" class="btn-register">Fazer Login</a>
            </div>
        </div>
    </main>

    <!-- RODAPÉ -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2026 AgênciaJobs. Desenvolvido para fins didáticos nas aulas de Desenvolvimento de Sistemas.</p>
        </div>
    </footer>

</body>
</html>