<?php
// Start session
session_start();

// Check if user is already logged in
if (isset($_SESSION['id'])) {
    header("Location: dashboard.php");
    exit();
}

// Include database connection file
include_once("conn.php");

// Check if form submitted
if (isset($_POST['submit'])) {
    // Validate input
    $id = trim($_POST['id']);
    $password = trim($_POST['password']);

    if (!ctype_digit($id)) {
        $error_msg = "Invalid login ID. Please enter ID again";
    } elseif (empty($password)) {
        $error_msg = "Please enter a password.";
    } else {
        // Query the database to get the user
        $id = (int)$id; // Remove leading zeros
        $result = mysqli_query($conn, "SELECT * FROM pharmacist WHERE id='$id' AND password='$password' AND status='active'");
		
		

        if ($result && mysqli_num_rows($result) == 1) {
            $name = mysqli_fetch_array($result)['name'];

            // Store the user's id and name in the session
            $_SESSION['id'] = $id;
            $_SESSION['name'] = $name;

            // Redirect to dashboard page
            header("Location: dashboard.php");
            exit();
        } else {
			if ($result && mysqli_num_rows($result) == 0) {
				$error_msg = "Invalid login credentials. Please try again.";
			} else {
				$error_msg = "Your account is blocked. Please contact the administrator.";
			}
            //$error_msg = "Invalid login credentials. Please try again.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/login.css" />
    <title>Login</title>
</head>
<body>
    
        <h1>Maluti Pharmacy</h1>

            <div class="first-box">
                <h1> Welcome To Maluti Pharmacy!!!</h1>             
                <p>
                    Login or Register With Us To Browse The Medicine We Have, In Case You Do Not Know
                    which Madecine Can Heal You, You Can Consult Us For Free On This Website
                    And We Will Give You A Feedback On Which Medicine To Buy.
                </p>
                <p>To Back To Previous Menu, Click <a href="../index.php">Back</a></p>   
                
            </div>
    
    
    <?php if (isset($error_msg)) { ?>
        <div><?php echo $error_msg; ?></div>
    <?php } ?>
    
    <div class="second-box"> 
            <div class="title">Pharmacist Login</div>          
            <form method="post" action="index.php">
                <label for="fname">Pharmacist ID</label>
                <input type="text" name="id" required placeholder="Please Enter Your id.."  required>
            
                <label for="lname">Password</label>
                <input type="password" name="password" required placeholder="Please Enter Your password.." required>

                <input type="submit" name="submit" value="Login">

                <div>A Pharmacist Can Only Be Registered By An Admin!!! </div>
            </form>
                    
        </div>   
</body>
</html>
