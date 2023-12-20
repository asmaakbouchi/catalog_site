<?php


$start=0;
$affiche_rows=5;
//total des ligne
$nb_rows=mysqli_num_rows($record);
//np ligne par page
$pages=Ceil($nb_rows/$affiche_rows); // ceil rendre le nombre entier superier plus proche if result =3;14 redre 4


if(isset($_GET["num_page"])){
    $page=$_GET["num_page"]-1;
    $start=$page*$affiche_rows;
}

//$req="select * from site_web limit $start,$affiche_rows";


?>