# A Silent Place
A Silent Place é um projeto levantado com o objetivo de testar e aprimorar as habilidades do seu desenvolvedor, todas as ferramentas ultilizadas nesta campanha são gratuitas e de fácil acesso. Imagens disponiveis gratuitamente por unsplash.com. Aplicação de filmes disponibilizada e alimentada pelo The Movie Database (TMDB)

Além dos três pilares do desenvolvimento web (HTML, CSS, JS), foram também ultilizadas as tecnologias PHP, SQL, Bootstrap 5 e diferentes outras APIs para a formação final do site.

Site online: http://asilentplace.epizy.com/index.php

Funcionalidades:

- Design elegante e intuitivo, totalmente responsivo, permitido pelo uso de técnicas e práticas do Bootstrap 5
- Criação e recuperação de contas através do PHPMail — note que para implementar a recuperação de contas o desenvolver deverá mudar e-mail e senha registrados na linha 70 e 71 do arquivo recuperation.php em site/php/
- Todas as senhas são passadas e tratadas por fortes mecanismos de encriptação e limpeza de dados disponíveis pela própria tecnologia PHP
- Criação, atualização e exclusão de novos artigos para usuários devidamente autenticados. Para possuir estes privilégios administrativos, o desenvolvedor deverá mudar os valores de user_status da tabela users de 1 para 0 no banco de dados silent_db
- Listagem de filmes alimentada por uma API externa assim como uma ferramenta de pesquisa que permite a procura de filmes e séries de TV; nele, existe também um sistema de tags/identificadores que classifica e agrupa cada um desses filmes de acordo com seu gênero
