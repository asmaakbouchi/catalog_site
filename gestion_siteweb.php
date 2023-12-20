<?php session_start();?>

<?php 
include("include/header.php");?>
<?php
include("include/navbar.php");
include("include/sidenav.php");
?>  

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Gestion des sites web</h1>
            <div class="row">
            <div class="col-md-8"> 
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">La liste des sites</li>
                </ol> 
            </div> 
            <div class="col-md-3 ms-auto">
                <a class="btn btn-success ml-4 mb-4" href="ajoutersiteweb.php">Ajouter un site web</a>
            </div>
            </div>

            <form action="gestion_siteweb.php" method="post">
            <table class="table table-hover ">
                <thead >
                    <tr class="bg-warning">
                    <th id='hide' scope="col">Identifiant </th>
                    <th scope="col">Nom</th>
                    <th id='hide' scope="col">Lien </th>
                    <th scope="col">Logo</th>
                    <th scope="col">Operations</th>       
                    </tr>
                </thead> 
                <tbody>
                <?php
                   include("include/database.php");

                   //concerne la pagination
                   $record=mysqli_query($con,"select * from site_web");
                   include("script.php");
                   $req="select * from site_web limit $start,$affiche_rows";
                    $res=mysqli_query($con,$req);
                    if(mysqli_num_rows($res)>0)
                    {
                        while($rows=mysqli_fetch_assoc($res))
                        {
                            $id_site=$rows["id_site"];
                            $nom_site=$rows["nom_site"];
                            $lien_site=$rows["lien"];
                            $name_image=$rows["logo"];
                            echo
                            "
                            <tr>
                            <th scope='row' id='hide'>$id_site</th>
                            <td>$nom_site</td>
                            <td  id='hide' >$lien_site</td>
                            <td><img width='60px' height='30px' src='image/$name_image' alt='Erreur_img'></td>
                            <td id='operation'>
                            <a class='btn btn-primary' name='modifier' href='editer.php?updateid=$id_site'><i class='fa-solid fa-pen-to-square'></i></a>
                            <a class='btn btn-danger' name='supprimer' href='supprimer.php?deleteid=$id_site'><i class='fa-solid fa-trash-can'></i></a>
                            </td>
                            </tr>";
                            }
                    }                       
                ?>
                </tbody>

                </form>

            </table>
            <?php include("include/pagination.php"); ?>

            
        </div>
    </main>
 
    <?php
    include("include/footer.php");
    include("include/script.php");
    ?>

