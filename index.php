<?php

include_once 'Controllers.php';

$ctrl = new Controllers();

if(!isset($_GET['page'])){
  header('Location: index.php?page=login');
  exit;
}

if($_GET['page'] == "register"){
  include_once('register.php');
}elseif ($_GET['page'] == "login") {
  include_once('login.php');
}elseif ($_GET['page'] == "regis_proses") {
  $data['name'] = $_POST['name'];
  $data['username'] = $_POST['username'];
  $data['password'] = $_POST['password'];
  $data['role'] = $_POST['role'];
  
  $ctrl->regis($data);
}elseif ($_GET['page'] == "login_proses") {
  $data['username'] = $_POST['username'];
  $data['password'] = $_POST['password'];

  $ctrl->login($data);
}
?>