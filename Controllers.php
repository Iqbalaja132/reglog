<?php

session_start();
include_once 'Koneksi.php';

class Controllers{
  public function regis($d){
    $name = $d['name'];
    $username = $d['username'];
    $password = password_hash($d['password'], PASSWORD_BCRYPT);
    $role = $d['role'];

    $conn = new Koneksi();

    $sql = "INSERT INTO user VALUES (NULL, '$name', '$username', '$password', '$role')";
    $query = mysqli_query($conn->konn(), $sql);

    if ($query) {
      header('Location: index.php?page=login');
    } else {
      header('Location: index.php?page=error');
    }
    
  }

  public function login($d){
    $username = $d['username'];
    $password = $d['password'];

    $conn = new Koneksi();

    $sql = "SELECT * FROM user WHERE username = '$username'";
    $query = mysqli_query($conn->konn(), $sql);

    $data = mysqli_fetch_assoc($query);

    if (password_verify($password, $data['password'])) {
      if ($data['role'] == 'admin') {
        $_SESSION["data"] = $data;

        header('Location: home_admin.php');
      } elseif($data['role'] == 'user') {
        $_SESSION["data"] = $data;

        header('Location: home_user.php');
      }
      
    } else {
      echo "<script>alert('Username atau Password salah!!'); window.location = 'login.php' </script>";
    }
    // query bernilai true karena mengambil data dari db
  }
}

?>