<?php
include_once "../Controller/crud.php";

echo '<br>';

$CrudReclamation = new CrudReclamation();

if (isset($_GET['username']) && !empty($_GET['username'])) 
{
    $CrudReclamation->Delete($_GET['username']);
    header('location:listReclamation.php');
} 

else 
{
    echo "username is not defined";
}
header('location:../View/listReclamation.php');
?>