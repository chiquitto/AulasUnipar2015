<?php

session_start();

// Testar valor logado
if (!isset($_SESSION['logado'])) {
  header('location:login.php');
  exit;
}
