<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./res/bootstrap.css">
    <link rel="stylesheet" href="./res/style.css">
</head>
<body>
    <?php
        //inicio da session
        session_start();

        /**
         * gerando os cookies de login e senha
         * login: Theo
         * senha: 20181
         * não sei se a intenção era colocar meu rm e senha, mas fiz dessa forma mesmo
         */
        setcookie("login", "Theo", time() + 60*60*24);
        setcookie("senha", "20181", time() + 60*60*24);

        /**
         * para evitar erros pela falta da session, foram colocadas em variaveis com operdores ternarios para usar o "0" como valor padrão
         * a variavel $err foi usada para comstrar mensagens de erro mas virou para mensagens em geral conforme eu fui tendo as ideias do programa
         */
        $err = (isset($_SESSION["error_log"]))?$_SESSION["error_log"]:"0";
        $logado = (isset($_SESSION["user_login"]))?$_SESSION["user_login"]:"0";

        //if para levar o usuario diretamente para a pag principal caso ja esteja logado
        if($logado == "1"){
            header("location: pag_principal.php");
        }
    ?>
    <!-- por conta do bootstrap, a div tem rounded e p-4 para deixar as bordas arredondadas e colocar padding -->
    <div class="div_main rounded p-4">

        <?php if($err == "1"): //if para mensagem de erro por falta de login ou senha ?>

            <!--toda a mensagem está com classes e atributos referentes ao bootstrap para formatar conforme o design padrão do alert
                isso segue para todas as mensagens de alerta-->
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>ERRO:</strong> login ou senha não informados
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php elseif($err == "2"): //if para mensagem de erro caso o login ou senha estejam incorretos?>

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>ERRO:</strong> login ou senha incorretos
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php elseif($err == "3"): //if para mensagem do log out?>

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Log out concluido com sucesso
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php endif;?>
        <form action="login.php" method="POST">
            <fieldset>
                <h2 class="titulo">Login</h2>
                <!-- formulario montado com input com as classes form e form-control do bootstrap e organizada em lista com list-style: none -->
                <ul>
                    <li>
                        <label for="login">Login</label>
                        <input type="text" name="login" id="login" class="form form-control">
                    </li>
                    <li>
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="senha" class="form form-control">
                    </li>
                    <li>
                        <input type="submit" value="Log in" class="btn btn-outline-success">
                    </li>
                </ul>
            </fieldset>
        </form>
    </div>
    <!-- scripts do bootstrap, o jquerry e popper são necessários para o funcionamente do mesmo -->
    <script src="./res/jquery.js"></script>
    <script src="./res/popper.js"></script>
    <script src="./res/bootstrap.js"></script>
    <?php $_SESSION["error_log"] = "0"; //inicialmente era um session_destroy(), mas dava uns erros, então ele apenas zera o error_log?>
</body>
</html>