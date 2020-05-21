<?php


if (isset($_POST['submit1'])) {
    require_once("tcpdf/tcpdf.php");
    $name_ = $_POST['name'];
    $g_o = $_POST['g_o'];
    $unit = $_POST['unit_letter_no'];
    $ind_field = $_POST['field'];
    $vide_no = $_POST['vide_no'];
    $manufacture = $_POST['manufacture_of'];
    $dept = $_POST['dept'];
    $zone_ = $_POST['zone'];
    $bill_no = $_POST['bill_no'];
    $date_ = $_POST['cmnct_date'];
    $years = $_POST['years'];

    $servername = "localhost";
    $username = "root";
    $password = "password@123";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=dic", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "INSERT INTO data(name_,g_o,unit_no,industry_field,vide_no,manufacture_of,dept,zone,comncmnt_date,years) VALUES ( '$name_', '$g_o', '12', '$ind_field', '$vide_no', '$manufacture', '$dept', '$zone_', '$date_', $years)";
        $smt = $conn->prepare($query);
        $smt->execute([$name_, $g_o, $unit, $ind_field, $vide_no, $manufacture, $dept, $zone_, $date_, $years]);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    // $connect = mysqli_connect('localhost', 'Nani', 'Nani@123', 'dic');
    // 
    // $res = mysqli_query($connect, $query);
    // $servername = "localhost";
    // $username = "root";
    // $password = "password@123";

    // // // Create connection
    // $conn = new mysqli($servername, $username, $password, "dic");

    // // // Check connection
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }
    // echo "Connected successfully";

    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $obj_pdf->SetCreator(PDF_CREATOR);
    $obj_pdf->SetTitle('Electricity Duty Exemption Certificate');
    $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
    $obj_pdf->SetHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $obj_pdf->SetFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $obj_pdf->SetDefaultMonospacedFont('helvetica');
    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
    $obj_pdf->setPrintHeader(false);
    $obj_pdf->setPrintFooter(false);
    $obj_pdf->SetAutoPageBreak(TRUE, 10);
    $obj_pdf->SetFont('helvetica', '', 12);
    $obj_pdf->AddPage();
    $content = '';
    $content .= ' <br>
<h3 align="center" style="font-family: blackletter">CERTIFICATE</h3><br><br>

<table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <th width="20%">Sub:</th>
        <th width="80%">Exemption of certificate or Electricity Tax to M/s.' . $name_ . ' </th>

    </tr>
    <tr>
        <th width="20%">Ref:</th>
        <th width="80%">1. G.O.No: CI/58/SPI/2013, Dt: 01.10.2014.</th>

    </tr>
    <tr>
        <th width="20%"></th>
        <th width="80%">2. G.O.No:' . $g_o . '</th>

    </tr>
    <tr>
        <th width="20%"></th>
        <th width="80%">3. Unit Letter No:' . $unit . '</th>

    </tr>



    ';

    $content .= '
</table>';
    $content .= '<br><br>1. This is to certify that M/s.<span style="text-decoration: underline;">' . $name_ . '</span> is a <span style="text-decoration: underline;">' . $ind_field . '</span> industry field IEM & acknowledgement issued vide No. <span style="text-decoration: underline;">' . $vide_no . '</span>, for manufacture of <span style="text-decoration: underline;">' . $manufacture . '</span> by Dept of <span style="text-decoration: underline;">' . $dept . '</span>.<br>';
    $content .= '<br>2. The enterprise is located at zone <span style="text-decoration: underline;">' . $zone_ . '</span> as specified in the Government Order cited at ref(1) above.<br>';
    $content .= '<br>3. The enterprise has started Commercial production as envisaged by the 1st sale invoice. Bill No.: <span style="text-decoration: underline;">' . $bill_no . '</span> , issued by the enterprise.<br>';
    $content .= '<br>4. The enterprise is entitled to avail the exemption from payment of electricity tax/duty from the date of commencement of commercial production i.e, Dt:<span style="text-decoration: underline;">' . $date_ . '</span>, for a period of <span style="text-decoration: underline;">' . $years . '</span> years as per the Go order cited at ref(2) above.';
    $content .= '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div align="bottom"> Joint Director(DIC)/(ID).............. <br>
    <h3>To,</h3><br> M/s ...................................... <br>
    <h3>Copy:</h3><br>1. Office of Superintending Engineer(Ele),................................,<br>2. Office Copy. ';
    $obj_pdf->writeHTML($content);
    $obj_pdf->Output('Certificate.pdf', 'I');
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style.css" />
    <script src="index.js"></script>
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
        <h2>Electricity Invoice</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <div>
                <input type="text" name="name" value="<?php echo $_POST['name1']; ?>" hidden />
                <label for="name" hidden>Name</label>
            </div>
            <div>
                <input type="number" name="g_o" value="<?php echo $_POST['g_o1']; ?>" hidden />
                <label for="name" hidden>G.O.No.</label>
            </div>
            <div>
                <input type="number" name="unit_letter_no" value="<?php echo $_POST['unit_letter_no2']; ?>" hidden />
                <label for="name" hidden>Unit Letter No.</label>
            </div>
            <div>
                <input type="date" name="unit_date" value="<?php echo $_POST['unit_date1']; ?>" hidden />
                <label for="name" hidden>Unit Dt.</label>
            </div>

            <div>
                <input type="text" name="field" value=" <?php echo $_POST['field1']; ?>" hidden />
                <label for="name" hidden>Industry Field</label>
            </div>
            <div>
                <input type="number" name="vide_no" required />
                <label for="name">Vide No.</label>
            </div>
            <div>
                <input type="text" name="manufacture_of" required />
                <label for="name">manufactureOf</label>
            </div>
            <div>
                <input type="text" name="dept" required />
                <label for="name">department</label>
            </div>
            <div>
                <input type="text" name="zone" required />
                <label for="name">zone</label>
            </div>
            <div>
                <input type="number" name="bill_no" required />
                <label for="name">Bill No.</label>
            </div>
            <div>
                <input type="date" name="cmnct_date" required />
                <label for="name">Commencement date</label>
            </div>
            <div>
                <input type="number" name="years" required />
                <label for="name">Years</label>
            </div>

            <input type="submit" value="submit" name="submit1" />
        </form>
    </div>

</body>

</html>