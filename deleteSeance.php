<?php
    require_once '../controller/coachingc.php';

    if (isset($_POST['seance_id'])) {
        $id_seance = $_POST['seance_id'];
        $coachingc = new coachingC();
        $coachingc->delete_seance($id_seance);
    }
?>
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css"/>
    <title>Input Animation</title>
</head>
<form method="post" action="">
<div class="wrapper">
<div class="title">
<h1>supprimer avec ID</h1>
<body>
<div class="form"style="width:250% ;position:relative;left: -180px;0px;">
          <div class="name-section"></div>
          <input type="text" name="seance_id" autocomplete="off" required / >
          <label for="seance_id" class="label-name"> 
            <span class="content-name"> ID Seance</span>
            <label>
    </div> 
    <button style="background-color:#333333;color:#FF0000;border-radius:5px;position:absolute;left: 670px;px;bottom: 250px;font-size: 40px" type="submit">suprrimer</button>
</form>
</body>
</html>