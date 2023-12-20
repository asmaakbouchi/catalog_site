  <?php
    session_start();
    ob_start();
    include("include/header.php");

    if ($_SESSION["roll"] == 2 || $_SESSION["roll"] == 1) {
        include("include/sidenav.php");
        include("include/navbar.php");
    } else {
        include("include/navbaruser.php");
        include("include/sidenavuser.php");
    }
    ?>
  <?php
    $sup="Disabled";
    $login = $mdp = $remarque = $id='';
    $select = "choisi un site";

    include("include/database.php");
    $req = "select * from bloc_note";
    $res = mysqli_query($con, $req);

    if (isset($_POST["add"])) {
        $nom = $_POST["nom_site"];
        $login = $_POST["login"];
        $mdp = $_POST["password"];
        $remarque = $_POST["remarque"];
        $q = "insert into bloc_note(nom_site,login,password,remarque) values('$nom','$login','$mdp','$remarque')";
        if (mysqli_query($con, $q)) {
            $select = "choisi un site";
            $id=$login = $mdp = $remarque = '';
            header("Refresh:1");
        }
       mysqli_close($con);
    }


    if ($select!="choisir un site" && isset($_POST["update"])){
        $ids=$_POST["id_note"];
        $login = $_POST["login"];
        $mdp = $_POST["password"];
        $remarque = $_POST["remarque"];
        $q2 = "update bloc_note set login='$login',password='$mdp',remarque='$remarque' where id_bloc_note=".$ids ;
        if (mysqli_query($con, $q2)){
            $select = "choisi un site";
            $id=$login = $mdp = $remarque ='';              
        }
        mysqli_close($con);
    }
    
    if (isset($_POST["search"])) {
        if (isset($_POST["list"])) {
            $sup="";
            $nom = $_POST["list"];
            $req1 = "select * from bloc_note where nom_site='$nom'";
            $res1 = mysqli_query($con, $req1);
            if (mysqli_num_rows($res1) > 0) {
                if ($r = mysqli_fetch_assoc($res1)) {
                    $select = $r["nom_site"];
                    $id=$r["id_bloc_note"];
                    $login = $r["login"];
                    $mdp = $r["password"];
                    $remarque = $r["remarque"];
                    //echo "<script> alert('le site est trouvé'); </script>";
                }
            }
        } else {
            $select = "choisi un site";
            echo '<script></script>';
        }
        mysqli_close($con);
    }

    if ( $select!="choisir un site" && isset($_POST["delete"]) ) {
       
        $ids=$_POST["id_note"];
        {
            $query="delete from bloc_note where id_bloc_note=".$ids;
            if(mysqli_query($con,$query)){
                header('location:bloc_note.php');
            }
            else{
                die(mysqli_error($con));
            }
            mysqli_close($con);
        }
    }


    ?>
  <main>
      <div class="container-fluid px-4">
          <h1 class="mt-4">Bloc Notes</h1>
          <div class="row">
              <div class="col-md-8">
                  <ol class="breadcrumb mb-4">
                      <li class="breadcrumb-item active">Gestion des bloc note </li>
                  </ol>
              </div>
              <div class="col-md-3 ms-auto">
                  <a class="btn btn-success ml-4 mb-4" name="add" data-bs-toggle="modal" data-bs-target="#myModal">Ajouter Une note</a>
              </div>
         </div>

          <form action="" method="POST" name="frm1">
              <div class="modal fade" tabindex="-1" id="myModal">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title">Ajouter une Note</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <div class="form-floating mb-3">
                                  <input class="form-control" id="nom_site" type="text" name="nom_site" />
                                  <label for="nom_site">Nom</label>
                              </div>
                              <div class="form-floating mb-3">
                                  <input class="form-control" id="login" type="text" name="login" />
                                  <label for="login">Login</label>
                              </div>
                              <div class="form-floating mb-3">
                                  <input class="form-control" id="password" type="text" name="password">
                                  <label for="password">Mot de passe</label>
                              </div>
                              <div class="form-floating">
                                  <textarea class="form-control" name="remarque" id="remarque" style="height: 200px;"></textarea>
                                  <label for="remarque">Remarque</label>
                              </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                              <button type="submit" class="btn btn-primary" name="add">Ajouter</button>
                          </div>

                      </div>

                  </div>

              </div>
          </form>

          <form action="" method="POST" name="frm2">
              <div class="row">
                  <div class="col-md-2">
                      <select name="list" class="form-select mb-3 " aria-label="Default select example" required>
                          <option hidden selected disabled><?= $select ?></option>
                          <?php while ($row = mysqli_fetch_assoc($res)) 
                          { ?>
                            <option name="nom" value="<?= $row["nom_site"] ?>" > <?= $row["nom_site"] ?> </option>
                          <?php }?>
                      </select>
                  </div>
                  <div class="col-md-6">
                      <input class="btn btn-success" type="submit" value="Rechercher" id="search" name="search">
                    
                      <a data-bs-toggle="modal" data-bs-target="#modal_delete" id="linkDelete">
                        <input id="btn_sup" type="button" value="Supprimer"  class="btn btn-danger" <?=$sup?>>
                        </a>

                        <div class="modal fade" id="modal_delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirmer la suppression d'une note</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Voulez-vous vraiment supprimé 
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    <input class="btn btn-danger"  type="submit" name="delete" value="Supprimer" <?=$sup?>>
                                </div>
                                </div>
                            </div>
                        </div>
                  </div>
              </div>
              <div class="form-floating mb-3" hidden>
                  <input  class="form-control" id="id" type="text" name="id_note" value="<?=$id?>" />
                  <label for="login">id</label>
              </div>
              <div class="form-floating mb-3">
                  <input class="form-control" id="login" type="text" name="login" value="<?= $login ?>" />
                  <label for="login">Login</label>
              </div>
              <div class="form-floating mb-3">
                  <input class="form-control" id="password" type="text" name="password" value="<?= $mdp ?>" />
                  <label for="password">Mot de passe</label>
              </div>
              <div class="form-floating">
                  <textarea class="form-control" name="remarque" id="remarque" style="height: 200px;">
            <?= $remarque ?>
            </textarea>
                  <label for="remarque">Remarque</label>
              </div>
            <div class="mt-5">
                    <a id="linkUpdate" data-bs-toggle="modal" data-bs-target="#modal_update">
                        <button id="btn_up" class="btn btn-primary" <?=$sup?>>Enregistrer </button>
                    </a>
                    <div class="modal fade" id="modal_update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> Confirmer la modification d'une note</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Voulez-vous vraiment modifier cette note ? 
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    <input class="btn btn-primary"  type="submit" name="update" value="Enregistrer la modification" <?=$sup?>>
                                </div>
                                </div>
                            </div>
                    </div>
            </div>
          </form>
      </div>
  </main>
  <?php
    include("include/footer.php");
    include("include/script.php");
    ?>
    <script>
        var linkSupp = document.getElementById("linkDelete");
        var linkUp = document.getElementById("linkUpdate");
        var btn_sup=document.getElementById("btn_sup");
   ;
        if(btn_sup.disabled ){
            linkSupp.removeAttribute("data-bs-target");
            linkUp.removeAttribute("data-bs-target");
        }
        else{
            linkSupp.setAttribute("data-bs-target","#modal_delete");
            linkUp.setAttribute("data-bs-target","#modal_update");
        }
       
    </script>