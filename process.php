<?php
session_start();
include 'database.php';
if(isset($_POST['submit'])) {
    $name=$_POST['regsitername'];
    $email=$_POST['registeremail'];
    $number=$_POST['registernumber'];
    $password=$_POST['registerpassword'];
    $bloodgroup=$_POST['registerbloodgroup'];
    $gender=$_POST['registergender'];
    $birthdate=$_POST['registerbirthdate'];
    $weight=$_POST['registerweight'];
    $state=$_POST['registerstate'];
    $zipcode=$_POST['registerzipcode'];
    $district=$_POST['registerdistrict'];
    $area=$_POST['registerarea'];
    $landmarks=$_POST['registerlandmarks'];
    $email_check_query = "SELECT * FROM credentials WHERE email='$email' LIMIT 1";
    $result = mysqli_query($con, $email_check_query);
    $user = mysqli_fetch_assoc($result);
    $email_exists = false;
    if ($user) { 
        $email_exists = true;
        echo "<script>alert('This email address is already registered')</script>";
        echo "<script>window.open('registration.html','_self')</script>";
    }
    if (!$email_exists) {
        $sql="INSERT INTO credentials(name,email,phone,passwd,bloodgrp,gender,birthdate,weight,state,zipcode,district,area,landmark) VALUES('$name','$email','$number','$password','$bloodgroup','$gender','$birthdate','$weight','$state','$zipcode','$district','$area','$landmarks')";
    
        if(mysqli_query($con,$sql)) {
            echo "<script>alert('Registration Successfull')</script>";
            $_SESSION["email"] = $email;
            header('location:signupsuccess.php');
        } else {
            echo "Error:".mysqli_error($con);
        }
    }
    mysqli_close($con);
}
?>