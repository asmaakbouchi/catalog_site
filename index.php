
<?php
session_start();
?>
<?php
$msg='';
if (isset($_POST["connecter"]))
{
include("include/database.php");
$email=$_POST["email"];
$password=$_POST["password"];
$req="select * from login where email='$email' and password='$password'";
$res=mysqli_query($con,$req);

if(mysqli_num_rows($res)>0)
{
    while($rows=mysqli_fetch_assoc($res))
    {
        $_SESSION["id_login"]=$rows["id_login"];
        $_SESSION["nom"]=$rows["nom"];
        $_SESSION["prenom"]=$rows["prenom"];
        $_SESSION["email"]=$rows["email"];
        $_SESSION["password"]=$rows["password"];
        $_SESSION["tel"]=$rows["tel"];
        $_SESSION["roll"]=$rows["roll"];
        header("Location: home.php");  
    }
}
else{             
    //echo "<script>document.getElementById('error').textContent='Le nom d\'utilisateur ou le mot de passe incorrect';</script>";
    $msg='Le nom d\'utilisateur ou le mot de passe incorrect';
}
mysqli_close($con);}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/mon_style.css" rel="stylesheet" />
</head>

<body >
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6" style='margin-top:6%'>
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Connexion</h3></div>
                                <div class="card-body">    
                                    <form action="index.php" name="index" method="POST" >
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="email"  type="email" name="email" required/>
                                            <label for="email">Email</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="password" type="password" name="password"  required/>
                                            <label for="password">Mot de passe</label>
                                            <input type="checkbox" name="mdp" id="mdp" onClick='show()'> <span  class="small text-secondary">Afficher le mot de passe</span>
                                        </div>
                                        <p class="mt-3 mb-0 text-center" id=error style='color:red'><?=$msg?></p>

                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small text-secondary"  href="register.php">J'ai pas un compte ?</a>
                                            <button class="btn btn-dark" type="submit" name="connecter"> Se Connecter</button>
                                        </div> 

                                        <a class="small text-secondary"  href="password.php">J'ai oublié le mot de passe</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-5 ms-auto mt-5 rounded-lg" >                  
                            <img class="img-login" width="510px" height="460px"  src="image/login.jpg" alt="erreur">
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-secondary text-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="small">
                        <div class="text-center">Copyright &copy; Your Website 2023</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript"  src="js/scripts.js"></script>
    <script type="text/javascript"  src="js/script2.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</body>
</html>
