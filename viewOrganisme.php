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
            require_once '../Controller/organismeC.php';
            $organismeC = new organismeC();
            $list = $organismeC->listOgranismes();
        ?>
            

    <br>
    <br>
    <table class="table ">
        <thead>
            <tr>
                <th class="text-center">ID organisme</th>
                <th class="text-center">Nom</th>
                <th class="text-center">idEvent</th>
                <th class="text-center" colspan="2">Action</th>
            </tr>
        </thead>
        <?php foreach ($list as $row){ ?>
            <tr>
                <td><?=$row["idOrganisme"]?></td>
                <td><?=$row["nom"]?></td>     
                <td><?=$row["idEvent"]?></td>    
                <td><a href="deleteOrganisme.php?idOrganisme=<?= $row["idOrganisme"] ?>"><button class="btn btn-primary" >Delete</button</a></td>
                <td><a href="updateOrganisme.php?idOrganisme=<?= $row["idOrganisme"] ?>"><button class="btn btn-primary" >Update</button</a></td>
                
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
        <a href="addOrganisme.php">
            <button type="button" class="btn btn-secondary" style="height:40px;" data-toggle="modal" data-target="#myModal">
                Add organisme
            </button>
        </a>
        <a href="viewEvent.php">
            <button type="button" class="btn btn-secondary" style="height:40px;" data-toggle="modal" data-target="#myModal">
                Back to Event
            </button>
        </a>
        <button onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button>
    </div>
    <br><br><br>
</body>
 
</html>