
<?php
if(isset($_POST["Enregistrer"])){
    include("include/database.php");
    $nomsite=$_POST["nom_site"];
    $liensite=$_POST["lien_site"];
    $image_name="web.png";
    if(!empty($_FILES["image"]["name"])){
        $image=$_FILES["image"]["name"];
        $image_name=uniqid().$image;
        move_uploaded_file($_FILES["image"]["tmp_name"],"image/".$image_name);
    }
    $req="insert into site_web(nom_site,lien,logo)values('$nomsite','$liensite','$image_name');";
    try{
      if(mysqli_query($con,$req))
      {
        echo"<script>window.location.href='gestion_siteweb.php';</script>";
      }
    }
    catch(mysqli_sql_exception $e) {echo "<p style='margin-top:20%'> $e</p> ";}
    mysqli_close($con); 
}


if(isset($_POST["Retour"])){
    echo"<script>window.location.href='gestion_siteweb.php';</script>";  
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
                <li class="breadcrumb-item active">Ajouter un Site Web</li>
            </ol>

            <form action="ajoutersiteweb.php" method="POST" enctype="multipart/form-data"> 
                <div class="form-floating mb-3">
                    <input class="form-control" id="nom_site" type="text" name="nom_site" required/>
                    <label for="nom_site">Nom de site</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="lien_site" type="text" name="lien_site" required/>
                    <label for="lien_site">Lien de site</label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" id="image" type="file" name="image" value="" />
                    <label for="image">Logo</label>
                </div>

                <div class="mt-4 mb-0 flex">
                    <input type="submit" class="btn btn-primary btn-block" name="Enregistrer" value="Enregistrer"/>
                    <a href="gestion_siteweb.php" class="btn btn-danger btn-block" name="Retour" > Retour</a>
                 </div>
            </form>
        </div>
        </main>
    
    <?php
    include("include/footer.php");
    include("include/script.php");
    ?>
