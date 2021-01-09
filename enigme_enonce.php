<!DOCTYPE html>
<html>
    <head>
		<meta charset= »utf-8» />
		<link rel="stylesheet" href="style.css" />
		<title>Escape game</title>
    </head>
    <body>
        
        <header>
            <h1>Soirée au Caesars Palace</h1>
        </header>
        
        <?php
            
            $enigme=$_GET['enigme'];
            
            require "connexion.php";
            
            $bdd = connexion_bd();
            
            $requete = $bdd->query("SELECT * FROM enigme WHERE id='$enigme'");
            while ($donnees = $requete->fetch()){
                $indice = $donnees['indice'];
                echo "<a href='enigme.php'><button class='back_menu'>Retour</button></a>";
                //Indice
                echo "<p class=ind>";
                    echo $indice;
                echo "</p>";
                
                //Vérifiez si la réponse est bonne
                echo "<form id='bouton' name='bouton' method='post' action='enigme_enonce.php?enigme=$enigme' >";
                    echo "<input type=text class=code1 name=code autocomplete='off'>";
                    echo "<button type=submit name='bouton' class=send_answer>Validez</button>";
                echo "</form>";
                
                //Action quand on appuie sur le bouton
                    
                $essai = $donnees['nb_essai'];
                
                if(isset($_POST['bouton'])) {
                    $solution = $donnees['solution'];
                    
                    if($essai != 0){
                        
                        //Modification de la bdd si le code est bon
                        if($_POST['code'] == $solution ){
                            $update = $bdd->exec("UPDATE `enigme` SET `status` = 'true' WHERE `enigme`.`id` = '$enigme'");
                            $status = $donnees['status'];?>
                            <meta http-equiv="refresh" content="1; url=enigme.php" /><?php
                            
                        }
                        else{
                            $new_value = $essai - 1;
                            $update = $bdd->exec("UPDATE `enigme` SET `nb_essai` = '$new_value' WHERE `enigme`.`id` = '$enigme'");
                            if($essai == 1){
                            ?>
                                <meta http-equiv="refresh" content="1; url=enigme.php" />
                                <script>alert("Toujours pas, vous n'avez plus d'essai :(");</script>
                            <?php
                            }
                            else{
                                ?>
                                <meta http-equiv="refresh" content="1; url=enigme_enonce.php?enigme=<?php echo $enigme;?>" />
                            <?php
                            }
                        }
                    }
                    else{
                        ?>
                            <meta http-equiv="refresh" content="1; url=enigme.php" />
                            <script>alert("Vous n'avez plus d'essai :(");</script>
                        <?php
                    }
                    
                }
                //Nombre d'essai restant
                echo "<p class=ind>";
                    echo "Nombre d'essai restant : " . $essai;
                echo "</p>";
            
            }
            
            if($enigme == "3"){
                ?>
                    <audio autoplay loop>
                        <source src="morse.wav" type="audio/ogg">
                    </audio>
                <?php
            }
            $requete->closeCursor();
        ?>
        
    </body>
</html>
