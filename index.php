<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/kosar.png">
    <title>El Corvus webshop</title>
</head>
<body>
    <?php
    $servername="localhost";    
    $username="root";
    $password="";
    $dbname="el_corvus_webshop";

    try{
        $conn = new mysqli($servername, $username, $password, $dbname);
    }
    catch(mysqli_sql_exception $e) {
        die("<div class='cim'><h1>Nem sikerült kapcsolódni! " . $e."</h1></div>");
    }

    ?>
    <div class="cim">
        <h1>El Corvus webshop</h1>
    </div>
    <br>
    <div class="szuro">
        <span>Szűrő</span>
        <img src="images/szuro.png">
        <form method="post">
            <input type="text" name="szures"></input>
            <input type="submit" value="szűrés"></input>
            <input type="submit" value="szűrő feltétel törlése" name ="szurotorles">
        </form>
    </div>
    <div class="kosarcim">
        <a href="kosar.php"><h3>Kosár tartalma</h3></a>
        <a href="kosar.php">
        <div class="kosar">
            <img src="images/kosar.png">
        </div>
        </a>
    </div>

    <div class="cim">
        <h2>Termékek</h2>
    </div>
    <div class="termekek">
    <?php
    if(!isset($_SESSION["van_termek"])){
        $_SESSION["van_termek"] = false;
    }
        session_start();
        if(isset($_POST["szures"])){
            $_SESSION["feltetel"] = $_POST["szures"];
        }
        if (isset($_POST["szurotorles"])){
            unset($_SESSION["feltetel"]);
        }
        if (isset($_SESSION["feltetel"])){
            $sql= "SELECT id, termek, leiras, ar, kep FROM termekek WHERE termek LIKE'%".$_SESSION["feltetel"]."%'";
        }
        else{
            $sql = "SELECT id, termek, leiras, ar, kep FROM termekek";
        }
        $result = mysqli_query($conn, $sql);
        $i = 1;
    
        if (mysqli_num_rows($result)> 0) {
            echo "<table><tr>";
            while($row = $result->fetch_assoc()) {
                echo "<td><div class='termek'><h1>" . $row["termek"]. "</h1>" .  "<img src=" . "'images/termekek/" . $row["kep"] . "'><br><h3>ár: " . $row["ar"]. " Ft</h3></div><div class='leiras'>".$row["leiras"]."</div>";
                
                if(!isset($_SESSION["id".$row["id"]."db"])){
                    $_SESSION["id".$row["id"]."db"] = 0;
                }
                echo "<div class='kosarhozzaadas'><form method='post'><div class='hozzaadasdb'><input type='number' step = '1' min='1' name='".$row["id"]."hozzaadasdb'></input>db</div><input type='submit' value='Hozzáadás a kosárhoz'></input> </form></div></td>";
                if($i%3 == 0){
                    echo "</tr><tr>";
                    }
                if(isset($_POST[$row["id"]."hozzaadasdb"])){
                    $_SESSION["van_termek"] = true;
                    if ($_POST[$row["id"]."hozzaadasdb"] >= 1){
                        $_SESSION["id".$row["id"]."db"] += $_POST[$row["id"]."hozzaadasdb"];
                    }
                    else{
                        $_SESSION["id".$row["id"]."db"]++;
                    }
                }
                $i++;
            }
            if($i%3 != 0){
                echo "</tr>";
            }
            echo "</table>";
            $_SESSION["termekek"] = $i;
        }
    ?>
    </div>
    <br>
</body>
</html>
