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
        //session armazenadas em variaveis para evitar erro
        $logado = (isset($_SESSION["user_login"]))?$_SESSION["user_login"]:"0";
        $login_msg = (isset($_SESSION["login_msg"]))?$_SESSION["login_msg"]:"0";
    ?>
    <div class="div_main rounded p-4">
        <!-- if para mostrar paginas diferentes para quem está ou não logado -->
        <?php if($logado == "1"): ?>

            <!-- if para mostrar a mensagem de login -->
            <?php if($login_msg == "1"): ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Você esta logado
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- zera a variavel de mensagem para mostrar apenas logo após o login -->
                <?php $_SESSION["login_msg"] = "0"; ?>

            <?php endif; ?>

            <h3>Logado</h3>

            <a href="deslog.php" class="btn btn-outline-danger mt-4">deslogar</a>

        <?php else:?>

            <h3 style="color:red">Você não esta logado</h3>
            <a href="index.php" class="btn btn-outline-danger mt-4">voltar à pagina inicial</a>

        <?php endif; ?>
    </div>
    <script src="./res/jquery.js"></script>
    <script src="./res/popper.js"></script>
    <script src="./res/bootstrap.js"></script>
</body>
</html>