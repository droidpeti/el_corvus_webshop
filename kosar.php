<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/kosar.png">
    <title>El Corvus webshop kosár</title>
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
        <h1>Ez itt a kosarad!</h1>
    </div>

    <div class="vissza">
        <a href="index.php"><h2>Vissza a főoldalra</h2></a>
    </div>
    <br>
   

    <div class="kosar_termekek">
    <?php
        session_start();
        $sql = "SELECT id, termek, leiras, ar, kep FROM termekek";
        $result = mysqli_query($conn, $sql);    
        $szallitasi_koltseg = 1690;
        $sum_ar =  $szallitasi_koltseg;
        if (mysqli_num_rows($result)> 0 && isset($_SESSION["id1db"]) && $_SESSION["van_termek"]) {
            echo "<table>";
            while($row = $result->fetch_assoc()) {
                if($_SESSION["id".$row["id"]."db"] > 0){
                    echo "<tr><td><div class='kosar_termek'><h1>".$row["termek"]."</h1>";
                    echo "<img src='images/termekek/".$row["kep"]."'>";
                    echo "<h3>1db termék ára: ".$row["ar"]." Ft</h3><h3>".$_SESSION["id".$row["id"]."db"]." db <form method='post'><input type='submit' name='csokkentes".$row["id"]."' value='-1' style='background-color: red'>  <input type='submit' name='noveles".$row["id"]."'value='+1' style='background-color: green'></input></form>". "</h3> <h3>összes érték: ". $row["ar"]*$_SESSION["id".$row["id"]."db"]." Ft</h3></div></td></tr>";
                    if(isset($_POST["csokkentes".$row["id"]])){
                        $_SESSION["id".$row["id"]."db"]--;
                        header("Refresh:0");
                    }
                    if(isset($_POST["noveles".$row["id"]])){
                        $_SESSION["id".$row["id"]."db"]++;
                        header("Refresh:0");
                    }
                    $sum_ar += $row["ar"]*$_SESSION["id".$row["id"]."db"];
                }
            }
            echo "<tr><td><h1>Szállítási költség: ".$szallitasi_koltseg." Ft</h1></td></tr>";
            echo "</table>";
            echo "<div class='cim'><h1> A végösszeg: ". (($sum_ar)-($szallitasi_koltseg)) . " Ft </h1></div>";
            echo "<div class='cim'><h1> A végösszeg szállítással: ". $sum_ar . " Ft </h1></div>";
            echo "<div class='kosar_urites'><form method='post'><input type='submit' value='Kosár kiűrítése' name='urites'></input></form></div>";
            if(isset($_POST["urites"])){
                session_unset();
                header("Refresh:0");
            }
            }
            else{
                echo "<div class='cim'><h1>A kosarad üres!</h1></div>";
            }
    ?>
    </div>
</body>
</html>
