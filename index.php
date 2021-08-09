<?php
session_start();
include("db/connection.php");
include("site/php/index.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início | A Silent Place</title>
    <link rel="stylesheet" href="site/css/mdb.min.css">
    <link rel="shortcut icon" type="image/png" href="owl.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700 display=swap">
    <link rel="stylesheet" href="site/css/index.css">
    <link rel="stylesheet" href="site/css/forms.css">
</head>
<body>
    <header>
        <nav class="navbar py-2 navbar-expand-lg navbar-light fixed-top" style="background-color: #faf0e6;">
        <!-- Main nav -->
        <div class="container">
            <a class="navbar-brand" href="index.php">A Silent Place<img src="site/images/owl.png" width="50" height="50" style="margin: 0px;"></a>
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php
                        if (!isset($_SESSION["authenticated"])):
                    ?>
                        <li class="nav-item">
                            <a class="nav-link signin" href="site/signin.php">Entrar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link signup" href="site/signup.php">Cadastrar</a>
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
                        <?php
                        if (isset($_SESSION["admin"])):
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" style="color: #15c286;" href="site/new-post.php">Novo artigo</a>
                            </li>
                        <?php
                            endif;
                        ?>
                        <li class="nav-item">
                            <a class="nav-link logout" style="color: #ec0f47;" href="site/php/signout.php">Sair</a>
                        </li>
                    <?php
                        endif;
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="site/movies.php">|Filmes</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            Mais
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="https://github.com/Nuhllos?tab=repositories" target="_blank">Github</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="site/post.php?post_id=1">Sobre o projeto</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="site/post.php?post_id=2">O site</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <form class="w-auto" action="site/php/post-search.php" method="POST">
                    <input type="search" name="key-word" class="form-control" placeholder="Procurar" aria-label="Search">
                </form>
            </div>
        </div>
        <!-- Main nav -->
        </nav>
        <img src="site/backgrounds/background.jpg" alt="Site background" class="img-fluid shadow-1-strong">
        <div class="p-4 text-center" style="background-color: #fff5ee">
            <h1 id="start" class="my-1 h3">Início</h1>
        </div>
        <?php
            if (isset($_SESSION["new_post"])):
        ?>
            <div class=" my-2 p-2 text-center success-add" style="background-color: #59c29d">
                <h4 id="start" class="my-1">Post criado com sucesso</h4>
            </div>
        <?php
            endif;
            unset($_SESSION["new_post"]);
        ?>
        <?php
            if (isset($_SESSION["edit_post"])):
        ?>
            <div class=" my-2 p-2 text-center success-add" style="background-color: #59c29d">
                <h4 id="start" class="my-1">Post editado com sucesso</h4>
            </div>
        <?php
            endif;
            unset($_SESSION["edit_post"]);
        ?>
        <?php if ($sql2 != "") {?>
            <div class=" my-2 p-2 text-center success-add" style="background-color: #59c29d">
                <h4 id="start" class="my-1 d-flex justify-content-center align-items-center text-start">Mostrando resultados para "<?php echo $keyWord?>"<a href="site/php/clean-post-search.php"><button type="button" class="btn btn-primary m-1 py-2 cleanBtn">Limpar</button></a></h4>
            </div>
        <?php }?>
    </header>
    <section>
        <!-- Main layout -->
        <main class="my-4" style="color: #fff5ee; text-indent: 0px;">
            <section id="posts" class="text-center mb-4">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <?php foreach ($query as $q) {?>
                            <div class="col-md-5 mb-4 mx-1">
                                <div class="bg-image ripple shadow-1-strong rounded-top" data-mdb-ripple-color="light">
                                    <img src="<?php echo $q['post_img'];?>" class="w-100"/>
                                    <a href="site/post.php?post_id=<?php echo $q['post_id'];?>">
                                        <div class="mask">
                                            <?php if ($q['comment_status'] == 1) {?>
                                                <div class="d-flex justify-content-end align-items-end h-100">
                                                    <h4 class="text-white mb-2 mx-2"><svg class="mx-1" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.75 2.5a.75.75 0 000 1.5h10.5a.75.75 0 000-1.5H1.75zm4 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm0 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zM2.5 7.75a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6z"/></svg>
                                                    <?php if ($q['post_comments'] > 0) {?>
                                                        <?php echo $q['post_comments'];?></h4>
                                                    <?php }?>
                                                </div>
                                            <?php }?>
                                        </div>
                                        <div class="hover-overlay">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                        </div>
                                    </a>
                                </div>
                                <h5 class="mt-3 mb-0 pt-1 border-top text-start"><?php echo $q['title'];?></h5>
                                <p class="mt-0 text-start faded-text"><?php echo $q['card_subtitle'];?></p>
                            </div>
                        <?php $postCounter = $postCounter + 1;}?>
                        <?php $postCounter = $postCounter / 6;
                            $postCounter = ceil($postCounter);?>
                    </div>
                </div>
            </section>
        </main>
        <!-- Main layout -->
    </section>
    <!-- Pagination -->
    <section id="pagination">
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-circle justify-content-center mb-4">
                <?php for ($a = 0; $a <= $postCounter; $a++) {?>
                    <li class="page-item px-1"><a class="page-link page-nav  <?php if ($page == $a + 1) {echo "pageNav";}?>" href="?page=<?php echo $a + 1;?>#start"><?php echo $a + 1;?></a></li>
                <?php if ($rowsCounter <= 6) {break;}}?>
            </ul>
        </nav>
    </section>
    <!-- Pagination -->
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
                                Páginas
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
                                <a href="index.php" class="text-reset">A Silent Place</a>
                            </p>
                            <p style="color: #fff5ee; text-indent: 0px;">
                                <a href="#!" class="text-reset">rafaelg.aires@gmail.com</a>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
                © 2021 Copyright:
                <a class="text-reset fw-bold" href="index.php">A Silent Place</a>
            </div>
        </div>
        <!-- Footer -->
    </footer>
    <script type="text/javascript" src="site/js/mdb.min.js"></script>
</body>
</html>