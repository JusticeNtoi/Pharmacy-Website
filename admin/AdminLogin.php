<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/login.css" />
    <title>Login</title>
</head>
<body>
    <?php if (isset($error_msg)) { ?>
        <div><?php echo $error_msg; ?></div>
    <?php } ?>
    
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
             
            <div class="second-box"> 
            <div class="title">Admin Login</div>          
            <form method="post" action="AdminLoginProcess.php">
                <label for="fname">Admin ID</label>
                <input type="text" name="ID" required min="6" max="6" placeholder="Please Enter Your id.." >
            
                <label for="lname">Password</label>
                <input type="password" name="password" required placeholder="Please Enter Your password..">

                <input type="submit" name="login" value="Login">

                  <div>An Admin Can Only Be Registered By Another Admin!!! </div>
            </form>
                    
        </div>    
    
</body>
</html>
    
    
    