<?php
session_start();

//var_dump($_SESSION);

//premenovat na noha hra
// lebo toto ma spustat nobu hru


//require_once  'index.php';

// session_start();

include 'nove_slovo.php';




function daj_cas(){
    // takyto format je kvoli datetime v mySQL
    $d = date("Y-m-d H:i:s");
    return $d;
}

// rozdiel casu bude tak kde sa uklada lebo len tam sa pouziva
// tieto funkcie na as nech su v nejakom inom subore lebo ich budem porebovat pri zacinani aj pri ukladani
// v subore 6 je este tu


function nova_h2(){


    $_SESSION['cas_zac'] = daj_cas();
 


 $_SESSION['hrac'];

 $_SESSION['c'] = 0;  
$_SESSION['ukaz'] = '!';  
 $_SESSION['zoznam'] = '?';  

// if (isset($_SESSION['slovo'])) { $_SESSION['slovo'] = 'asdf';  }
// toto nam da nove slovo
include 'nove_slovo.php';


}
 
nova_h2();

echo 'meno hraca = '.$_SESSION['hrac'] .' <br>';



 $url = ".";
echo "<a href = '$url'>   začnite hru kliknutím </a> ";
// ;



?>