
<ul class="pagination">
    <li class="info_page">
        <?php
        if(!isset($_GET["num_page"]))
        {
            $page=1;
        }
        else{$page=$_GET["num_page"];}
        ?>
        Page <?=$page?> par <?=$pages?>
    </li>
    
    <li><a href="?num_page=1">Prémier</a></li>
    <?php
    if(isset($_GET["num_page"]) && $_GET["num_page"]>1){ ?>
    <li><a href="?num_page=<?=$_GET["num_page"]-1?>">Précedent</a></li>

    <?php } else{ ?>
        <li><a href="">Précedent</a></li>
    <?php } 
    for($i=1;$i<=$pages;$i++){
    ?>

    <li class="nb_page"><a href="?num_page=<?=$i?>"> <?=$i?></a></li> 

    <?php 
    }
    if(!isset($_GET["num_page"])){ ?>
    <li><a href="?num_page=2">Suivant</a></li>
    <?php } else if($_GET["num_page"]>=$pages){ ?>
    <li><a href="">Suivant</a></li>
    <?php } else { ?>
    <li><a href="?num_page= <?=$_GET["num_page"]+1?>">Suivant</a></li>
    <?php } ?>
    <li><a href="?num_page=<?=$pages?>">Derniér</a></li>      
</ul>
