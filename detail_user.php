<?php
include("include/database.php");
if(isset($_GET["id_login"]))
{
$id=$_GET["id_login"];
$req1="select * from login where id_login=$id";
$res1=mysqli_query($con,$req1);
if(mysqli_num_rows($res1)>0)
{
    while($rows=mysqli_fetch_assoc($res1))
    {
       $nom=$rows["nom"];
       $prenom=$rows["prenom"];
       $email=$rows["email"];
       $tel=$rows["tel"];
       $roll=$rows["roll"];
    }
}

if(isset($_POST["retour"])){
header('location:gestion_client.php');
}

if ($roll==1){
    $roll_name="Admin";
}
else if ($roll==2){
    $roll_name="Sous admin";
}
else if ($roll==3){
    $roll_name="Utilisateur";
}

}
/*
if(isset($_POST["Enregistrer"]))
{
    if(isset($_POST["nom"]) && isset($_POST["prenom"]) &&isset($_POST["email"]) && isset($_POST["tel"]) && isset($_POST["password"]) ){
        $nom=$_POST["nom"];
        $prenom=$_POST["prenom"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $tel=$_POST["tel"];
        $req="UPDATE login SET nom='$nom', prenom='$prenom', email='$email' , tel='$tel', password='$password' WHERE id_login=".$id;
        if(mysqli_query($con,$req)){
            header('location:gestion_client.php');
        }
        else{
            die(mysqli_error($con));
        }
        mysqli_close($con);
        } 
    }

}
*/


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

            <form action="" method="POST" > 
                    <div class="form-floating mb-3">
                        <input class="form-control" id="nom" type="text" name="nom" value="<?=$nom?>"  disabled/>
                        <label for="nom">Nom </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="prenom" type="text" name="prenom" value="<?=$prenom?>" disabled>
                        <label for="prenom">Prenom</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="tel" type="number" name="tel" value="<?=$tel?>" disabled/>
                        <label for="tel">Téléphone </label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" type="text" name="email" value="<?=$email?>" disabled/>
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="roll" type="text" name="roll" value="<?=$roll_name?>" disabled/>
                        <label for="email">Rôle</label>
                    </div>
                 
                    <div class="mt-4 mb-0">
                        <input class="btn btn-primary btn-block" id="retour" type="submit" name="retour" value="Retour"/> 
                    </div>
                </form>
        </div>
        </main>
     <?php
      include("include/footer.php");
      include("include/script.php");
     ?>