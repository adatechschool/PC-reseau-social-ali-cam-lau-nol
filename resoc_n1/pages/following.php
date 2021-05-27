<?php
    /**
     * Etape 1: récupérer le tableau followers
     */
    $connectedId= $_SESSION['connected_id'];
    $followersInSql = "SELECT * FROM  `followers`  WHERE `followers`.`following_user_id` = ".intval($connectedId)." AND ".$_GET['user_id']."= `followers`.`followed_user_id`" ; 
    $infoFollowers = $mysqli->query($followersInSql);
    $follower = $infoFollowers->fetch_assoc();

    if ($follower){
        ?>
             <input type='button' id='buttonFollowing' name='click' value= "Abonné.e">
            <?php
            
    } else { ?>
    <form action="wall.php?user_id=<?php echo $_GET['user_id'] ?>" method="post">
        <input type='hidden' name='new_follower' value= '<?php echo $_SESSION['connected_id'] ?>'>
        <input type='submit' id='buttonFollowing' name='click' value= "S'abonner">
        </form>
        <?php
        
    }
?>    