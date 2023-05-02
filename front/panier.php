<?php
session_start();
require_once('../vendor/autoload.php');
$stripe = new \Stripe\StripeClient(
    'sk_test_51N2GV8CgcYijvt3dJSp9clqEOpSfgUucVXfksS0lIZpUE1eCuaoUfSpgi2mfkH2yY3YhKkajRfiLZDiYu3qNGy0T00Lfjyf2z2'
  );
require_once '../include/database.php';
?>
<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head_front.php' ?>
    <title>Panier</title>
</head>
<body>
<?php include '../include/nav_front.php' ?>
<div class="container py-2">
    <?php
    if (isset($_POST['vider'])) {
        $_SESSION['panier'][$idUtilisateur] = [];
        header('location: panier.php');
    }


    $idUtilisateur = $_SESSION['utilisateur']['id'] ?? 0;
    $panier = $_SESSION['panier'][$idUtilisateur] ?? [];

    if (!empty($panier)) {
        $idProduits = array_keys($panier);
        $idProduits = implode(',', $idProduits);
        $produits = $pdo->query("SELECT * FROM produit WHERE id IN ($idProduits)")->fetchAll(PDO::FETCH_ASSOC);
    }
    if (isset($_POST['valider'])) {
        $sql = 'INSERT INTO ligne_commande(id_produit,id_commande,prix,quantite,total) VALUES';
        $total = 0;
        $prixProduits = [];
        foreach ($produits as $produit) {
            $idProduit = $produit['id'];
            $qty = $panier[$idProduit];
            $discount = $produit['discount'];
            $prix = calculerRemise($produit['prix'], $discount);

            $total += $qty * $prix;
            $prixProduits[$idProduit] = [
                'id' => $idProduit,
                'prix' => $prix,
                'total' => $qty * $prix,
                'qty' => $qty
            ];
        }

        $sqlStateCommande = $pdo->prepare('INSERT INTO commande(id_client,total) VALUES(?,?)');
        $sqlStateCommande->execute([$idUtilisateur, $total]);
        $idCommande = $pdo->lastInsertId();
        $args = [];
        foreach ($prixProduits as $produit) {
            $id = $produit['id'];
            $sql .= "(:id$id,'$idCommande',:prix$id,:qty$id,:total$id),";
        }
        $sql = substr($sql, 0, -1);
        $sqlState = $pdo->prepare($sql);
        foreach ($prixProduits as $produit) {
            $id = $produit['id'];
            $sqlState->bindParam(':id' . $id, $produit['id']);
            $sqlState->bindParam(':prix' . $id, $produit['prix']);
            $sqlState->bindParam(':qty' . $id, $produit['qty']);
            $sqlState->bindParam(':total' . $id, $produit['total']);
        }
        $inserted = $sqlState->execute();
        if ($inserted) {
            

            
            
            $session = $stripe->checkout->sessions->create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                  'price_data' => [
                    'currency' => 'usd',
                    'unit_amount' => $total*100,
                    'product_data' => [
                      'name' => 'payer commande',
                    ],
                  ],
                  'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => 'http://localhost/projetweb/front/panier.php?success=true&total=' . $total,
                'cancel_url' => 'https://example.com/cancel',
              ]);
              echo '\n';


