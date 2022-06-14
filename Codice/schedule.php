<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule</title>
</head>

<body>
    <?php

    use LDAP\Result;

    if (
        !isset($_REQUEST["lectionTime"]) or
        !isset($_REQUEST["lection"]) or
        !isset($_REQUEST["teacher"]) or
        !isset($_REQUEST["room"]) or
        !isset($_REQUEST["maleFirstName"]) or
        !isset($_REQUEST["maleLastName"]) or
        !isset($_REQUEST["femaleFirstName"]) or
        !isset($_REQUEST["femaleLastName"]) or
        !isset($_REQUEST["passwordCouple"])
    ) {
        echo "
        <h2>Input error!</h2>
        <p>Error: enter all the required data</p>";
    }

    $lectionTime = $_REQUEST["lectionTime"];
    $lection = $_REQUEST["lection"];
    $teacher = $_REQUEST["teacher"];
    $room = $_REQUEST["room"];
    $maleFirstName = $_REQUEST["maleFirstName"];
    $maleLastName = $_REQUEST["maleLastName"];
    $femaleFirstName = $_REQUEST["femaleFirstName"];
    $femaleLastName = $_REQUEST["femaleLastName"];
    $passwordCouple = $_REQUEST["passwordCouple"];


    if ($maleFirstName == "") {
        echo "<h2>Input error!</h2>
        <p>Error: male first name not validated</p>";
    }
    if ($maleLastName == "") {
        echo "<h2>Input error!</h2>
        <p>Error: male last name not validated</p>";
    }
    if ($femaleFirstName == "") {
        echo "<h2>Input error!</h2>
        <p>Error: female first name not validated</p>";
    }
    if ($femaleLastName == "") {
        echo "<h2>Input error!</h2>
        <p>Error: female last name not validated</p>";
    }
    if ($passwordCouple == "") {
        echo "<h2>Input error!</h2>
        <p>Error: couple password not validated</p>";
    }
    if ($maleFirstName == "" || $maleLastName == "" || $femaleFirstName == "" || $femaleLastName == "" || $passwordCouple == "")
        die();

    /*db connection */
    $con = mysqli_connect('localhost', 'root', '', 'danza');

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    mysqli_set_charset($con, 'utf8mb4');


    /* vedere se bisogna cambiare automocommit e start transaction */
    mysqli_query($con, "SET autocommit=0;");
    mysqli_query($con, "START TRANSACTION;");


    /*veryfy if couple is present in database */
    $sql = "SELECT c.CodCoppia 
    FROM coppia as c 
    WHERE(((c.NomeBallerino='$maleFirstName') AND (c.CognomeBallerino='$maleLastName') AND (c.NomeBallerina='$femaleFirstName')AND(c.CognomeBallerina='$femaleLastName')));";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die('Query error: ' . mysqli_error($con));
    }
    if (mysqli_num_rows($result) == 0) {
        echo "Input error!
        The couple is not logged into the database";
    } else {

        /*verify correspondence of password */

        $sql = "SELECT c.Passkey 
    FROM coppia as c 
    WHERE ((c.NomeBallerino = '$maleFirstName') AND (c.CognomeBallerino='$maleLastName') AND (c.NomeBallerina = '$femaleFirstName') AND (c.CognomeBallerina = '$femaleLastName'));";
        $result = mysqli_query($con, $sql);
        if (!$result) {
            die('Query error: ' . mysqli_error($con));
        }
        $row = mysqli_fetch_row($result);
        if ($row[0] != $passwordCouple) {
            echo "<h2>Input error!</h2>
        <p>The password is incorrect! Enter the correct password! </p>";
        } else {

            /* teacher hour test */
            $sql = "SELECT COUNT(*) 
    FROM programmazione as p
    WHERE((p.CodInsegnante = '$teacher') AND (p.OraInizio = '$lectionTime'));";

            $result = mysqli_query($con, $sql);

            if (!$result) {
                die("Query error: " . mysqli_error($con));
            }

            $row = mysqli_fetch_row($result);
            if ($row[0] != 0) {
                echo "<h2>Input error!</h2>
        <p>It is not possible to select this teacher at this time as he is already in a lesson</p>";
                mysqli_query($con, "ROLLBACK;");
            } else {
                /*capacity of room */
                $sql = "Select p.CodSala, COUNT(*),s.NomeSala
            FROM programmazione as p, sala as s
            WHERE((p.CodSala = s.CodSala) AND (p.CodSala = '$room') AND (p.OraInizio = '$lectionTime') );";
                $result = mysqli_query($con, $sql);
                if (!$result) {
                    die("Query error: " . mysqli_error($con));
                }
                $row = mysqli_fetch_row($result);
                if (($row[0] == 'CS01' or $row[0] == 'CS07' or $row[0] or 'CS08') and ($row[1] >= 4)) /*ricordarsi perchè il >= */ {
                    echo "The room $row[2] is occupied at this time! Try at another time ";
                } else if (($row[0] == 'CS02' or $row[0] == 'CS06' or $row[0] or 'CS09') and ($row[1] >= 8)) {
                    echo "The room $row[2] is occupied at this time! Try at another time ";
                } else if (($row[0] == 'CS03') and ($row[1] > 12)) {
                    echo "The room $row[2] is occupied at this time! Try at another time ";
                } else if (($row[0] == 'CS04' or $row[0] == 'CS05' or $row[0] or 'CS10') and ($row[1] >= 16)) {
                    echo "The room $row[2] is occupied at this time! Try at another time ";
                } else {
                    $sql = "SELECT c.CodCoppia FROM coppia as c WHERE((c.NomeBallerino='$maleFirstName') AND (c.CognomeBallerino='$maleLastName') AND (c.NomeBallerina='$femaleFirstName') AND (c.CognomeBallerina='$femaleLastName'));";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_row($result);
                    $codCoppia = $row[0];
                    if (mysqli_query($con, "INSERT INTO `programmazione` (`OraInizio`, `CodLezione`, `CodInsegnante`, `CodCoppia`, `CodSala`) 
            VALUES ('$lectionTime', '$lection', '$teacher', '$codCoppia', '$room');")) {
                        mysqli_query($con, "COMMIT;");
                        echo "<div class = 'w3-green w3-text-white'>
                    <h2>Inserimento avvenuto!</h2>
                    <p>La lezione è stata inserita nel programma dei corsi.</p>
                    </div>";
                    };
                }
            }
        }
    }
    ?>
</body>
</html>