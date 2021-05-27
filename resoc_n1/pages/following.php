<?php
    /**
     * Etape 1: récupérer le tableau followers
     */
    $followersInSql = "SELECT * FROM `posts`";
    $infoFollowers = $mysqli->query($followersInSql);
    $follower = $infoFollowers->fetch_assoc();
    echo "<pre>" . print_r($follower, 1) . "</pre>";
    if ($_SESSION['connected_id'] === $follower){
        ?>
            <input type='button' id='buttonFollowing' name='click' value= "Abonne.e">
            <?php
            echo "<pre>" . print_r($follower, 1) . "</pre>";
            
    } else { ?>
        <input type='button' id='buttonFollowing' name='click' value= "s'abonner">
        <?php
        echo "<pre>" . print_r($follower, 1) . "</pre>";
    }
?>    