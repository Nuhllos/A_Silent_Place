-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: sql10.freesqldatabase.com
-- Generation Time: Aug 09, 2021 at 12:36 PM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql10429564`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_op` varchar(100) NOT NULL,
  `comment` longtext NOT NULL,
  `comment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id_reset` int(11) NOT NULL,
  `email_reset` text NOT NULL,
  `selector_reset` text NOT NULL,
  `token_reset` longtext NOT NULL,
  `expires_reset` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`id_reset`, `email_reset`, `selector_reset`, `token_reset`, `expires_reset`) VALUES
(12, 'rafaelg.aires@gmail.com', 'a50fb7c2f52d1522', '$2y$10$hX22U.ovgFNbOPsHvIPqd.Yd1F3F1lQJ/XO3uefMAVKteFg64ztIS', '1628450138');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `op_name` varchar(100) NOT NULL,
  `op_about` longtext NOT NULL,
  `op_facebook` varchar(100) NOT NULL,
  `op_twitter` varchar(100) NOT NULL,
  `op_instagram` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `post_img` varchar(100) NOT NULL,
  `title_subtitle` varchar(150) NOT NULL,
  `card_subtitle` varchar(100) NOT NULL,
  `post_comments` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `comment_status` int(11) NOT NULL,
  `post_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `op_name`, `op_about`, `op_facebook`, `op_twitter`, `op_instagram`, `title`, `post_img`, `title_subtitle`, `card_subtitle`, `post_comments`, `content`, `comment_status`, `post_date`) VALUES
(1, 'Rafael G. Aires', 'Leitor, escritor, poeta, desenvolvedor, amador da mÃºsica, criador de <i>A Silent Place</i>. (Nenhuma rede social)', '#!', '#!', '#!', 'Sobre o projeto', 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fG', 'ComentÃ¡rios e introduÃ§Ãµes ao projeto <i>A Silent Place</i>', 'IntroduÃ§Ã£o ao projeto <i>A Silent Place</i>', 0, '<div><p><i>A Silent Place</i> Ã© um projeto levantado com o objetivo de testar e aprimorar as habilidades do seu desenvolvedor, todas as ferramentas ultilizadas nesta campanha sÃ£o gratuitas e de fÃ¡cil acesso. O cÃ³digo fonte, assim como os detalhes e especificaÃ§Ãµes deste projeto podem ser encontrado em <a href=\"https://github.com/Nuhllos?tab=repositories\" class=\"post-link\" target=\"_blank\">github.com</a></p><p>AlÃ©m dos trÃªs pilares do desenvolvimento web (HTML, CSS, JS), foram tambÃ©m ultilizadas as tecnologias PHP, SQL, Bootstrap 5 e diferentes outras APIs para a formaÃ§Ã£o final do site.</p></div>\r\n<div>\r\n<p>\r\nTodos as imagens neste site sÃ£o gratuitas, disponÃ­veis por <a href=\"https://unsplash.com/\" class=\"post-link\" target=\"_blank\">unsplash.com</a> (com exceÃ§Ã£o de artigos voltados Ã  crÃ­ticas, anÃ¡lises ou comentÃ¡rios).\r\n</p>\r\n<p>\r\nA aplicaÃ§Ã£o de filmes Ã© disponibilizada e alimentada pelo The Movie Database (TMDB)\r\n</p>\r\n</div>', 1, '2021-08-06'),
(2, 'Rafael G. Aires', 'Leitor, escritor, poeta, desenvolvedor, amador da mÃºsica, criador de <i>A Silent Place</i>. (Nenhuma rede social)', '#!', '#!', '#!', 'O site', 'https://images.unsplash.com/photo-1414124488080-0188dcbb8834?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fG', 'ComentÃ¡rios e introduÃ§Ã£o a <i>A Silent Place</i>', 'IntroduÃ§Ã£o ao site <i>A Silent Place</i>', 0, '<div><p><i>A Silent Place</i> Ã© um blog pessoal destinado a publicaÃ§Ã£o e compartilhaÃ§Ã£o das ideias e pensamentos do seu autor.</p></div>\r\n<div><p>Planejamento, execuÃ§Ã£o e manutenÃ§Ã£o por Rafael G. Aires</p></div>', 0, '2021-08-06'),
(3, 'Rafael G. Aires', 'Leitor, escritor, poeta, desenvolvedor, amador da mÃºsica, criador de <i>A Silent Place</i>. (Nenhuma rede social)', '#!', '#!', '#!', 'Poemas: The Benetnasch Lake (inglÃªs)', 'https://images.unsplash.com/photo-1499578124509-1611b77778c8?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fG', 'Um poema sobre o lago Benetnasch', 'Um poema sobre o lago Benetnasch', 0, '<div>\r\n<p style=\"text-indent: 0px;\">\r\nUnder the Benetnasch star,<br>\r\nWhere the lake\'s cool breeze caress our faces,<br>\r\nAnd the bright, bloated moon seems to reflect us so far;<br>\r\nDo you remember, how the waters seemed to call our names?<be>\r\n</p>\r\n<p style=\"text-indent: 0px;\">\r\nI\'m here now, on these field of grasses,<br>\r\nReminiscences of the past â€” dancing like flames.<br>\r\nWhere all our dreams seem to converge in this place,<br>\r\nI\'ll wait for you here, on the Benetnasch lake.<br>\r\n</p></div>', 1, '2021-08-06'),
(4, 'Rafael G. Aires', 'Leitor, escritor, poeta, desenvolvedor, amador da mÃºsica, criador de <i>A Silent Place</i>. (Nenhuma rede social)', '#!', '#!', '#!', 'ComentÃ¡rios de filmes: Animais Noturnos (2016) <span class=\'review green\'>8.2</span>', 'https://wallpapercave.com/wp/wp6703705.jpg', 'Brutal, violento, dramÃ¡tico e sensivel, Ã© assim que <i>Animais Noturnos </i> se apresenta ao publico', 'Uma histÃ³ria de vinganÃ§a sob as lentes do inimigo', 0, '<div class=\"m-table mb-3 text-center\" style=\"color: #fff5ee\">\r\n<span class=\"px-2\">Animais Noturnos</span><span class=\"px-2 table-faded-text\" style=\"color: #cccccc\">Dirigido por: Tom Ford</span><span class=\"px-2 table-faded-text\" style=\"color: #cccccc\">Drama, Romance, Suspence</span><span class=\"px-2 table-faded-text\" style=\"color: #cccccc\">18+</span><span class=\"px-2 table-faded-text\" style=\"color: #cccccc\">1h 56m</span>\r\n</div>\r\n<div>\r\n<p>\r\n<i>Animais Noturnos</i>, um poderoso psicodrama estrelado por Amy Adams, Jake Gyllenhaalm, Michael Shannon e Aaron Taylor-Johnson, Ã© a segunda produÃ§Ã£o dirigida pelo estilista-feito-diretor Tom Ford (tambÃ©m conhecido pela revitalizaÃ§Ã£o da Gucci). A histÃ³ria Ã© contada sob o ponto de vista de Susan Morrow (Amy Adams) â€” uma bem sucedida embora miserÃ¡vel artista â€” enquanto ela lÃª e interpreta um manuscrito dedicado a ela pelo seu ex-marido Edward Sheffield (Jake Gyllenhaal) ao mesmo tempo em que, inevitavelmente, se recorda do seu passado com ele.\r\n</p>\r\n</div> \r\n<div class=\"row-md-4 mb-2 text-center\">\r\n<img src=\"https://wallpapers.moviemania.io/desktop/movie/340666/8f6bfa/nocturnal-animals-desktop-wallpaper.jpg?w=2552&h=1442\" class=\"h-100 img-fluid\"/>\r\n<p id=\"title-subtitle\" class=\'text-start\'>\r\n<i class=\'faded-text\'>Susan vende a Ãºnica coisa que nÃ£o possui: liberdade</i>\r\n</p>\r\n</div>\r\n<div>\r\n<p>\r\nAs cenas iniciais do filme; chocantes, porÃ©m nÃ£o gratuitas; seguem a nossa protagonista enquanto ela apresenta (em total indiferenÃ§a) sua galeria de arte local, e Ã© jÃ¡ logo nesse inÃ­cio que Ã© possivel perceber o contraste que existe entre o que ela sente e o que ela deixa percerber aos outros; essa diferenÃ§a e esse conflito pessoal farÃ£o parte do tom que define o restante do longa. Outro personagem Ã©, se nÃ£o mais, igualmente importante: Edward, seu ex-marido, um escritor fracassado que tem em Susan um objeto de triste obsessÃ£o, catalisadora de toda uma trama escura e amedrontadora, que Ã© ao mesmo tempo, cheio de vida e emoÃ§Ã£o.\r\n</p>\r\n<p>\r\nO que se segue Ã© uma pelÃ­cula visualmente elegante e uma direÃ§Ã£o extraordinariamente bem conduzida. NÃ£o existe um aspecto, um sÃ­mbolo, som ou sugestÃ£o â€” e principalmente sugestÃ£o â€” em <i>Animais Noturnos</i> que nÃ£o tenha sido posta lÃ¡ de propÃ³sito, Tom Ford consegue atravÃ©s desses mecanismos elaborar uma narrativa que se soma e se complementa de maneira limpa e orgÃ¢nica. Grande parte desse sucesso deve tambÃ©m ser atribuÃ­do ao grande compositor Abel Korzeniowski, que jÃ¡ tinha trabalhado antes com o diretor em <i>Direito de Amar</i> (2009); a trilha sonora original de Korzeniowski melhora e suaviza cenas de transiÃ§Ã£o enquanto intensifica e torna mais fortes as cenas de aÃ§Ã£o e apreensÃ£o.\r\n</p>\r\n</div>\r\n<div class=\"row-md-4 mb-2 text-center\">\r\n<img src=\"https://cdna.artstation.com/p/assets/images/images/013/841/624/large/angith-jayarajan-color-study03.jpg?1541340339\" class=\"h-100 img-fluid\"/>\r\n<p id=\"title-subtitle\" class=\'text-start\'>\r\n<i class=\'faded-text\'>Susan â€” Eu tentei ligar pra ele hÃ¡ alguns anos, mas ele desligou na minha cara. Acho que ele da aula de inglÃªs em um cursinho em Dallas. Ã‰ triste, ele nÃ£o se casou novamente.</i>\r\n</p>\r\n<div class=\"text-start\">\r\n<p>\r\nFinalmente, <i>Animais Noturnos</i> nÃ£o Ã© sÃ³ sobre \"Drama, Romance, Suspence\", esse Ã© um filme que procura tratar, Ã s vezes de forma sutil, de temas como o absurdismo, violÃªncia, isolaÃ§Ã£o, culpa e arrependimento, e ainda para complementar entrega uma das histÃ³rias de vingaÃ§a mais bem trabalhadas da decada. Se nada mais, definitivamente vale a pena conferir.\r\n</p>\r\n</div>', 1, '2021-08-07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `year` date NOT NULL,
  `email` varchar(75) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_status` int(11) NOT NULL DEFAULT '1',
  `signup_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user`, `year`, `email`, `password`, `user_status`, `signup_date`) VALUES
(1, 'Rafael G. Aires', '1999-03-27', 'rafaelg.aires@gmail.com', 'd49779e1f6f8839559c2533c590e307b', 0, '2021-08-05 21:30:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id_reset`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id_reset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
