<?php
session_start();

//     $id= $_GET["updateid"];
//     //$id=$_SESSION["id_site"];
//     echo"<script>alert('$id');</script>";
//     include("include/database.php");

//     if(isset($_POST["Enregistrer"])){ 
//         $nomsite=$_POST["nom_site"];
//         $liensite=$_POST["lien_site"]; 
//         $req = "UPDATE site_web SET nom_site='$nomsite', lien='$liensite' WHERE id_site=".$id;
//         try{    
//         if(mysqli_query($con,$req))
//         {
//         // echo"<script>window.location.href='gestion_siteweb.php';</script>";
//             header('location:gestion_siteweb.php');
//         }
//         else{echo "ERROR".$sql."<br>".$conn->error;}
//         }
//         catch(mysqli_sql_exception $e)
//         {
//             echo "<p style='margin-top:20%'> $e</p> ";
//         }
//         mysqli_close($con); 
//     }


include("include/database.php");
if(isset($_GET["updateid"]))
{
$id=$_GET["updateid"];

$req1="select * from site_web where id_site=$id";
$res1=mysqli_query($con,$req1);
if(mysqli_num_rows($res1)>0)
{
  /*  foreach($res1 as $row){
        $nom=$row ["nom_site"];
        $lien=$row["lien"];
        $image_name=$row["logo"];
    }*/
    while($rows=mysqli_fetch_assoc($res1))
    {
       $nom=$rows["nom_site"];
       $lien=$rows["lien"];
       $image_name=$rows["logo"];
    }
}


if(isset($_POST["save"]))
{
    if(isset($_POST["nom"])&& isset($_POST["lien"])){
     
    $nom=$_POST["nom"];
    $lien=$_POST["lien"];
    $image_name="";
    if(!empty($_FILES["image"]["name"])){
        $image=$_FILES["image"]["name"];
        $image_name=uniqid().$image;
        move_uploaded_file($_FILES["image"]["tmp_name"],"image/".$image_name);
    }
    
    if(!empty($image_name))
    {
        $req="UPDATE site_web SET nom_site='$nom', lien='$lien',logo='$image_name' WHERE id_site=".$id;  }
    else{
    $req="UPDATE site_web SET nom_site='$nom', lien='$lien' WHERE id_site=".$id;}

    if(mysqli_query($con,$req)){
        header('location:gestion_siteweb.php');
    }
    else{
        die(mysqli_error($con));
    }
    mysqli_close($con);
    } }

}

?>

<?php 
include("include/header.php");
include("include/navbar.php");
include("include/sidenav.php");
?>  

        <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Gestion des sites web</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Modifier un Site Web</li>
            </ol>

            <form action="" method="post" enctype="multipart/form-data">
            <div class="form-floating mb-3">
                <input class="form-control" id="nom_site" type="text" name="nom" value='<?=$nom?>' required/>
                <label for="nom_site">Nom de site</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="lien_site" type="text" name="lien" value="<?=$lien?>" required/>
                <label for="lien_site">Lien de site</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="image" type="file" name="image"/>
                <label for="image">Logo</label>
            </div>
            <img width='80px' height='45px' src='image/<?=$image_name?>' alt='Erreur_img'>
            <div class="mt-4 mb-0">
                    <input type="submit" class="btn btn-primary btn-block" name="save" value="Enregistrer"/>
            </div>
           
        </div>
        </main>
        
    <?php
    include("include/footer.php");
    include("include/script.php");
    ?>
