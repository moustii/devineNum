<?php
// Pour pouvoir acceder à la variable glabale
session_start();

if(!isset($_SESSION["aleatoire"]) && ["essai"]) {
    $_SESSION["aleatoire"] = rand(1, 100);
    $_SESSION["essai"] = 0;
}

$nombre;
$status = "";

// comparaison nombre saisie et nombre voulue
if (isset($_GET["chiffre"])){
    $nombre = (int)($_GET["chiffre"]);
    switch($nombre){
        case $nombre < $_SESSION["aleatoire"] :
            $status .= "C'est plus";
            $_SESSION["essai"]++;
            break;
        case $nombre > $_SESSION["aleatoire"] :
            $status .= "C'est moins";
            $_SESSION["essai"]++;
            break;
        case $nombre === $_SESSION["aleatoire"] :
            $status .= "<mark> Well done ! </mark>";
            $_SESSION["essai"]++;
            session_destroy();
            break;
        default :
            echo "Erreur de saisie";
    }
   
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

<h2 style="text-align: center;">
    <?= "Entre un chiffre" ?> 
</h2>
    

<div>
    <form action="" method="GET" style="text-align: center;">
                <br>  
                <input type="number" name="chiffre" placeholder="Entre un nombre entre 1 et 100" autofocus min="1" max="100" style="border: 1px solid black; border-radius:5px; width: 17%; height: 7vh;" value="salut">
                <br><br>
                <button>Aller GO</button >  
    </form>
    <p style="text-align: center; color: 1d1d1d"><?php if(isset($_GET["chiffre"])){ echo $_GET["chiffre"] . " : " . $status;} ?></p>
    <p style="text-align: center; color: 1d1d1d"><?= "nombre d'essai : " . $_SESSION["essai"] ?></p>
    
</div>


</body>
</html>

