<?php
    session_start();

    session_unset();

    session_destroy();

    header('Location: /stampy_mail/login.php');
?>