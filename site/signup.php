<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar | A Silent Place</title>
    <link rel="stylesheet" href="css/mdb.min.css">
    <link rel="shortcut icon" type="image/png" href="../owl.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700 display=swap">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/forms.css">
</head>
<body>
    <header>
        <nav class="navbar py-2 navbar-expand-lg navbar-light fixed-top" style="background-color: #faf0e6;">
        <!-- Main nav -->
        <div class="container">
        <a class="navbar-brand" href="../index.php">A Silent Place<img src="images/owl.png" width="50" height="50" style="margin: 0px;"></a>
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php
                        if (!isset($_SESSION["authenticated"])):
                    ?>
                        <li class="nav-item">
                            <a class="nav-link signin" href="signin.php">Entrar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link signup" href="signup.php">Cadastrar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="movies.php">|Filmes</a>
                        </li>
                    <?php
                        endif;
                    ?>
                    <?php
                        if (isset($_SESSION["authenticated"])):
                    ?>
                        <li class="nav-item">
                            <a class="nav-link user" style="color: #15c286;" href="#!"><?php echo $_SESSION["user"];?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link logout" style="color: #ec0f47;" href="php/signout.php">Sair</a>
                        </li>
                    <?php
                        endif;
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            Mais
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="https://github.com/Nuhllos?tab=repositories" target="_blank">Github</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="post.php?post_id=1">Sobre o projeto</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="post.php?post_id=2">O site</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <form class="w-auto" action="php/post-search.php" method="POST">
                    <input type="search" name="key-word" class="form-control" placeholder="Procurar" aria-label="Search">
                </form>
            </div>
        </div>
        <!-- Main nav -->
        </nav>
        <img src="backgrounds/background.jpg" alt="Site background" class="img-fluid shadow-1-strong">
        <div class="p-4 text-center" style="background-color: #fff5ee">
            <h1 id="start" class="my-1 h3">Cadastrar</h1>
        </div>
    </header>
    <section>
        <!-- Main layout -->
        <main class="my-4">
            <div class="container">
                <div class="row justify-content-center mt-4">
                    <div class="col-lg-4 col-md-8 col-sm-8">
                        <!-- Main card -->
                        <div class="mainCard">
                            <div class="card-title text-center border-bottom">
                                <h3 class="p-3">Cadastrar</h3>
                            </div>
                            <div class="card-body">
                                <?php
                                    if (isset($_SESSION["signup_status"])):
                                ?>
                                    <h3 class="mb-5 successMessage">Cadastro efetuado com sucesso.<a href="signin.php#start" class="sucessLink"> Continue para efetuar login</a></h3>
                                <?php
                                    endif;
                                    unset($_SESSION["signup_status"]);
                                ?>
                                <?php
                                    if (isset($_SESSION["signed_user"])):
                                ?>
                                    <h3 class="mb-5 errorMessage">O usu??rio escolhido j?? existe. Informe outro e tente novamente</h3>
                                <?php
                                    endif;
                                    unset($_SESSION["signed_user"]);
                                ?>
                                <?php
                                    if (isset($_SESSION["empty_field"])):
                                ?>
                                    <h3 class="mb-5 errorMessage">Preencha todos os campos</h3>
                                <?php
                                    endif;
                                    unset($_SESSION["empty_field"]);
                                ?>
                                <form action="php/signup.php" class="form" method="POST">
                                    <div class="mb-4">
                                        <label for="user" class="form-label">Usu??rio</label>
                                        <input type="text" name="user" id="user" class="form-control user" placeholder="Digite o usu??rio">
                                    </div>
                                    <div class="mb-4">
                                        <label for="date" class="form-label">Idade</label>
                                        <input type="date" name="date" id="date" class="form-control date" placeholder="Data de nascimento">
                                    </div>
                                    <div class="mb-4">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" id="email" class="form-control email" placeholder="Digite o seu email">
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Senha</label>
                                        <input type="password" name="password" id="password" class="form-control password" placeholder="Digite a sua senha">
                                    </div>
                                    <div class="mb-3">
                                        <a href="signin.php" class="sucessLink">J?? possui uma conta? Entre!</a>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary loginBtn">Cadastrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Main card -->
                    </div>
                </div>
            </div>
        </main>
        <!-- Main layout -->
    </section>
    <footer>
        <!-- Footer -->
        <div class="text-center text-lg-start bg-dark text-white text-muted">
            <section class="d-flex justify-content-center justify-content-lg-between p-3 border-bottom">
                <div class="me-4 d-none d-lg-block">
                    <span></span>
                </div>
            </section>
            <section class="">
                <div class="container text-center text-md-start mt-4">
                    <div class="row mt-0">
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <h6 class="text-uppercase fw-bold mb-4" style="text-indent: 0px;">A Silent Place</h6>
                            <p style="color: #fff5ee; text-indent: 0px;">
                                Para tudo que vem a mente
                            </p>
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <h6 class="text-uppercase fw-bold mb-4">
                                P??ginas
                            </h6>
                            <p style="color: #fff5ee; text-indent: 0px;">
                                <a href="https://github.com/Nuhllos?tab=repositories" class="text-reset" target="_blank">GitHub</a>
                            </p>
                            <p style="color: #fff5ee; text-indent: 0px;">
                                <a href="post.php?post_id=1" class="text-reset">Sobre o projeto</a>
                            </p>
                            <p style="color: #fff5ee; text-indent: 0px;">
                                <a href="post.php?post_id=2" class="text-reset">O site</a>
                            </p>
                        </div>
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <h6 class="text-uppercase fw-bold mb-4">
                                Contatos
                            </h6>
                            <p style="color: #fff5ee; text-indent: 0px;">
                                <a href="../index.php" class="text-reset">A Silent Place</a>
                            </p>
                            <p style="color: #fff5ee; text-indent: 0px;">
                                <a href="#!" class="text-reset">rafaelg.aires@gmail.com</a>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
                ?? 2021 Copyright:
                <a class="text-reset fw-bold" href="../index.php">A Silent Place</a>
            </div>
        </div>
        <!-- Footer -->
    </footer>
    <script type="text/javascript" src="js/mdb.min.js"></script>
</body>
</html>