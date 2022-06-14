<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Couple Insertion</title>
</head>

<body>
    <?php
    if (
        !isset($_REQUEST["firstNameMale"]) or
        !isset($_REQUEST["lastNameMale"]) or
        !isset($_REQUEST["firstNameFemale"]) or
        !isset($_REQUEST["lastNameFemale"]) or
        !isset($_REQUEST["nationalityCouple"]) or
        !isset($_REQUEST["categoryCouple"]) or
        !isset($_REQUEST["classCouple"]) or
        !isset($_REQUEST["passwordCouple"]) or
        !isset($_REQUEST["passwordCoupleCheck"])
    ) {
        echo "
        <h2>Input error!</h2>
        <p>Error: enter all the required data</p>";
        exit;
    }

    $firstNameMale = $_REQUEST["firstNameMale"];
    $lastNameMale = $_REQUEST["lastNameMale"];
    $firstNameFemale = $_REQUEST["firstNameFemale"];
    $lastNameFemale = $_REQUEST["lastNameFemale"];
    $nationality = $_REQUEST["nationalityCouple"];
    $category = $_REQUEST["categoryCouple"];
    $class = $_REQUEST["classCouple"];
    $password = $_REQUEST["passwordCouple"];
    $passwordCheck = $_REQUEST["passwordCoupleCheck"];

    if ($firstNameMale == "") {
        echo "<h2>Input error!</h2>
        <p>Error: male first name not validated</p>";
    }
    if ($lastNameMale == "") {
        echo "<h2>Input error!</h2>
        <p>Error: male last name not validated</p>";
    }
    if ($firstNameFemale == "") {
        echo "<h2>Input error!</h2>
        <p>Error: female first name not validated</p>";
    }
    if ($lastNameFemale == "") {
        echo "<h2>Input error!</h2>
        <p>Error: female last name not validated</p>";
    }
    if ($nationality == "") {
        echo "<h2>Input error!</h2>
        <p>Error: couple nationality not validated</p>";
    }
    if ($category == "") {
        echo "<h2>Input error!</h2>
        <p>Error: couple category not validated</p>";
    }
    if ($class == "") {
        echo "<h2>Input error!</h2>
        <p>Error: couple class not validated</p>";
    }
    if ($password == "") {
        echo "<h2>Input error!</h2>
        <p>Error: couple password not validated</p>";
    }
    if ($passwordCheck == "") {
        echo "<h2>Input error!</h2>
        <p>Error: couple password not validated</p>";
    }

    if ($firstNameMale == "" || $lastNameMale == "" || $firstNameFemale == "" || $lastNameFemale == "" || $nationality == "" || $category == "" || $class == "" || $password == "" || $passwordCheck == "")
        die();

    /*db connection */
    $con = mysqli_connect('localhost', 'root', '', 'danza');

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    mysqli_set_charset($con, 'utf8mb4');

    $sql = "SELECT c.NomeBallerino,c.CognomeBallerino,c.NomeBallerina,c.CognomeBallerina FROM coppia as c;";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die('Query error: ' . mysqli_error($con));
    }
    if (checkCouple($result, $firstNameMale, $lastNameMale, $firstNameFemale, $lastNameFemale)) {
        echo "<h2>Input error!</h2>
            <p>The couple composed by $firstNameMale $lastNameMale and $firstNameFemale $lastNameFemale is already present in the database</p>";
    } else {
        if ($password != $passwordCheck) {
            echo "<h2>Input error!</h2>
            <p>Error: write the same passwords in the appropriate fields</p>";
        } else {

            /* insert execution */
            if (mysqli_query($con, "INSERT INTO Coppia(CodCoppia,NomeBallerino,CognomeBallerino,NomeBallerina,CognomeBallerina,Nazionalità,Categoria,Classe,Passkey)
    VALUES ('','$firstNameMale','$lastNameMale','$firstNameFemale','$lastNameFemale','$nationality','$category','$class','$password');")) {
                echo "
         <h2>Insertion successful! </h2>
         <p> The couple composed by $firstNameMale $lastNameMale and $firstNameFemale $lastNameFemale has been added to the database.</p>";
            } else {
                echo "
    <h2>Input error!</h2>
    <p>Error: Data could not be entered because an error occurred:</p>
    ";
                echo mysqli_error($con);
                exit;
            }
        }
    }

    mysqli_close($con);


    function checkCouple($result, $firstNameMale, $lastNameMale, $firstNameFemale, $lastNameFemale)
    {
        $bool = false;
        while ($row = mysqli_fetch_row($result)) {
            if (
                $row[0] == $firstNameMale and
                $row[1] == $lastNameMale and
                $row[2] == $firstNameFemale and
                $row[3] == $lastNameFemale
            ) {
                $bool = true;
            }
        }
        return $bool;
    }

    ?>
    </br>
    <form method="get" action="index.php">
        <input type="submit" value="Go back at home">
    </form>
</body>

</html>