<html>
    <head>
<title>Insert data to PostgreSQL</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
li {
list-style: none;
}
</style>
</head>
<body>
<h1>INSERT DATA TO DATABASE</h1>
<h2>Enter data into table</h2>
<ul>
    <form name="InsertData" action="InsertData.php" method="POST" >
<li>toyID:</li><li><input type="text" name="toyid" /></li>
<li>Toy Name:</li><li><input type="text" name="toyname" /></li>

<li><input type="submit" /></li>
</form>
</ul>

<?php

    try {
        $host = "ec2-52-71-231-180.compute-1.amazonaws.com";
        $user = "dfxmhwkbzdlkkp";
        $pass = "ae49a3d06a4888005bf9bab50b221bf04600baac9c8602cf3b22e97293d4b3a9";
        $db = "d6n75bf48k3rl8";
    
        $pdo = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);
    
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }


if($pdo === false){
     echo "ERROR: Could not connect Database";
}

$sql = "INSERT INTO toy(toyid, toyname)"
        . " VALUES('$_POST[toyid]','$_POST[toyname]')";
$stmt = $pdo->prepare($sql);
//$stmt->execute();
 if (is_null($_POST[toyid])) {
   echo "toyid must be not null";
 }
 else
 {
    if($stmt->execute() == TRUE){
        echo "Record inserted successfully.";
    } else {
        echo "Error inserting record: ";
    }
 }
?>
</body>
</html>