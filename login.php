<?php
    //inicio da session
    session_start();

    //para evitar erros, as session são guardaadas usando uma função ternaria com false como o padrão
    $login = (isset($_POST["login"]))?$_POST["login"]:false;
    $senha = (isset($_POST["senha"]))?$_POST["senha"]:false;

    //if para ver se o $login e $senha tem conteudo, caso algum esteja como false ele envia um erro por session como a mensagem 2 e redireciona para o index.hp
    if($login and $senha){
        if (($login == $_COOKIE["login"]) and ($senha == $_COOKIE["senha"])){
            //session setada e redirecionamento para a pagina especifica, isso segue por todas as partes de ambos os if's
            $_SESSION["user_login"] = "1";
            //eu queria colocar uma mensagem como alert mas caso usasse o user_login ele apareceria o tempo todo, então usei em outra session
            $_SESSION["login_msg"] = "1";
            header("location: pag_principal.php");
        }else{
            $_SESSION["error_log"] = "2";
            header("location: index.php");
        }
    }else{
        $_SESSION["error_log"] = "1";
        header("location: index.php");
    }
?>