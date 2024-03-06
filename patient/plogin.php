<?php
// Start session
session_start();


// Include database connection file
include_once("DatabaseConnection.php");

// Check if form submitted
if (isset($_POST['submit'])) {
    // Validate input
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

	// Query the database to get the user
	
	$result = mysqli_query($mysqli, "SELECT * FROM patients WHERE email='$email' AND password='$password'");
    $user_matched = mysqli_num_rows($result);

    if ($user_matched > 0) {
		$name = mysqli_fetch_array($result)['name'];

        $_SESSION['email'] = $email;
		$_SESSION['name'] = $name;
        header("location: Catalog.php");
    } else {
        ?>
        <a href="../index.php">BACK</a>
        <br><br>
        <?php
        echo "User admin ID or password does not match <br/><br/>";

    }

}
?>
