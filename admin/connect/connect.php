<?php
  $mysqli = new mysqli("localhost", "root", "", "csdl");

  //Check
  if ($mysqli -> connect_error) {
    echo "Kết nối thất bại" . $mysqli -> connect_error;
    exit();
  }
?>