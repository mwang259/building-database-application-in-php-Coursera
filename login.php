<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mengyuan Wang</title>
</head>
<body>
    <h1>Please Login</h1>

    <?php 
    require_once "pdo.php";

    if(isset($_POST['cancel'])){
        header("Location: index.php");
    }

    
    if( isset($_POST['who']) && isset($_POST['pass']) ){

        if ($_POST['who'] == "" || $_POST['pass'] == ""){

            echo '<p style="color:red">User name and password are required</p>';

        } elseif (strpos($_POST['who'], '@') == false){

            echo "<p style='color:red'>Email must have an at-sign (@)</p>";

        }else{

            $sql = "SELECT 'name' FROM users WHERE email = :em AND password = :pw";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':em' => $_POST['who'],
                ':pw' => $_POST['pass']
            ));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            var_dump($row);

            if($row === FALSE){
                $hash = hash('sha256', $_POST['pass']);
                error_log("Login fail ".$_POST['who']." $hash" );
                echo "<p style='color: red'>Incorrect password</p>";
            }else{
                error_log("Login success ".$_POST['who'] );
                echo "<p>Login success</p>\n";
                header("Location: autos.php?name=".urlencode($_POST['who']));
            }
        }
        
    }


    ?>
    <form method="post">
        <p>User Name: <input type="text" size="40" name="who"></p> 
        <p>Password: <input type="text" size="40" name="pass"></p>
        <p>
            <input type="submit" value="Log In">
            <input type="submit" value="Cancel" name="cancel">
            <input type="submit" value="Add" name="Add"> 
            <input type="submit" value="logout" name="logout">
            
        </p>
    </form>
</body>
</html>
