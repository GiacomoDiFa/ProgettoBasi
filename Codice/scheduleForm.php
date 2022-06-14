<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        form {
            border: 3px solid #f1f1f1;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

            .cancelbtn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <h1>Schedule</h1>
    <table>
        <?php
        /* db connection */
        $con = mysqli_connect('localhost', 'root', '', 'danza');
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        mysqli_set_charset($con, 'utf8mb4');
        /* query execution */
        $sql = "SELECT p.OraInizio,s.NomeSala,c.NomeBallerino,c.CognomeBallerino,c.NomeBallerina,c.CognomeBallerina,l.BalloTrattato,i.Nome,i.Cognome
        FROM programmazione as p, sala as s, coppia as c, lezione as l, insegnante as i
        WHERE( (p.CodLezione = l.CodLezione) AND (p.CodInsegnante = i.CodInsegnante) AND (p.CodCoppia = c.CodCoppia) AND (p.CodSala = s.CodSala)) ORDER BY(p.OraInizio);";
        $result = mysqli_query($con, $sql);
        if (!$result) {
            die('Query error: ' . mysqli_error($con));
        }
        /* load data in menù */
        echo "<tr>
        <td>Start Time </td>
        <td>Room</td>
        <td>Fisrtname Male</td>
        <td>Lastname Male</td>
        <td>Firstname Female</td>
        <td>Lastname Female</td>
        <td>Argument Lesson</td>
        <td>Firstname Teacher</td>
        <td>Lastname Teacher</td>
        </tr>";
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_row($result)) {
                echo "
                <td>$row[0]</td>
                <td>$row[1]</td>
                <td>$row[2]</td>
                <td>$row[3]</td>
                <td>$row[4]</td>
                <td>$row[5]</td>
                <td>$row[6]</td>
                <td>$row[7]</td>
                <td>$row[8]</td>
                </tr>
                ";
            }
        }
        ?>
    </table>
    <br><br>
    <a href="filterByTime.php"><button>Filter by Time</button></a>
    <a href="filterByRoom.php"><button>Filter by Room</button></a>
    <a href="filterByCouple.php"><button>Filter by Couple</button></a>
    <a href="filterByTeacher.php"><button>Filter by Teacher</button></a>
    <a href="index.php"><button>Go to home</button></a>
</body>

</html>