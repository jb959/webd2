<?php

echo '<style>';
echo 'document.getElementById("id_nezacalo").innerHTML = "   ";';
echo '</style>';
session_start();

// toto bude treba prepisat
require_once  'index.php';

if (!isset($_SESSION['cas_zac']) || strlen($_SESSION['cas_zac'])  > 20 ) { $_SESSION['cas_zac'] = date("Y-m-d H:i:s");  }


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $n = $_POST["pismenko"];
   


   // isn($slovo,'d');
   isn($_SESSION["slovo"], $n);

 //kresli2();
 echo  '<br>';

// toto ma vypisovat
 echo  ' <div ><br>';
 echo " posledné hádané písmeno : " . $n . "<br>";
    echo  '  Hádané písmená = '. $_SESSION['zoznam']. ' <br>   Slovo = '.$_SESSION['ukaz'].'  <br>  Chýb = '.$_SESSION['c']. '  <br>  Maximum chýb = '.$_SESSION['maxC'].' <br> čas zaciatku hry = '.$_SESSION['cas_zac'];
  echo  '<br>';

  kresli2();
  echo  ' </div> <br> ';

}




function kresli2(){
  //  sem bude treba dat to kde kresli obesenca

  echo '<div class = "obes_div" > ';
echo " <br> simulácia kresby obesenca <br>";

// echo 

$a = 
'
<h1> HTML5 Canvas  Obesenec </h1>

<canvas id="myCanvas2" width="400" height="400" style="border:1px solid black;">
Sorry, your browser does not support canvas.
</canvas>
'; 

$zaciatok = $a.  '<script>
const canvas = document.getElementById("myCanvas2");
const ctx = canvas.getContext("2d");
';
// toto nakresli ciaru , pouzijeme to pre obesenca
// ctx.beginPath(); ctx.moveTo(0,0); ctx.lineTo(200,100); ctx.stroke();
// aby zacala       kde ma zacinat    kde ma koncit     ze ju ma nakreslit


//$sibenica = array ();
// nech kresli sibenicu od zaciatku, dokopy 7 tahov
$riadky = array (
// testovacia ciara, potom zmazat
// "ctx.beginPath(); ctx.moveTo(0,0); ctx.lineTo(200,100);  ctx.stroke();",

// najpr nakreslit sibenicu
"ctx.beginPath(); ctx.moveTo(100,20); ctx.lineTo(200,20);  ctx.stroke();",
"ctx.beginPath(); ctx.moveTo(100,250); ctx.lineTo(100,20);  ctx.stroke();",

"ctx.beginPath(); ctx.moveTo(0,250); ctx.lineTo(400,250);  ctx.stroke();",


// nakresli povraz
"ctx.beginPath(); ctx.moveTo(200,20); ctx.lineTo(200,60);  ctx.stroke();",

//toto nech kresli hlavu 
//"ctx.beginPath(); ctx.moveTo(0,0); ctx.lineTo(200,100);  ctx.stroke();",

"ctx.beginPath();
ctx.arc(200, 80, 20, 0, 2 * Math.PI);
ctx.stroke();",


// telo, zacina stredom, trupom

"ctx.beginPath(); ctx.moveTo(200,100); ctx.lineTo(200,150);  ctx.stroke();",
"ctx.beginPath(); ctx.moveTo(200,120); ctx.lineTo(170,140);  ctx.stroke();",
"ctx.beginPath(); ctx.moveTo(200,120); ctx.lineTo(230,140);  ctx.stroke();",
"ctx.beginPath(); ctx.moveTo(200,150); ctx.lineTo(180,190);  ctx.stroke();",
"ctx.beginPath(); ctx.moveTo(200,150); ctx.lineTo(220,190);  ctx.stroke();",

// tu by to malo koncit, dalej len par riadok medzier pre pripad chyby

// "ctx.beginPath(); ctx.moveTo(200,0); ctx.lineTo(200,100);  ctx.stroke();"
" ", " ", " ", " " ," ", " ", " ", " " 

);


$koniec = '</script>';


 $riadky2  = array_slice($riadky ,0, 3 + $_SESSION['c']);;
// $riadky2  = array_slice($riadky ,0, 8);;



$r =  implode(" ", $riadky2);


// $e = $zaciatok . $riadky [0]. $koniec;

$e = $zaciatok . $r. $koniec;


echo $e;

echo "</div>";
}


?>