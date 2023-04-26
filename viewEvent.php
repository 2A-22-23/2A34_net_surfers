<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Afficher </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="print.css" media="print">
  </head>
</head>
<body >
    
        <?php
            require_once '../Controller/eventC.php';
            $eventC = new eventC();
            $list = $eventC->listEvents();
        ?>
        <br><br><br><br>    
    <div class="d-flex justify-content-center align-items-center">
        <form method="GET">
            <div class="form-group row">
                <div>
                    <input type="search" name="search" class="DocSearch-Input form-control" placeholder="Search By Nom">
                </div>
                <div>
                    <button class="btn btn-success" type="submit"> search </button>
                </div>
            </div>
        </form>
    </div>

    <br>
    <br>
    <table class="table ">
        <thead>
            <tr>
                <th class="text-center">ID event</th>
                <th class="text-center">Titre</th>
                <th class="text-center">Debut</th>
                <th class="text-center">Fin</th>
                <th class="text-center">Adresse</th>
                <th class="text-center">Num</th>
                <th class="text-center">Organisme</th>
                <th class="text-center">Choix</th>
                <th class="text-center">montant</th>
                <th class="text-center" colspan="2">Action</th>
            </tr>
        </thead>
        <?php foreach ($list as $row){ ?>
            <tr>
                <td><?=$row["id"]?></td>
                <td><?=$row["titre"]?></td>      
                <td><?=$row["debut"]?></td>  
                <td><?=$row["fin"]?></td>  
                <td><?=$row["adresse"]?></td>
                <td><?=$row["num"]?></td>      
                <td><?=$row["organisme"]?></td>  
                <td><?=$row["choix"]?></td>  
                <td><?=$row["montant"]?></td>
                <td><a href="deleteEvent.php?id=<?= $row["id"] ?>"><button class="btn btn-primary" >Delete</button</a></td>
                <td><a href="updateEvent.php?id=<?= $row["id"] ?>"><button class="btn btn-primary" >Update</button</a></td>
                
                <?php
                }
                ?>
            </tr>
    </table>

    <style>
        table {
            border-collapse: collapse;
            border: 1px solid #ccc;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }
    </style>
    <br><br><br>
    <div class="d-flex justify-content-center align-items-center">
        <a href="addEvent.php">
            <button type="button" class="btn btn-primary" style="height:40px;" data-toggle="modal" data-target="#myModal">
                Add event
            </button>
        </a>
        <br>
        <br>
        <a href="viewOrganisme.php">
            <button type="button" class="btn btn-primary" style="height:40px;" data-toggle="modal" data-target="#myModal">
                Organisme
            </button>
        </a>
        <br>
        <br>
        <button onclick="window.print();" style="height:40px;"  class="btn btn-primary" id="print-btn">Print</button>
    </div>
    <br><br><br>
</body>
 
</html>