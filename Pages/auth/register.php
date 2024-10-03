<?php 
$title = "Contact Us Page";
include('Template/navbar.php') 
?>

    <h2>Register</h2>
    <form id="registerForm" action="../../controls/auth/registerControl.php" method="post">
        
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" required><br><br>
        
        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required><br><br>
        
        <label for="dob">Date of Birth:</label>
        <input type="date" id="date" name="dob" ><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>
        
        <input type="submit" value="register">
    </form>
        
</body>
</html>
