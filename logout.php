

    <?php

    // Initialize the session

    session_start();

     

    // Unset all of the session variables

    $_SESSION = array();

     

    // Destroy the session.

    session_destroy();

     

    // Redirect to same page

    header("location:".htmlentities($_SERVER['HTTP_REFERER']));

    exit;

    ?>

