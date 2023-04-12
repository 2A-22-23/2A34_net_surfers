<?php
include_once "../Controller/crud.php";

$CrudReclamation = new CrudReclamation();


if (
    isset($_POST['username']) &&
    isset($_POST['firstname']) &&
    isset($_POST['lastname']) &&
    isset($_POST['email']) &&
    isset($_POST['phone_number']) &&
    isset($_POST['object']) &&
    isset($_POST['comment'])
) {
    if (
        !empty($_POST['username']) &&
        !empty($_POST['firstname']) &&
        !empty($_POST['lastname']) &&
        !empty($_POST['email']) &&
        !empty($_POST['phone_number']) &&
        !empty($_POST['object']) &&
        !empty($_POST['comment'])
    ) {
        $o = new reclamation
        (
            $_POST['username'],
            $_POST['firstname'],
            $_POST['lastname'],
            $_POST['email'],
            $_POST['phone_number'],
            $_POST['object'],
            $_POST['comment']
        );
        CrudReclamation::Update($o);

        header('location:../View/listReclamation.php');

    } else {
        header('location:../View/listReclamation.php');
    }
} else {
    header('location:../View/listReclamation.php');
}
?>