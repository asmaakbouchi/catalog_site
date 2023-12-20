<?php
session_start();
include("include/database.php");
require_once 'include/mail.php';

if(isset($_POST["submit"])){
    $email=$_POST["email"];
   
    $req="select * from login where email='$email'";   
    $res=mysqli_query($con,$req);

    if(mysqli_num_rows($res)>0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
            try{
                $_SESSION["email_password"]=$email;
                // Destinataire et expéditeur
                $mail->setFrom('asmaa1.dev@gmail.com','SiteWeb');
                $mail->addAddress($email);
                $mail->addReplyTo('asmaa1.dev@gmail.com');
                // Sujet et corps du message
                $mail->Subject = 'Rénissialiser votre mot de passe';
                $mail->Body = "Accéder a la page de réinisialisation de mot de passe <br><br>
                <a style='text-decoration:none;' href='http://localhost/ProjetAdmin/password_confirme.php'> Rénisialisé le mot de passe </a>";
                // Envoyer l'e-mail
                $mail->send();
                //echo"<script>window.location.href='password.php'</script>";
                echo"<script>alert('le lien de réinisialisation de mot de passe a été envoyé dans la boite mail .');</script>";  
            }
            catch(Exception $e){
                echo 'Une erreur s\'est produite lors de l\'envoi du message: ', $mail->ErrorInfo;
            }
        }
    }
    else
    {
        echo"<script>document.getElementById('demo').innerHTML='Ce e-mail est invalide';</script>";
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Récupération du mot de passe</h3></div>
                                    <div class="card-body">
                                        <div class="small mb-3 text-muted">Entrer votre adresse e-mail et nous vous enverrons un lien pour réinitialiser votre mot de passe</div>
                                       
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="email" type="email" name="email" required/>
                                                <label for="email">Adresse e-mail</label>
                                            </div>
                                            <p id="demo"></p>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="btn btn-danger" href="index.php">Retour</a>
                                                <input type="submit" class="btn btn-primary" value="Réinitialiser le mot de passe" name="submit" >
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
