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
        ?>
        
        <a href='enigme.php'><button class='back_menu'>Retour</button></a>
           
        <p class=ind>Accès Enigme final</p>
        
        <form id='bouton' name='bouton' method='post' action='enigme_final.php' >
            <input type=text class=code1 name=code autocomplete="off">
            <button type=submit name='bouton' class=send_answer>Validez</button>
        </form>
        
        <?php
            $requete = $bdd->query('SELECT * FROM final');
            $requete = $bdd->query("SELECT * FROM enigme WHERE id='7'");
            while ($donnees = $requete->fetch()){
                    $essai = $donnees['nb_essai'];
                    $solution = $donnees['solution'];
                    
                //Action quand on appuie sur le bouton
                  
                if(isset($_POST['bouton'])) {
                    
                    if($_POST['code'] == $solution){
                        $update = $bdd->exec("UPDATE `enigme` SET `status` = 'true' WHERE `enigme`.`id` = '7'");
                        ?>
                            <meta http-equiv="refresh" content="1; url=cle.php" />
                        <?php
                    }
                    else{
                        $new_value = $essai - 1;
                        $update = $bdd->exec("UPDATE `enigme` SET `nb_essai` = '$new_value' WHERE `enigme`.`id` = '7'");
                        if($new_value == 0){
                            ?>
                                <meta http-equiv="refresh" content="1; url=enigme.php" />
                                <script>alert("Vous n'avez plus d'essai :(, c'est perdu");</script>
                            <?php
                        }
                    }
                    
                }
            }
        
        ?>
        
        <img src=attention.png class="att1 a1"alt="signalisation attention">
               
        <img src=attention.png class="att2 a1"alt="signalisation attention">
        
        <p class="attfinal">Pour cette enigme vous n'avez que 2 essais</p>
        
    </body>
</html>
