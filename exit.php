<?php

  session_start();
  unset($_SESSION['login']);
  session_unset();
  setcookie(session_name(), '', 0, '/');
  session_destroy();
  header('Location: /');
?>