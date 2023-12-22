<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
<?php

class Gaston {
    function TrierCourrierEnRetard(int $nbLettres) {
        echo "Quoi, " . $nbLettres . " lettre(s) à trier ? </br>";
        try {
            echo "OK, OK, je vais m'y mettre... </br>";
            if ($nbLettres > 2) {
                throw new Exception("Beaucoup trop de lettres...");
            }

            echo "Ouf, j'ai fini.</br>";

        } 
        catch (Exception $e) {
            echo "<div class='alert alert-danger' > M'enfin ! " . $e->getMessage()."</div>";
        }
        echo "<div class='alert alert-success'>Après tout ce travail, une sieste s'impose. </div>";
    }  

    function FaireSignerContrats() {
        try {
            echo "Encore ces contrats ? OK, je les imprime...</br>";
            $this->ImprimerContrats();
            echo "A présent une petite signature...</br>";
            $this->AjouterSignature();
            echo "Fantasio, les contrats sont signés !";
        } catch (Exception $e) {
            echo "<div class='alert alert-danger' > M'enfin ! " . $e->getMessage()."</div>";
        }
    }

    function AjouterSignature() {
        echo "Signez ici, M'sieur Demesmaeker.";
    }

    function ImprimerContrats() {
        echo "D'abord, mettre en route l'imprimante.";
        $this->AllumerImprimante();
        echo "Voilà, c'est fait !";
    }

    function AllumerImprimante() {
        echo "Voyons comment allumer cette machine...";
        throw new Exception("Mais qui a démonté tout l'intérieur ?");
    }
}
?>

<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
?>

<div class="alert alert-warning">
    <?php echo "Debout Gaston ! Il faut trier le courrier ! ";
    $gaston1 = new Gaston();

    $gaston1->TrierCourrierEnRetard(5);
     ?>
     <div class="alert alert-warning" >
        <?php echo "Gaston, Mr, Demesmaeker arrive, faites vite !"; 

        ?>
        
    </div>

    <div class="alert alert-warning" >
        <?php 
            $gaston1->FaireSignerContrats();
        ?>
        
    </div>

</div>
</body>
</html>



    