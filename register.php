
<?php 
$msg="";

if(isset($_POST["cree"])){
    include("include/database.php");
    $password=$_POST["password"];
    $password_confirm=$_POST["password-confirm"];
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $email=$_POST["email"]; 
    $tel=$_POST["tel"]; 

    $req1="select * from login where email='$email'";
    $res= mysqli_query($con,$req1);
    if(mysqli_num_rows($res)>0){
        $msg="Cette adresse e-mail est déjà associée à un autre compte"; 
        mysqli_close($con);
    }else
    {
    $req2="select * from login where tel='$tel'";
    if(mysqli_num_rows(mysqli_query($con,$req2))>0){
        $msg="Ce numéro du téléphone est déja associée à un autre compte";
    }
    else{
        if( $_POST['password-confirm'] != $_POST['password'] ) {
        //echo"<script>alert('les deux mot de passe sont different');</script>";
        $msg="Les deux mot de passes sont différents!";
        }
        else{ 
            $req="insert into login(tel,password,nom,prenom,email)values('$tel','$password','$nom','$prenom','$email');";
            try{
            if(mysqli_query($con,$req))
            { echo"<script>window.location.href='index.php';</script>";}
            }
            catch(mysqli_sql_exception $e)
            { echo "<p style='text-align:center; margin-top:20%'> $e </p> ";}
            mysqli_close($con);
        }
    } 
    }
   

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
    <title>Inscription</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/mon_style.css" rel="stylesheet" />
  
</head>

<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container" >
                    <div class="row justify-content-center mb-5">
                        <div class="col-md-6">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Crée un compte</h3></div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputFirstName" type="text" name="prenom" required />
                                                    <label for="inputFirstName">Prènom</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="inputLastName" type="text" name="nom" required/>
                                                    <label for="inputLastName">Nom</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail"  type="email" name="email" required />
                                            <label for="inputEmail">Adresse e-mail</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="tel" type="text" name="tel" required/>
                                            <label for="tel">Téléphone </label>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputPassword"  name="password" type="password" pattern=".{8,12}" required title="minimum 8 caractères" />
                                                    <label for="inputPassword">Mot de passe</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control"  id="PasswordConfirm" name="password-confirm" type="password"  pattern=".{8,12}" required title="minimum 8 caractères"/>
                                                    <label for="PasswordConfirm">Confirmer le mot de passe</label>
                                                </div>   
                                            </div>
                                            <div class="inline">
                                            <input type="checkbox" name="mdp" id="mdp" onClick='show()'> 
                                            <span  class="small text-secondary">Afficher le mot de passe</span>
                                            </div>
                                                <p class="mt-3 mb-0 text-center" id=error style='color:red'><?=$msg?></p>

                                        </div>
                                        <div class="mt-3 mb-0">
                                            <div class="d-grid">
                                            <input type="submit" class="btn btn-dark btn-block" value="Crée un compte" name="cree"></div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-2">
                                    <div class="small"><a class="text-secondary" href="index.php">J'ai deja un compte</a></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5 ms-auto mt-5 rounded-lg" >                  
                            <img class="img-login" height="500px"  src="image/register.jpg" alt="erreur">
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
     <script src="js/scripts.js"></script>
     <script src="js/script2.js"></script>
     <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</body>
</html>
