<html>
<body>



<?php 

// use function isn;
include 'index.php';


// robit();
// mozno toto nebude treba

$_SESSION["posledne_p"] = $_POST["pismenko"];
isn($_SESSION["slovo"], $_SESSION["posledne_p"]);

function robit(){

    echo  '   zoznam = '. $_SESSION['zoznam']. '    ukaz = '.$_SESSION['ukaz'].' chyb spravenych = '.$_SESSION['c'];

    echo 'hadali ste pismenko  <?php'; $r = $_POST["pismenko"]; echo $r;   
    echo 'davame <?php  do session ';
    $_SESSION["pismeno"] = $r;

    isn( $_SESSION["slovo"], $_SESSION["pismeno"]);

    echo 'hadane bolo : <?php echo $_SESSION["pismeno"] ; ?>    ';
    echo  '   zoznam = '. $_SESSION['zoznam']. '    ukaz = '.$_SESSION['ukaz'].' chyb spravenych = '.$_SESSION['c'];
}



?>



</body>
</html>



