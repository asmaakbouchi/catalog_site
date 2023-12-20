
<?php
session_start();
?>
<?php
include("include/database.php");
if(isset($_SESSION["id_login"]) && isset($_SESSION["roll"]))
{
    $id=$_SESSION["id_login"];
    $roll=$_SESSION["roll"];
    $req1="select * from login where id_login=$id";
    $res1=mysqli_query($con,$req1);
    if(mysqli_num_rows($res1)>0)
    {
        while($rows=mysqli_fetch_assoc($res1))
        {
        $nom=$rows["nom"];
        $prenom=$rows["prenom"];
        $email=$rows["email"];
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
                $password=$rows["password"];
            }
        }
        }
    }

    if(isset($_POST["Enregistrer"]))
    {
        if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["email"]) && isset($_POST["tel"]) && isset($_POST["password"]) ){
            $nom=$_POST["nom"];
            $prenom=$_POST["prenom"];
            $email=$_POST["email"];
            $password=$_POST["password"];
            $tel=$_POST["tel"];
            $req="UPDATE login SET nom='$nom', prenom='$prenom', email='$email' , tel='$tel', password='$password' WHERE id_login=".$id;
            if(mysqli_query($con,$req)){
                
                 header('location:home.php');
                
            }
            else{
                die(mysqli_error($con));
            }
            mysqli_close($con);
            } 
    }
}
else{
    $nom=$prenom=$password=$tel=$email="";
    $roll=1;
}
?>

<?php 
include("include/header.php");
if($roll==2 || $roll==1){
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
            <h1 class="mt-4">Gestion de Profile</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Modifier Mon Profile</li>
            </ol>

            <form action="" method="POST" > 
                    <div class="form-floating mb-3">
                        <input class="form-control" id="nom" type="text" name="nom" value="<?=$nom?>" required/>
                        <label for="nom">Nom </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="prenom" type="text" name="prenom" value="<?=$prenom?>" required/>
                        <label for="prenom">Prenom</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="tel" type="text" name="tel" value="<?=$tel?>" required/>
                        <label for="tel">Téléphone </label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" type="text" name="email" value="<?=$email?>" required/>
                        <label for="email">Email</label>
                    </div>
                   <div class="form-floating mb-3">
                        <input class="form-control" id="password" type="password" name="password" value="<?=$password?>" required/>
                        <label for="password">Mot de passe</label>
                        <input type="checkbox" name="mdp" id="mdp" onClick='show()'> <span  class="small text-secondary">Afficher le mot de passe</span>
                   </div>
                    
                    <div class="mt-4 mb-0">
                        <input type="submit" class="btn btn-primary btn-block" name="Enregistrer" value="Enregistrer"/>
                    </div>
                </form>
        </div>
        </main>

    <?php
    include("include/footer.php");
    include("include/script.php");
    ?>

