<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/login.css" />
    <title>Home</title>

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
                <p>To LogIn As A Pharmacist, Click <a href="pharmacist/index.php">Pharmacist LogIn</a></p>   
                <p>To LogIn As An Admin, Click <a href="admin/AdminLogin.php">Admin LogIn</a></p>

            </div>
             
            <div class="second-box"> 
            <div class="title">Patient Login</div>          
            <form action="patient/plogin.php" method="post">
                <label for="fname">Patient email</label>
                <input type="email" id="id" name="email" placeholder="Please Enter Your id.." required>
            
                <label for="lname">Password</label>
                <input type="password" id="password" name="password" placeholder="Please Enter Your password.." required>

                <input type="submit" name="submit" value="Submit">

            </form>
        </div>
        
    </body>
</html>          