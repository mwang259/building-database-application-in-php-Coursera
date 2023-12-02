<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mengyuan Wang</title>
</head>
<body>
    <?php
    require_once "pdo.php";

    try{
        if( isset($_GET['name'])){
          
            echo "<h1>Tracking Autos for ".$_GET['name']."</h1>";
        } else{
            die ("Name parameter missing");
        }
    }catch(PDOException $e){
        echo "Connection failed: ". $e->getMessage();
    
    }
    
    if(isset($_POST['logout'])){
        header("Location: login.php");
    }else{
        if(isset($_POST['make']) && isset($_POST['year']) && isset($_POST['mile'])){

            if ($_POST['make'] == ""){

                echo "<p style='color:red'>Make is required</p>";

            }elseif(is_numeric($_POST['year']) && is_numeric($_POST['mile'])){

                $stmt= $pdo->prepare("INSERT INTO autos (make, year, mileage) VALUES (:mk, :yr, :mi)");

                $stmt->execute(array(
                    ':mk'=>$_POST['make'],
                    ':yr'=>$_POST['year'],
                    ':mi'=>$_POST['mile']
                ));

                echo "<p style='color:green'>Record inserted</p>";
                
            }else{
                echo "<p style='color:red'>year and mileage are must be numeric</p>";
            }
        }
    }
    
    
    ?>

    <form method = "post">
        <p>Make: <input type="text" size="40" name="make"></p>
        <p>Year: <input type="text" size="40" name="year"></p>
        <p>Mileage: <input type="text" size="40" name="mile"></p>
        <p>
            <input type="submit" value="Add" name="Add"> 
            <input type="submit" value="logout" name="logout">
        </p>
    </form>

   
    <h2>Automobiles:</h2>
    <?php
    $stmt2 = $pdo->query("SELECT * FROM autos");

    
    while($row = $stmt2->fetch(PDO::FETCH_ASSOC)){
        echo "<li style='list-style-type: none'>";
        echo $row['year']." ";
        echo htmlentities($row['make'])." ";
        echo $row['mileage'];
        echo "</li>";
       
    }
    
    
    ?>

</body>
</html>