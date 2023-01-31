<?php
require './utils/connexion.php';
include_once('includes/head.php');
$db = new Database();



    if ($email != $_SESSION['email']){
        $stmt = $db->prepare("DELETE FROM users WHERE email = :email");
        $stmt->execute(array(':email' => $_GET['id']));
        header("Location: dashboard.php");
    }

    else {
    echo 'YOU CANT DELETE A USER WHO IS LOGGED IN';
    }

?>



<?php include_once('includes/footer.php'); ?>
