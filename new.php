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
        <th width="80%">3. Unit Letter No:' . $unit_letter_no . '</th>

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