<?php

error_reporting(E_ALL ^ E_NOTICE);  
// nech nezobrazuj chyby 

echo '<header class = "my_header" >';
echo ' <ul class = "my_ul">';
echo ' <li > <a class="nav-link" href="index.php">Domov</a> </li>';
echo ' <li > <a class="nav-link" href="zacni.php">Nová hra</a> </li>';
echo ' <li > <a class="nav-link" href="login.html">login</a> </li>';
echo ' <li > <a class="nav-link" href="register.html">register </a> </li>';
echo ' </ul>';



echo '</header>';



session_start();


function test_login(){
    // otestuje ci sme prihlaseny, lepsie to takto pojde 
// tie echa su len na testovanie
    if (!isset($_SESSION['hrac'] ) ) { 
        echo ' <br> chyba, nieje hrac prihlaseny<br>';
        return false;


    }
    elseif(($_SESSION['hrac'] == "odhlaseny")){
        return false;

    }
    elseif(isset($_SESSION['hrac'] ) && ($_SESSION['hrac'] != "odhlaseny") ){
        return true;
    }


}

// inac nam povie ze sa mame registrovat/login
if ( test_login() ) { // 

echo '<div>';
echo ' <p> prihlaseny ako používateľ '.$_SESSION['hrac'];
echo '</p>';

echo '</div>';

//session_start();

if (!isset($_SESSION['c'])) { $_SESSION['c'] = 0;  }
if (!isset($_SESSION['ukaz'])) { $_SESSION['ukaz'] = '!';  }
if (!isset($_SESSION['zoznam'])) { $_SESSION['zoznam'] = '?';  }
if (!isset($_SESSION['slovo'])) { $_SESSION['slovo'] = 'asdf';  }

if (!isset($_SESSION['cas_zac'])) { $_SESSION['cas_zac'] = 'este nezacala hra, zacne az prve pismeno bude hadane';  }




if (!isset($_SESSION['maxC'])) { $_SESSION['maxC'] = 7;  }





if ($_SESSION['zoznam'] == "?"){
echo '<div id="id_nezacalo">';
echo ' hra začne po zadaní prvého písmena';
echo '</div>';

}
else{
    echo '<style>';
    echo 'document.getElementById("id_nezacalo").innerHTML = "   ";';
// pouzitie javascriptu aby zmyzol text
    echo '</style>';

}

echo '<div>';

echo 
'
<html>
<body>



<form action="ff.php" method="POST">
Zadať písmeno: <br>
 <input type="text" name="pismenko"><br>
<input type="submit">
</form>

</body>
</html>
';
echo '</div>';


function vnutry(){
    $_SESSION["posledne_p"] = $_POST["pismenko"];
isn($_SESSION["slovo"], $_SESSION["posledne_p"]);

echo  '   zoznam = '. $_SESSION['zoznam']. '    ukaz = '.$_SESSION['ukaz'].' chyb spravenych = '.$_SESSION['c'];


}




function isn($slovo , $pismeno)
{
 
    $_SESSION['zoznam'] .=   $pismeno;
 //   echo 'zozname zmeneny na '.  $_SESSION['zoznam'].'   ';
    if (str_contains($_SESSION["slovo"], $pismeno)) {
   // toto asi robit pre vsetko nielen pre spravne
        $f =0;
        $f = $f + 1;
    }
    else{
        $_SESSION['c'] = ($_SESSION['c']) + 1;
        // zvysi sa pocet chyb
    }
   // co_uzakat hracom ;
   co_uzakat($_SESSION["slovo"],$_SESSION['zoznam']);

    if ($_SESSION['c'] > $_SESSION['maxC']){
        //include 'ukonci.php';
        echo '<div>';
        echo ' <p> <br> prekroceny pocet chyb, prehra <br> ';
        echo '<br> začnite novú hru <br> ';
        echo    " <br> <a href='zacni.php'> kliknite začatie novej hry </a> <br> </p>";
        echo '</div>';

        require("ukonci.php");


    }
    if ($_SESSION['ukaz'] == $_SESSION['slovo']){
        echo '<div>';

        echo ' <p> <br> uhadnute cele slovo, vyhra<br> ';
        echo '<br> začnite novú hru <br> ';
        echo    " <br> <a href='zacni.php'> kliknite začatie novej hry </a> <br>  </p>";
        echo '</div>';


       // include 'ukonci.php';
        include ('ukonci.php');

    }


}

function co_uzakat($slovo,$zoznam){
    $s = "";
    // co ma ukazat zo slova ktore hadame , a ma byt slovo, b ma byt zoznam hadanych pismen postupne
    // ak je pismeno v A aj v B , tak ho zobrazime (inak nie)
    $as = str_split($slovo);
    $bs = str_split($zoznam);
    $_ts = ""; 
    for ($i = 0; $i < strlen($slovo); $i++) {
        $x = $slovo[$i];
 //       echo "$x";
         $cis = 0 ;

            if (str_contains($_SESSION['zoznam'], $x)){
                $s .= $x;
            }
            else{
                $s .=  '?';
            }
        
      }
      $_SESSION['ukaz'] = $s;


}

// doto robi ak sme uz prihlaseny

// else sprvy ked sme neprihlaseny
}
else{
    echo '<div>';

    echo ' <br>   treba  sa najprv prihlásiť  ';
    echo "<br>  <a href='login.html'>  prihlásiť  sa  </a>";
    echo "<br>  <a href='register.html'>  zaregistrovať  nový účet </a>";
    echo '</div>';

}





/*


// da sa este ziskat data z sql databazy ,
// to mozno spravim pre to jednu stranku kde to vsetko bude, napr ze kolko vyhral, kolko prehral
// najlepsi hraci atd
// mozno este pridat jednu informaciu ze ci skoncil hru vyhro  alebo prehrov 

// id sa nemusi vkladat 
// DATETIME - format: YYYY-MM-DD HH:MI:SS
$sql = "INSERT INTO hrytb (player,	time_start	,time_end	,word	,word_length	,narocnost	,ako_hadal)  VALUES('$meno','2000-10-14 14:53:27', '2000-10-14 15:54:28', 'dom22', '3', '70', '$zoznam_pismen') ";
mysqli_query($conn,$sql);
// to conn podciarkuje cervenov ale je to importovanes s ineho suboru preto, ale ide to aj tak 
mysqli_close($conn);
// toto vsetko prida do tej databazy do tej tabulky vsetko o hre,
// chcem aby to bolo vo funkcii ktoru spusti kedskoncim hru
// nech to vsetko ulozi

*/

// echo "hello po pripisani"   ;
// kresli();
// tam to so suboru ff

//include 'obes.php';

// to slovo bude na mysql servery 


//$_SESSION['zobraz'] = "";
// v session bude nieco co ma zobrazovat,
// ked uhadneme pismeno tak zmeni toto 'zobraz'
// tak ze prida to uhadnute pismeno

// potom ak chcem aby zakrylo nechcene klavesy, tak klavesnica asi pojde tiez do seesion

// nepouzivane 



// echo ' <br > koniec stranky <br>';

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css_login.css">

<style>


div {
    padding: 10px;
}
    
</style>

</head>

<body>
    <br><!-- 
html text , netreba   <br>
-->
</body>

</html>



