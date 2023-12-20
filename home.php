
<?php 
session_start();
include("include/header.php");

if($_SESSION["roll"]==2 || $_SESSION["roll"]==1){
    include("include/sidenav.php");
    include("include/navbar.php");
 }
 else{
   include("include/navbaruser.php");
   include("include/sidenavuser.php");
 }
?>  

        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Accueil</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Tableaux de bord</li>
                </ol>

                <div class='row' style=" margin-left:2%">     
                <?php
                        include("include/database.php");
                        $req="select * from site_web";
                        $res=mysqli_query($con,$req);
                        if(mysqli_num_rows($res)>0)
                        {
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                $id_site=$rows["id_site"];
                                $nom_site=$rows["nom_site"];
                                $lien_site=$rows["lien"];
                                $image_name=$rows ["logo"];
                                echo'
                                <div id="hcard" class="card col-md-4" style="width:240px; margin:5px">
                                <img id="hlogo"  style="align-content:center; height:85px; width: 90%;"  class=" mt-4" src="image/'.$image_name.'" alt="Card image">
                                <div class="card-body">
                                    <h6 id="htext" class="card-title">'.$nom_site.'</h6>
                                    <p class="card-text"></p>
                                    <a href="'.$lien_site.'" class="btn btn-primary mt-0 mb-0" >Accéder <i class="fa-solid fa-circle-right"></i> </a>
                                </div>
                                </div>';
                            }
                        }      
                    ?>               
            </div>
            </div>
        </main>
    <?php
    include("include/footer.php");
    include("include/script.php");
    ?>
