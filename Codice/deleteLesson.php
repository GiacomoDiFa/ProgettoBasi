<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Lesson</title>
</head>

<body>
    <?php
    if (
        !isset($_REQUEST["maleFirstName"]) or
        !isset($_REQUEST["maleLastName"]) or
        !isset($_REQUEST["femaleFirstName"]) or
        !isset($_REQUEST["femaleLastName"]) or
        !isset($_REQUEST["lectionTime"]) or
        !isset($_REQUEST["teacher"]) or
        !isset($_REQUEST["passwordCouple"])
    ) {
        echo "
        <h2>Input error!</h2>
        <p>Error: enter all the required data</p>";
        exit;
    }

    $firstNameMale = $_REQUEST["maleFirstName"];
    $lastNameMale = $_REQUEST["maleLastName"];
    $firstNameFemale = $_REQUEST["femaleFirstName"];
    $lastNameFemale = $_REQUEST["femaleLastName"];
    $lectionTime = $_REQUEST["lectionTime"];
    $teacher = $_REQUEST["teacher"];
    $password = $_REQUEST["passwordCouple"];

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
    if ($lectionTime == "") {
        echo "<h2>Input error!</h2>
        <p>Error: lection time not validated</p>";
    }
    if ($teacher == "") {
        echo "<h2>Input error!</h2>
        <p>Error: teacher not validated</p>";
    }
    if ($password == "") {
        echo "<h2>Input error!</h2>
        <p>Error: couple password not validated</p>";
    }

    if ($firstNameMale == "" || $lastNameMale == "" || $firstNameFemale == "" || $lastNameFemale == "" || $lectionTime == "" || $teacher == "" || $password == "")
        die();

    /*db connection */
    $con = mysqli_connect('localhost', 'root', '', 'danza');

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    mysqli_set_charset($con, 'utf8mb4');

    $sql = "SELECT c.NomeBallerino,c.CognomeBallerino,c.NomeBallerina,c.CognomeBallerina,c.Passkey FROM coppia as c;";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die('Query error: ' . mysqli_error($con));
    }
    if (checkCouple($result, $firstNameMale, $lastNameMale, $firstNameFemale, $lastNameFemale, $password)) {
        echo $lectionTime;
        $sql = "SELECT p.OraInizio, p.CodInsegnante
        FROM programmazione as p, coppia as c
        WHERE((p.CodCoppia=c.CodCoppia) AND (p.OraInizio = '$lectionTime') AND (p.CodInsegnante='$teacher') AND (c.NomeBallerino='$firstNameMale') AND (c.CognomeBallerino='$lastNameMale') AND (c.NomeBallerina = '$firstNameFemale') AND (c.CognomeBallerina = '$lastNameFemale'));";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_row($result);
       if($row > 0)
       {
           $sql = "DELETE FROM programmazione WHERE ((Orainizio = '$row[0]') AND (CodInsegnante = '$row[1]'))";
           mysqli_query($con,$sql);
           echo "<h2> Lesson successfully deleted!</h2>";
       }
       else
       {
           echo "<h2>Impossible to remove lesson! Try again1!</h2>";
       }
    } else {
        echo "<h2>Impossible to remove lesson! Try again!</h2>";
    }

    mysqli_close($con);


    function checkCouple($result, $firstNameMale, $lastNameMale, $firstNameFemale, $lastNameFemale,$password)
    {
        $bool = false;
        while ($row = mysqli_fetch_row($result)) {
            if (
                $row[0] == $firstNameMale and
                $row[1] == $lastNameMale and
                $row[2] == $firstNameFemale and
                $row[3] == $lastNameFemale and
                $row[4] == $password
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