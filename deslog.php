<?php
    //esse arquivo é feito para efetuar o log out

    //inicio da session
    session_start();

    //seta a session de login para 0 e envia a msg para a msg 3 no index e redireciona para o  index
    $_SESSION['user_login'] = "0";
    $_SESSION['error_log'] = "3";
    header("location: index.php");
    
?>