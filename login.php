<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AgênciaJobs</title>
    <link rel="stylesheet" href="css/estilos.css">
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

    <!-- CONTEÚDO PRINCIPAL: LOGIN -->
    <main class="container login-container">
        <div class="login-card">
            <h1 class="login-title">Acesse sua conta</h1>
            <p class="login-subtitle">Bem-vindo de volta! Insira seus dados para continuar.</p>

            <!-- Formulário de Login -->
            <form action="autenticar.php" method="POST" class="login-form">
                <div class="form-group">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" id="email" name="email" class="form-input" placeholder="seu@email.com" required>
                </div>

                <div class="form-group">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" id="senha" name="senha" class="form-input" placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn-submit-login">Entrar no Sistema</button>
            </form>

            <hr class="divider">

            <!-- Área para quem não tem cadastro -->
            <div class="register-box">
                <p>Ainda não possui cadastro?</p>
                <a href="cadastro.php" class="btn-register">Criar uma conta (Candidato ou Empresa)</a>
            </div>
        </div>
    </main>

    <!-- RODAPÉ -->
    <footer class="footer">
        <p>&copy; 2026 AgênciaJobs. Desenvolvido para fins didáticos nas aulas de Desenvolvimento de Sistemas.</p>
    </footer>

</body>
</html>