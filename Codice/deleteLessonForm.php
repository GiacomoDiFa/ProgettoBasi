<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Lesson</title>
    <style>
        /*the container must be positioned relative:*/


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

        .custom-select {
            position: relative;
            font-family: Arial;
        }

        .custom-select select {
            display: none;
            /*hide original SELECT element:*/
        }

        .select-selected {
            background-color: #04AA6D;
        }

        /*style the arrow inside the select element:*/
        .select-selected:after {
            position: absolute;
            content: "";
            top: 14px;
            right: 10px;
            width: 0;
            height: 0;
            border: 6px solid transparent;
            border-color: #fff transparent transparent transparent;
        }

        /*point the arrow upwards when the select box is open (active):*/
        .select-selected.select-arrow-active:after {
            border-color: transparent transparent #fff transparent;
            top: 7px;
        }

        /*style the items (options), including the selected item:*/
        .select-items div,
        .select-selected {
            color: #ffffff;
            padding: 8px 16px;
            border: 1px solid transparent;
            border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
            cursor: pointer;
            user-select: none;
        }

        /*style items (options):*/
        .select-items {
            position: absolute;
            background-color: #04AA6D;
            top: 100%;
            left: 0;
            right: 0;
            z-index: 99;
        }

        /*hide the items when the select box is closed:*/
        .select-hide {
            display: none;
        }

        .select-items div:hover,
        .same-as-selected {
            background-color: rgba(0, 0, 0, 0.1);
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
    <h3>Delete Booked Lesson</h3>
    <form method="post" action="">
        <p>Fill in the following fields to delete your lesson booked</p> <br>
        <table>
            <tr>
                <td>Start Time:</td>
                <td>
                    <div class="custom-select" style="width:200px;">
                        <select name="lectionTime">
                            <option value="Select time">Select time</option>
                            <option value="6:00:00" <?php if (isset($_POST['lectionTime']) && $_POST['lectionTime'] == '6:00:00')
                                                        echo 'selected= "selected"';
                                                    ?>>6:00:00</option>
                            <option value="7:00:00" <?php if (isset($_POST['lectionTime']) && $_POST['lectionTime'] == '7:00:00')
                                                        echo 'selected= "selected"';
                                                    ?>>7:00:00</option>
                            <option value="8:00:00" <?php if (isset($_POST['lectionTime']) && $_POST['lectionTime'] == '8:00:00')
                                                        echo 'selected= "selected"';
                                                    ?>>8:00:00</option>
                            <option value="9:00:00" <?php if (isset($_POST['lectionTime']) && $_POST['lectionTime'] == '9:00:00')
                                                        echo 'selected= "selected"';
                                                    ?>>9:00:00</option>
                            <option value="10:00:00" <?php if (isset($_POST['lectionTime']) && $_POST['lectionTime'] == '10:00:00')
                                                            echo 'selected= "selected"';
                                                        ?>>10:00:00</option>
                            <option value="11:00:00" <?php if (isset($_POST['lectionTime']) && $_POST['lectionTime'] == '11:00:00')
                                                            echo 'selected= "selected"';
                                                        ?>>11:00:00</option>
                            <option value="12:00:00" <?php if (isset($_POST['lectionTime']) && $_POST['lectionTime'] == '12:00:00')
                                                            echo 'selected= "selected"';
                                                        ?>>12:00:00</option>
                            <option value="13:00:00" <?php if (isset($_POST['lectionTime']) && $_POST['lectionTime'] == '13:00:00')
                                                            echo 'selected= "selected"';
                                                        ?>>13:00:00</option>
                            <option value="14:00:00" <?php if (isset($_POST['lectionTime']) && $_POST['lectionTime'] == '14:00:00')
                                                            echo 'selected= "selected"';
                                                        ?>>14:00:00</option>
                            <option value="15:00:00" <?php if (isset($_POST['lectionTime']) && $_POST['lectionTime'] == '15:00:00')
                                                            echo 'selected= "selected"';
                                                        ?>>15:00:00</option>
                            <option value="16:00:00" <?php if (isset($_POST['lectionTime']) && $_POST['lectionTime'] == '16:00:00')
                                                            echo 'selected= "selected"';
                                                        ?>>16:00:00</option>
                            <option value="17:00:00" <?php if (isset($_POST['lectionTime']) && $_POST['lectionTime'] == '17:00:00')
                                                            echo 'selected= "selected"';
                                                        ?>>17:00:00</option>
                            <option value="18:00:00" <?php if (isset($_POST['lectionTime']) && $_POST['lectionTime'] == '18:00:00')
                                                            echo 'selected= "selected"';
                                                        ?>>18:00:00</option>
                            <option value="19:00:00" <?php if (isset($_POST['lectionTime']) && $_POST['lectionTime'] == '19:00:00')
                                                            echo 'selected= "selected"';
                                                        ?>>19:00:00</option>
                            <option value="20:00:00" <?php if (isset($_POST['lectionTime']) && $_POST['lectionTime'] == '20:00:00')
                                                            echo 'selected= "selected"';
                                                        ?>>20:00:00</option>
                            <option value="21:00:00" <?php if (isset($_POST['lectionTime']) && $_POST['lectionTime'] == '21:00:00')
                                                            echo 'selected= "selected"';
                                                        ?>>21:00:00</option>
                            <option value="22:00:00" <?php if (isset($_POST['lectionTime']) && $_POST['lectionTime'] == '22:00:00')
                                                            echo 'selected= "selected"';
                                                        ?>>22:00:00</option>
                        </select>
                    </div>
                <td><button>Confirm Time</button></td>
            </tr>
        </table>
        <table>
            </td>
            </tr>
            <tr>
            <tr>
                <td>Selected Time:</td>
                <td> <output name="selectedTime"><?php
                                                    error_reporting(E_ERROR);
                                                    $selectedTime = $_POST["lectionTime"];
                                                    echo $selectedTime; ?></output></td>
                <td>Teacher:</td>
                <td>
                    <div class="custom-select" style="width:200px;">
                        <select name="teacher">
                            <?php
                            $lectionTime = $_POST["lectionTime"];
                            /* db connection */
                            $con = mysqli_connect('localhost', 'root', '', 'danza');
                            if (mysqli_connect_errno()) {
                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                            }
                            mysqli_set_charset($con, 'utf8mb4');
                            /* query execution */
                            $sql = "SELECT i.CodInsegnante,i.Nome,i.Cognome,i.PrezzoAdOra
                        FROM insegnante as i 
                        WHERE(i.CodInsegnante IN( SELECT p.CodInsegnante FROM programmazione as p 
                        WHERE(p.OraInizio = '$lectionTime')));";
                            $result = mysqli_query($con, $sql);
                            if (!$result) {
                                die('Query error: ' . mysqli_error($con));
                            }
                            /* load data in menù */
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_row($result)) {
                                    echo "<option value = $row[0]>$row[1] $row[2] (price per hour: $row[3]€)</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Male firstname:</td>
                <td><input type="text" name="maleFirstName"></td>
            </tr>
            <tr>
                <td>Male lastname:</td>
                <td><input type="text" name="maleLastName"></td>
            </tr>
            <tr>
                <td>Female firstname:</td>
                <td><input type="text" name="femaleFirstName"></td>
            </tr>
            <tr>
                <td>Female lastname:</td>
                <td><input type="text" name="femaleLastName"></td>
            </tr>
            <tr>
                <td>Password of couple:</td>
                <td><input type="password" name="passwordCouple"></td>
            </tr>
        </table>
        <p><button formaction="deleteLesson.php">Delete</button></p>
    </form>
    <a href="index.php"><button>Go to home</button></a>

    <script>
        var x, i, j, l, ll, selElmnt, a, b, c;
        /*look for any elements with the class "custom-select":*/
        x = document.getElementsByClassName("custom-select");
        l = x.length;
        for (i = 0; i < l; i++) {
            selElmnt = x[i].getElementsByTagName("select")[0];
            ll = selElmnt.length;
            /*for each element, create a new DIV that will act as the selected item:*/
            a = document.createElement("DIV");
            a.setAttribute("class", "select-selected");
            a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
            x[i].appendChild(a);
            /*for each element, create a new DIV that will contain the option list:*/
            b = document.createElement("DIV");
            b.setAttribute("class", "select-items select-hide");
            for (j = 1; j < ll; j++) {
                /*for each option in the original select element,
                create a new DIV that will act as an option item:*/
                c = document.createElement("DIV");
                c.innerHTML = selElmnt.options[j].innerHTML;
                c.addEventListener("click", function(e) {
                    /*when an item is clicked, update the original select box,
                    and the selected item:*/
                    var y, i, k, s, h, sl, yl;
                    s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                    sl = s.length;
                    h = this.parentNode.previousSibling;
                    for (i = 0; i < sl; i++) {
                        if (s.options[i].innerHTML == this.innerHTML) {
                            s.selectedIndex = i;
                            h.innerHTML = this.innerHTML;
                            y = this.parentNode.getElementsByClassName("same-as-selected");
                            yl = y.length;
                            for (k = 0; k < yl; k++) {
                                y[k].removeAttribute("class");
                            }
                            this.setAttribute("class", "same-as-selected");
                            break;
                        }
                    }
                    h.click();
                });
                b.appendChild(c);
            }
            x[i].appendChild(b);
            a.addEventListener("click", function(e) {
                /*when the select box is clicked, close any other select boxes,
                and open/close the current select box:*/
                e.stopPropagation();
                closeAllSelect(this);
                this.nextSibling.classList.toggle("select-hide");
                this.classList.toggle("select-arrow-active");
            });
        }

        function closeAllSelect(elmnt) {
            /*a function that will close all select boxes in the document,
            except the current select box:*/
            var x, y, i, xl, yl, arrNo = [];
            x = document.getElementsByClassName("select-items");
            y = document.getElementsByClassName("select-selected");
            xl = x.length;
            yl = y.length;
            for (i = 0; i < yl; i++) {
                if (elmnt == y[i]) {
                    arrNo.push(i)
                } else {
                    y[i].classList.remove("select-arrow-active");
                }
            }
            for (i = 0; i < xl; i++) {
                if (arrNo.indexOf(i)) {
                    x[i].classList.add("select-hide");
                }
            }
        }
        /*if the user clicks anywhere outside the select box,
        then close all select boxes:*/
        document.addEventListener("click", closeAllSelect);
    </script>
</body>

</html>