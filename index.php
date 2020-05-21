<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style.css" />
    <!-- <script src="index.js"></script> -->
    <title>Electricity Duty Exemption Certificate Form</title>

    <style>
        body {
            background-image: url(images/images.jfif);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            height: 100vh;
        }
    </style>
</head>

<body>

    <div class="box">
        <h2>Form</h2>
        <form action="form.php" method="post">
            <div>
                <input type="text" name="name1" required />
                <label for="name">Name</label>
            </div>
            <div>
                <input type="number" name="g_o1" required />
                <label for="name">G.O.No.</label>
            </div>
            <div>
                <input type="number" name="unit_letter_no2" required />
                <label for="name">Unit Letter No.</label>
            </div>
            <div>
                <input type="date" name="unit_date1" required />
                <label for="name">Unit Dt.</label>
            </div>

            <div>
                <input type="text" name="field1" required />
                <label for="name">Industry Field</label>
            </div>



            <input type="submit" value="submit" name="submit" />
        </form>
    </div>

</body>

</html>