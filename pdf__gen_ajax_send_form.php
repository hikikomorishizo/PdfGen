<?php 
error_reporting(0);
echo '
<style>
.pdfgen_ajax_restext{
    text-align: center;
    display: block;
    font-size: 20px;
    font-weight: bold;
}
</style>
';
echo '<span class="pdfgen_ajax_restext">Plik został wygenerowany!</span>';


$email_forpdf_file = strip_tags($_GET['email_forpdf_file']);
$lokalizacja_budowy = strip_tags($_GET['lokalizacja_budowy']);
$kierownik_budowy = strip_tags($_GET['kierownik_budowy']);
$telefon_kontaktowy = strip_tags($_GET['telefon_kontaktowy']);
$termin_dostawy = strip_tags($_GET['termin_dostawy']);
$uszczelki_miedzykregowe = strip_tags($_GET['uszczelki_miedzykregowe']);
$rzedna_terenu = strip_tags($_GET['rzedna_terenu']);
$rzedna_tk_h = strip_tags($_GET['rzedna_tk_h']);
$rzedna_kanalu = strip_tags($_GET['rzedna_kanalu']);
$ss10 = strip_tags($_GET['ss10']);
$ss12 = strip_tags($_GET['ss12']);
$ss15 = strip_tags($_GET['ss15']);
$ss20 = strip_tags($_GET['ss20']);
$zzwezka = strip_tags($_GET['zzwezka']);
$zplytaip = strip_tags($_GET['zplytaip']);
$zplytap = strip_tags($_GET['zplytap']);
$zpokrywa = strip_tags($_GET['zpokrywa']);
$ttak = strip_tags($_GET['ttak']);
$tnie = strip_tags($_GET['tnie']);
$tzstopnie = strip_tags($_GET['tzstopnie']);
$tzszczeble = strip_tags($_GET['tzszczeble']);
$ttstal = strip_tags($_GET['ttstal']);
$ttstalkwas = strip_tags($_GET['ttstalkwas']);
$tsz90 = strip_tags($_GET['tsz90']);
$tsz180 = strip_tags($_GET['tsz180']);
$tsz270 = strip_tags($_GET['tsz270']);
$tszinny = strip_tags($_GET['tszinny']);
$tszinny_inpt = strip_tags($_GET['tszinny_inpt']);
$tuwagi = strip_tags($_GET['tuwagi']);
$trbez = strip_tags($_GET['trbez']);
$trpredl = strip_tags($_GET['trpredl']);
$trkinbet = strip_tags($_GET['trkinbet']);
$trosadnik = strip_tags($_GET['trosadnik']);
$trinna = strip_tags($_GET['trinna']);
$trinna_inpt = strip_tags($_GET['trinna_inpt']);
$tw01 = strip_tags($_GET['tw01']);
$tw02 = strip_tags($_GET['tw02']);
$tw03 = strip_tags($_GET['tw03']);
$tw04 = strip_tags($_GET['tw04']);
$tw11 = strip_tags($_GET['tw11']);
$tw12 = strip_tags($_GET['tw12']);
$tw13 = strip_tags($_GET['tw13']);
$tw14 = strip_tags($_GET['tw14']);
$tw21 = strip_tags($_GET['tw21']);
$tw22 = strip_tags($_GET['tw22']);
$tw23 = strip_tags($_GET['tw23']);
$tw24 = strip_tags($_GET['tw24']);
$tw31 = strip_tags($_GET['tw31']);
$tw32 = strip_tags($_GET['tw32']);
$tw33 = strip_tags($_GET['tw33']);
$tw34 = strip_tags($_GET['tw34']);
$tw41 = strip_tags($_GET['tw41']);
$tw42 = strip_tags($_GET['tw42']);
$tw43 = strip_tags($_GET['tw43']);
$tw44 = strip_tags($_GET['tw44']);
$email_forpdf_file_cli = strip_tags($_GET['email_forpdf_file_cli']);
$site_url_fpdf = strip_tags($_GET['site_url_fpdf']);






require_once('mpdf/vendor/autoload.php');




$genpdf_html_sit = '

<style>
    .pdf_tabl_s th, .pdf_tabl_s td{
        border-bottom: 2px solid;
        border-right: 2px solid;
    }
