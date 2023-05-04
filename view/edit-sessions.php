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


    if(isset($_GET['id_seance'])) {
        $id = $_GET['id_seance'];
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
    if (isset($_GET['id_seance'])) {
        $id_seance = $_GET['id_seance'];

        $sql = "SELECT * FROM coaching WHERE id_seance=$id_seance";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            
        } else {
            echo "0 results";
        }
    }

    // Update data
    if (isset($_POST['update'])) {
        $id_seance = $_POST['id_seance'];
        $date = $_POST['date'];
        $heure = $_POST['heure'];
        $nb_participant = $_POST['nb_participant'];
        $seance = $_POST['seance'];
    
        $sql = "UPDATE coaching SET date='$date', heure='$heure', nb_participant='$nb_participant', seance='$seance' WHERE id_seance=$id_seance";
    
        if (mysqli_query($conn, $sql)) {
            header("Location: sessions.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
    ?>
    <section class="container px-4 mx-auto">
        <div class="flex items-center gap-x-3">
        <div class="flex flex-col items-center max-w-lg mx-auto text-center">
                <h1 class="mt-3 text-2xl font-semibold text-gray-800  md:text-3xl">Modifier Coach <?php echo $row['date'] ?></h1>
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
                <input type="hidden" name="id_seance" value="<?php echo $row['id_seance']; ?>">
                <div>
                    <label class="text-gray-700" for="date">Date</label>
                    <input type="date" name="date" required value="<?php echo $row['date']; ?>"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md  dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                </div>

                <div>
                    <label class="text-gray-700" for="heure">heure</label>
                    <input type="time" name="heure" value="<?php echo $row['heure']; ?>"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md  dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                </div>

                <div>
                    <label class="text-gray-700" for="nb_participant">Nb_Participant</label>
                    <input type="text" name="nb_participant" value="<?php echo $row['nb_participant']; ?>"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md  dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                </div>

                <div>
                    <label class="text-gray-700" for="seance">Seance</label>
                    <input type="seance" name="seance" value="<?php echo $row['seance']; ?>"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md  dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                </div>

                <div>
                    <label class="text-gray-700" for="id_coach">Id_Coach</label>
                    <input type="text" name="id_coach" required value="<?php echo $row['id_coach']; ?>"
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