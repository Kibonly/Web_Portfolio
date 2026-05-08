<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Registration</title>
</head>
<body>
    <Div class="container">

        <div class="form_wrapper">

        <form action="includes/signup.inc.php" method="post">

            <Div class="Row">
                <H1>Register</H1>
                <div>
                    <label for="fname">First Name: </label> 
                    <input type="text" placeholder="Please Enter First Name" name="Firstname" id="fname" required>
                </div>

                <div>
                <label for="lname">Last Name: </label>
                <input type="text" placeholder="Please Enter Last Name" name="Lastname" id="lname">
                </div>

            </Div>

            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Desired Password..." required>
            </div>

            <div class="Input_Group" id="BloodType">

            <label>What is your BloodType?</label>
            <label> <input type="radio" name="BloodType" value="A+" required> A+</label>
            <label> <input type="radio" name="BloodType" value="A-" required> A-</label>
            <label> <input type="radio" name="BloodType" value="B+" required> B+</label>
            <label> <input type="radio" name="BloodType" value="B-" required> B-</label>
            <label> <input type="radio" name="BloodType" value="O+" required> O+</label>
            <label> <input type="radio" name="BloodType" value="O-" required> O-</label>
            <label> <input type="radio" name="BloodType" value="AB+" required> AB+</label>
            <label> <input type="radio" name="BloodType" value="AB-" required> AB-</label>
            </div>

            <Div class="Input_Group">
                <label for="birth_date">Birthdate: </label> <input type="date" name="BirthDate" id="birth_date" > 
            </Div>
            
            <div class="Input_Group" id="Gender">
                <label >Gender</label>
                <label> <input type="radio" name="Gender" value="Male" required> Male</label>
                <label> <input type="radio" name="Gender" value="Female" required> Female</label>
            </div>

            <Div class="Input_Group" id="PhoneNumber">
                <label >Enter Phone Number</label> <input type="number" name="phonenumber" placeholder="Please enter your PhoneNumber" required>
                <label >Enter Email</label> <input type="email" name="email" placeholder="PLease enter your email">
            </Div>

            <div class="Input_Group"> 
                <label for="Address">Address</label> <input type="text" name="Address" placeholder="Enter Full Address" id="Address">
            </div>

            <div class="Input_Group" id="city2">
                <Div>
                <label for="City">City:  </label> <input type="text" id="City" name="City" placeholder="Currently Residing...." required>
                </Div>

            </div>

            <div class="Input_Group" id="donated">
                <label> Have you Donated Blood previously?</label>
                <label> <input type="radio" name="Donated" value="Yes" > Yes</label>  
                <label> <input type="radio" name="Donated" value="No" > NO</label> 
            </div>

            <div class="Input_Group"> 
                <label for="last_date">What was the last time you donated Blood?</label> <input type="date" name="Last_Donated" id="last_date">
            </div>

            <button type="submit">Register</button>


        </form>
        
        <?php
        check_signup_errors();
        ?>
    
        </div>

    </Div>
</body>
</html>