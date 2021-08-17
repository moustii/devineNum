<?php
// Pour pouvoir acceder à la variable glabale
session_start();

if(!isset($_SESSION["aleatoire"]) && ["essai"] && ["nombres"]) {
    $_SESSION["aleatoire"] = rand(1, 100);
    $_SESSION["essai"] = 0;
    $_SESSION["nombres"] = [];
}

$nombre;
$status = "";
echo $_SESSION["aleatoire"];

// comparaison nombre saisie et nombre voulue
if($_SESSION["essai"] < 9) {
    if (isset($_GET["chiffre"])){
        $nombre = (int)($_GET["chiffre"]);
        if($_SESSION["essai"] < 10) {

            if($nombre < $_SESSION["aleatoire"]) {
                $status .= "C'est plus";
                $_SESSION["nombres"][] += $nombre;
                $_SESSION["essai"]++;
            }
            else if($nombre > $_SESSION["aleatoire"]) {
                    $status .= "C'est moins";
                    $_SESSION["nombres"][] += $nombre;
                    $_SESSION["essai"]++;
            }
                    else {
                            $status .= "<mark> Well done ! </mark>";
                            $_SESSION["nombres"][] += $nombre;
                            $_SESSION["essai"]++;
                            session_destroy();
                    }
                }
            }
        }
else {
    $_SESSION["essai"]++;
    $status .= "<mark> PERDU...</mark>";
    session_destroy();
}

?>

<!--
    ---------------------------------------------
                        HTML
    ---------------------------------------------
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: #ddd;">

<h1 style="text-align: center;">
    <?= "Devine ?" ?> 
</h1>

<p style="text-align: center;" >Essaie de deviner le numéro compris entre 1 et 100 <br>
    Nombre d'essaie max : 10 <br><br>
    BON CHANCE !</p>
    

<div>
    <form action="" method="GET" style="text-align: center;">
                <br>  
                <input type="number" name="chiffre" placeholder="Entre un nombre entre 1 et 100" autofocus min="1" max="100" style="border: 1px solid black; border-radius:25px; width: 17%; height: 5vh;" value="salut" required>
                <br><br>
                <button>Valider</button >  
    </form>
    <p style="text-align: center; color: 1d1d1d"><?php if(isset($_GET["chiffre"])){ echo $_GET["chiffre"] . " : " . $status;} ?></p>
    <hr>
    <p style="text-align: center; color: 1d1d1d">Nombre d'essai : <?= $_SESSION["essai"] ?></p>
    <hr>
    <p style="text-align: center; color: 1d1d1d">Mauvais numéros : <?php foreach($_SESSION["nombres"] as $values) { echo $values . " . "; } ?></p>
    
</div>


</body>
</html>

