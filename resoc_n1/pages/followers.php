<?php 
require 'header.php'; 
?>
        <div id="wrapper">          
            <aside>
                <img src = "user.jpg" alt = "Portrait de l'utilisatrice"/>
                <section>
                    <h3>Présentation</h3>
                    <p>Sur cette page vous trouverez la liste des personnes qui
                        suivent les messages de l'utilisatrice
                        n° <?php echo $_GET['user_id'] ?></p>

                </section>
            </aside>
            <main class='contacts'>
                <?php
                // Etape 1: récupérer l'id de l'utilisateur
                $userId = $_GET['user_id'];
                // Etape 2: se connecter à la base de donnée
                $mysqli = new mysqli("localhost", "root", "root", "socialnetwork");
                // Etape 3: récupérer le nom de l'utilisateur
                $laQuestionEnSql = "SELECT `users`.*"
                        //. "`followers`.`followed_user_id` as author_id,  " 
                        . "FROM `followers` "
                        . "LEFT JOIN `users` ON `users`.`id`=`followers`.`following_user_id` "
                        . "WHERE `followers`.`followed_user_id`='" . intval($userId) . "'"
                        . "GROUP BY `users`.`id`"
                ;
                $lesInformations = $mysqli->query($laQuestionEnSql);
                // Etape 4: à vous de jouer
                //@todo: faire la boucle while de parcours des abonnés et mettre les bonnes valeurs ci dessous 
                while ($follower = $lesInformations->fetch_assoc())
                {
                ?>
                <article>
                    <img src="user.jpg" alt="blason"/>
                    <h3>
                    <nav>
                        <a href="wall.php?user_id=<?php echo $follower['id'] ?>"><?php echo $follower['alias'] ?></a>
                    </nav>
                    </h3>
                    
                    <p><?php echo $follower['id'] ?></p>
                </article>
                <?php
                }
                ?>
            </main>
        </div>
    </body>
</html>
