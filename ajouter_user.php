<?php
session_start();
$acces="";
$roll_active=$_SESSION["roll"];
if($roll_active=2)
{$acces="hidden";}

$req1="select * from login where email='$email'";
    $res= mysqli_query($con,$req1);
    if(mysqli_num_rows($res)>0){
        $msg="Cette adresse e-mail est déjà associée à un autre compte"; 
        mysqli_close($con);
    }
    else
    {
        $req2="select * from login where tel='$tel'";
        if(mysqli_num_rows(mysqli_query($con,$req2))>0){
            $msg="Ce numéro du téléphone est déja associée à un autre compte";
        }
        else{

            if(isset($_POST["Enregistrer"])){
                include("include/database.php");
                $nom=$_POST["nom"]; 
                $prenom=$_POST["prenom"];
                $email=$_POST["email"];
                $tel=$_POST["tel"];
                $password=$_POST["password"];
                $roll=$_POST["roll"];
                if(!isset($roll)){ $roll=3;}

                $req="insert into login(nom,prenom,email,tel,password,roll)values('$nom','$prenom','$email','$tel','$password','$roll');";
                try{
                if(mysqli_query($con,$req))
                { echo"<script>window.location.href='gestion_client.php';</script>";}
                }
                catch(mysqli_sql_exception $e) {echo "<p style='margin-top:20%'> $e</p> ";}
                mysqli_close($con); 
            }
        }
}
?>


<?php 
include("include/header.php");
include("include/navbar.php");
include("include/sidenav.php");
?>  
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Gestion des utilisateus</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Ajouter un utilisateur</li>
                    </ol>
                    <form action="" method="POST" > 
                        <div class="form-floating mb-3">
                            <input class="form-control" id="nom" type="text" name="nom" required/>
                            <label for="nom">Nom </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="prenom" type="text" name="prenom" required/>
                            <label for="prenom">Prenom</label>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <input class="form-control" id="tel" type="number" name="tel" value="<?=$tel?>" required/>
                            <label for="tel">Téléphone </label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" type="text" name="email" required/>
                            <label for="email">Email</label>
                        </div>
                    
                        <div class="form-floating mb-3">
                            <input class="form-control" id="password" type="password" name="password" required/>
                            <label for="password">Mot de passe</label>
                        </div>

                        <select class="form-select" aria-label="Default select example" name="roll" required>
                            <option selected disabled>Choisir un rôle</option>
                            <option value="1" <?=$acces?> >Admin</option>
                            <option value="2" <?=$acces?> >sous admin</option>
                            <option value="3">Utilisateur</option>
                        </select>
                        
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

