<?php
$host="localhost";
$user="root";
$pass="";
$db="newswebsite";

$koneksi = mysqli_connect($host,$user,$pass,$db);
if(!$koneksi){
    die("Gagal Terkoneksi");
}else{
    echo ("Koneksi berhasil");
}