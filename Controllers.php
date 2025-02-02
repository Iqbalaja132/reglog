<?php

include_once 'Koneksi.php';

class Controllers{
  public function regis($d){
    $name = $d['name'];
    $username = $d['username'];
    $password = password_hash($d['password'], PASSWORD_BCRYPT);

    $conn = new Koneksi();

    $sql = "INSERT INTO user VALUES (NULL, '$name', '$username', '$password')";
    $query = mysqli_query($conn->konn(), $sql);

    if ($query) {
      header('Location: index.php?page=register');
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
      echo "aman";
    } else {
      echo "tidak aman";
    }
    // query bernilai true karena mengambil data dari db
  }
}

?>