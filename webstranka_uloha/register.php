


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
 //   $email = $_POST['email'];
    $password = hash('sha256',$_POST['password']);
    $password = strtoupper ( $password);

    $db_server = "localhost";
    $db_user = "root";
    $db_pass = ""; 
    $db_name = "hesla";
    $connh2 = ""; 


    try{
    $connh2 = mysqli_connect($db_server ,$db_user, $db_pass, $db_name);
    }
    catch(mysqli_sql_exception){
        echo " <br> nejde nieco s databazov <br>";    
    }

    $sql = "SELECT heslo FROM users WHERE username = '$username'";

    mysqli_query($connh2,$sql);


    $result = $connh2->query($sql);

$exist = false;
   if (mysqli_num_rows($result) > 0){
    // ak uz meno existuje, vrati z databazy viac nez 0 riadkoc
   $exist = true;
   }
    else{
    $exist = false;
}


if ($exist == false ) {
    $sql = "INSERT INTO users (username, heslo) VALUES ('$username', '$password')";


  // echo $sql;
 try{   
mysqli_query($connh2,$sql);
echo '<br>  pripojene do databazy <br>';
}
catch (Exception $e) {
    echo ' <br>neslo insertnut querry do databazy, chyba <br>'.$e->getMessage().'<br>'   ;
}
// to conn podciarkuje cervenov ale je to importovanes s ineho suboru preto, ale ide to aj tak 
mysqli_close($connh2);
//echo '<br> conn zatvorene <br>';
echo '<br> hráč zaregistrovaný menom '.$username.'<br>';
echo 'je potrebné sa prihlásiť';
echo "<br>  <a href='login.html'>  prihlasit </a>";


}
else {
    echo '<br> toto meno uz existuje '.$username.'  <br>';
    echo "<br>  <a href='register.html'>   kliknutim sa registrujte s iným menom </a>";

}

}
?>