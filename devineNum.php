<?php

$alea = 5;
$nombre;
$status = "";


if (isset($_GET["chiffre"])){
    $nombre = (int)($_GET["chiffre"]);

    switch($nombre){
        case $nombre < $alea :
            $status .= "C'est plus";

            break;
        case $nombre > $alea :
            $status .= "C'est moins";
            break;
        case $nombre === $alea :
            $status .= "<mark> Well done ! </mark>";
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
    <script>
        var button = document.querySelector('.btn')
        button.addEventListener('click', e => console.log('click'))
    </script>
</head>
<body style="background-color: #ddd;">

<h2 style="text-align: center;">
    <?= "Entre un chiffre" ?> 
</h2>
    

<div>
    <form action="" method="GET" style="text-align: center;">
                <br>  
                    <input type="number" name="chiffre" placeholder="Entre un nombre entre 1 et 100" autofocus min="1" max="100" style="border: 1px solid black; border-radius:5px; width: 17%; height: 7vh;">
                    <br><br>
                    <button class="btn">Aller GO</button >  
    </form>
    <p style="text-align: center; color: 1d1d1d"><?php if(isset($_GET["chiffre"])){ echo $_GET["chiffre"] . " : " . $status;} ?></p>
    

</div>


    


    







</body>
</html>

