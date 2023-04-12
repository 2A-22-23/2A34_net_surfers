<!DOCTYPE html>

<html>
<head>
	<title></title>
	<style>
		form {
			display: inline-flex;
			flex-wrap: wrap;
			align-items: center;
			justify-content: center;
			margin: 20px;
		}
		label {
			display: inline-block;
			width: 100px;
			text-align: right;
			margin-right: 10px;
		}
		input[type=text], textarea
        {
			width: 250;
			padding: 4px;
			margin: 5px;
		}
		input[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 10px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}
		input[type=submit]:hover {
			background-color: #45a049;
		}
	</style>
</head>
<body>
<form action="insert.php" method="post">
  <label for="username">Username:</label>
  <input type="text" id="username" name="username">
  <button type="button" onclick="clearField('username')">Remove</button>

  <label for="firstname">First Name:</label>
  <input type="text" id="firstname" name="firstname">
  <button type="button" onclick="clearField('firstname')">Remove</button>

  <label for="lastname">Last Name:</label>
  <input type="text" id="lastname" name="lastname">
  <button type="button" onclick="clearField('lastname')">Remove</button>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email">
  <button type="button" onclick="clearField('email')">Remove</button>

  <label for="phone_number">Phone Number:</label>
  <input type="text" id="phone_number" name="phone_number">
  <button type="button" onclick="clearField('phone_number')">Remove</button>

  <label for="object">Object:</label>
  <input type="text" id="object" name="object">
  <button type="button" onclick="clearField('object')">Remove</button>

  <label for="comment">Comment:</label>
  <textarea id="comment" name="comment"></textarea>
  <button type="button" onclick="clearField('comment')">Remove</button>

  <button type="submit">Submit</button>
</form>
<script>
        function clearField(fieldName)
        {
            document.getElementById(fieldName).value = "";
        }
    </script>

    
    
</body>

</html>




    



