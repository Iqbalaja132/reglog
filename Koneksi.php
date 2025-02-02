<?php

class Koneksi{
  public function konn(){
    $konek = mysqli_connect('localhost', 'root', '', 'pa_dian');

    if (!$konek) {
      // echo "error";
    } else {
      // echo "aman";
      return $konek;
    }
  }
}

?>