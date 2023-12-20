<?php
session_start();
$msg="";
include("include/database.php");
require_once 'include/mail.php';

if(isset($_POST["submit"])){
    $email=$_SESSION["email_password"];
    $mdp=$_POST["mdp"];
    $mdp_confirm=$_POST["mdp_confirm"];
    $req="select * from login where email='$email'";   
    if($mdp==$mdp_confirm){
          $res=mysqli_query($con,$req);
        if(mysqli_num_rows($res)>0)
        {
            while($row=mysqli_fetch_assoc($res))
            {
                $req2=" update login set password='$mdp' where email='$email' "; 
                $res2=mysqli_query($con,$req2);
                if($res2){
                header("Location: index.php");
                }

            }
        } 
    }
    else{
        //echo"<script> document.getElementById('demo').innerHTML='les deux mot passe sont differents'; </script>";
        $msg="Les deux mot de passes sont différents!"; 
    }
    mysqli_close($con);
 
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Oublier le mot de passe</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </head>                                     
    <body class="bg-light">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Nouveau mot de passe</h3></div>
                                    <div class="card-body">
                                        <div class="small mb-3 text-muted">Modifier votre mot de passe mot de passe</div>
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="mdp" type="password" name="mdp" required/>
                                                <label for="mdp">Mot de passe</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="mdp" type="password" name="mdp_confirm" required/>
                                                <label for="mdp">Confirmation du passe</label>
                                            </div>
                                            <p class="mt-3 mb-0 text-center" id=error style='color:red'><?=$msg?></p>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                               
                                                <input type="submit" class="btn btn-primary" value="Enregistrer" name="submit" >
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-secondary mt-auto">
                    <div class="container-fluid px-4">
                        <div class="small">
                            <div class="text-center text-light">Copyright &copy; Your Website 2023</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
       
    </body>
</html>
