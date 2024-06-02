<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db_server = "localhost";
    $db_user = "root";
    $db_pass = ""; // leboe este nemame heslo k databaty
    //$db_name = "mojadb";
    $db_name = "hesla";
    // meno mojej databazy ktoru som uz vytvoril v tom xampp
    $connh = ""; 


    try{
    $connh = mysqli_connect($db_server ,$db_user, $db_pass, $db_name);
    }
    catch(mysqli_sql_exception){
        echo " <br> nejde nieco s databazov <br>";    
    }

    $sql = "SELECT heslo FROM users WHERE username = '$username'";

    mysqli_query($connh,$sql);


    $result = $connh->query($sql);
    //echo $result;

$prazdne = false;
   if (mysqli_num_rows($result) < 1){
    // ak vrazi zo sql databazy 0 riadkov
   $prazdne = true;
   }
    else{
    $prazdne = false;
}

$row = $result->fetch_array(MYSQLI_NUM);
 //   var_dump($row);

    if (!$prazdne){
   // echo ' hrac existuje ';

      try{ 
 //       echo    'hrac existuje'  ;
        $result = $row[0];
      }
      catch(Exception $e){
        echo'nejaka chyba <br>'.$e->getMessage().'<br>';
      }

//        echo '' .hash('sha256', $password).'';
    if (strtoupper(hash('sha256', $password)) == strtoupper($result)){
        // toto ked je spravne heslo
        echo 'spravne heslo';
        $_SESSION['hrac'] = $username;
        // priklad hracov a hesiel , heslo su zasifrovane, nie ako cleartext
        // hrac asdf heslo 123   A665A45920422F9D417E4867EFDC4FB8A04A1F3FFF1FA07E998E86F7F7A27AE3
        // hrac abc heslo 321  8D23CF6C86E834A7AA6EDED54C26CE2BB2E74903538C61BDD5D2197997AB2F72
// INSERT INTO `users` (`username`, `heslo`) VALUES ('abc', 'A665A45920422F9D417E4867EFDC4FB8A04A1F3FFF1FA07E998E86F7F7A27AE3');

    echo " <br> prihlaseny ako pouzivatel ".$_SESSION['hrac']."
    <br> <a href='zacni.php'> kliknite sem  pre pokracovanie do hry </a> <br> ";
    }
    else {
        echo "<a href='login.html'> chybne heslo, vratte sa do login  kliknutim </a>";
    }
}

    else{
        echo 'takyto pouzivatel neexistuje,'.$username;
        echo "<br>  ------------------------------------------------------------------ <br>";
        echo "<br>  <a href='register.html'>   kliknutim sa prihlaste s iným menom </a> <br>";
        echo "<br>  ------------------------------------------------------------------ <br>";
        echo "<br>  <a href='register.html'>   kliknutim prejdete na stranku kde sa dá registrovat </a><br>";
    }



    $connh->close();
}

    ?>