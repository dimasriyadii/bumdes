<?php

 $dbhost = 'localhost';  //host untuk database, biasanya localhost
 $dbuser = 'root';  //username untuk mengakses database, jika dilokal biasanya 'root'
 $dbpass = '1234';  //password untuk mengakses databae, jika dilokal biasanya kosong
 $dbname = 'db_bumdes';  //nama database yang akan digunakan


 $koneksi = new mysqli($dbhost,$dbuser,$dbpass,$dbname) ;  //koneksi Database

 //Check koneksi, berhasil atau tidak
 if( $koneksi->connect_errno ){
  echo "Oops!! Koneksi Gagal!".$koneksi->connect_error;
 }
 ?>