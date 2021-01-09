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
            require "connexion.php";

            $bdd = connexion_bd();
             
            $requete = $bdd->query('SELECT * FROM enigme');
             
            while ($donnees = $requete->fetch()){
                $enigme = $donnees['id'];
                $status = $donnees['status'];
                $essai = $donnees['nb_essai'];
                if($enigme < "7"){
                    if ($status == "true"){
                        echo "<div class='border code true$enigme'>";
                    }
                    else{
                        echo "<div class='border code'>";
                    }
                    
                    if ($status == "false" and $essai != 0){
                        echo "<a href='enigme_enonce.php?enigme=$enigme'>";
                    }
                    
                    echo "<p class=code_txt>";
                    echo "Code n°" . $donnees['id'];
                    echo "</p>";
                    echo "</div>";
                    if ($status == "false" and $essai != 0){
                        echo "</a>";
                    }
                }
            }
             
            $requete->closeCursor();
            
            $count = $bdd->query("SELECT COUNT(*) FROM enigme where status='true'")->fetchColumn();
            $count++;
            
            $requete2 = $bdd->query("SELECT * FROM indication WHERE id=$count");
            
            while ($donnees2 = $requete2->fetch()){
                $indication = $donnees2['contenu'];
                
                echo "<div class=indication>";
                    echo "<p id='indic'>";
                        echo $indication;
                    echo "</p>";
                echo "</div>";
            }
            
            
            $requete2->closeCursor();
        
        ?>
        
        <a href='enigme_final.php'>      
            <div class='border code final'>
                <p>Code final</p>
            </div>
        </a>
        
        <img src="generate.png" class="qrcode" alt="qr code">
        <img src="jules_cesar.png" class="cesar" alt="cesar">
    </body>
</html>