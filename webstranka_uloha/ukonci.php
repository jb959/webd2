<?php 
// toto sa spusti ked ukoncime hru,
// zisti to ci sme vyhrali alebo prehrali
//asi teda

// ulozi teda ci sme vyhralli alebo prehrali

// vsetko ulozi do sql databazy,
// a este urci cas konca a vypocita kolko hra trvala

function roziel_sekund($a,$b){
  // rozdiel sekund , vzdy nech je to kladne cislo (absolutna hodnota rozdielu)
     // format bude string  "Y-m-d h:i:sa" teda napriklad 2000-03-02 15:45:33
     $a = substr($a, -8 ); // vzdy poslednych 8 znakov je cas, a hra by nemala trvat viac nez den 
     $b = substr($b, -8 );
     function to_sec($x){
      // zmen cas na sekundy
      $i = 0;
      //intval('042');
      $i += intval(substr($x, -2)); // posledne dva, pripocita sekundy
      $i += intval(substr($x, -5,-1)) *60; // piate od konca a 5-1 od konca (stvrte) krat 60 lebo minuty
      $i += intval(substr($x, 0,2)) *3600; //  toto hadam zobrazi hodiny, dva znaky, zaciname nultym znakom
      return $i;
          }
      $r = abs ( to_sec($a) - to_sec($b) );
      //$r = strval($r);
      //echo $r;
      return $r;
  
    
  }



// funkcia uloz ulozi hru, spusti sa az ked skoncime hru, vyhratim alebo prehratim, malo by sa spusit automaticky
//
// lebo tu sa to pouziva 
function ulozma($meno,	$time_start	,$time_end	,$hadane	,$word_length	,$narocnost	,$ako_hadal) {

// zaciatok pripojenia k databaze, radsej to dam sem

    if (true) { 
  // len pre lahsiu orientaciz
$db_server = "localhost";
$db_user = "root";
$db_pass = ""; // leboe este nemame heslo k databaty
//$db_name = "mojadb";
$db_name = "hrydb";
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
    echo " <br> nejde nieco s databazov <br>";    
}

// test ci sme pripojeny, netreba to vypisovat do stranky, potom bud zmazat alebo nech pise do konzoly
if($conn){
    //echo " <br> pripojeny k databaze <br>"  ;
}
else{
   // echo "<br> nedalo sa pripojit <br>";
}

}

// koniec pripojenia k databaze



// len tato funkcia to pouziva
  //  echo "Hello world!";
    $zoznam_pismen = $ako_hadal;
    $word = $hadane;
// DATETIME - format: YYYY-MM-DD HH:MI:SS
/*
$sql = "INSERT INTO hrytb (player,	time_start	,time_end	,word	,word_length	,narocnost	,ako_hadal) 
                     VALUES ($meno,$time_start	,$time_end	,$word	,$word_length	,$narocnost	, $zoznam_pismen)";
*/
$dlzka_hry = roziel_sekund($time_start,$time_end);
$meno = $_SESSION['hrac'];
$time_start =  $_SESSION['cas_zac'];
$sql = "INSERT INTO hrytb (player,time_start,time_end,trvanie,word,word_length,narocnost,ako_hadal) 
                     VALUES ('$meno','$time_start','$time_end',$dlzka_hry,'$word',$word_length,$narocnost,'$zoznam_pismen')";
// musi tam byt 'asfg' ked bude hodnota tring, inac to nepojde
 //   echo '<br> vytvoreny prikaz pre insertnututie <br>';
 //   echo $sql;

    //include  'database_games.php';
 try{   
mysqli_query($conn,$sql);
//echo '<br> conn query spravny <br>';
}
catch (Exception $e) {
    echo ' <br>neslo insertnut querry do databazy <br>'.$e->getMessage().'<br>'   ;
}
mysqli_close($conn);
//echo '<br> conn zatvorene <br>';

  }

$d = date('Y-m-d H:i:s');

// $_SESSION['meno'] = 'hrasik' ;
// pred podporovanim pouzivatelskych mien


//echo '<br> teraz ulozit pomocov funkcie ulozma <br>';

$cas_a = $_SESSION['cas_zac'];



 ulozma($_SESSION['hrac'],$cas_a, $d, $_SESSION['slovo'],strlen($_SESSION['slovo']),strlen($_SESSION['slovo'])* 2,$_SESSION['zoznam']);


//ulozma(($meno,	$time_start	,$time_end	,$hadane	,$word_length	,$narocnost	,$ako_hadal));
//ulozma('menko1',	'2018-12-05 12:39:16'	,'2018-12-05 12:39:16'	,'hadane_slovo'	,6	,23	,'abcdefgh');
// starsie testovanie

  //echo 'hra ukoncena';

  echo 'hra uložená do zaznamu';

?>