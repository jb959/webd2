<?php
// session_start();

echo 'priklad hracov, meno a heslo <br>';
echo '<p>         // hrac asdf heslo 123   A665A45920422F9D417E4867EFDC4FB8A04A1F3FFF1FA07E998E86F7F7A27AE3 </p>';
echo ' // hrac abc heslo 321  8D23CF6C86E834A7AA6EDED54C26CE2BB2E74903538C61BDD5D2197997AB2F72 </p>';
echo ' <br> <a href = "login.html" > vratit sa do login </a> </br>';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

if ( $username == "admin"  && strtoupper(hash('sha256', $password)) == strtoupper(hash('sha256', "admin") ) ) {
// meno admina je admin , heslo admina je admin
echo 'spravne helo pre admina  <br>';
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = ""; // leboe este nemame heslo k databaty
    $db_name = "hrydb";
    $co = ""; 

    try{
        $co = mysqli_connect($db_server ,$db_user, $db_pass, $db_name);
        echo 'pripojenie lep pre admina';
        }
        catch(mysqli_sql_exception){
            echo " <br> nejde nieco s databazov <br>";    
        }


    $sql = "SELECT * FROM hrytb";

    $result = mysqli_query($co,$sql);

    echo "<table>"; 

    while($row = mysqli_fetch_array($result)){   // zobrazenie sql tabulky ako pole
    //var_dump($row);
    echo '<br> ----- <br>';
    print_r ($row);

    }
    
    echo "</table>"; 


    $co->close();

}

else {
    echo 'zle heslo pre admina';
}


 }

    ?>