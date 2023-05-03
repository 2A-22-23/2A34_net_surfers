<!DOCTYPE html>
<html>
<head>
  <title>View Usr</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="./assets/css/style.css"></link>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="print.css" media="print">
  </head>
</head>
<body >
    
        <?php
            require_once '../controller/userC.php';
            $userC = new userC();
            $list = $userC->listusers();
        ?>

<br><br>
    <h2 style="text-align: center;">Forum</h2>
    <br>
    <br>
    <div class="d-flex justify-content-center align-items-center">
        <form method="GET">
            <div class="form-group row">
                <div>
                    <input type="search" name="search" class="DocSearch-Input form-control" placeholder="Search By Nom">
                </div>
                <div>
                    <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>

            

    <br>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">Id</th>
                <th class="text-center">Nom</th>
                <th class="text-center">prenom</th>
                <th class="text-center">age</th>
                <th class="text-center">mail</th>
                <th class="text-center">Role</th>
                <th class="text-center">Mdp</th>
                <th class="text-center" colspan="2">Action</th>
            </tr>
        </thead>
        <?php foreach ($list as $row){ ?>
            <tr>
                <td><?=$row["id"]?></td>
                <td><?=$row["nom"]?></td>      
                <td><?=$row["prenom"]?></td>  
                <td><?=$row["age"]?></td>  
                <td><?=$row["mail"]?></td>
                <td><?=$row["role"]?></td>
                <td><?=$row["mdp"]?></td>    
                <td><a href="updateuser.php?id=<?= $row['id'] ?>"><button class="btn btn-primary" style="height:40px" ><i class="fa fa-edit"></i></button></td></a>
                <td><a href="deleteuser.php?id=<?= $row['id'] ?>"><button class="btn btn-danger" style="height:40px" ><i class="fa fa-remove"></i></button></td></a>
                <?php
                }
                ?>
            </tr>
    </table>
    <br>
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
    <div class="d-flex justify-content-center align-items-center">
        <a href="createuser.php">
            <button type="button" class="btn btn-secondary" style="height:40px;" data-toggle="modal" data-target="#myModal">
                Add User
            </button>
        </a><br><br><br><br><br>
    </div>
    <div class="d-flex justify-content-center align-items-center">
    <a href="viewcoach.php">
            <button type="button"  class="btn btn-secondary" style="height:40px;" data-toggle="modal" data-target="#myModal">
                View Coach
            </button>
        </a>
        </div>
    <br><br>
    <div class="d-flex justify-content-center align-items-center">
        <button onclick="window.print();" id="print-btn" type="button" class="btn btn-secondary" style="height:40px;"> Print</button>
    </div>
        <br><br><br>

    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
 
</html>