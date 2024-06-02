<?php 
try {
//session_start();
}

catch (Exception $e){
   // nech nevypisuje 
   $a = 1;
}
$db_server = "localhost";
$db_user = "root";
$db_pass = ""; 
//$db_name = "mojadb";
$db_name = "slovadb";
// meno mojej databazy ktoru som uz vytvoril v tom xampp
$connhs = ""; 


try{
$connhs = mysqli_connect($db_server ,$db_user, $db_pass, $db_name);
}
catch(mysqli_sql_exception){
    echo " <br> nejde nieco s databazov <br>";    
}


$riadok =(rand(0,9));
// zatial je len 10 slov , ale da sa pridať viac, potom sa to zmeni tu
// najlepsie by to bolo pomocov nerelacnej databazy, napriklad MongoDB 
// lebo budeme mat napriklad milion moznych slov a my vyberieme ib jedno


$pole = array("mama", "jablko", "dom",'auto','obesenec','kotol','pec','huba','lopata','oko','blesk');
// tu to netreba, lebo to bude len jedno slovo
$result =  $pole [$riadok];
$_SESSION["slovo"] = $result;



?>