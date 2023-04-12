<form method="POST" action="../Actions/addReclamation.php">
    <ul>
        <li>
            <h3>Ecrire votre reclamation :</h3>
        </li>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required
         minlength="4" maxlength="10" >

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
        <input type="text" id="phone_number" name="phone_number" 
         minlength="8" maxlength="8" >
        <button type="button" onclick="clearField('phone_number')">Remove</button>

        <label for="object">Object:</label>
        <input type="text" id="object" name="object">
        <button type="button" onclick="clearField('object')">Remove</button>

        <label for="comment">Comment:</label>
        <textarea id="comment" name="comment"></textarea>
        <button type="button" onclick="clearField('comment')">Remove</button>

        <input type="submit" name="Add" value="Submit">
</form>


<script>
    function clearField(fieldName) {
        document.getElementById(fieldName).value = "";
    }
</script>