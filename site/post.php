<?php
session_start();
include("../db/connection.php");
include("php/post.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artigo | A Silent Place</title>
    <link rel="stylesheet" href="css/mdb.min.css">
    <link rel="shortcut icon" type="image/png" href="../owl.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700 display=swap">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/posts.css">
    <link rel="stylesheet" href="css/modal.css">
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
                                <a class="nav-link" style="color: #15c286;" href="new-post.php">Novo artigo</a>
                            </li>
                        <?php
                            endif;
                        ?>
                        <li class="nav-item">
                            <a class="nav-link logout" style="color: #ec0f47;" href="php/signout.php">Sair</a>
                        </li>
                    <?php
                        endif;
                    ?>
                    <li class="nav-item">
                            <a class="nav-link" href="movies.php">|Filmes</a>
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
        <?php foreach ($query as $q) {?>
            <div class="p-4 text-center" style="background-color: #fff5ee">
                <h1 id="title" class="my-1 h3"><?php echo $q['title'];?></h1>
            </div>
        </header>
        <section>
            <!-- Main layout -->
            <main class="my-4">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mb-4">
                            <!-- Post data -->
                            <section id="post" class="post border-bottom mb2">
                                <img src="<?php echo $q['post_img'];?>" alt="Feature image" class="img-fluid shadow-1-strong">
                                <p id="title-subtitle"><i><?php echo $q['title_subtitle'];?></i></p>
                                <div class="row mt-2 mb-4 align-items-center">
                                    <div class="col-md-6 text-center text-lg-start">
                                        <svg class="img-fluid" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2.5a5.5 5.5 0 00-3.096 10.047 9.005 9.005 0 00-5.9 8.18.75.75 0 001.5.045 7.5 7.5 0 0114.993 0 .75.75 0 101.499-.044 9.005 9.005 0 00-5.9-8.181A5.5 5.5 0 0012 2.5zM8 8a4 4 0 118 0 4 4 0 01-8 0z"/></svg>
                                        <span style="color: #fbfbfb">Publicado em <u id="post-date"><?php echo $q['post_date'];?></u> por </span><a id="op-name" href="#!" class="text-light"><span style="color: #59c29d"><?php echo $q['op_name'];?></span></a>
                                        <?php
                                        if (isset($_SESSION["admin"])):
                                        ?>
                                        <div class="d-flex align-items-center mt-1">
                                            <a href="edit-post.php?post_id=<?php echo $q['post_id'];?>"><svg class="img-fluid" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z"/></svg></a>
                                            <button type="button" class="btn btn-primary mx-2 px-2 py-2 commentBtnN" name="delete" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                                                <svg class="img-fluid" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M6.5 1.75a.25.25 0 01.25-.25h2.5a.25.25 0 01.25.25V3h-3V1.75zm4.5 0V3h2.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H5V1.75C5 .784 5.784 0 6.75 0h2.5C10.216 0 11 .784 11 1.75zM4.496 6.675a.75.75 0 10-1.492.15l.66 6.6A1.75 1.75 0 005.405 15h5.19c.9 0 1.652-.681 1.741-1.576l.66-6.6a.75.75 0 00-1.492-.149l-.66 6.6a.25.25 0 01-.249.225h-5.19a.25.25 0 01-.249-.225l-.66-6.6z"/></svg>
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Deseja realmente exluir o artigo?</h5>
                                                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                    <div class="modal-body">Você está prestes a excluir este artigo</div>
                                                        <div class="modal-footer">
                                                            <form action="php/delete-post.php" method="POST">
                                                                <input type="text" hidden name="post_id" value="<?php echo $q['post_id'];?>">
                                                                <button type="submit" class="btn btn-primary mx-2 px-2 py-2 modalBtnN" name="delete">
                                                                    Deletar
                                                                </button>
                                                            </form>
                                                            <button type="button" class="btn btn-primary mx-2 px-2 py-2 modalBtn" data-mdb-dismiss="modal">
                                                            Fechar
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal -->
                                        </div>
                                        <?php
                                            endif;
                                        ?>
                                    </div>
                                    <div class="col-md-6 mt-2 text-center text-lg-end">
                                        <a style="color: #3b5998;" href="<?php echo $q['op_facebook'];?>" role="button">
                                            <i class="fab fa-facebook-f fa-lg px-2 mr-1"></i>
                                        </a>
                                        <a style="color: #55acee;" href="<?php echo $q['op_twitter'];?>" role="button">
                                            <i class="fab fa-twitter fa-lg px-2 mr-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </section>
                            <!-- Post data -->
                            <!-- Post content -->
                            <section id="content" class="border-bottom mb-2 py-4">
                                <?php echo $q['content'];?>
                                <!-- 
                                    Ex: 
                                        <p>Conteúdo</p>
                                        <div class="row-md-4 mb-2">
                                            <img src="https://inboundmarketing.com.br/wp-content/uploads/2009/09/How-To-Start-A-Blog-And-Monetize-It.png" class="h-100 img-fluid"/>
                                        </div>
                                 -->
                            </section>
                            <!-- Post content -->
                            <!-- Social share -->
                            <section id="social">
                                <div class="share-btn-container">
                                    <a href="<?php echo $q['op_facebook'];?>" class="facebook-btn" target="_blank" style="color: #3b5998;">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                    <a href="<?php echo $q['op_twitter'];?>" class="twitter-btn" target="_blank" style="color: #55acee;">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="<?php echo $q['op_instagram'];?>" class="whatsapp-btn" target="_blank" style="color: #25D366;">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </div>
                            </section>
                            <!-- Social share -->
                            <!-- Comment button -->
                            <?php
                                error_reporting(0);
                                if ($_SESSION["user"]):
                            ?>
                                <section id="comment" class="mb-4 p-2 align-middle text-end">
                                    <a href="#comments">
                                        <button type="button" class="btn btn-primary m-1 py-2 commentBtn">
                                            <i class="fas fa-comments mr-2"></i> Comentar
                                        </button>
                                    </a>
                                </section>
                            <?php
                                endif;
                            ?>
                            <?php
                                error_reporting(0);
                                if (!$_SESSION["user"]):
                            ?>
                                <section id="comment" class="mb-4 p-2 align-middle text-end">
                                    <a href="signin.php">
                                        <button type="button" class="btn btn-primary m-1 py-2 commentBtnN">
                                            Entre para comentar
                                        </button>
                                    </a>
                                </section>
                            <?php
                                endif;
                            ?>
                            <!-- Comment button -->
                            <!-- Author box -->
                            <section id="author" class="border-bottom mb-2 pb-2">
                                <div class="row">
                                    <div class="col-md-2 text-center">
                                        <svg class="img-fluid" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2.5a5.5 5.5 0 00-3.096 10.047 9.005 9.005 0 00-5.9 8.18.75.75 0 001.5.045 7.5 7.5 0 0114.993 0 .75.75 0 101.499-.044 9.005 9.005 0 00-5.9-8.181A5.5 5.5 0 0012 2.5zM8 8a4 4 0 118 0 4 4 0 01-8 0z"/></svg>
                                    </div>
                                    <div class="col-md-8">
                                        <p id="op-name" class="m-0 authorArea"><span style="color: #59c29d"><?php echo $q['op_name'];?></span></p>
                                        <p class="m-0" class="authorArea" style="text-indent: 0px;">
                                            <a href="#!" class="text-light authorArea authorSocials">
                                                <i class="fab fa-facebook-f text-light"></i>
                                            </a>
                                            <a href="#!" class="text-light">
                                                <i class="fab fa-twitter text-light authorArea authorSocials"></i>
                                            </a>
                                            <a href="#!" class="text-light authorArea authorSocials">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </p>
                                        <p id="op-about" class="authorArea">
                                            <?php echo $q['op_about'];?>
                                        </p>
                                    </div>
                                </div>
                            </section>
                            <!-- Author box -->
                            <!-- Comments -->
                            <section id="comments" class="border-bottom mb-2 pb-2">
                                <?php
                                    $sql = "select * from posts where post_id = '$post_id'";
                                    $query = mysqli_query($connection, $sql);
                                    $post_comments = $q['post_comments'];
                                    $comment_status = $q['comment_status']
                                ?>
                                <?php if ($comment_status == 1) {?>
                                    <?php if ($q['post_comments'] > 0) {?>
                                        <p class="text-center">Comentários: <?php echo $post_comments;?></p>
                                    <?php }?>
                                <?php }?>
                                <?php
                                    $sql = "select * from comments where post_id = '$post_id'";
                                    $query = mysqli_query($connection, $sql);
                                ?>
                                <?php foreach ($query as $q) {?>
                                    <div class="row mb-1">
                                        <div class="col-2">
                                            <svg class="img-fluid" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2.5a5.5 5.5 0 00-3.096 10.047 9.005 9.005 0 00-5.9 8.18.75.75 0 001.5.045 7.5 7.5 0 0114.993 0 .75.75 0 101.499-.044 9.005 9.005 0 00-5.9-8.181A5.5 5.5 0 0012 2.5zM8 8a4 4 0 118 0 4 4 0 01-8 0z"/></svg>
                                        </div>
                                        <div class="col-10">
                                            <p class="messageArea">Por <span style="color: #59c29d"><?php echo $q['comment_op'];?></span> em <?php echo $q['comment_date'];?></p>
                                            <p class="messageArea"><?php echo $q['comment'];?></p>
                                        </div>
                                    </div>
                                <?php }?>
                            </section>
                            <!-- Comments -->
                            <!-- Reply -->
                            <?php
                                error_reporting(0);
                                if ($_SESSION["user"]):
                            ?>
                                <section class="reply">
                                    <?php if ($comment_status == 1) {?>
                                        <p class="text-center">Deixe um comentário</p>
                                        <form action="php/post-comment.php" method="POST">
                                            <input type="text" hidden name="post_id" value="<?php echo $q['post_id'];?>">
                                            <input type="number" hidden name="post_comments" value="<?php echo $post_comments;?>">
                                            <div class="mb-4">
                                                <input type="text" hidden name="comment_op" value="<?php echo $_SESSION["user"];?>">
                                                <p class="messageArea"><svg class="img-fluid" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2.5a5.5 5.5 0 00-3.096 10.047 9.005 9.005 0 00-5.9 8.18.75.75 0 001.5.045 7.5 7.5 0 0114.993 0 .75.75 0 101.499-.044 9.005 9.005 0 00-5.9-8.181A5.5 5.5 0 0012 2.5zM8 8a4 4 0 118 0 4 4 0 01-8 0z"/></svg><?php echo $_SESSION["user"];?></p>
                                            </div>
                                            <div class="mb-4">
                                                <label for="message" class="form-label"><p class="messageArea" style="color: #59c29d">Menssagem</p></label>
                                                <textarea type="text" name="comment" id="comment" class="form-control content" placeholder="Comentário" rows="4"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-block mb-4 commentBtn">Enviar</button>
                                        </form>
                                    <?php } else {?>
                                        <p class="text-center">Comentários desativados para este artigo</p>
                                    <?php }?>
                                </section>
                            <?php
                                endif;
                            ?>
                            <!-- Reply -->
                        </div>
                        <div class="col-lg-4 mb-4">
                            <!-- Aside posts -->
                            <section id="sidebar" class="sticky-top" style="top: 100px; z-index: 0;">
                                <?php while ($post_id > 0 && $counter < 2) {
                                    $post_id = $post_id - 1;
                                    $sql = "select * from posts where post_id = '$post_id'";
                                    $query = mysqli_query($connection, $sql);
                                ?>
                                    <?php foreach ($query as $q) {?>
                                        <div class="bg-image ripple mb-4" data-ripple-color="light">
                                            <img src="<?php echo $q['post_img'];?>" class="w-100">
                                            <a href="post.php?post_id=<?php echo $q['post_id']?>">
                                                <div class="mask" style="background-color: rgba(0, 0, 0, 0.5);">
                                                    <div class="d-flex justify-content-center align-items-center h-100">
                                                        <h4 class="text-white mb-0 mx-2 px-1" style="border-left: 3px solid white;"><?php echo $q['title']?></h4>
                                                        <?php if ($q['comment_status'] == 1) {?>
                                                            <div class="">
                                                                <h5 class="text-white mb-2 mx-2"><svg class="mx-1" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.75 2.5a.75.75 0 000 1.5h10.5a.75.75 0 000-1.5H1.75zm4 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm0 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zM2.5 7.75a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6z"/></svg>
                                                                <?php if ($q['post_comments'] > 0) {?>
                                                                    <span><?php echo $q['post_comments']?></span></h5>
                                                                <?php }?>
                                                            </div>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                                <div class="hover-overlay">
                                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2  )"></div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php $counter = $counter + 1;}?>
                                <?php }?>
                            </section>
                            <!-- Aside posts -->
                        </div>
                    </div>
                </div>
            </main>
            <!-- Main layout -->
        </section>
        <footer>
    <?php }?>
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
                © 2021 Copyright:
                <a class="text-reset fw-bold" href="../index.php">A Silent Place</a>
            </div>
        </div>
        <!-- Footer -->
    </footer>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script src="js/posts.js"></script>
</body>
</html>