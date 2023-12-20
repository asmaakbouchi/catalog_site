<?php
include("include/database.php");
if(isset($_GET["deleteid"])){
$id=$_GET["deleteid"];


$req="delete from site_web where id_site=".$id;

if(mysqli_query($con,$req)){
    header('location:gestion_siteweb.php');
}
else{
    die(mysqli_error($con));
}
mysqli_close($con);
}

if(isset($_GET["id_login"])){
    $id=$_GET["id_login"];
    $req="delete from login where id_login=".$id;
    if(mysqli_query($con,$req)){
        header('location:gestion_client.php');
    }
    else{
        die(mysqli_error($con));
    }
    mysqli_close($con);
}

if(isset($_GET["id_note"])){
    $id=$_GET["id_note"];
    $req="delete from bloc_note where id_bloc_note=".$id;
    if(mysqli_query($con,$req)){
        header('location:bloc_note.php');
    }
    else{
        die(mysqli_error($con));
    }
    mysqli_close($con);
}

?>
