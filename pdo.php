<?php
$dbms='mysql'; //database type
$hostName='localhost'; //database host name
$dbName='misc'; //use database
$userName='root'; //database connected username
$password='root'; //database connected pass

try{
    $pdo = new PDO("mysql:host=$hostName;dbname=$dbName", $userName,$password);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "connect successfully \n";
}catch (PDOException $e){
    echo "Connection failed: ". $e->getMessage();

}

// // create database
// try{
//     $sql = "create database misc";
//     $pdo->exec($sql);
//     echo "create database successfully \n";

// } catch(PDOException $e){
//     echo "Connection failed: ". $e->getMessage();


// }


// // create table users
// try{
//     $sql = "create table users(
//         id INT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
//         username VARCHAR(128),
//         email VARCHAR(128),
//         password VARCHAR(128),
//         PRIMARY KEY (id)
//     ) ENGINE=InnoDB CHARSET=utf8";
//     $pdo->exec($sql);
//     echo "create table successfully \n";

// } catch(PDOException $e){
//     echo "Connection failed: ". $e->getMessage();


// }

// // insert data into table users
// try{
//     $sql = "insert into users (username, email, password) values ('csev', 'csev@autos.com', 'php123'), ('gg', 'gg@umich.edu', 'php123')";
//     $pdo->exec($sql);
//     echo "inert data successfully \n";

// } catch(PDOException $e){
//     echo "Connection failed: ". $e->getMessage();

// }


// // create table autos and insert one data
// try{
//     $sql = "CREATE TABLE autos (
//         auto_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
//         make VARCHAR(128),
//         `year` INTEGER,
//         mileage INTEGER,
//         PRIMARY KEY(auto_id)
//         ) ENGINE=InnoDB CHARSET=utf8";
//     $pdo->exec($sql);
//     echo "create table successfully \n";

//     $sql2 = "insert into autos (make, year, mileage) values ('BWM', '1990', '15102')";
//     $pdo->exec($sql2);
//     echo "insert data successfully \n";

// } catch(PDOException $e){
//     echo "Connection failed: ". $e->getMessage();
// }

?>