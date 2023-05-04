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
// Insert data
if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $motdepasse = $_POST['motdepasse'];

    $sql = "INSERT INTO coach (nom , prenom , email, motdepasse) VALUES ('$nom', '$prenom', '$email' , '$motdepasse')";

    if (mysqli_query($conn, $sql)) {
        //
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
        //
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
// Delete data
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "DELETE FROM coach WHERE id=$id";

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="print.css" media="print">
</head>
<body>
    <script src="https://cdn.tailwindcss.com"></script>
    <section class="container px-4 mx-auto">
        <div class="flex items-center gap-x-3">
        <div class="flex flex-col items-center max-w-lg mx-auto text-center">
                <h1 class="mt-3 text-2xl font-semibold text-gray-800  md:text-3xl">Liste des Coachs</h1>
                <p class="mt-4 text-gray-500 ">
                    Ici vous pouvez ajouter, modifier et supprimer les coachs.
                </p> 
            </div>
        </div>
    
        <form action="" method="get">
		
		<input type="text" id="search" name="search" class="DocSearch-Input" placeholder="Search By Name">
		<div style="display: inline-block;"><button class="btn btn-success" type="submit" style="background-color: black;"><i class="fa fa-search"></i></div>
	
    </form>
    
        
    
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
                                            <input type="checkbox" class="text-blue-500 border-gray-300 rounded   ">
                                            <span>Nom</span>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                        <button class="flex items-center gap-x-2">
                                            <span>Prenom</span>

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
                                            <span>Status</span>

                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                            </svg>
                                        </button>
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                        Email address</th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                        Mot de passe</th>

                                    <th scope="col" class="relative py-3.5 px-4">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200  ">
                                <?php
                                // Read data
                                if (isset($_GET['search'])){
                                    $search = $_GET['search'];
                                    $sql = "SELECT * FROM coach WHERE nom LIKE '%" . $search . "%'";
                                    $result = mysqli_query($conn, $sql);
                                }
                                else{
                                    $sql = "SELECT * FROM coach";
                                    $result = mysqli_query($conn, $sql);
                                }


                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '
                                <tr>
                                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                        <div class="inline-flex items-center gap-x-3">
                                            <input type="checkbox" class="text-blue-500 border-gray-300 rounded  -900 ">

                                            <div class="flex items-center gap-x-2">
                                                <img class="object-cover w-10 h-10 rounded-full" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="">
                                                <div>
                                                    <h2 class="font-medium text-gray-800">' . $row['nom'] . '</h2>
                                                    <p class="text-sm font-normal text-gray-600 ">@Coach</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-12 py-4 text-sm text-gray-500  whitespace-nowrap">' . $row['prenom'] . '</td>
                                    <td class="px-4 py-4 text-sm text-green-500  whitespace-nowrap">Online</td>
                                    <td class="px-4 py-4 text-sm text-gray-500  whitespace-nowrap">' . $row['email'] . '</td>
                                    <td class="px-4 py-4 text-sm text-gray-500  whitespace-nowrap">
                                        <input readonly type="password" id="password#' . $row['id'] . '" name="password" value=' . $row['motdepasse'] . '>
                                        <button type="button" class="px-3 py-1 text-xs text-indigo-500 rounded-full bg-indigo-100/60" onclick="togglePasswordVisibility(' . $row['id'] . ')">Show password</button>
                                        </td>                                 
                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                        <div class="flex items-center gap-x-6">
                                            <a href="coach.php?delete=' . $row['id'] . '" class="text-gray-500 transition-colors duration-200 -500  hover:text-red-500 focus:outline-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </a>

                                            <a href="edit-coach.php?id=' . $row['id'] . '" class="text-gray-500 transition-colors duration-200 -500  hover:text-yellow-500 focus:outline-none">
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
                        <br><br>
                        <button onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="my-8"></div>
    <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md ">
        <h2 class="text-lg font-semibold text-gray-700 capitalize ">Ajouter un Coach</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div>
                    <label class="text-gray-700" for="username">Nom</label>
                    <input type="text" name="nom" required
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md  dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                </div>
                <div>
                    <label class="text-gray-700" for="emailAddress">Prenom</label>
                    <input type="text" name="prenom"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md  dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                </div>

                <div>
                    <label class="text-gray-700" for="password">Email</label>
                    <input type="email" name="email"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md  dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                </div>

                <div>
                    <label class="text-gray-700" for="passwordConfirmation">Mot de Passe</label>
                    <input type="password" name="motdepasse"
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
</script>
</html>