//              echo $session->payment_intent;





            $_SESSION['panier'][$idUtilisateur] = [];
            header('Location: ' . $session->url);
        } else {
            ?>
            <div class="alert alert-error" role="alert">
                Erreur (contactez l'administrateur).
            </div>
            <?php
        }
    }
    if (isset($_GET['success'])) {



        ?>
        <h1>Merci ! </h1>
        
        <div class="alert alert-success" role="alert">
            Votre commande avec le montant <strong>(<?php echo $_GET['total'] ?? 0 ?>)</strong> <i class="fa fa-solid fa-dollar"></i> est bien ajoutée.
            <!-- HTML code for the card -->
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Dernière commande</h5>
    <div class="facture">
      <?php
      $sqlState = $pdo->prepare('SELECT commande.*, utilisateur.login as "login"
                                 FROM commande
                                 INNER JOIN utilisateur ON commande.id_client = utilisateur.id
                                 ORDER BY commande.date_creation DESC
                                 LIMIT 1');
      $sqlState->execute();
      $commande = $sqlState->fetch(PDO::FETCH_ASSOC);

      if ($commande) {
        // Display the details of the last commande
        echo '<p><strong>Numéro de commande:</strong> '.$commande['id'].'</p>';
        echo '<p><strong>Date de commande:</strong> '.$commande['date_creation'].'</p>';
        echo '<p><strong>Client:</strong> '.$commande['login'].'</p>';

        // Display the list of produits in the commande
        echo '<p><strong>Produits:</strong></p>';
        echo '<ul>';
        $sqlState = $pdo->prepare('SELECT produit.*, ligne_commande.quantite as "quantite"
                                   FROM ligne_commande
                                   INNER JOIN produit ON ligne_commande.id_produit = produit.id
                                   WHERE ligne_commande.id_commande = ?
                                   ORDER BY produit.libelle ASC');
        $sqlState->execute([$commande['id']]);
        while ($row = $sqlState->fetch(PDO::FETCH_ASSOC)) {
          echo '<li>'.$row['libelle'].' x '.$row['quantite'].' - '.$row['prix'].' €</li>';
        }
        echo '</ul>';

        // Display the total amount of the commande
        echo '<p><strong>Total:</strong> '.$commande['total'].' €</p>';

        // Add a button to print the facture
        echo '<button class="btn btn-primary" onclick="window.print()">Imprimer la facture</button>';
      } else {
        echo '<p>Aucune commande trouvée</p>';
      }
      ?>
    </div>
  </div>
</div>

        </div>
        <hr>
        <?php
    }
    if (!isset($_GET['success'])) {

        ?>
        <h4>Panier (<?php echo $productCount; ?>)</h4>
        <?php
    }
    ?>
    <div class="container">
        <div class="row">
            <?php
            if (empty($panier)) {
                if (!isset($_GET['success'])) {
                    ?>
                    <div class="alert alert-warning" role="alert">
                        Votre panier est vide !
                        Commençez vos achats <a class="btn btn-success btn-sm" href="./index.php">Acheter des
                            produits</a>
                    </div>
                    <?php
                }
            } else {

                ?>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Libelle</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Remise</th>
                        <th scope="col"><i class="fa fa-percent"></i> prix remise</th>
                        <th scope="col">Total</th>
                    </tr>
                    </thead>
                    <?php
                    $total = 0;
                    foreach ($produits as $produit) {
                        $idProduit = $produit['id'];
                        $totalProduit = calculerRemise($produit['prix'], $produit['discount']) * $panier[$idProduit];
                        $total += $totalProduit;
                        ?>
                        <tr>
                            <td><?php echo $produit['id'] ?></td>
                            <td><img width="80px" src="../upload/produit/<?php echo $produit['image'] ?>" alt=""></td>
                            <td><?php echo $produit['libelle'] ?></td>
                            <td><?php include '../include/front/counter.php' ?></td>
                            <td><strike><?php echo $produit['prix'] ?> <i class="fa fa-solid fa-dollar"></i></strike></td>
                            <td> - <?= $produit['discount'] ?> %</td>
                            <td><?php echo calculerRemise($produit['prix'], $produit['discount']) ?> <i class="fa fa-solid fa-dollar"></i></td>
                            <td> <?php echo $totalProduit ?> <i class="fa fa-solid fa-dollar"></i></td>
                        </tr>

                        <?php
                    }
                    ?>
                    <tfoot>
                    <tr>
                        <td colspan="7" align="right"><strong>Total</strong></td>
                        <td><?php echo $total ?> <i class="fa fa-solid fa-dollar"></i></td>
                    </tr>
                    <tr>
                        <td colspan="8" align="right">
                            <form method="post">
                                <input type="submit" class="btn btn-success" name="valider" value="Valider la commande">
                                <input onclick="return confirm('Voulez vous vraiment vider le panier ?')" type="submit"
                                       class="btn btn-danger" name="vider" value="Vider le panier">
                                       
                            </form>
                        </td>
                    </tr>
                    </tfoot>
                </table>
                <?php
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>