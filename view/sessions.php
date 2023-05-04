<?php

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fitzone";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
try{
// Insert data
if (isset($_POST['submit'])) {
    $date = $_POST['date'];
    $heure = $_POST['heure'];
    $nb_participant = $_POST['nb_participant'];
    $seance = $_POST['seance'];
    $id_coach = $_POST['id_coach'];
    $sql = "INSERT INTO coaching ( date , heure, nb_participant , seance, id_coach) VALUES ( '$date', '$heure' , '$nb_participant' , '$seance' , '$id_coach' )";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
}
}
catch(Exception $e) {
    echo 'error';
  }

// Update data
if (isset($_POST['update'])) {
    $date = $_POST['date'];
    $heure = $_POST['heure'];
    $nb_participant = $_POST['nb_participant'];
    $seance = $_POST['seance'];
    $id_coach = $_POST['id_coach'];

    $sql = "UPDATE coaching SET id_seance='$id_seance', date='$date', heure='$heure', nb_participant='$nb_participant', id_coach='$id_coach' WHERE id_seance=$id_seance";

    if (mysqli_query($conn, $sql)) {
        //
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Delete data
if (isset($_GET['delete'])) {
    $id_seance = $_GET['delete'];

    $sql = "DELETE FROM coaching WHERE id_seance=$id_seance";

    if (mysqli_query($conn, $sql)) {
        echo "Data deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>



<!DOCTYPE html>
<html>

<head>
    <title>CRUD App</title>
</head>

<body>
    <script src="https://cdn.tailwindcss.com"></script>
    <section class="container px-4 mx-auto">
        <div class="flex items-center gap-x-3">
        <div class="flex flex-col items-center max-w-lg mx-auto text-center">
                <h1 class="mt-3 text-2xl font-semibold text-gray-800  md:text-3xl">Liste des seances coaching</h1>
                <p class="mt-4 text-gray-500 ">
                    Ici vous pouvez ajouter, modifier et supprimer les seances coaching.
                </p>

                
            </div>

        </div>

        <div class="flex flex-col mt-6">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden border border-gray-200  md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 ">
                            <thead class="bg-gray-50 ">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                        <div class="flex items-center gap-x-3">
                                            <input  class="text-blue-500 border-gray-300 rounded   ">
                                            <span>Id_seance</span>
                                        </div>
                                    </th>

                                    <th scope="col"
                                        class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                        <button class="flex items-center gap-x-2">
                                            <span>Date</span>

                                            <svg class="h-3" viewBox="0 0 10 11" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M2.13347 0.0999756H2.98516L5.01902 4.79058H3.86226L3.45549 3.79907H1.63772L1.24366 4.79058H0.0996094L2.13347 0.0999756ZM2.54025 1.46012L1.96822 2.92196H3.11227L2.54025 1.46012Z"
                                                    fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                                <path
                                                    d="M0.722656 9.60832L3.09974 6.78633H0.811638V5.87109H4.35819V6.78633L2.01925 9.60832H4.43446V10.5617H0.722656V9.60832Z"
                                                    fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                                <path
                                                    d="M8.45558 7.25664V7.40664H8.60558H9.66065C9.72481 7.40664 9.74667 7.42274 9.75141 7.42691C9.75148 7.42808 9.75146 7.42993 9.75116 7.43262C9.75001 7.44265 9.74458 7.46304 9.72525 7.49314C9.72522 7.4932 9.72518 7.49326 9.72514 7.49332L7.86959 10.3529L7.86924 10.3534C7.83227 10.4109 7.79863 10.418 7.78568 10.418C7.77272 10.418 7.73908 10.4109 7.70211 10.3534L7.70177 10.3529L5.84621 7.49332C5.84617 7.49325 5.84612 7.49318 5.84608 7.49311C5.82677 7.46302 5.82135 7.44264 5.8202 7.43262C5.81989 7.42993 5.81987 7.42808 5.81994 7.42691C5.82469 7.42274 5.84655 7.40664 5.91071 7.40664H6.96578H7.11578V7.25664V0.633865C7.11578 0.42434 7.29014 0.249976 7.49967 0.249976H8.07169C8.28121 0.249976 8.45558 0.42434 8.45558 0.633865V7.25664Z"
                                                    fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                            </svg>
                                        </button>
                                    </th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                        <button class="flex items-center gap-x-2">
                                            <span>Heure</span>

                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                            </svg>
                                        </button>
                                    </th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                        nb_participant</th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                        Seance</th>

                                    <th scope="col" class="relative py-3.5 px-4">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200  ">


                                <?php
                                // Read data
                                $sql = "SELECT * FROM coaching";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '
            
                                <tr>
                                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                        <div class="inline-flex items-center gap-x-3">
                                            <input class="text-blue-500 border-gray-300 rounded  -900 ">
                                                    <h2 class="font-medium text-gray-800">' . $row['id_seance'] . '</h2>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-12 py-4 text-sm text-gray-500  whitespace-nowrap">' . $row['date'] . '</td>
                                    <td class="px-12 py-4 text-sm text-gray-500  whitespace-nowrap">' . $row['heure'] . '</td>
                                    <td class="px-4 py-4 text-sm text-gray-500  whitespace-nowrap">' . $row['nb_participant'] . '</td>
                                    <td class="px-4 py-4 text-sm text-gray-500  whitespace-nowrap">' . $row['seance'] . '</td>
                                        </td>
                                    
                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                        <div class="flex items-center gap-x-6">
                                            <a href="sessions.php?delete=' . $row['id_seance'] . '" class="text-gray-500 transition-colors duration-200 -500  hover:text-red-500 focus:outline-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </a>

                                            <a href="edit-sessions.php?id_seance=' . $row['id_seance'] . '" class="text-gray-500 transition-colors duration-200 -500  hover:text-yellow-500 focus:outline-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                            </tr>
                            ';



                                    }

                                } else {
                                    echo "0 results";
                                }

                                mysqli_close($conn);
                                ?>





                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>



    <div class="my-8"></div>
    
    <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md ">
        <h2 class="text-lg font-semibold text-gray-700 capitalize ">Ajouter une seance coaching</h2>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div>
                    <label class="text-gray-700" for="date">Date</label>
                    <input type="date" name="date"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md  dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                </div>

                <div>
                    <label class="text-gray-700" for="heure">Heure</label>
                    <input type="time" name="heure"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md  dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                </div>

                <div>
                    <label class="text-gray-700" for="nb_participant">Nb_Participant</label>
                    <input type="text" name="nb_participant"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md  dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                </div>

                <div>
                    <label class="text-gray-700" for="seance">Seance</label>
                    <input type="text" name="seance" required
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md  dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                </div>

                <div>
                    <label class="text-gray-700" for="id_coach">Id_Coach</label>
                    <input type="text" name="id_coach"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md  dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                </div>

            </div>

            <div class="flex justify-end mt-6">
                <button
                    class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600" type="submit" name="submit">Ajouter</button>
            </div>
        </form>
    </section>


</body>


<script>
    function togglePasswordVisibility(id) {
        var passwordField = document.getElementById("password#" + id);
        if (passwordField.type === "password") {
            passwordField.type = "text";
            document.querySelector("button").textContent = "Hide password";
        } else {
            passwordField.type = "password";
            document.querySelector("button").textContent = "Show password";
        }
    }
    window.onload = function() {
    const id_seance = document.getElementById("id_seance");
    const date = document.getElementById("date");
    const heure = document.getElementById("heure");
    const nb_participant = document.getElementById("nb_participant");
    const seance = document.getElementById("seance");

    const regexId = /^[0-9]{8}$/;
    const regexDate = /^\d{4}-\d{2}-\d{2}$/;
    const regexTime = /^\d{2}:\d{2}$/;
    const regexNumber = /^[0-9]+$/;
    const regexName = /^[a-zA-Z\s]+$/;

    id_seance.addEventListener('input', function () {
      if (!regexId.test(id_seance.value)) {
        id_seance.setCustomValidity("L'identifiant de séance doit contenir 8 chiffres");
      } else {
        id_seance.setCustomValidity("");
      }
    });

    date.addEventListener('input', function () {
      if (!regexDate.test(date.value)) {
        date.setCustomValidity("La date doit être au format 'yyyy-mm-dd'");
      } else {
        date.setCustomValidity("");
      }
    });

    heure.addEventListener('input', function () {
      if (!regexTime.test(heure.value)) {
        heure.setCustomValidity("L'heure doit être au format 'hh:mm'");
      } else {
        heure.setCustomValidity("");
      }
    });

    nb_participant.addEventListener('input', function () {
      if (!regexNumber.test(nb_participant.value)) {
        nb_participant.setCustomValidity("Le nombre de participants doit être un nombre entier positif");
      } else {
        nb_participant.setCustomValidity("");
      }
    });

    seance.addEventListener('input', function () {
      if (!regexName.test(seance.value)) {
        seance.setCustomValidity("Le nom de la séance doit contenir seulement des caractères alphabétiques");
      } else {
        seance.setCustomValidity("");
      }
    });
};
</script>





</html>