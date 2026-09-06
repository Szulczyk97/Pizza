<?php
      session_start();

      if($_SERVER["REQUEST_METHOD"] !== "POST"){
            header("Location: komentarze"); exit();
      }

      if(!(isset($_POST["token"])) || !(isset($_SESSION["token"])) || !hash_equals($_SESSION["token"], $_POST["token"])){
            header("Location: komentarze"); exit();
      }

      if(!empty($_POST["email"])){
            header("Location: komentarze"); exit();
      }

      if(!isset($_POST["imie"], $_POST["tresc"])){
            header("Location: komentarze"); exit();
      }

      $autor = trim($_POST["imie"]);
      if(!preg_match("/^[0-9A-Za-zżźćńółęąśŻŹĆŃÓŁĘĄŚ\s_\-]{3,20}$/u", $autor)){
            header("Location: komentarze"); exit();
      }

      $zawartosc = trim($_POST["tresc"]);
      if(mb_strlen($zawartosc, "UTF-8") < 3 || mb_strlen($zawartosc, "UTF-8") > 200){
            header("Location: komentarze"); exit();
      }
      $zawartosc = htmlspecialchars($zawartosc, ENT_QUOTES, "UTF-8");

      require_once("./php_pizza/laczenie.php");
      $polaczenie = new mysqli($host, $uzytkownik, $haslo, $baza);
      if($polaczenie->connect_error){
            $_SESSION["decyzja"] = false;
            header("Location: komentarze"); exit();
      }else{
            $czas = date_format(date_create(),"H:i,d.m.Y");
            $sql = "INSERT INTO `opinie` (`autor`,`zawartosc`,`czas`) VALUES (?, ?,'".$czas."');";
            $przygotuj = $polaczenie->prepare($sql);
            $przygotuj->bind_param("ss", $autor, $zawartosc);
            $przygotuj->execute();
            $przygotuj->close();
            $polaczenie->close();
            $_SESSION["decyzja"] = true;
            header("Location: komentarze"); exit();
      }
?>