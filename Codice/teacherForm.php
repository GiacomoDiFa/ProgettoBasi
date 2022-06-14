<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in Teacher</title>
    <style>
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
    <h3>New teacher registration</h3>
    <form method="get" action="insertTeacher.php">
        <p>New teacher data to be entered</p><br>
        <table>
            <tr>
                <td>First Name:</td>
                <td><input type="text" size="10" maxlength="30" name="firstNameTeacher"></td>
            </tr>
            <tr>
                <td>Last name:</td>
                <td><input type="text" size="10" maxlength="30" name="lastNameTeacher"></td>
            </tr>
            <tr>
                <td>Nationality:</td>
                <td><input type="text" size="10" maxlength="30" name="nationalityTeacher"></td>
            </tr>
            <tr>
                <td>Price(per hour):</td>
                <td><input type="text" size="10" maxlength="6" name="pricePerHour"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="teacherPassword"></td>
            </tr>
        </table>
        <br>
        <button><input type="submit" value="Insert"></button>
    </form>
    <br>
    <a href="index.php"><button>Go to home</button></a>
</body>

</html>