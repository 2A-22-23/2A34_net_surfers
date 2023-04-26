<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
<script src="https://cdn.tailwindcss.com"></script>

    <?php
    // Database configuration
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fitzone";


    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }else{
        header("Location: coach.php");
    }

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Read data
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM coach WHERE id=$id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            
        } else {
            echo "0 results";
        }
    }

    // Update data
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $motdepasse = $_POST['motdepasse'];
    
        $sql = "UPDATE coach SET nom='$nom', prenom='$prenom', email='$email', motdepasse='$motdepasse' WHERE id=$id";
    
        if (mysqli_query($conn, $sql)) {
            header("Location: coach.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
    ?>
    <section class="container px-4 mx-auto">
        <div class="flex items-center gap-x-3">
        <div class="flex flex-col items-center max-w-lg mx-auto text-center">
                <h1 class="mt-3 text-2xl font-semibold text-gray-800  md:text-3xl">Modifier Coach <?php echo $row['nom'] ?></h1>
                <p class="mt-4 text-gray-500 ">
                    Modifier les informations du coach
                </p>

                
            </div>

        </div>
    </section>
    <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md ">
        <h2 class="text-lg font-semibold text-gray-700 capitalize ">Modifier un Coach</h2>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div>
                    <label class="text-gray-700" for="username">Nom</label>
                    <input type="text" name="nom" required value="<?php echo $row['nom']; ?>"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md  dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                </div>

                <div>
                    <label class="text-gray-700" for="emailAddress">Prenom</label>
                    <input type="text" name="prenom" value="<?php echo $row['prenom']; ?>"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md  dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                </div>

                <div>
                    <label class="text-gray-700" for="password">Email</label>
                    <input type="email" name="email" value="<?php echo $row['email']; ?>"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md  dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                </div>

                <div>
                    <label class="text-gray-700" for="passwordConfirmation">Mot de Passe</label>
                    <input type="password" name="motdepasse" value="<?php echo $row['motdepasse']; ?>"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md  dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button
                    class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600" type="submit" name="update" value="Update">Modifier</button>
            </div>
        </form>
    </section>
</body>
</html>