</style>


<table class="" width="100%" style="border-collapse:collapse;">
    <tbody>
        <tr>
            <td style="" width="30%">
                <img src="
                data:image/png;base64,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
                " alt="" />
            </td>
            <td align="center" style="" width="40%">
                <p style="font-size: 30px; font-weight: bold; margin: 0; text-align: center;">ZAMÓWIENIE</p>
                <p style="font-size: 16px; font-weight: bold; margin: 0; text-align: center;">Studnia DIN</p>
            </td>
            <td align="right" style="" width="30%">
                <p style="text-align: right; font-weight: bold;">
                    ZMB kontakt:<br>
                    tel. (48) 360-28-48<br>
                    fax: (48) 365-57-77<br>
                    e-mail: handel@spec-bet.pl<br>
                </p>
            </td>
        </tr>
    </tbody>
</table>

<table class="" width="100%" style="border-collapse:collapse;">
    <tbody>
        <tr>
            <td valign="top" style="" width="700px">
                <table class="pdf_tabl_s" width="700px" style="border-collapse:collapse; border-top: 2px solid; border-left: 2px solid;">
                    <thead>
                        <tr>
                            <th style="background: #cacaca; padding: 5px;" colspan="2">ZAMÓWIENIE NR ................................................ z dnia: ...............................</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="background: #e2e2e2; padding: 5px;" width="200px">LOKALIZACJA BUDOWY</td>
                            <td style="padding: 5px;">'. $lokalizacja_budowy .'</td>
                        </tr>
                        <tr>
                            <td style="background: #e2e2e2; padding: 5px;" width="200px">KIEROWNIK BUDOWY</td>
                            <td style="padding: 5px;">'. $kierownik_budowy .'</td>
                        </tr>
                        <tr>
                            <td style="background: #e2e2e2; padding: 5px;" width="200px">TELEFON KONTAKTOWY</td>
                            <td style="padding: 5px;">'. $telefon_kontaktowy .'</td>
                        </tr>
                        <tr>
                            <td style="background: #e2e2e2; padding: 5px;" width="200px">TERMIN DOSTAWY</td>
                            <td style="padding: 5px;">'. $termin_dostawy .'</td>
                        </tr>
                    </tbody>
                </table>
                <table class="pdf_tabl_s" width="700px" style="border-collapse:collapse; border-left: 2px solid;">
                    <thead>
                        <tr>
                            <th style="background: #cacaca; padding: 5px;" colspan="2">PARAMETRY STUDNI DIN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="background: #e2e2e2; padding: 5px;" width="200px">USZCZELKI MIĘDZYKRĘGOWE</td>
                            <td style="padding: 5px;">'. $uszczelki_miedzykregowe .'</td>
                        </tr>
                    </tbody>
                </table>
                <table class="pdf_tabl_s" width="700px" style="border-collapse:collapse; border-left: 2px solid;">
                    <tbody>
                        <tr>
                            <td style="background: #e2e2e2; padding: 5px;" width="200px">RZĘDNA TERENU<br>(z włazem)</td>
                            <td style="padding: 5px;">'. $rzedna_terenu .'</td>
                            <td rowspan="2" style="padding: 5px 0 5px 5px; width: 30px; border-right: unset;"><span style="">h=</span></td>
                            <td rowspan="2" style="padding: 5px 5px 5px 0; width: 90px;">'. $rzedna_tk_h .'</td>
                        </tr>
                        <tr>
                            <td style="background: #e2e2e2; padding: 5px;" width="200px">RZĘDNA KANAŁU<br>(wylotu)</td>
                            <td style="padding: 5px;">'. $rzedna_kanalu .'</td>
                        </tr>
                    </tbody>
                </table>
                <table class="pdf_tabl_s" width="700px" style="border-collapse:collapse; border-left: 2px solid;">
                    <tbody>
                        <tr>
                            <td style="background: #e2e2e2; padding: 5px;" width="200px">ŚREDNICA STUDNI</td>
                            <td style="padding: 5px;"><input type="checkbox" '. $ss10 .'/><label for="ss10">1000</label></td>
                            <td style="padding: 5px;"><input type="checkbox" '. $ss12 .'/><label for="ss12">1200</label></td>
                            <td style="padding: 5px;"><input type="checkbox" '. $ss15 .'/><label for="ss15">1500</label></td>
                            <td style="padding: 5px;"><input type="checkbox" '. $ss20 .'/><label for="ss20">2000</label></td>
                        </tr>
                        <tr>
                            <td style="background: #e2e2e2; padding: 5px;" width="200px" rowspan="2">ZWIEŃCZENIE STUDNI</td>
                            <td style="padding: 5px;" colspan="2"><input type="checkbox" '. $zzwezka .'/><label for="zzwezka">ZWĘŻKA BETONOWA</label></td>
                            <td style="padding: 5px;" colspan="2"><input type="checkbox" '. $zplytaip .'/><label for="zplytaip">PŁYTA I PIERŚCIEŃ ODC.</label></td>
                        </tr>
                        <tr>
                            <td style="padding: 5px;" colspan="2"><input type="checkbox" '. $zplytap .'/><label for="zplytap">PŁYTA POKRYWOWA</label></td>
                            <td style="padding: 5px;" colspan="2"><input type="checkbox" '. $zpokrywa .'/><label for="zpokrywa">POKRYWA DIN</label></td>
                        </tr>
                        <tr>
                            <td style="background: #e2e2e2; padding: 5px;" width="200px">USZCZELKI MIĘDZYKRĘGOWE</td>
                            <td style="padding: 5px;" colspan="2"><input type="checkbox" '. $ttak .'/><label for="ttak">TAK</label></td>
                            <td style="padding: 5px;" colspan="2"><input type="checkbox" '. $tnie .'/><label for="tnie">NIE</label></td>
                        </tr>
                        <tr>
                            <td style="background: #e2e2e2; padding: 5px;" width="200px">ZEJŚCIE</td>
                            <td style="padding: 5px;" colspan="2"><input type="checkbox" '. $tzstopnie .'/><label for="tzstopnie">STOPNIE</label></td>
                            <td style="padding: 5px;" colspan="2"><input type="checkbox" '. $tzszczeble .'/><label for="tzszczeble">SZCZEBLE</label></td>
                        </tr>
                        <tr>
                            <td style="background: #e2e2e2; padding: 5px;" width="200px">TYP ZEJŚCIA</td>
                            <td style="padding: 5px;" colspan="2"><input type="checkbox" '. $ttstal .'/><label for="ttstal">RDZEŃ STALOWY</label></td>
                            <td style="padding: 5px;" colspan="2"><input type="checkbox" '. $ttstalkwas .'/><label for="ttstalkwas">RDZEŃ STAL KWAS.</label></td>
                        </tr>
                        <tr>
                            <td style="background: #e2e2e2; padding: 5px;" width="200px">STOPNIE ZŁAZOWE</td>
                            <td style="padding: 5px;"><input type="checkbox" '. $tsz90 .'/><label for="tsz90">90</label></td>
                            <td style="padding: 5px;"><input type="checkbox" '. $tsz180 .'/><label for="tsz180">180</label></td>
                            <td style="padding: 5px;"><input type="checkbox" '. $tsz270 .'/><label for="tsz270">270</label></td>
                            <td style="padding: 5px;"><input type="checkbox" '. $tszinny .'/><label for="tszinny">inny: '. $tszinny_inpt .'</label></td>
                        </tr>
                    </tbody>
                </table>
                <table class="pdf_tabl_s" width="700px" style="border-collapse:collapse; border-left: 2px solid;">
                    <tbody>
                        <tr>
                            <td style="padding: 5px;"><label for="tuwagi">UWAGI:<br></label><p>'. $tuwagi .'</p></td>
                        </tr>
                    </tbody>
                </table>
                <table class="pdf_tabl_s" width="700px" style="border-collapse:collapse; border-left: 2px solid;">
                    <tbody>
                        <tr>
                            <td style="border: unset; height: 150px;"></td>
                            <td style="border: unset; border-right: 2px solid; height: 150px;"></td>
                        </tr>
                        <tr>
                            <td style="padding: 5px; text-align: center; border-right: unset;" width="50%">pieczątka firmowa</td>
                            <td style="padding: 5px; text-align: center;" width="50%">data i podpis</td>
                        </tr>
                    </tbody>
                </table>

            </td>
            <td valign="top" style="" width="700px">
                
                <table class="pdf_tabl_s" width="700px" style="border-collapse:collapse; border-top: 2px solid; border-left: 2px solid;">
                    <thead>
                        <tr>
                            <th style="background: #cacaca; padding: 5px;" colspan="2">ELEMENTY DODATKOWE STUDNI DIN</th>
                        </tr>
                    </thead>
                </table>
                <table class="pdf_tabl_s" width="700px" style="border-collapse:collapse; border-left: 2px solid;">
                    <tbody width="700px">
                        <tr width="700px">
                            <td style="background: #e2e2e2; padding: 5px;" rowspan="2">RODZAJ DNA</td>
                            <td style="padding: 5px;"><input type="checkbox" '. $trbez .'/><label for="trbez">BEZ KINETY</label></td>
                            <td style="padding: 5px;"><input type="checkbox" '. $trpredl .'/><label for="trpredl">PREDL</label></td>
                            <td style="padding: 5px;"><input type="checkbox" '. $trkinbet .'/><label for="trkinbet">KINETA BETONOWA ½</label></td>
                        </tr>
                        <tr width="700px">
                            <td style="padding: 5px;"><input type="checkbox" '. $trosadnik .'/><label for="trosadnik">OSADNIK</label></td>
                            <td style="padding: 5px;" colspan="2"><input type="checkbox" '. $trinna .'/><label for="trinna">INNA: '. $trinna_inpt .'</label></td>
                        </tr>
                    </tbody>
                </table>
                <table class="pdf_tabl_s" width="700px" style="border-collapse:collapse; border-left: 2px solid;">
                    <thead>
                        <tr>
                            <th style="background: #cacaca; padding: 5px;" width="80px"></th>
                            <th style="background: #cacaca; padding: 5px;">KĄT</th>
                            <th style="background: #cacaca; padding: 5px;">TYP RURY</th>
                            <th style="background: #cacaca; padding: 5px;">WYSOKOŚĆ<br>OD DNA (cm)</th>
                            <th style="background: #cacaca; padding: 5px;">ŚREDNICA<br>WEWNĘTRZNA<br>RURY</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="background: #e2e2e2; padding: 5px;" width="80px">WYLOT</td>
                            <td style="padding: 5px;">'. $tw01 .'</td>
                            <td style="padding: 5px;">'. $tw02 .'</td>
                            <td style="padding: 5px;">'. $tw03 .'</td>
                            <td style="padding: 5px;">'. $tw04 .'</td>
                        </tr>
                        <tr>
                            <td style="background: #e2e2e2; padding: 5px;" width="80px">WYLOT 1</td>
                            <td style="padding: 5px;">'. $tw11 .'</td>
                            <td style="padding: 5px;">'. $tw12 .'</td>
                            <td style="padding: 5px;">'. $tw13 .'</td>
                            <td style="padding: 5px;">'. $tw14 .'</td>
                        </tr>
                        <tr>
                            <td style="background: #e2e2e2; padding: 5px;" width="80px">WYLOT 2</td>
                            <td style="padding: 5px;">'. $tw21 .'</td>
                            <td style="padding: 5px;">'. $tw22 .'</td>
                            <td style="padding: 5px;">'. $tw23 .'</td>
                            <td style="padding: 5px;">'. $tw24 .'</td>
                        </tr>
                        <tr>
                            <td style="background: #e2e2e2; padding: 5px;" width="80px">WYLOT 3</td>
                            <td style="padding: 5px;">'. $tw31 .'</td>
                            <td style="padding: 5px;">'. $tw32 .'</td>
                            <td style="padding: 5px;">'. $tw33 .'</td>
                            <td style="padding: 5px;">'. $tw34 .'</td>
                        </tr>
                        <tr>
                            <td style="background: #e2e2e2; padding: 5px;" width="80px">WYLOT 4</td>
                            <td style="padding: 5px;">'. $tw41 .'</td>
                            <td style="padding: 5px;">'. $tw42 .'</td>
                            <td style="padding: 5px;">'. $tw43 .'</td>
                            <td style="padding: 5px;">'. $tw44 .'</td>
                        </tr>
                    </tbody>
                </table>
                <table class="" width="700px" style="border-collapse:collapse;">
                    <tbody width="700px">
                        <tr width="700px">
                            <td align="center" style="border: unset;">
                                <img src="data:image/jpeg;base64,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" />
                            </td>
                        </tr>
                        
                    </tbody>
                </table>

            </td>
        </tr>
    </tbody>
