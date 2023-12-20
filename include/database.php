<?php 
$server="localhost";
$user="root";
$password="";
$name="nettoyage_db";

try{
$con=mysqli_connect($server,$user,$password,$name);
}
catch(mysqli_sql_exception)
{
    echo"la base de données n'est pas connecter";
}
?>