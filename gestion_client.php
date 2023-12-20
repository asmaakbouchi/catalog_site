<?php session_start();?>

<?php 
include("include/header.php");
include("include/navbar.php");
include("include/sidenav.php");
?>  
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Gestion des utilisateur</h1>
                <div class="row">
                <div class="col-md-8"> 
                    <ol class="breadcrumb mb-4">
                      <li class="breadcrumb-item active">La liste des utilisateur</li>
                    </ol> 
                </div> 
                <div class="col-md-3 ms-auto">
                    <a class="btn btn-success ml-4 mb-4" href="ajouter_user.php">Ajouter un utilisateur</a>
                </div>
                </div>

                <form action="" method="post">
                <table class="table table-hover ">
                    <thead >
                        <tr class="bg-warning">
                            <th scope="col">Identifiant</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prènom</th>
                            <th id='hide' scope="col">Téléphone</th>
                            <th id='hide' scope="col">Email</th>
                            <th id='hide' scope="col">Rôle</th>
                            <th scope="col">Operations</th>       
                        </tr>
                    </thead> 
                    <tbody>
                    <?php
                        include("include/database.php");
                        
                        //concerne la pagination
                        $record=mysqli_query($con,"select * from login");
                        include("script.php");

                        $req="select * from login where roll <> 1 limit $start,$affiche_rows ";
                        $res=mysqli_query($con,$req);
                        if(mysqli_num_rows($res)>0)
                        {
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                $id=$rows["id_login"];
                                $nom=$rows["nom"];
                                $prenom=$rows["prenom"];
                                $email=$rows["email"];
                                $tel=$rows["tel"];
                                $tel=$rows["tel"];
                                $roll=$rows["roll"];
                                if($roll==1){$tache="Admin";}
                                else if($roll==2){$tache="Sous admin";}
                                else {$tache="utilisateur";}
                               
                                $accee="";

                                if(isset($_SESSION["roll"])){
                                    $roll_active=$_SESSION["roll"];
                                    if($roll_active==1 && $roll==1){
                                    $accee="hidden";
                                    }
                                    else if ($roll_active==2 && ($roll==1 || $roll==2)){
                                    $accee="hidden";
                                    } 
                                }
                               
                                
                               echo
                               "<tr>
                                <th scope='row'>$id</th>
                                <td>$nom</td>
                                <td>$prenom</td>
                                 <td id='hide'>$tel</td>
                                <td id='hide'>$email</td>
                                <td id='hide'>$tache</td>
                                <td id='operation'>
                                <a class='btn btn-primary' name='modifier' href='detail_user.php?id_login=$id' ><i class='fa-solid fa-circle-info'></i></a>
                                <a class='btn btn-danger' name='supprimer' href='supprimer.php?id_login=$id' $accee ><i class='fa-solid fa-trash-can'></i></a>
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