</table>
';



// $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
// $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8']);
$mpdf = new mPDF('utf-8', 'A4-L');
$mpdf->WriteHTML($genpdf_html_sit);
$mpdf->Output('ZAMOWIENIE.pdf', 'F');





// for use PHP Mailer without composer : 

// ex. Create a folder in root/PHPMAILER
// Put on this folder this 3 files find in "src" 
// folder of the distribution : 
// PHPMailer.php , SMTP.php , Exception.php
  
// include PHP Mailer
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// include dirname(__DIR__) .'/PHPMAILER/PHPMailer.php';
// include dirname(__DIR__) .'/PHPMAILER/SMTP.php';
// include dirname(__DIR__) .'/PHPMAILER/Exception.php';

// i made a function 

/*
*
* Function send_mail_by_PHPMailer($to, $from, $subject, $message);
* send a mail by PHPMailer method
* @Param $to -> mail to send
* @Param $from -> sender of mail
* @Param $subject -> suject of mail
* @Param $message -> html content with datas
* @Return true if success / Json encoded error message if error 
* !! need -> classes/Exception.php - classes/PHPMailer.php - classes/SMTP.php
*
*/


include('phpmailer/PHPMailer.php');
function sendMail($to, $to2, $subject, $text, $att){
		
    $css = '
    <html>
    <head>
    <style>
    .styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .styled-table thead tr {
        background-color: #009879;
        color: #ffffff;
        text-align: left;
    }


    .styled-table th,
    .styled-table td {
        padding: 12px 15px;
    }


    .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
    }


    .styled-table tbody tr.active-row {
        font-weight: bold;
        color: #009879;
    }
    </style>
    </head>
    <body>
    ';
    
    
    $text = $css.''.$text.'</body></html>';
    
    
    $mail = new PHPMailer;

    $mail->IsSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'poczta23190.e-kei.pl';                 // Specify main and backup server
    $mail->Port = 465;                                    // Set the SMTP port
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'noreply@flotamenago.pl';           // SMTP username
    $mail->Password = 'Flota123#';                  	  // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted

    $mail->addAttachment("ZAMOWIENIE.pdf");
    

    $mail->From = 'noreply@flotamenago.pl';
    $mail->FromName = 'System';
    $mail->AddAddress($to);  							  // Add a recipient
    $mail->AddAddress($to2);  							  // Add a recipient

    $mail->IsHTML(true);                                  // Set email format to HTML

    $mail->Subject = $subject;
    $mail->Body    = $text;
    $mail->AltBody = $text;
    $mail->CharSet = "UTF-8";
    
    if($att !== '')
        $mail->addAttachment("upload/".$att);

    if(!$mail->Send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}




$to  = $email_forpdf_file; 
$to2  = $email_forpdf_file_cli;
// $to = 'qwe@qew.wqe';
$subject = "ZAMOWIENIE Studnia DIN | " . $lokalizacja_budowy ; 
// $message = ' <p>Name: '. $_POST["u-name"] .'</p> </br> <p>Tel: '. $_POST["tel"] .'</p> </br> <p>KODP: '. $_POST["kodp"] .'</p> </br> <p>Date: '. $_POST["date"] .'</p> </br> <p>Nazwa produktu: '. $_GET['prodName'] .'</p> </br> <p>Cena: '. $_GET['cena'] .'</p> </br> <p>Dodatek: '. $_GET['dodat'] .'</p> </br> <p>Kominek: '. $_GET['kominek'] .'</p>';
$message = 'KIEROWNIK BUDOWY: '. $kierownik_budowy .'<br> TELEFON KONTAKTOWY: '. $telefon_kontaktowy .'<br> TERMIN DOSTAWY: '. $termin_dostawy;

sendMail($to, $to2, $subject, $message, ""); 