<!DOCTYPE html>
<head>
    <!-- Link the stylesheet-->

    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:700" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>

<title>
    People
</title>



<body>

    <div class="header">
        <h1>Meme-o-pedia</h1>
    </div>

    <!--navbar--->
    <ul class="navbar">
        <li class="navbarlistpos"><a href="index.php">Home</a></li>
        <li class="navbarlistpos"><a href="catagory.php">Catagory</a></li>
        <li class="navbarlistpos"><a href="feedback.php">feedback</a></li>
        <li class="navbarlistpos"><a href="about.php">About</a></li>
        <div class="search-container">
            
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
            
        </div>
    </ul> 

<!--Navigation for catagories-->

<h1 class="textwhite" align="center">Meme Database</h1>

<div class="row">

<div class="leftcolumn">
<div class="card">
      <h3>Catagory</h3>

      <ul class="memebar">
        <li class="memelistpos"><a href="events.php">Events</a></li>
        <li class="memelistpos"><a href="people.php">People</a></li>
        <li class="memelistpos"><a href="memes.php">Memes</a></li>
        
      </ul> 



</div>

</div>
</div>

<!--Test posts from MYSQL-->

<?php


            include_once 'includes/dbh.inc.php';
            
            $sql = "SELECT * FROM Memes WHERE meme_catagory ='People'";

            $result = mysqli_query($conn, $sql) or die("bad Query: $sql");

            echo "<table border='1'>";
            echo "<tr><td>meme_ID</td> <td>catagory</td> <td>memetext</td> <td>picture</td> </tr>";

            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr> 
                <td>{$row['meme_id']}</td> <td>{$row['meme_catagory']}</td> <td>{$row['meme_text']}</td> <td>{$row['meme_pic']}</td>

                </tr>";
            }
            echo "</table>"


            
           
            
            
            
  ?>          
<div class="row">

<div class="leftcolumn">
    <div class="card">
    <h3>Catagory</h3>

    </div>

</div>
</div>

</body>


