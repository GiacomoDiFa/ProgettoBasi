<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher insertion</title>
</head>

<body>
    <?php
    if (
        !isset($_REQUEST["firstNameTeacher"]) or
        !isset($_REQUEST["lastNameTeacher"]) or
        !isset($_REQUEST["nationalityTeacher"]) or
        !isset($_REQUEST["pricePerHour"]) or
        !isset($_REQUEST["teacherPassword"])
    ) {
        echo "
        <h2>Input error!</h2>
        <p>Error: enter all the required data</p>";
        exit;
    }

    $firstName = $_REQUEST["firstNameTeacher"];
    $lastName = $_REQUEST["lastNameTeacher"];
    $nationality = $_REQUEST["nationalityTeacher"];
    $price = $_REQUEST["pricePerHour"];
    $password = $_REQUEST["teacherPassword"];

    if ($firstName == "") {
        echo "<h2>Input error!</h2>
        <p>Error: teacher first name not validated</p>";
    }
    if ($lastName == "") {
        echo "<h2>Input error!</h2>
        <p>Error: teacher last name not validated</p>";
    }
    if ($nationality == "") {
        echo "<h2>Input error!</h2>
        <p>Error: teacher nationality not validated</p>";
    }
    if ($price == "") {
        echo "<h2>Input error!</h2>
        <p>Error: price per hour not validated</p>";
    }
    if ($password == "") {
        echo "<h2>Input error!</h2>
        <p>Error: teacher password not validated</p>";
    }
    if ($firstName == "" || $lastName == "" || $nationality == "" || $price == "" || $password == "")
        die();

    if (!is_numeric($price)) {
        echo "
    <h2>Input error!</h2>
    <p>Error: The price must be a numerical value greater than zero</p>";
        exit;
    }

    if ($price < 0) {
        echo "
    <h2>Input error!</h2>
    <p>Error: The price must be a numerical value greater than zero</p>";
        exit;
    }

    /*db connection */
    $con = mysqli_connect('localhost', 'root', '', 'danza');

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    mysqli_set_charset($con, 'utf8mb4');

    $sql = "SELECT i.Nome,i.Cognome FROM insegnante as i;";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die('Query error: ' . mysqli_error($con));
    }



    if ($password != "iamateacher") {
        /*password verification */
        echo "<h2>Input error!</h2>
        <p>The password is incorrect! Enter the correct password! </p>";
    } else {
        if (checkTeacher($result,$firstName,$lastName)) {
            echo "<h2>Input error!</h2>
            <p>The teacher $firstName $lastName is already present in the database</p>";
            }
            else {

            /* insert execution */
            if (mysqli_query($con, "INSERT INTO Insegnante(CodInsegnante,Nome,Cognome,Nazionalità,PrezzoAdOra)
    VALUES ('','$firstName','$lastName','$nationality','$price');")) {
                echo "
         <h2>Insertion successful! </h2>
         <p> The teacher $firstName $lastName has been added to the database.</p>";
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

    function checkTeacher($result, $firstName, $lastName)
    {
        $bool = false;
        while ($row = mysqli_fetch_row($result)) {
            if (
                $row[0] == $firstName and
                $row[1] == $lastName
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