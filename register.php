<?php
print '
<h1>Register.</h1>
<div id="register">';

if ($_POST['_action_'] == FALSE) {
    print '
    <form action="" id="registration_form" name="registration_form" method="POST">
        <input type="hidden" id="_action_" name="_action_" value="TRUE">
        
        <label for="fname">First Name: *</label>
        <input type="text" id="fname" name="firstname" placeholder="Your name.." required>

        <label for="lname">Last Name: *</label>
        <input type="text" id="lname" name="lastname" placeholder="Your last name.." required>
            
        <label for="email">Your E-mail: *</label>
        <input type="email" id="email" name="email" placeholder="Your e-mail.." required>
        
        <label for="username">Username:* <small>(Must be between 5 and 10 characters)</small></label>
        <input type="text" id="username" name="username" pattern=".{5,10}" placeholder="Username.." required><br>
        
        <label for="password">Password:* <small>(Must be at least 4 characters)</small></label>
        <input type="password" id="password" name="password" placeholder="Password.." pattern=".{4,}" required>

        <label for="country">Country:</label>
        <select name="country" id="country">
            <option value="">Please select</option>';
            
            $query  = "SELECT * FROM countries";
            $result = @mysqli_query($MySQL, $query);
            while($row = @mysqli_fetch_array($result)) {
                print '<option value="' . $row['country_code'] . '">' . $row['country_name'] . '</option>';
            }
        print '
        </select>

        <input type="submit" value="Submit">
    </form>';
}
else if ($_POST['_action_'] == TRUE) {
    
    // Sanitize
    $email = mysqli_real_escape_string($MySQL, $_POST['email']);
    $username = mysqli_real_escape_string($MySQL, $_POST['username']);
    $firstname = mysqli_real_escape_string($MySQL, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($MySQL, $_POST['lastname']);
    $password = $_POST['password']; // Ne sanitiziramo lozinku, koristi se hashiranje kasnije
    $country = mysqli_real_escape_string($MySQL, $_POST['country']);
    
    $query  = "SELECT * FROM users WHERE email='$email' OR username='$username'";
    $result = @mysqli_query($MySQL, $query);
    
    if (mysqli_num_rows($result) == 0) {
        // Hashing the pass
        $pass_hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
        
        
        $query  = "INSERT INTO users (firstname, lastname, email, username, password, country)";
        $query .= " VALUES ('$firstname', '$lastname', '$email', '$username', '$pass_hash', '$country')";
        $result = @mysqli_query($MySQL, $query);
        
        echo '<p>' . ucfirst(strtolower($firstname)) . ' ' .  ucfirst(strtolower($lastname)) . ', thank you for registering! </p><hr>';
    } else {
        echo '<p>A user with this email or username already exists!</p>';
    }
}
print '
</div>';
?>