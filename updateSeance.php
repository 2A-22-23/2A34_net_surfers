<?php
    require_once '../model/coaching.php';
    require_once '../controller/coachingc.php';
    if (isset ($_POST ["id_seance"]) && isset ($_POST ["date"]) && isset ($_POST ["heure"])&& isset ($_POST ["nb_participant"])&& isset ($_POST ["seance"])){
        if (!empty ($_POST ["id_seance"]) && !empty($_POST ["date"]) && !empty($_POST ["heure"]) && !empty($_POST ["nb_participant"])&& !empty($_POST ["seance"])){ 

            $coaching = new coaching($_POST ["id_seance"],$_POST ["date"] ,$_POST ["heure"], $_POST ["nb_participant"],$_POST ["seance"]);
            $coachingC = new coachingc();
            $coachingC->updateSeance($coaching,$_POST ["id_seance"]);
            //header('location:listEvnet.php');
        }
        else{
            echo "champ invalid";
        }
    }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css"/>
    <title>Input Animation</title>
</head>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<div>
<div>
<h1>modifier avec ID</h1>
<body>
<div class="form" style="width:250% ;position:relative;left: -180px;0px;">
          <div class="name-section"></div>
          <input type="text" name="id_seance" autocomplete="off" required / >
          <label for="id_seance" class="label-name"> 
            <span class="content-name"> ID Seance</span>
            <label>
    </div> 
    <div class="form"style="width:250% ;position:relative;left: -180px;0px;"> 
    <div class="name-section"></div>
            <input type="text" name="date" id="date" autocomplete="off" required />
            <label for="date" class="label-name"> 
            <span class="content-name"> Date </span>
            <label>       
    </div>
    
    <div class="form"style="width:250% ;position:relative;left: -180px;0px;">
       <input type="text" name="heure" id="heure" class="form" autocomplete="off" required />
       <label for="heure" class="label-name"> 
            <span class="content-name"> Heure</span>
            <label>
    </div>

    <div class="form"style="width:250% ;position:relative;left: -180px;0px;">
       <input type="text" name="nb_participant" id="nb participant" class="form" autocomplete="off" required />
       <label for="nb_participant" class="label-name"> 
            <span class="content-name"> Nombre Participant</span>
            <label>
    </div>
       
    <div class="form"style="width:250% ;position:relative;left: -180px;0px;">
        <input type="text" name="seance" id="seance" class="form" autocomplete="off" required />
        <label for="seance" class="label-name"> 
            <span class="content-name"> Nom Seance</span>
            <label>
     </div> 
     <div class="input_field">
            <input style="background-color:#333333;color:#00FFFF;border-radius:5px;position:absolute;left: 670px;px;bottom: 250px;font-size: 40px" type="submit" value="modifier" class="button">
         </div>
        
        
  </body>
</html>