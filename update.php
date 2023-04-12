<style>
    h4 {
        display: inline-block;
        width: 100px;
    }
</style>

<?php
include "../Controller/crud.php";
$row;
if (isset($_GET['username']) && !empty($_GET['username'])) {
    $CrudReclamation = new CrudReclamation();
    $row = $CrudReclamation->searchByUsername($_GET['username']);
} else {
    die("");
}

?>

<div>
    <h3>UPDATE:</h3>
    <form method="POST" action="../Actions/updateReclamation.php">
        <h4 for="username">Username:</h4>
        <input type="text" value="<?php echo $row["username"] ?>" name="username">
        <br />

        <h4 for="firstname">First Name:</h4>
        <input type="text" value="<?php echo $row["firstname"] ?>" name="firstname">
        <br />

        <h4 for="lastname">Last Name:</h4>
        <input type="text" value="<?php echo $row["lastname"] ?>" name="lastname">
        <br />

        <h4 for="email">Email:</h4>
        <input type="email" value="<?php echo $row["email"] ?>" name="email">
        <br />

        <h4 for="phone_number">Phone Number:</h4>
        <input type="text" value="<?php echo $row["phone_number"] ?>" name="phone_number">
        <br />

        <h4 for="object">Object:</h4>
        <input type="text" value="<?php echo $row["object"] ?>" name="object">
        <br />

        <h4 for="comment">Comment:</h4>
        <textarea name="comment"><?php echo $row["comment"] ?></textarea>
        <br />

        <input type="submit" name="Update" value="Submit">
    </form>
</div>