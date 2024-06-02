<?php
// tento suber je pouzity len na poznamky,
// je tu popisane ako funguje pripojenie do databazy


// php script pre prepojenie s mysql databazov,
// toto je database pre hry 

// kod na pripojenie s databazov

$db_server = "localhost";
$db_user = "root";
$db_pass = ""; // leboe este nemame heslo k databaty

$db_name = "hrydb";
// hrydb je databaza hier 
// veci v tej databaze vytvorime v tom xampp admin
// table hrytb
// id, player, time_start, time_end, word, word_length , narocnost, ako_hadal

// ako hadal = pismenka maju byt coo hadal postupne

$conn = ""; 
// string na pripojenie sak datbaze , zatial prazdny

try{ // try  except statement, nech nepadne cela stranka ak sa dodrbe databaza

// toto je na vytvorenie prepojenia k mysql databaze
$conn = mysqli_connect($db_server ,$db_user, $db_pass, $db_name);
// meno servera, meno uzivatela, heslo, meno databazy
}
catch(mysqli_sql_exception){
    echo " nejde nieco s databazov ";    

}




// test ci sme pripojeny, netreba to vypisovat do stranky

if($conn){
    echo " <br> pripojeny k databaze <br> "  ;
}
else{
    echo " <br> nedalo sa pripojit <br> ";
}

?>