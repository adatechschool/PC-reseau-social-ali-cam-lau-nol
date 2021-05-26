<?php
    $subscriptionClick = isset($_POST['new_follower']);
    if ($subscriptionClick)
    {
        $new_follower = $_POST['new_follower'];
        $new_followed = $_GET['user_id'];
        echo "<pre>" . print_r($_POST, 1) . "</pre>"; 

        $mysqli = new mysqli("localhost", "root", "root", "socialnetwork");

        $lInstructionSql = "INSERT INTO `followers` (`id`, `followed_user_id`, `following_user_id`) "
                . "VALUES (NULL, "
                . "'" . $new_followed . "', "
                . "'" . $new_follower . "'"
                . ");";
        echo "<pre>" . print_r($lInstructionSql, 1) . "</pre>"; 
        $lesAbonnements = $mysqli->query($lInstructionSql);
        if ( ! $lesAbonnements)
        {
            echo("Échec de la requete : " . $mysqli->error);
        }
    }
    ?>                     