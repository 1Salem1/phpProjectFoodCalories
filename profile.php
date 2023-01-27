<?php

// j'importe ma boite a outils.
require'./utils/connexion.php';
require_once'./utils/fonction.php';
include_once('includes/head.php');
require_once('./utils/Session.php');








//ici je recupère ma session email
if (!isset($_SESSION["email"])){
//dans le cas ou le user n'est pas connecté alors affiche login.
header("Location: login.php");
}
//sinon affiche qu'il est connecté.
else{

$page = [
    "title" => "Profile"
];

include_once('includes/header.php');
?>



<header>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Contact Page!</h1>
</header>
</div>
<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <form method="GET">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $session->get('email')?>" id="email">
                    </div>

                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" name="prenom" value="<?php echo $session->get('user')->prenom?>" class="form-control" id="prenom">
                    </div>

                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" name="age" value="<?php echo $_SESSION['user']['age'];?>" class="form-control" id="age">
                    </div>

                    <select class="form-select" name="sexe" value="<?php echo $_SESSION['user']['sexe'];?>" id="sexe" aria-label="Default select example">


                        <!--<option >Choisie ton sexe</option>-->
                        <option <?php echo $_SESSION['user']['sexe'] === 'homme'? 'selected':'' 
                        ?> value="homme">Homme</option>
                        <option <?php echo $_SESSION['user']['sexe'] === 'femme'? 'selected':'' 
                        ?>value="femme">Femme</option>
                        <option <?php echo $_SESSION['user']['sexe'] === 'les2'? 'selected':'' 
                        ?>value="les2">Les 2</option>
                    </select>
                    
                    <div class="mb-3">
                        <label for="taille" class="form-label mt-2">Taille</label>
                        <input type="range" name="taille" value="<?php echo $_SESSION['user']['taille'];?>" class="form-range" id="taille" min=0 max=255 step="1" oninput="sliderChangeSize
                        (this.value)">
                        <output id="output"><?php echo $_SESSION['user']['taille'];?></output>
                    </div>

                    <div class="mb-3">
                        <label for="poids" class="form-label mt-2">Poids</label>
                        <input type="range" name="poids" value="<?php echo $_SESSION['user']['poids'];?>" class="form-range" id="poids" min=0 max=255 step="1" oninput="sliderChangeWeight
                        (this.value)">
                        <output id="outputBis"><?php echo $_SESSION['user']['poids'];?></output>
                    </div>

      
                </form>



            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

</main>
<footer>

</footer>


<?php include_once('includes/footer.php'); 

}

?>