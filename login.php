<?php 
$login = $_POST['login'];
$entrar = $_POST['entrar'];
$senha = md5($_POST['senha']);
$host="localhost"; $user="root"; $password="1234";
$db="login";
$connect = mysqli_connect($host,$user,$password,$db) or die("impossível conectar ao MysqL");
  if (isset($entrar)) {
           
    $query_select = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'" or die("erro ao selecionar");
    $verifica = mysqli_query($connect,$query_select);
      if (mysqli_num_rows($verifica)<=0){
        echo"<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='index.html';</script>";
        die();
      }else{
        setcookie("login",$login);
        header("Location:index.html");
      }
  }
?>