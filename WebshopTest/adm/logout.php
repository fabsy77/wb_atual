<?php
session_start(); // Certifique-se de iniciar a sessão no início do script

// Destrua a sessão
session_destroy();
unset($_SESSION);

// Redirecione para a página de login ou qualquer outra página desejada
header('location: login.php');
exit();
?>