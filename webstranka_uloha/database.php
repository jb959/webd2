<?php
// subor tiez len pre poznamky




// php script pre prepojenie s mysql databazov,
// asi bude jedna databaza na udaje o hracoch
// druha na to jedno slovo, teda ak sa da
// udaje o hracovy / hre
// nech je kazda hra zaznamenana
// meno hraca, dlzka hry, ake mal slovo , dlzka slova, postupne ake stlacal pismena, ci vyhral 


// kod na pripojenie s databazov

$db_server = "localhost";
$db_user = "root";
$db_pass = ""; // leboe este nemame heslo k databaty

$db_name = "mojadb";
// meno mojej databazy ktoru som uz vytvoril v tom xampp

$conn = ""; 
// string na pripojenie sak datbaze , zatial prazdny

try{ // try  except statement, nech nepadne cela stranka ak sa dodrbe databaza

// toto je na vytvorenie prepojenia k mysql databaze
$conn = mysqli_connect($db_server ,$db_user, $db_pass, $db_name);
// meno servera, meno uzivatela, heslo, meno databazy
// toto bude akoze objekt pripojenia / konekcie 

}

catch(mysqli_sql_exception){
    echo " nejde nieco s databazov ";    

}




// test ci sme pripojeny, netreba to vypisovat do stranky

if($conn){
    echo " pripojeny k databaze <br>"  ;
}
else{
    echo "nedalo sa pripojit";
}

?>