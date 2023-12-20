<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>WebSite</title> 
    <link href="css/mon_style.css" rel="stylesheet"/>
    <link href="css/styles.css" rel="stylesheet" />
</head>

<?php 
if(isset($_GET["num_page"])){
    $id=$_GET["num_page"];
}
else{$id=1;}
?>

<body class="sb-nav-fixed" id="<?=$id?>">