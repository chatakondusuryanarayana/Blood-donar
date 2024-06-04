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
          <td><a href="registration.html">REGISTER</a></td></b>
        </tr>
      </table>                  
    </nav>
    <?php
    include 'database.php';
    if(isset($_POST['submit'])) {
        $bloodgroup=$_POST['bloodtype'];
        $sql = "SELECT * FROM credentials WHERE bloodgrp='$bloodgroup'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0) {
            echo "<h1>Matching Donors:</h1>";
            echo "<table style='border-collapse: collapse; width: 50%;'>";
            echo "<thead>";
            echo "<tr style='background:transparent; color:white;'>";
            echo "<th style='border: 1px solid black; padding: 18px; text-align: left;'>Name</th>";
            echo "<th style='border: 1px solid black; padding: 18px; text-align: left;'>Blood Group</th>";
            echo "<th style='border: 1px solid black; padding: 18px; text-align: left;'>Gender</th>";
            echo "<th style='border: 1px solid black; padding: 18px; text-align: left;'>Phone</th>";
            echo "<th style='border: 1px solid black; padding: 18px; text-align: left;'>State</th>";
            echo "<th style='border: 1px solid black; padding: 18px; text-align: left;'>Area</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            $count = 0;
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr style='border: 1px solid black; background-color: transparent;'>";
                echo "<td style='border: 1px solid black; padding: 18px;'>" . $row["name"] . "</td>";
                echo "<td style='border: 1px solid black; padding: 18px;'>" . $row["bloodgrp"] . "</td>";
                echo "<td style='border: 1px solid black; padding: 18px;'>" . $row["gender"] . "</td>";
                echo "<td style='border: 1px solid black; padding: 18px;'>" . $row["phone"] . "</td>";
                echo "<td style='border: 1px solid black; padding: 18px;'>" . $row["state"] . "</td>";
                echo "<td style='border: 1px solid black; padding: 18px;'>" . $row["area"] . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            echo"<h2><b>Please note that</b></h2><h3>these are the persons which are registered in our website as willing donors themselfs. You can contact them directly by the contact informations provided by them.</h3>";
        } else {
            echo '<h1 style="color: red; background-color: black; padding: 400px; border-radius: 5px; text-align: center;">We Are Sorry !!<br>Currently there are no donors available for this blood group</h1>';
        }
    }
    ?>
    </header>
</body>
</html>