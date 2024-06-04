<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700;800&family=Roboto:wght@400;500;600&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<header>         
    <nav>
      <table width="100%">
        <tr align="center">
          <b><td colspan="2" width="20%">
            <a href="index.html">
              <img src="logo.png" alt="Logo" width="150px" height="60px">
              <span class="text-after-image">HOME</span>
            </a>
          </td>
          <td><a href="#service">FIND DONOR</a></td>
          <td><a href="aboutus.html">ABOUT US </a></td>
          <td><a href="#footer">CONTACT US</a></td>
          <td><a href="logout.php">LOGOUT</a></td></b>
        </tr>
      </table>                  
    </nav>
    <?php
session_start();
include 'database.php';
if(isset($_POST['submit'])) {
    $email=$_POST['loginusername'];
    $password=$_POST['loginpassword'];
    $sql="select * from credentials where email='$email' and passwd='$password' ";
    $que=mysqli_query($con,$sql);
    if(mysqli_num_rows($que)>0)
    {
        echo "<script>alert('login ok')</script>";
        $_SESSION["email"] = $email;
        $sql1 = "SELECT * FROM credentials WHERE email='$email'";
        $result = mysqli_query($con, $sql1);
        if(mysqli_num_rows($result) > 0) {
            echo "<h1>YOUR DETAILS</h1>";
            echo "<table style='border-collapse: collapse; width: 50%;'>";
            echo "<thead>";
            echo "<tr style='background:transparent; color:white;'>";
            echo "<th style='border: 1px solid black; padding: 18px; text-align: left;'>Name</th>";
            echo "<th style='border: 1px solid black; padding: 18px; text-align: left;'>Email</th>";
            echo "<th style='border: 1px solid black; padding: 18px; text-align: left;'>Blood Group</th>";
            echo "<th style='border: 1px solid black; padding: 18px; text-align: left;'>Gender</th>";
            echo "<th style='border: 1px solid black; padding: 18px; text-align: left;'>Phone</th>";
            echo "<th style='border: 1px solid black; padding: 18px; text-align: left;'>State</th>";
            echo "<th style='border: 1px solid black; padding: 18px; text-align: left;'>Area</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr style='border: 1px solid black; background-color: transparent;'>";
                echo "<td style='border: 1px solid black; padding: 18px;'>" . $row["name"] . "</td>";
                echo "<td style='border: 1px solid black; padding: 18px;'>" . $row["email"] . "</td>";
                echo "<td style='border: 1px solid black; padding: 18px;'>" . $row["bloodgrp"] . "</td>";
                echo "<td style='border: 1px solid black; padding: 18px;'>" . $row["gender"] . "</td>";
                echo "<td style='border: 1px solid black; padding: 18px;'>" . $row["phone"] . "</td>";
                echo "<td style='border: 1px solid black; padding: 18px;'>" . $row["state"] . "</td>";
                echo "<td style='border: 1px solid black; padding: 18px;'>" . $row["area"] . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        }
    }
    else{
        echo "<script>alert('wrong username and password')</script>";
        echo "<script>window.open('index.html','_self')</script>";
    }
}
?>
</header> 
</body>
</html>