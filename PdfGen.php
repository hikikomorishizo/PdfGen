<?php

/**
 * Plugin Name: PdfGenerator
 * Description: PDF Generator
 * Plugin URI:  ldsolutions.pl
 * Author URI:  ldsolutions.pl
 * Author:      LDSolutions
 * Version:     2.0
 */
 



// ADM ASSETS
function pdf__add_assets_adm() {
    wp_register_style('pdf__add_assets_adm', plugins_url('assets/pdfgen_adm.css',__FILE__ ));
    wp_enqueue_style('pdf__add_assets_adm');
    wp_register_script( 'pdf__add_assets_adm', plugins_url('assets/pdfgen_adm.js',__FILE__ ));
    wp_enqueue_script('pdf__add_assets_adm');
}

add_action( 'admin_init','pdf__add_assets_adm');

// ASSETS
function pdf__add_assets() {
	
    wp_enqueue_style( 'pdf__add_assets', plugins_url( 'assets/pdfgen.css' , __FILE__ ) );
    
}

add_action( 'wp_enqueue_scripts','pdf__add_assets');

function pdf__add_assets_footer() {
	
	wp_register_script( 'pdf__add_assets_footer', plugins_url('assets/pdfgen.js',__FILE__ ));
	wp_enqueue_script('pdf__add_assets_footer');
}
add_action( 'wp_footer','pdf__add_assets_footer');


// ADM PAge
add_action( 'admin_menu', 'pdfgen_page__adm', 25 );
 
function pdfgen_page__adm(){
    add_menu_page('PDFGenerator', 'PDFGenerator', 'manage_options', __FILE__, 'pdfgen_page_callback', 'dashicons-media-document', 20);
    
    // add_submenu_page( __FILE__, 'Pdf Generator Admin', 'Admin', 'manage_options', 'pdf_gen', 'pdfgen_page_callback' );
	add_submenu_page( __FILE__, 'Pdf Generator Site', 'Site', 'manage_options', 'pdf_gen_site', 'pdfgen_page_callback__site' );
}



function pdfgen_page_callback(){

add_option('pdfgen_id_name', '0');
$pdfgen_id_name = get_option('pdfgen_id_name');
add_option('pdfgen_link___file', '');
$pdfgen_link___file = get_option('pdfgen_link___file');
add_option('pdfgen_link___name', '');
$pdfgen_link___name = get_option('pdfgen_link___name');

// ----------------------------------------------

add_option('pdfgen_first__title', '');
$pdfgen_first__title = get_option('pdfgen_first__title');

add_option('pdfgen_sec__title', '');
$pdfgen_sec__title = get_option('pdfgen_sec__title');

add_option('pdfgen_sec__subtitle', '');
$pdfgen_sec__subtitle = get_option('pdfgen_sec__subtitle');

add_option('pdfgen_data', '');
$pdfgen_data = get_option('pdfgen_data');

add_option('pdfgen_ninnadaw', '');
$pdfgen_ninnadaw = get_option('pdfgen_ninnadaw');

add_option('pdfgen_info', '');
$pdfgen_info = get_option('pdfgen_info');

add_option('pdfgen_un', '');
$pdfgen_un = get_option('pdfgen_un');

add_option('pdfgen_pnp', '');
$pdfgen_pnp = get_option('pdfgen_pnp');

add_option('pdfgen_nalep', '');
$pdfgen_nalep = get_option('pdfgen_nalep');

add_option('pdfgen_gp', '');
$pdfgen_gp = get_option('pdfgen_gp');

add_option('pdfgen_kod', '');
$pdfgen_kod = get_option('pdfgen_kod');

add_option('pdfgen_liczba', '');
$pdfgen_liczba = get_option('pdfgen_liczba');

add_option('pdfgen_ilosc', '');
$pdfgen_ilosc = get_option('pdfgen_ilosc');

add_option('pdfgen_naziadr', '');
$pdfgen_naziadr = get_option('pdfgen_naziadr');

add_option('pdfgen_potwir', '');
$pdfgen_potwir = get_option('pdfgen_potwir');


// ----------------------------------------------

if ( isset($_POST['submit']) )
{  
   if ( function_exists('current_user_can') &&
        !current_user_can('manage_options') )
            die ( _e('Hacker?', 'pdfgen') );

    if (function_exists ('check_admin_referer') )
    {
        check_admin_referer('pdfgen_form');
    }

// ----------------------------------------------

    $pdfgen_first__title = $_POST['pdfgen_first__title'];
    update_option('pdfgen_first__title', $pdfgen_first__title);

    $pdfgen_sec__title = $_POST['pdfgen_sec__title'];
    update_option('pdfgen_sec__title', $pdfgen_sec__title);

    $pdfgen_sec__subtitle = $_POST['pdfgen_sec__subtitle'];
    update_option('pdfgen_sec__subtitle', $pdfgen_sec__subtitle);

    $pdfgen_data = $_POST['pdfgen_data'];
    update_option('pdfgen_data', $pdfgen_data);

    $pdfgen_ninnadaw = $_POST['pdfgen_ninnadaw'];
    update_option('pdfgen_ninnadaw', $pdfgen_ninnadaw);

    $pdfgen_info = $_POST['pdfgen_info'];
    update_option('pdfgen_info', $pdfgen_info);
    
	$pdfgen_un = implode(',', $_POST['pdfgen_un']);
	update_option('pdfgen_un', $pdfgen_un);

    $pdfgen_pnp = implode(',', $_POST['pdfgen_pnp']);
	update_option('pdfgen_pnp', $pdfgen_pnp);

    $pdfgen_nalep = implode(',', $_POST['pdfgen_nalep']);
	update_option('pdfgen_nalep', $pdfgen_nalep);

    $pdfgen_gp = implode(',', $_POST['pdfgen_gp']);
	update_option('pdfgen_gp', $pdfgen_gp);

    $pdfgen_kod = implode(',', $_POST['pdfgen_kod']);
	update_option('pdfgen_kod', $pdfgen_kod);

    $pdfgen_liczba = implode(',', $_POST['pdfgen_liczba']);
	update_option('pdfgen_liczba', $pdfgen_liczba);

    $pdfgen_ilosc = implode(',', $_POST['pdfgen_ilosc']);
	update_option('pdfgen_ilosc', $pdfgen_ilosc);

    $pdfgen_naziadr = $_POST['pdfgen_naziadr'];
    update_option('pdfgen_naziadr', $pdfgen_naziadr);

    $pdfgen_potwir = $_POST['pdfgen_potwir'];
    update_option('pdfgen_potwir', $pdfgen_potwir);


// ----------------------------------------------

}
?>
<div class='pdfgen_cont'>
    <h1 style="text-align: center;"><?php _e('PDF Generator settings', 'pdfgen'); ?></h1>
    <a style="display: block; width: 100%; text-align: center;" href="http://ldsolutions.pl">Strony internetowe, Sklepy internetowe, Aplikacje internetowe</a>

    <span style="display: block; width: 100%; text-align: center; font-size: 15px; font-weight: bold; margin-top: 15px;">Aby przenieść tekst do następnej linii - napisz: &lt;br&gt;</span>

    <form class="pdfgen__form" name="pdfgen" method="post">

        <?php
            if (function_exists ('wp_nonce_field') )
            {
                wp_nonce_field('pdfgen_form');
            }
        ?>

<!-- ---------------------------------------------- -->

        <div class="pdfgen_form__cont">

        
            <label for="pdfgen_first__title"><?php _e('Pierwszy tytuł:', 'pdfgen'); ?></label>
            <input type="text" id="pdfgen_first__title" name="pdfgen_first__title" placeholder="Tytuł.." size="80" value="<?php echo $pdfgen_first__title; ?>" />

            <label for="pdfgen_sec__title"><?php _e('Drugi tytuł:', 'pdfgen'); ?></label>
            <input type="text" id="pdfgen_sec__title" name="pdfgen_sec__title" placeholder="Tytuł.." size="80" value="<?php echo $pdfgen_sec__title; ?>" />

            <label for="pdfgen_sec__subtitle"><?php _e('Podtytuł:', 'pdfgen'); ?></label>
            <input type="text" id="pdfgen_sec__subtitle" name="pdfgen_sec__subtitle" placeholder="Podtytuł.." size="80" value="<?php echo $pdfgen_sec__subtitle; ?>" />

            <label for="pdfgen_data"><?php _e('Data:', 'pdfgen'); ?></label>
            <input type="text" id="pdfgen_data" name="pdfgen_data" placeholder="Data.." size="80" value="<?php echo $pdfgen_data; ?>" />

            <label for="pdfgen_ninnadaw"><?php _e('NAZWA I ADRES NADAWCY/WŁAŚCICIELA PRODUKTU:', 'pdfgen'); ?></label>
            <input type="text" id="pdfgen_ninnadaw" name="pdfgen_ninnadaw" placeholder="NAZWA I ADRES NADAWCY.." size="80" value="<?php echo $pdfgen_ninnadaw; ?>" />

            <label for="pdfgen_info"><?php _e('Informacje:', 'pdfgen'); ?></label>
            <input type="text" id="pdfgen_info" name="pdfgen_info" placeholder="Imię i nazwisko, tel, nip.." size="80" value="<?php echo $pdfgen_info; ?>" />


            <span><?php _e('Informacje główne:', 'pdfgen'); ?></span>
            <div class="shiz_reap">

                
                    
                <?php
                    $pdfgen_un_array = explode(',', $pdfgen_un );
                    $pdfgen_pnp_array = explode(',', $pdfgen_pnp );
                    $pdfgen_nalep_array = explode(',', $pdfgen_nalep );
                    $pdfgen_gp_array = explode(',', $pdfgen_gp );
                    $pdfgen_kod_array = explode(',', $pdfgen_kod );
                    $pdfgen_liczba_array = explode(',', $pdfgen_liczba );
                    $pdfgen_ilosc_array = explode(',', $pdfgen_ilosc );
                    

                    for ($i = 0; $i < count($pdfgen_un_array); $i++) {
                    ?>
                        <div class="shiz_reap__cont">
                            <div class="shiz_reap__input">
                                <input type="text" name="pdfgen_un[]" placeholder="Un.." size="80" value="<?php echo $pdfgen_un_array[$i]; ?>" />
                                <input type="text" name="pdfgen_pnp[]" placeholder="Pnp.." size="80" value="<?php echo $pdfgen_pnp_array[$i]; ?>" />
                                <input type="text" name="pdfgen_nalep[]" placeholder="NALEPKI.." size="80" value="<?php echo $pdfgen_nalep_array[$i]; ?>" />
                                <input type="text" name="pdfgen_gp[]" placeholder="Grupa pakowania.." size="80" value="<?php echo $pdfgen_gp_array[$i]; ?>" />
                                <input type="text" name="pdfgen_kod[]" placeholder="Kod.." size="80" value="<?php echo $pdfgen_kod_array[$i]; ?>" />
                                <input type="text" name="pdfgen_liczba[]" placeholder="Liczba i określenie sztuk przesyłki.." size="80" value="<?php echo $pdfgen_liczba_array[$i]; ?>" />
                                <input type="text" name="pdfgen_ilosc[]" placeholder="Ilość całkowita.." size="80" value="<?php echo $pdfgen_ilosc_array[$i]; ?>" />
                            </div>
                            <input type="button" class="shiz_reap__remove" value="Remove" />
                        </div>
                    <?php
                    }
                    ?>	
                

			</div>
            <input type="button" class="shiz_reap__add" value="Add" />

            

            <label for="pdfgen_naziadr"><?php _e('Nazwa i adres odbiorcy:', 'pdfgen'); ?></label>
            <input type="text" id="pdfgen_naziadr" name="pdfgen_naziadr" placeholder="Nazwa i adres odbiorcy.." size="80" value="<?php echo $pdfgen_naziadr; ?>" />

            <label for="pdfgen_potwir"><?php _e('POTWIERDZENIE ODBIORU DOKUMENTÓW:', 'pdfgen'); ?></label>
            <input type="text" id="pdfgen_potwir" name="pdfgen_potwir" placeholder="POTWIERDZENIE.." size="80" value="<?php echo $pdfgen_potwir; ?>" />


        </div>

        <input type="hidden" name="action" value="update" />

        <input type="hidden" name="page_options"
            value="pdfgen_first__title,pdfgen_sec__title,pdfgen_sec__subtitle,pdfgen_data,pdfgen_ninnadaw,pdfgen_info,pdfgen_un,pdfgen_pnp,pdfgen_nalep,pdfgen_gp,pdfgen_kod,pdfgen_liczba,pdfgen_ilosc,pdfgen_naziadr,pdfgen_potwir" />

        <p class="submit">
        <input type="submit" name="submit" value="<?php _e('Save Changes') ?>" />
        </p>
    </form>
</div>

<?php



// Gen pdf
    ?>
    <div class="pdfgen_cont u_pdf">
        <h2>Tak wygląda plik pdf</h2>

        
        <div class="pdfgen_html__cont">
            <span style="display: block; width: 100%; text-align: center; font-weight: bold;"><?php echo $pdfgen_first__title; ?></span>
            <h3 style="display: block; width: 100%; text-align: center; font-weight: bold; font-size: 22px; margin-top: 20px; margin-bottom: 15px; line-height: 26px;"><?php echo $pdfgen_sec__title; ?></h3>
            <span style="display: block; width: 100%; text-align: center; font-size: 16px; font-weight: bold; margin-bottom: 10px;"><?php echo $pdfgen_sec__subtitle; ?></span>
            <span style="display: block; width: 100%; text-align: center;"><?php echo $pdfgen_data; ?></span>
            <table style="margin: 5px 20px 20px 20px; border: 2px solid; border-collapse:collapse; width: calc(100% - 40px);">
                <thead>
                    <tr>
                        <th style="width: 50%; padding: 20px;"><?php echo $pdfgen_ninnadaw; ?></th>
                        <th style="width: 50%; padding: 20px; border-left: 2px solid;"><?php echo $pdfgen_info; ?></th>
                    </tr>
                </thead>
            </table>
            <div style="display: grid; grid-template-columns: 1fr 3fr 1fr 1fr 1fr 2fr 1fr; justify-items: center; border-top: 2px solid; border-left: 2px solid; margin: 5px 20px 20px 20px;">
                <div style="width: 100%; padding: 7px 0; border-right: 2px solid; border-bottom: 2px solid;"><span style="display: block; text-align: center;">UN</span></div> <div style="width: 100%; padding: 7px 0; border-right: 2px solid; border-bottom: 2px solid;"><span style="display: block; text-align: center;"><strong>PNP</strong><br>prawidłowa nazwa<br>przewozowa</span></div> <div style="width: 100%; padding: 7px 0; border-right: 2px solid; border-bottom: 2px solid;"><span style="display: block; text-align: center;">NALEPKI<br>(numery)</span></div> <div style="width: 100%; padding: 7px 0; border-right: 2px solid; border-bottom: 2px solid;"><span style="display: block; text-align: center;">GP<br>grupa pakowania<br></span></div> <div style="width: 100%; padding: 7px 0; border-right: 2px solid; border-bottom: 2px solid;"><span style="display: block; text-align: center;">Kod<br>ograniczeń<br>przewozu<br>przez<br>tunele</span></div> <div style="width: 100%; padding: 7px 0; border-right: 2px solid; border-bottom: 2px solid;"><span style="display: block; text-align: center;">Liczba i<br>określenie<br>sztuk przesyłki</span></div> <div style="width: 100%; padding: 7px 0; border-right: 2px solid; border-bottom: 2px solid;"><span style="display: block; text-align: center;">Ilość<br>całkowita<br>kg</span></div>
            
                <?php
                for ($i = 0; $i < count($pdfgen_un_array); $i++) {
                ?>

                    <div style="width: 100%; padding: 7px 0; border-right: 2px solid; border-bottom: 2px solid;"><span style="display: block; text-align: center;"><?php echo $pdfgen_un_array[$i]; ?></span></div> <div style="width: 100%; padding: 7px 0; border-right: 2px solid; border-bottom: 2px solid;"><span style="display: block; text-align: center;"><?php echo $pdfgen_pnp_array[$i]; ?></span></div> <div style="width: 100%; padding: 7px 0; border-right: 2px solid; border-bottom: 2px solid;"><span style="display: block; text-align: center;"><?php echo $pdfgen_nalep_array[$i]; ?></span></div> <div style="width: 100%; padding: 7px 0; border-right: 2px solid; border-bottom: 2px solid;"><span style="display: block; text-align: center;"><?php echo $pdfgen_gp_array[$i]; ?></span></div> <div style="width: 100%; padding: 7px 0; border-right: 2px solid; border-bottom: 2px solid;"><span style="display: block; text-align: center;"><?php echo $pdfgen_kod_array[$i]; ?></span></div> <div style="width: 100%; padding: 7px 0; border-right: 2px solid; border-bottom: 2px solid;"><span style="display: block; text-align: center;"><?php echo $pdfgen_liczba_array[$i]; ?></span></div> <div style="width: 100%; padding: 7px 0; border-right: 2px solid; border-bottom: 2px solid;"><span style="display: block; text-align: center;"><?php echo $pdfgen_ilosc_array[$i]; ?></span></div>

                <?php
                }
                ?>

            </div>
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); align-items: center; border: 2px solid; margin: 5px 20px 20px 20px;">
                <span style="display: block; text-align: center; padding: 20px;">Nazwa i adres odbiorcy</span>
                <span style="display: block; text-align: center; padding: 20px; border-left: 2px solid;"><?php echo $pdfgen_naziadr; ?></span>
            </div>
            <div style="border: 2px solid; margin: 0 20px 10px 20px; padding: 10px;">
                <h4 style="font-size: 18px; text-align: center;">POTWIERDZENIE ODBIORU DOKUMENTÓW</h4>
                <span style="display: block;"><?php echo $pdfgen_potwir; ?></span>
            </div>
            <span style="display: block; width: 100%; text-align: center; margin-bottom: 50px;">Dokument elektroniczny nie wymaga podpisu</span>
        </div>

        

        
        <?php



        

        $genpdf_html = '
        
                <h5 style="display: block; width: 100%; text-align: center; font-weight: bold;">'. $pdfgen_first__title .'</h5>
                <h4 style="display: block; width: 100%; text-align: center; font-weight: bold; font-size: 20px; margin-top: 15px; margin-bottom: 10px; line-height: 20px;">'. $pdfgen_sec__title .'</h4>
                <p style="display: block; width: 100%; text-align: center; font-size: 16px; font-weight: bold; margin-bottom: 10px;">'. $pdfgen_sec__subtitle .'<br></p>
                <p style="display: block; width: 100%; text-align: center;">'. $pdfgen_data .'</p>
                <table width="100%" style="margin: 5px 0px 20px 0px; border: 2px solid; border-collapse:collapse;">
                    <thead>
                        <tr>
                            <th style="width: 50%; padding: 15px;">'. $pdfgen_ninnadaw .'</th>
                            <th style="width: 50%; padding: 15px; border-left: 2px solid;">'. $pdfgen_info .'</th>
                        </tr>
                    </thead>
                </table>
                    
                <table width="100%" style="margin: 5px 0px 20px 0px; border-top: 2px solid; border-left: 2px solid; border-collapse:collapse;">
                    <thead>
                        <tr>
                            <th style="width: 10%; padding: 15px; text-align: center; border-right: 2px solid; border-bottom: 2px solid;">UN</th>
                            <th style="width: 30%; padding: 15px; text-align: center; border-right: 2px solid; border-bottom: 2px solid;">PNP<br>prawidłowa nazwa<br>przewozowa</th>
                            <th style="width: 10%; padding: 15px; text-align: center; border-right: 2px solid; border-bottom: 2px solid;">NALEPKI<br>(numery)</th>
                            <th style="width: 10%; padding: 15px; text-align: center; border-right: 2px solid; border-bottom: 2px solid;">GP<br>grupa pakowania</th>
                            <th style="width: 10%; padding: 15px; text-align: center; border-right: 2px solid; border-bottom: 2px solid;">Kod<br>ograniczeń<br>przewozu<br>przez<br>tunele</th>
                            <th style="width: 20%; padding: 15px; text-align: center; border-right: 2px solid; border-bottom: 2px solid;">Liczba i<br>określenie<br>sztuk przesyłki</th>
                            <th style="width: 10%; padding: 15px; text-align: center; border-right: 2px solid; border-bottom: 2px solid;">Ilość<br>całkowita<br>kg</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        ';
                        for ($i = 0; $i < count($pdfgen_un_array); $i++) {
                        $genpdf_html .= '<tr><td style="width: 10%; padding: 15px; text-align: center; border-right: 2px solid; border-bottom: 2px solid;">'. $pdfgen_un_array[$i] .'</td> <td style="width: 30%; padding: 15px; text-align: center; border-right: 2px solid; border-bottom: 2px solid;">'. $pdfgen_pnp_array[$i] .'</td> <td style="width: 10%; padding: 15px; text-align: center; border-right: 2px solid; border-bottom: 2px solid;">'. $pdfgen_nalep_array[$i] .'</td> <td style="width: 10%; padding: 15px; text-align: center; border-right: 2px solid; border-bottom: 2px solid;">'. $pdfgen_gp_array[$i] .'</td> <td style="width: 10%; padding: 15px; text-align: center; border-right: 2px solid; border-bottom: 2px solid;">'. $pdfgen_kod_array[$i] .'</td> <td style="width: 20%; padding: 15px; text-align: center; border-right: 2px solid; border-bottom: 2px solid;">'. $pdfgen_liczba_array[$i] .'</td> <td style="width: 10%; padding: 15px; text-align: center; border-right: 2px solid; border-bottom: 2px solid;">'. $pdfgen_ilosc_array[$i] .'</td></tr>';
                        
                        }
                        $genpdf_html .= '
                        
                    </tbody>
                </table>

                <table width="100%" style="margin: 5px 0px 20px 0px; border: 2px solid; border-collapse:collapse;">
                    <thead>
                        <tr>
                            <th style="width: 50%; padding: 15px;">Nazwa i adres odbiorcy</th>
                            <th style="width: 50%; padding: 15px; border-left: 2px solid;">'. $pdfgen_naziadr .'</th>
                        </tr>
                    </thead>
                </table>
                <div style="border: 2px solid; margin: 5px 0px 20px 0px; padding: 10px;">
                    <h4 style="font-size: 18px; text-align: center;">POTWIERDZENIE ODBIORU DOKUMENTÓW</h4>
                    <span style="display: block;">'. $pdfgen_potwir .'</span>
                </div>
                <span style="display: block; width: 100%; text-align: center; margin-bottom: 0px;">Dokument elektroniczny nie wymaga podpisu</span>
                ';




        ?>
        
        <form method="POST" style="display: grid;">
            <input type="text" id="gen_pdf__namefile" name="gen_pdf__namefile" placeholder="Wprowadź nazwę pliku pdf.." size="80" value="" required />
            <input type="submit" name="gen_pdf" value="Generowanie pdf" />
        </form>
        
        <?php
        require_once('mpdf/vendor/autoload.php');


        if( isset( $_POST['gen_pdf'] ) )
        {
            $fileName = $_POST["gen_pdf__namefile"];

            $pdfgen_id_name = $pdfgen_id_name + 1;
            update_option('pdfgen_id_name', $pdfgen_id_name);


            $pdf_link = "../wp-content/plugins/PdfGen/filePdf/id-". $pdfgen_id_name ."-". $fileName .".pdf";
            $pdfgen_link___file .= ','.$pdf_link; 
	        update_option('pdfgen_link___file', $pdfgen_link___file);

            $pdfgen_link___name .= ','.$fileName;
            update_option('pdfgen_link___name', $pdfgen_link___name);
            

            // $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
            $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8']);
            $mpdf->WriteHTML($genpdf_html);
            $mpdf->Output('../wp-content/plugins/PdfGen/filePdf/id-'. $pdfgen_id_name .'-'. $fileName .'.pdf', 'F');
            
            header("location: /wp-content/plugins/PdfGen/filePdf/id-". $pdfgen_id_name ."-". $fileName .".pdf");
        }
        ?>
    </div>


    <?php
        $pdfgen_link___file_array = explode(',', $pdfgen_link___file );
        $pdfgen_link___name_array = explode(',', $pdfgen_link___name );


        if( isset( $_GET['delete'] ) )
        {
            $pdf__link__remove = $pdfgen_link___file_array[$_GET['delete']];
            str_replace(',', '', $pdf__link__remove);
            unlink($pdf__link__remove);


            unset($pdfgen_link___file_array[$_GET['delete']]);
            unset($pdfgen_link___name_array[$_GET['delete']]);

            $pdfgen_link___file = implode(',', $pdfgen_link___file_array);
	        update_option('pdfgen_link___file', $pdfgen_link___file);
            $pdfgen_link___name = implode(',', $pdfgen_link___name_array);
	        update_option('pdfgen_link___name', $pdfgen_link___name);


            header('Location: /wp-admin/admin.php?page=PdfGen%2FPdfGen.php');
        }

    ?>

    <div style="margin-top: 75px;" class="pdfgen_cont">
        <h2>Twoje pliki pdf</h2>

        <div class="padf_links">

            <?php

            

            for ($i = 1; $i < count($pdfgen_link___file_array); $i++) {
            ?>

                <form method="POST" class="padf_links__cont">
                    <a class="shiz_link__pdf" href="<?php echo $pdfgen_link___file_array[$i]; ?>"><?php echo $pdfgen_link___name_array[$i]; ?></a>
                    <a class="shiz_link__remove" href="/wp-admin/admin.php?page=PdfGen%2FPdfGen.php&delete=<?php echo $i; ?>">Remove</a>
                </form>

            <?php
            }
            ?>

        </div>
    </div>
    <?php
}




// PDF SITE
function pdfgen_page_callback__site() {

add_option('email_forpdf_file', '');
$email_forpdf_file = get_option('email_forpdf_file');
if ( isset($_POST['submits']) )
{  
    $email_forpdf_file = $_POST['email_forpdf_file'];
    update_option('email_forpdf_file', $email_forpdf_file);
}
?>

<div class='pdfgen_cont'>
    <h1 style="text-align: center;"><?php _e('PDF Generator Site settings', 'pdfgen'); ?></h1>
    <a style="display: block; width: 100%; text-align: center;" href="http://ldsolutions.pl">Strony internetowe, Sklepy internetowe, Aplikacje internetowe</a>

    <span style="display: block; width: 100%; text-align: center; font-size: 15px; font-weight: bold; margin-top: 15px;">Aby wyświetlić jednostkę generatora na stronie: echo do_shortcode( '[pdfgen_site]')</span>


    <form class="pdfgen__form" name="pdfgen_site" method="post">
        <label for="email_forpdf_file"><?php _e('Email:', 'pdfgen_site'); ?></label>
        <input type="text" id="email_forpdf_file" name="email_forpdf_file" placeholder="Email.." size="80" value="<?php echo $email_forpdf_file; ?>" />


        <input type="hidden" name="actions" value="update" />
        <input type="hidden" name="page_options" value="email_forpdf_file" />
        <p class="submit">
            <input type="submit" name="submits" value="<?php _e('Save Changes') ?>" />
        </p>
    </form>
</div>


<?php
// echo do_shortcode( '[pdfgen_site]'); 
}

// SHORTCODE
add_shortcode( 'pdfgen_site', 'pdfgen_shortcode' );
function pdfgen_shortcode( $atts ){

$pdfgen_shortcode_html = '

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js" type="text/javascript"></script>

<style>
    .pdf_tabl_s th, .pdf_tabl_s td{
        border-bottom: 2px solid;
        border-right: 2px solid;
    }
    .pdf_gen_site__cont input[type=color], .pdf_gen_site__cont input[type=date], .pdf_gen_site__cont input[type=datetime-local], .pdf_gen_site__cont input[type=datetime], .pdf_gen_site__cont input[type=email], .pdf_gen_site__cont input[type=month], .pdf_gen_site__cont input[type=number], .pdf_gen_site__cont input[type=password], .pdf_gen_site__cont input[type=search], .pdf_gen_site__cont input[type=tel], .pdf_gen_site__cont input[type=text], .pdf_gen_site__cont input[type=time], .pdf_gen_site__cont input[type=url], .pdf_gen_site__cont input[type=week], .pdf_gen_site__cont select, .pdf_gen_site__cont textarea {
        box-shadow: 0 0 0 transparent;
        border-radius: 4px;
        border: 1px solid #8c8f94;
        background-color: #fff;
        color: #2c3338;
        padding: 5px;
        height: max-content;
    }
    .pdf_gen_site__cont textarea {
        overflow: auto;
        padding: 2px 6px;
        line-height: 1.42857143;
        resize: vertical;
    }
    .pdf_gen_site__cont button, .pdf_gen_site__cont input, .pdf_gen_site__cont select, .pdf_gen_site__cont textarea {
        box-sizing: border-box;
        font-family: inherit;
        font-size: inherit;
        font-weight: inherit;
    }
    #genpdf_site {
        width: 100%;
        padding: 5px;
        border-radius: 10px;
        background: black;
        color: white;
        transition: .3s;
        cursor: pointer;
    }
    #genpdf_site:hover {
        background: white;
        color: black;
    }
    table {
        margin: 0;
    }
    .pdf_gen_site__cont {
        margin: 0 auto!important;
        max-width: 1200px!important;
        width: 100%!important;
    }
    .pdf_gen_site__cont input[type=checkbox] {
        margin-right: 5px!important;
    }
</style>
<script>
    var email_forpdf_file = "'. get_option( "email_forpdf_file" ) .'";
    var site_url_fpdf = "'. get_site_url() .'";
</script>

<div class="pdf_gen_site__cont"> 
    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; padding-bottom: 15px; border-bottom: 4px solid; margin-bottom: 15px;">
        <div style="display: flex; align-items: center;">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARMAAABbCAIAAADft/ZaAAAgAElEQVR4nOx9d3gVxdf/mdm9Jb1XQhqBEEroJUCAAKGE3kGqYgEUBMWCKIiAqIiigAWwIYhI7016CSWBhJbeey83N7llZ87vj5uElBsIEd/v+/29fJ48DyS7c+YzZ3d2Zs45c4YgIjzHczzHU0J8lsIQkQFSYAQJIuh0pFyjz8oov3VHV1IqSXpSUYbqCn2JGnSSKIqCuZlgqpTJFRVmCmKmtPJtqWjVmpuZiUpTLhMEjpwSwikhQOizpPkcz/HPQZ7VmIOIHDmiRFTlFXceqm6Fa+5E6KMfsPIyobRC4AAAGoEDAEEAYihCgFBAlCNwAlShADMLbmVp2rOTvHsXuz69iZ09KOQUKKHkmZB8jud4VmhKz0EARKAInCAAEABEwAqV+s493bnLeWfOiWlpkrZcIkRAFLmABLmAAEA4ABACHAA4IQgocEoQJZEzgjKOCALhFJFTQQZ2NooO7cz697YNHoRurgKRISEEEAgQeN6RnuM/jKb3HEDkQBA4KS4oPnm6+Pc99GGMVlsBAIQQAEIREVCiQAAM8y2KQAAYcAFBIJZ6BUfkAkfkOmAMgJIaPQIR5XrUywhzcbILGWYxeYzSp7VeKZcjPB+CnuM/jibO1hABOYeC4sIjh4t3/KWPiUXUcYGLTEYIQc6ZQCSFoFBYEpkIOUWCqaDVaikCJUQCVOoF6w0fW/TuBZoKSV1efvJi8aaNEgg1ew4DkCjIOCAwGRfQyko+oJfDjOnK7l0FUfbMFPAcz9EkPJ2FgHMEAE6Q6HQlZ87mfbGJJcQKnHOKnBIZEzmAXimzbt1a0b+PddAA0dk+Z8W6ohPHUCPRyrEICBCJcqJUUA8vAUCGoA6/p6FyBdPzGqYAgaPAEAmhIOgpF0oLpP3HE89dsh4/2nHuHNLMnVAQQEJUCM/tB8/xP46nfOmQa0Gvj0/KWPxe7uvvYWw05RwIMdETEWWiu7vNi7N8dv1u/stPkQPGfh0jPdDIWU6WHLWEEEoqRxQCQAigqpwiEEIIYHnEPTlDTmrNwRCQ+rUy7x8IpnKZhHqgGpEIKnXZL9vTx86s2L5LKNXqQU7/Has6zzq7acWHNbDit7ByYzeymN9e6T9w2SVdjb/pbm2YEDB63X3pSbVI97e92Dd4+VVd7T+zxCPf7Iqs/CPP/Pv7326UNbkl9aFLOPrDzptF3Oi1utSliG+mDpr948MntqUmeMHNXRu++PSTFStWffXr2QR140o1oI3GQBf27aReY7588FQsGwEWs/3VoL5LzmjrX2rUmIOAgAhIUK/T7jqQs/kbSMtkggwEImOIRNC1dnWcOcMkZFScBr69Er33+z/TCsvcrE1eCPKhZSodkctqi+ME9YXFBBERgDOprIgTiYAA8KgbCIhiWz/nz9aw+IScbTv5seO0okwrgohUn5me89GaoguXXZcvZV7ugqHQM7Uc8OwLW9euuauvZuMxt9/SWUZulDJu/n0tMUSq2X+lpNAz4entjL6atQunXj91PWkiq/Pnsis/rfi8dc/xHXrIAUrPfbfsy9Zdp/XoZvxZqROObz3KJy0Y4drIr6D22jdvLtjakgSffM2xPqM61FWnN319wXLll62fanLC04+te/eTOwbt0VU/rjh5dnkP0yeVakAbjYGUePVUWFqbphR9vNyMG2euxg/UG/k6N04hCAiApQXp6zaU/3ZIoVNXyASBIwG96OZhMWuy+bjxl3P127ZduhCRmK/SAQAQxeCuXs5QkawqgdovNAGQBM6zsjkgIoKqFDKKJcpELpIaPQcJYEEhlQvQvp3z+lXaqaPzt/xIzl7jyAG4nuvp8RPJCSnNVr+n6NMHqSgiedoR9DGgHhPW/NKqiAPwjEMff3hIOWlmP+Uzk/54SInxyeUJJdezeA8Pqr0dekeVSuM10M3c2M3l+98e927Ox8PeGNFY8bK2Q6eMUnsG2jbiXpZZ7vnq5venNWuCZmUB7x9c0ydt5weLf9303ZklPUY/sev8V+HJPQcREVGXkpCzfA07fVUSJZ1cMNUhyBUmM6Y5zZ0dRey+3Hlt/9W75eUiUgQqAEqmonbKoI4sOVMqKiKE1awICcgYSNmFlCMTiT63QJueQLmAwOtM13iJGhmnIs8tk9ZGlr20dK3X1IjcdZt5VLSI+nKFIMZHx72+2O31+TazpqOJyTMcc6hthxHTOgCAFLni6wyh0/JZ3eQAAJqUy/sPXUlUW/gOmjium5NQs4w66eaNRI2Tfx8vAAAsT4xJa9vWId1YAXX8qV37w0ts9XlG5he6+LgUSZ967br6TQ/TxNCwDKnCNjZJgvZivep1GXdjCxBUSTfPnStu0b2HtzmAKub4roN3Suy6jp4ypJU58KLo0DsFNm7CnSNnM+z6Tx9qFacImj/T2Z422BwsT4xJ82/bHFh+KbOEmMN/XJ4wOdBdwYuir93OsW4f2M6RgpQVnaho1cqWAs97cOWeyq17T+9afZtatwgIGj7YPmzL9rXZ2Wrg2ujQOwV2nQJa21BeGHUtosihc09fa2pcGyzn1t7dZ+Ilt76Nqdq/Rr1128SLoq9HUx/njCN7rhU6Bk55oW9zOc97cOVesWOngNY2FIDn3Lt0X+XatVcrKyhPvrjv4NUMwbvf+AkBrgaJ2rS/t3wWUeIUOPmFfu6KqnrwseBc0jNWFnY7oc+gKCev+87eUc6ecY7ucV17Fx88lFdQ+umOi80mrCfBa2DwGmHQGhq8mgxeA8GfBS36paRCU3Lk9EMXz4cu7tEuXtU/Uc4e0U6eScPHca1WJzHVrYgotxZRzp5RLp41b4t28ozp3U9fVqZn+vi8UqvRnzlP+fzzfddKUhIz31gQ49bygVOL+y7uD5x84lxbpi5fI5WVS4xxiT++RU8JzeXFrUSzAd8kSYZfz73uZXi9iNzntaOFiJqz8z1lnvPPakrPL/KTK9osPl+K6t2TLKlM6fnKCU39Aohl11f1tq7+iIstFl7U1qxSilrTXQYg+rx5UYv5v4w0J0Btp+1TG6meZW4aKK+UI+u0PEKPhefe72JpkE2tun90uRQ1Z+d7iqbW1koCxHzwdzG7p1oTINZT96iNNecRdWQpu6Z5yQkAABEch2x8oGfpmweZyLqueiAhVpyZ17L32mgJUYpa00NuM/GPokdN0Ecs7yRTDP0xV5MbuqqflbzNe6HaR5pCRM3JV91khoYb08ZTV63ePclS1nlFpN5ImzRn53sqnJs5iQQAiMx7zqF8JiWs76tQBm1IZoiov/NRB5nFyJ9zWcHZ97paGbgQRbdV9/Sas/M9BUEmo4ay7jP2ZLHKNj5hFGZItJF30uYu1sbFA0EKei4IshGD3XZvS2jTYdTyvz7afjGzWEsACVBOKRIBgFLg4/q1M5MJpKQIkJPatRjcO4TrK2MJsrK4xAHqrVIIYfoKABCQEkBCMLtQs2zr3y9vCS1Ysszx4/dlNhYick6JhNrSn7fmrl4nlRcx8kwNBmV//7on0Tx45mR3w8NQdJuzac+lO3fOfjXKIXn3rydLqm5UX1m54PtEn/mbV/a3UMdEpeqoy8QvPxmsqF+AJf70weeh2GX+tuMnf5vXuf4URh8fn8Io5Sk3Q5PVYaG3KwgFVWJcOqtfvcpmyDvzu8vEVtM37Pz904ke/Nb6RV/ddZz8/bkbf28cZ3Pny2Vb4xkAYIXe6+Vdl/8+/MUUr66zFoc0qxxc6rGrQV1z4Ytlu7NavPjTpWv73+6q+Xv12sMq50HBnciDC+ezufbawROJtw4fiGc84/Tfd+U9gwdY1mmH9uRrjkrHgI8um4xcuqC7vG4zDTCqjX9UtdFHJBUo+nx+9Nrfnw+1Sfnzh/15xCNkaEd+8+SpHA4s7dzFaKHroIEWYV+++VWE+dDVh0Jvnt68YsHYqsWdQ9BHfx7/471Ay/S9P+zLqlwDNtBzqj8e9x5mznuXpycRg3dTMLV67SXnr9cfyIRxHx0KjctkQAlBrJSDAAiIDtbKQd29KWHaxDggrM46BwEQgDOGiITwsruRDc6xEACBVK5+CICMMWFPWNK4j3ff7jTQ5fefaOs2FHUMRCoJxdt35K76hqrLK8nDM+hChUe3H8p2GDlzjFOVnsz9e7Youn7yUqGpo0ydFJdmmF5oIr5asDnWe97mlf0teMq2JevCdcTeu6U9rV9Al3/m+DVNy5e//mrOsCGTRnSyqtt4nhOXWCR2699L8eD61TuhYfmOffr6kuS4OL2R6kWfwM4ulNi2HTp58tB25g+PHI0ivd9Y+2pQ94FzV7zoL4VduFIKAMRqyNurJvcZENTBRuY9cJi/DTHanJgbP1ZTlyJPnUtTDHhr7ezAgLEfLgy2KAi9GMG8gwf6SeHnL+aHHjyRxvThhw/E5f59Jgy7BA+yr/sqie79Z788a0w3l6KDb837Ocno6p0b04bun1Vt7BHRZkPnvx4SMHD+jEAzXVJsoiT4hAxpqws9eaaIF56/cAf9BwU7RR05HiP0WbJ56aie3YLnLZ3R1tBxqOOwN9+fNGzqx2+PsJdS4hMrZ5TG1zmIAAwr4h9kz39TSk6khFJkRK60fOsN+ZwZaw6Hf/VXuLpCT4gIAGhw0hhqQYkhBnVq7e1oyRlT33vAiCAiqWk0A0IQBdBqqKRDUalNiCNVrp46oADAOFaVqhyWkCSkl85cvW/1gsETf/wmb+5bFQ8fIqWEg3rH9kwzE9clC5nSVAQORKgv8ynAM/ZuP1HcfObsYVZVf0ndNTvoxZ2JWgQAEP3KyjgAAM++diEbRB+JUwBqO+zLNZf6v5NsvICUlprBRN/2/gqjdQLo4+OS0CVkxnB56OaTW1Uxpn02TNCGvZUQn8s57DZWfTWklJRMpo1c5CksqvyL3KKkjAMQK2cXEyMNrMOuXBj85ZqrBuo8KysP7IO8rCgAmDR3sydnc3MlMSC4v8dne09/53A1o0VgL1XY4V3b3a5p2y4a3LyeroW2077a+rKNLvzDbgFfbN0V+0JPIwyMaaMJVT8yZDfwiCohWlqbgV6nBxD9Qga3XLvtxNkc8/PXNa1eDm6JqamZ6BjQzqWB0YSYm5mCpKuysxm/C4Hwwrzsd1ZICUmEEABEU1PLFR/Kpr+4+PuzX/58S10hGWahVT+VYERmQvGFQZ0EQpFzKC7jBCjWlY4AqNXzCi0wTlTlDY05yDlwVlmEV9megSHFLFX54vUnfwgvd9iygXb2o5wjCgyh4qffSw8d4YaY7X8GFr/r9/Oa1lNm9a0yqkl3t32+O6f928cTS4v2z3AkHKtGbssuA3tYJv3+2W9JDCxa+bqIDRcQqACo1TbktOAl8Yk5xNO378C+LXMO/XUFuwYFt/N2xaTYuIqGqq+GKBOpVbdZHy6vxIqPXgtyogDGLSf12Zk8ok4UCgVqNRoEAMAydQXKlUoK8i6D+znm7Pt6R0rrSZ8vG+MY9s3ak6oWAwe3bNDUJG/t6yXwrLQMCQDqTQSMaeOfVN3gI6qS/YhXp+HBHqUXj2w8fqXYrf9gfxFEmQharaaRc5W6rxciIgPQVaSv+5reuKMTAIFxUWnz/ltmk8a/sfXE9rMPNIIeCId6owQiApK2Xi49WjsjIVChk8rLBEZ4bX0RQAo6vUbPy9RSUYkuI9coM4OBAlndUZ4AQSCcCsWS/oNdJzbfLXb/ZqPcvx0hFQCg05dlrl7ProXqCDCOyJvsKJXu7dh5A7tOm9m5+slIyckZ0Lz/uIFeZhXZOSpEZngs1GXSqr0bXvUrP7/h60tVbj/GmbECokcLD4UUfuJIBq9UWZ1q42KTuI13C1f/oD6ukoa369/fpWULd5IdH1+QaKx6SgUsLixkACBr7etNy3Uuw99duXLlyo/eXLjogyn+DSwwHtMcYJyBzK9tS6Hg5uVILUDZjdNXcmirtm1kAKa9g/tYlqu07cdM7DZg4sjmZcXlrkGDOzZcizosPEqido72okIph5LszHIAlhGXWIoAYFQbTa2aMaMab4iYvNvwgS55Bzb+mW7Xb3A3Bcj8/FrQgsvHLhYDAKgzMwof65Cr23M4ohb0RX/srdh9WKXgMo6UyO3mzFK+MO3t307/eTkauQBEaMh1QkA/pKevrZkcCLDMbE1xgQwJr30vEkII05dX8NJifW6eJiuzQXJ6TnRSve+lQEAkAASYTstX/nrih/hS52++ED08FAwJyIW8vLiPVglJSZLBgdu0BY/22q9/3pcwbuuEDu3atWvXruO4bx+Knl5uEPfbgqkzxoUsP6vh+dnZho+lTK4w6b7grRDLxO2fb09mVK6Q89R7dwuokQLWQycE2xQemh/Qa8TIQW/szqnDriIhIQM8WvjIFN2DelnLvPsGtZDbeXvZ8+TYpOZGqhc9vdwgduuckOEDFuy3nzB9gNm9dcM6B40eO7BDu1Gbox/nGzTWnGrq4D5uWrDFw6/HB4YM6TNhU6zFwOkTPAUAsAgK7mUq6zBmQhtR0XvSKG+Zff/BPY1NPaWILXMmjQnqPGZTnKLLhHHtlC3b+ZqUHnknOGRYj8C3z5YCAIAxbdCnr5rKFXKect+4xhtqv7LXsCC7irIK8z7BgWYAgsf4GYMsErdM7t5/1Mi+HTpM3hr3OO3VeKkRAIEDl8LCMzd8LdOqORCJcPnwARZvzF216+rvB2NALxD6mFmQYKmUjQ1qKyABQE16Ci0pZ6TetAmJnoigqWDFRUJpGdFrjAsjRNBzrtbWm2pg1Q8QIOVauua7czvSJNvly5m5GUGJiUSMic38aoOg1SJ5siPfKHR3jp1OklCXn/jAgIfxueWi//xP3w5Uxhw9fM9xzooXW5PoyAfVz4W6Tn13Tqvysxs2XJE6B/V1xtjw2+VGClDnaRt/XjLARXX3yl2pmYdF7dZJiXHJOjPPlu4CmAUOCPDsE9RJDmKLFu6QHp/Uor40kPec/+ELfhB/8XysWhC9Xtm284MhzoXXT5yM0Pl29BYf99Uw1hyool5K3V/67rd3+5vGnbuYYhX07vYfX/YUAACo/aBBvQLGTvATAeQ9Jo3t0i+4r5kx8Szr1sG9x24UNxv6/s5d73UQqeOkjz4e6aW5f+me0H9yPwcCAGBUG09ftbxzUF9nMK7xh3pj7AAAzHr17qwgJlXGOcHz5a1/fDi8WdGNk2fuEf9uPg0PpFAdK139aWblqtTZr7HLF7WioJA47ejrumX7uksJq3dd00tgGDAakoUIw7u771k5QUEERlB98HTO/Dc4IJJaS3VEkARJ4KLbT9/TotLkJe+KCEbnfszCouW+HWK79kn5qi6vfF9SgQQAgBm4IgiASAlyQmzMxT8/nNr5/MHcrzYgR4JI5SaOP3xtGRwsCOS/dD8PL4p5WOrRzuN/Knbh/x7U+6d7TEtd+uD8295PbUyqHA8IgkRQAq46dIxdCdMJAgDozOxc3l95IE31+e5QvYRP6jYoI3zKoM4KCowQARFyssHQJeoVIgAEkTIoibzdUMgmAlAdZ2Xl9S8jIKWku28zJzPCiQDIilTaj344w6dMMx0YJDAucuC6svzPv+WFec/WwfM/CWrj+7zb/FuQovd89OLIt/eXdwoJ8WiKDbay5yCggABZuVmbtmoFDUWqZMR6+nhFnx4VqjKthA0ZjquLA6C7s1X/dm6VNjeO6piHlZ6Yuu9u5SgnaXVSRhZFjg1IJpKeqdV1Xn3DbwqZsGF+8OG1szu6mRGgFEhYUt66o2EOS9/XN3NihHMi8uio/K1bkCHy+ivx5/i/DSnx1E87bgqD12x4w69JzouqNQjhhEt5v/wqpCSLXCAA4Nfa+bXZQKmjtSWlpP5sqhYIowBDunq42poCyEQknIM6PsEQhFmXWKX/h0qlBaykAhvwulAEAKYrLaEItd2aAkFCGQfGurZ0+vi14QpRYdja/eORsGsV8mYzZlIQKaLIefGuQ9rkZA7PxC/6HP8fQd7z/eP3kx4eXNzdaCDtk1HZczgSKS2l7M+DBv8JlyvsF80jLm6EoK2lqZzyJ1ioEBUyYdrgLoSQyqFJYlRtZFfDoxKAmJiMaRkEiFHZSIhMAqmsaldMvZ5bLnEC2NbD0Uxh2GfAVHpy4NJd82njhNa+BKlEqZibW7LrD4LI/3snbc/xb4Da+nT0dXisDeAJAiQERNADKd5/QluciyBwwhXt21n0H8SAAKClmYlI6zoz60Ho7tesXXNrw+vNCYOSUr26pKG7KaeAvDz0WnleVkOvNEHUU0nQ1w8mZgioB9BJjCEevhJVotaiYSDj+pKiUrS2tXv9RUFGtJQD0LJ9R6W0dGiije05nsM4KAAAoiw/P+/YMcq4jqIMTC1fnEoszAQgBImpqUIQxAbc0JUQCI4LbG2uqO7CqMtII4XFaKwUAUKBUErKHsQR5DqhQdmcICAHYhihqqJwAIAAQwyLy/5yb+hnO89LiIYpHxLFndTikgpmGRxCO3Qy11FOOcvKKzh4mDwfc57jmYISQIaounhViI0WgSoZ8ra+1oMGE0KAAFIikwmUcAIcgFNkgByBV9mFweD4tbcyG97dBwmtXOsj0eZmKko12HB3I4QISIAQOYOGhx1Axiov1r5HktjHv1348JeLeepqix8RiH5gZy8LJUELpdXkUUygTGAMmO7wCV5SYth+8NQaku7/tWF/9FNv01Vf/nxcr8B3zj5uxtpoqCL/2vj7jfo+be29fevXrvp4xcrV6zb/fjwipwn7kOuCZx35YHi3kY3YCv5MxfOC69s3/hWp+lcq/VcgUkCm05YeOcIloARQoHZTxhJz8yqLALEzk298ezTXSQRA4nz93muRSfmISKoSrQHgkM5ebg6WtPLtJgQpL6tgXABB/7jBioKA0GDvIgSAgl5X7zolQJEA5wRAhKrOIKNs4ZhuH88apJQJQMA2KKjU5TvIzpIE0MUmaKNi5D27iJyA+HRJS7RXt37w3pnxASM+7/FUk+Lyh+eP30ya2aAX7mlQtPejF9881VUKvLjYs9aFsuvbln1wsqpzEnPfaZsO/zKr1T9J3MoLI06ficRu/9LstgHxPPW3915ZEjbEIvjwbJt/p+ZnDcoJwZxcVViEYZCR7GysgweQqnBOQFDKhcm9Wkzt5ze5n18n32Y5efkAlRMsihwINRHY1AHtBYFxUtkLCHKeksmJ/olTpEozW4Odi0hS/W+fIQUIqRNt6u3uunhioKnMkBWEMGdHk4HBICEB1HJ96ZGTAjJ8XACEUWhvHDieoos7euDOM/ieNxWWvSfMGDF1ykAXYxeJsscbW7Z9+/HLfVy0sX8sWb6v6H+a3jMAdRk4ecrwGRP71N3k878XInCsiLgrKyklnEpEb9bJH5wcaY25EQIgUACuZ/zbPdezSykQiVS+tBSI5O/h0r21E4VHlmuGrOL+Q05YHYs0B2AE5LXjmBGAV3WAOgFuwDmoKxAatdkmISlz8fenvlswxM4MgQgiimZjQkr37aGaCg5cF3qTlZQKVg5Ppx7drYMnkiWQYo8ciPikR+X2LHXSzZsFTp3sEvbvvZqt9Bs2ZVwnhyrmvPjhiT1HIwrMXfNUVd9VddLNG0no7gW3Dp6JR98REzpp4pLVNbddmHl2D/CxAABeeO/onuN3C0x9Bowf19NVXlk61XXCwpl2dsY/MDL3PtPmTDadM7O9xnfinxG3onSTe6junTh45m5mhalHwMjxA1oYQlR4YeTBXccflln69B45po+bNv5GWH0aNQc1lnPv8v1c4uwf2NaBAmhSL+/dfylJa9duyPhRHR0E4EXRobczRS/DLm5eHP+w2KWdpxkA6DLuXImucOvSy4fXrNO9ll+3Wnxv5/yb+a1mLGrvavO41fT/LogcpYJzl4gk6QQiA8GkfyCVyao/5YRQEQAJQYDIlMJ9FyNqBtNwAIJsaE8fa3MTWjNrOnJtRhZSUtN5iogiB6DA67hUEQUEpIRyxBrJOxEAkFNVReV8rJ5ODYuWamES0n0XHwLXb3xzlKM54ZSa+bcXnF15cqIAoEpM1CUkm3R5up6jCzt4LEnevV/Hu9eOHohY3b27CABS8o75Q7/IcVJkpRcwBLLqu/n7r347zJYCS/3rleDZv8ZWVL6OQjOouv/jOEtrTWGhjjZ/uYP/zXeHfRnzaCwlZkFfRZ5ZZMGif5o27PV9yVoEIMInfVceObqspzJ5x/yhy8P1IB+4Kfnv140OOwYobaxMCRBKgaX8Mm/8u1d1CAD04++Wn7qwooey7Pw7fYd//aACAYjJgW9jjnb+8cWh9Wm8Uf27NmLdxP7Lwn3eP32hH0DJlRUho1aHFnEEIB+tHfvD2b9e8tZeWTv2tSuDfknYP9OOJW57acCFmZGHX3ah5Wc/HjVqT9dtdxb+OLJmnX+/4WJMfM/Ur6aO3JaBzi8dTvpp+H9J1ATFguKKsHAEzilDayvbgUGIUMcmRpDrJL5p78VCDdaK+CSSlcxs3MA2tHY4NNXoiUZf/U5j9R5TVxtez3lDAMBMgbbmdaa+httYqZpwNHYFSVWa3srllkA4kH2XEr4/EgaGxZapXNnJ35DUTa7XaCMe1F8zPRa68IPHEknn8UtH+UPs0YN3Hr1lqC4wH7r+aOjVP+b5Q8wvX+/O4gBFh5Yt2h5v0nPB1mN/H1g31rPmcoOX6b3n/XHl8pE/3h/aJuSt1Z9++umnn3764UQ/BZG3mbfylRYCS/jxjbf25/i8uO182PV9HwTildWLNz5g1DVk6Ya3guweM81kjEklyRc2fnUwlZu36eArFzzGfrLjaGhExMWfZvtWhG3Zek4D2rD9B6L13nP2xSVFHv1t2ShXuadRGlUNLL+2cs6qq6Tvyp+X9zYHKfKbRZ9flzrM/fXSzb+/GeeaefCDFQeKqGPIiF4mqssnz6uAxezecyP//K69qRw0Vw+fzjYJHBGUVKfOR/qrJV5sO/3D6e3+y/K2UpZfRNPTGaUyzsjs0PAAACAASURBVKizm+DoSGndOBsECIvN3n89pd6kSTGgczNfJ+s6A4KUX8xUhQjE8GIb8g0wAexHjpRbWdcfPBSunhbtO0PtTUgEOSOCVJaHwAEJPPLIcASwNhF+Xzpq5exAZ0tA1BmSuAFQDhD6IFuj0RBESRCU3dpzQI6ISMvDw0m9vWCPg+7OwaPxpHX/4D4D+3pjzJGDEY+6jug36d3XQ3r2mvT2C51FbfzDWD2Und17PId2ffunr18OGThm1hDfmjNVwWXiyk+n9O4zrE8LuWvQq+8tXbp06cI+mqgE5jV73QeBZsBSD+65XGYzavn6Of279Bj30bKJzfS3z/ydCTZdxs8JaW3WcOSTav80S5m1V9A7RzMVHeYuGm0DILTo3cs27eqJc0lKZzvIi43O5qKjs4PAc++cuV7afOjEIHeBGqVRJfPqipfXR1qMWPfTYn8FAIs7duyu3mnCynWzArsNfH3VK52E/Asnr2upc8iInoqiSycvq+7t3ntHjxVX//wrTh166FSmoveIEBfnOnU2IF5w7zc+oCmJqf6ToCQ9jYNEkSBQm86dQS4ntSZZgIgaPV//12V1Ra1FMnIuA/34AZ3kolDHPqZNTSXFhTXjn4khoUCX9tTdtY6BGYGgrS31aq6vneWWEKCESqVq4FhzrlaZEUUgAzp4LJ3c+6sFo0xlhiWWwdxHbj1IzCzSAhEooNyvDTNXUgSJUpaVTisqGq8aXcTBY3HoFjigjVnnoD6OPObIgYh65grB0sqCgk6rBZaTlKoijv6djYbdUic3t9q2Oc3NzxdvjnKYtPaTITYAICUlpjJesHuyDSGEEGXwD6kMS4qKn9jViWDr5d+xS+8h097beu70mkBz4EXnlga26z359aUrV/9wPouBWqXiQut5n73TQxb548yurXrM/SO26lnWoWGAFHf2dJwOtTrJ8EikjPRsLri3bKUEABA8vJrLeEFOjg5osxEjeshyzh3Ztn3vA9OAQd1lYX/t2Ln/VJo8YESIk6yBOuuK/68ELYq4g5whQQCgnp5Iaz13RETkVyITT4Wn1F3AE2JnoXB3sU3LLU3PL8koLMssKc8u0RZVSLyggGh0jyJ2EBgBAYnc0kFuYVMdCIMADIAgmHftQOxtZLXTrXFCKAArKQVmCNisLkUAOCJwoAJK3f08zRQKqM7zAVylIzcepHEACmDepo3S1hYABY7a6HiW2eAuunqQ7h46Gith8en3B/QeuOJ8OeqjjxyMfIyXg1IKqNNpG+Uy0kV+tejrCLOQlZ+ON2QHIaJMRoRmA99Y/ggfvRni9WQLs+nAtaF3wq6c3PHZnB4OFIAl/bxyQ7g4YNX5ZJX69vJOMkDOAaht0OoLd89umNlGur1l3sKfU7kxGlVtsek5PNC+9Mxnq08UAQBRKpUENBWVCzh1mZqBXKkUAITmI0K6Cil/fPJTrM3wRT8uHGYRuWnpjiSxx4jhzWi9OhsQ/18JkaXnUEYY4SJVyLxc62wJQOBler7hr1sVGgRKSO3D0/JU+nEf7TIRJEGQU0FGKZggHxDg+ZG8lIGIVS8zRSoRJlAZKhSmfm1Vly9Xm9wQEAiRtWoJ5UV15iNIQOCEl6vrzOIQKEGJcyGvXFOs1W/+62KJSgtUjpV2agRkjKGACISCQkHMrRlNF5nE1TooafSDkiIPHY2RFHa2cnVJCYCJnZ2iJPrIwciPu3QwXkBwad3SHq5d2H8id+RYR3is11V6uGnRFzeFvuu+mFUV4S76tvdV4iXmOWXZ235yAHVuLjo6NiUaUUpKSNaL7UbM7OthronOKeBgzTkAsKLCCpd+C7f9lHcnYO3DiBg9uCbUo1FJxu+1b/bOuDCo+9IdKzbMG7yyi1/HNmbs1PkzCayjL6QePhqmF1t39FcAgOA1cninD69eVzd/bWaId2+T0U77f84UA4ePaE7r19mQ+H8QPvYfA+WqCooAhMvM7JTtW9dZwBMOp8Njz9/PgNqGMgAghDDg+cWl6QXq1JySlMzCxPSCuxmq3GK9lJRR825CmIiMW1oKtlakZ0exunMiyBnolSJt7iw3s+LUyDSHo/FgU3W5ZsbK/SFv/vrjsWiJyEgNy7a9hdCno2flCEmp0NwVgCNlBFFf1FgntXT/0JEoyWLIF6H3DQhdN9RSijpy8F6Do46y/4xJPjTt92ldeg4fFxK8/HxDXlAWv2Xx6kulxLT45FujQkJCQka+vOUBdxj76mT3iovvB3YaOG78iIC27SZvTWhSnmTR28dLrr/25dRpL04OfvnXNMZy09N1UHZ8STf/gLEzZr2zM5Ypffx8iDEahtYRhUIptpm/cnYLFrFxxW8p3G7UK5M8pKvLB/UeMaJP4MKjRbZDX5tuWMgJLUcO9xfFlpNmBZmBefCsCd6irPPwEZ4CQL06KxnWE9+UZv6nQVlFKSKhCHpTJGZWVSE1nCFnyMu0+m/+uq4z4o40QECQcVAwIkqEMkIB9G62Cs29+9UbngEAASUiCDaWoo2D3MqOyyp7CAGUqF7m7KRs6UtNzY1GlQrMmC+HCHoQ76fmpRarOTFs7yEUOSAiEfp39XVzsMCq9ZCyuTuigIQiAk9Ma5xapIcHjj6UTHsOG2xX+Re7ISP6mEsPjxy432Ahs/5r/tr8Uk+H0nuXQjMdW7k3sO1Dd+Xb9WeLOEpZd06fOHHixIkTJy9GFXJqO+qbQ1teC7TJvnb0yKVUy65d3OtmbmycZVDwfuWLT8e30oTv23ddGLlqWYiLJvLGXY1KcPZRxp3YtSecdX5p08bXmoUapVFDkHnQ0qXDbUpOfrrmZLF1yFf7Nr/UVRZz5vQ9qfXET/f+9GLVMCX4jgrp1HXqzG5yAFD0mjWlY9fhI30EAOB166zFs4b4RrXrfxlI7LhJ/OotpHri6tryzBlibU4INUw1JIB9F6LmfLFPwygQ+vigT6jaHrdhXr/hG9doHz5kAhHQEKLDOaHyDm299u3GvMKkcZN5VhYAcOQC57IO3Zof/kN77XratJcJefSVZYSLTCAu9i0unI6vgG5zN5VWCPUZ1IgEFRWUeTtbfjY/eHg3byACBQDEgs3f565ehxQFEGwnjXfY8MWz097/EAq2j23x4pkBv2Xvn97EzSTP8cwhSjodECRICBE5pdQwWBBCkJdq2MYDNzQgR0EijYuVFIA4K0RWUUbIo3kfEqSIxFRBZAI628mcXTWZWYZDOyQCpl38URSIiQJorakiQWAEBQ7IOQNCkD06orpW2kMiUPBwsgnq6BLSo1Vge09rU1nVuSUAANTakgLREaDIS8LDnzKI4D+Mosvfr9l++tzBo6Wmgf16GUk2+Bz/KYi0QqcTuFwvI6VS2ZkTckGJldluOdPw100K57UXERu135QASBTaR1zWFeQK5FH6UIpIAIlCSYCiKMjs7TVcTwhhRFQgM+nYVhCoXiHWGU8opxoRLUok1d6D5mbmG7yUoNNz5CjpOdMzxhR6ZBKTGCopC2jGrctV7EyU9oRUJFUwxoBxlDhjkiYxVc6REyJRhOysZ6u+fxm8JOzPjdsuo13H2Rs3zX36LBPP8e9B1Ov1AACEsNK8zMXvE+QG3wsCEZB1pQ3vnqkPRBEBJDkQfa10VEh0IJo6OHIqEGAmI0MMcZwSITIgJj6tAIDUMw9wyhVMkKSSrJUrCYoBVCIoGFLrUgQEYASAAAdEACkUijg3BG8DUQBUj0ucgLZcLgPUUy4qmnvCfxOo8/iv/u5j7uvv69hQMt3n+A9BlCnN9CgiYYwSUcLKhTVyCsAJJRJrfMAKEtABUioxQoUa/Q0JoYQrvVtSQhCozdgQ21FDwdA/CUNRQABCBEpozTgbAoQA6gUUOCICIgEwrIKoIYUb4ZUxp0CQAHKgSAAIEtAayFTWjjITPdWIVAagaO78D/X1Pwyle5dA9/80iecwBlGwNGOcIuEiwqMDAwkBg1mXPIWXl1TtGqiXsoNQwmVuLkgINUSLCkLV/SIgcgCkhFNSc8+zgYuIACAQwmttKTDkH6yxLKoRZVDNoloQcoFRJAAguP6X9Zzn+F8LkVqYUERGsWpzzbPfdUwQkRBqZcEbSKqLCKCUgVLEsgbyfTYJlfvsDMMXogSUOrk+ocxzPEfjIMrkpnrCiMEURYxsbK7r2n/sVaM3cEAEGVGaCdzI4QmG+0W5DE0URFXWBPlGrwqcckIlCgJKQIACMpGY+LSoJ+85nqMpENFEzghW5zSjyGtOferjicue+jfIOWdyEc0UaDRNLQEOCHJTbmYhYl4T5Bu9KlEGBEUkHCkAiJxyoqDuzZ4k/jmeo1EQlZ5uZYQAEokyy969haDgg9cflJbrhCf3kcaCIJgqlZNsHc3ByKBDEETkJUqzc50Hlrm2b6yn/IlAycPJboCbVeHWrVCuZRRkjvZyO/vGC1CFHg9vMbS/IwVt+PFLjkOC6xyuxAv2LVlWtnDzLM/GW4t5QWRopnvv9o3Ya29cPEs+8nNEm5fGeMQfXL8jNF+nbN5r8ouj21g02Igj772ZPnvLPL9G5SZ4Cno1oT314dz4KVtfb2ekEimmUUSfjmdNxo1/CJp7F8MdA3s7Qfbfa5esvyJ1fmn18ok+TTVailY9uhdSkXMEoqNmVk6zp14rOXLgQjyjz6znIKC8HFsU6Ie6G1lEIRAgGFdY/mEyKWcuT0gm2mhQxPd69hneXMItQAgggtK9GbFt/DshxZ748reO/fqPM5PuHvhyd/cBdXsOaLMe3i8uN166AahPrZp2/IXkHeMaca8x8Tzv1K9n5D+8AtLDfRt+i+3chuz5/ofz34btm93cuClHyomKTFU1NjDsaejVAMuLjkguNV5JI4k+Hc8aaPRDKL60Ys5y81/O9naCvKgs2/79yvcufMm6/aV3Wj99pQAAFJxdqcLUEGWsiowUyjVtvV11ACjpn9UP6CWN3iTsXio2YIRgSG9Gpar1FJn0zOoFcUj3Frq0TJlaywkQpNTeXpI1PipXSk16cPPGPR3wgtthtxMSc6uOZWowiA8AQJIMlnNJoyo33McMZx9xnVqtA4sXdkb/VPVeMkmq+apw1vApSVUov3pd6hZoCwBALIOW7jt57fqGnrcOX1Qb5cYkXU2JVdweXa+ssLrimvQe386ngBGij+dZj2g9nmA4Zso4jBEvu7lu4rRvHxh6mNh+waZv33t//YKeMTcj6t3aWFDRwdbU148TJjAZLy3UxiQO6+xtLooSkUlExojAiGD4f9N/qMgF7YV7iYwbwszqtBkJ4oXbKQyhSfJFiVKJUoYyiSgQK391sVN6WZmUXbnKKFIAEIhJYC+x8UZ2npOcVpxw62Y2198Jv1+empCoB23omgHNLZUWbkPWhVUbAbH45DtDX96VyTWRG0d7WZva+Ez44UH5g7UDh29IZKC7vGrZX0UA2kvvBM3ft3dhxw4j14cBsNR987o6mZm5Bn7wdx4HlvzX3K6OJqZOnebtqxPlUC0eAEB3+1qeX5+aoaTU2slBptdKdbnxrCMLO9ubWHdYGaYHgJrcdMBzd7w+e8Hs9ramDj3mvjfdz8bUud+q6+WaY5X0jLazBljyjy/M/jWLA8/9/aUp3zUqpLuK6ON51ibaAE+ee3RhR3sTS68pvyazWlpKumqcOMuOzOv1yaIuNTds8/KyCnvXx+R1eFKDQGHC2/gpOEgClal1qvAwV0crZ1sFAUM0pQhEEIBBlTOyCT8AhKAuLqskI7fEmNWb5JVo7qfmI0hNko+AHDhzsTO3kGsYcsOvAS3dbLBcczPCsOeNm5qZdu7AG++dklJSStr7a8JuqhJvx7p0sE1PVIPo2mPez7fjz76q+eG7M5VPRnv9i4/Od5oz2jln5/JNwkeRBbcWV3y9+ohTr855YTfKpYd/H9lx8rKaJV6LtO8R2O/lSc1z8zVQuP+D5ckvnEmP29LmyLLv7ufs/WDZ/ZB9KemX10/vUDuwrkq8KwUAFn8l1qVXB8O4ifq8mNAL+9d/f7F5YC/LOtzKL6x572LAr7Hx28c7UOBZNbkdKAKpOOZ0bMc/Yi/OZX9ebPFb7I03cfvPF7FnJT1j7azNqigjo1gPAFJJZnrhE5Ix1ib6OJ71iBrnWXJ+x2GvL6Me/PpaJ2ehlpbc3YwTF3xe+WJ5YI19/Dxj36LRm8jcV3s3+oWoC0ootRk5iIuiIaSl7O/TdhSHdW4JAAqBE2TN7c2GdPelkp5AEzJkViqPIs/MV8ek53IjR2NiYnZxUmZBE00SCABICAzs4r313YnzRnRws5KJQLr4N9dcC4XcXE6AIpF1ait3dxcbP5HWpqTL+o31S7958+ZdOnSsT35ioiR4DBrVpjgi2dLdND25gAOAlPDD+/vaLnsnwFR3/WJ0j+lTWlj4Th3bKvJKtH8v39ib4fFnrxTQB3/fyAm9pe/Wy9nBx9OGAmiunQxrNSJInqvy7N9dFXnz/KnwTvPf7ufi0HpAb59a58VWiwcA4HlXbpsEGP4PgGVX178wZto3utc3L/QToBa3rBuHLnjM/XCkl2undh4C6G/U4hapBRC9Awe3cfLv1Lp5x14dnNv062pSkI92BnpQv53/BLWJPo4n1FFipNYoT3ByNEm9l2TSJ6iDsraWGk9cbte8uTzt5r2cJjeLAiHK1i0Fdw+Bg0RB++C+5v79yYP9+/pa/b5swreLQpaM858x0FcuU1T6Zp4eBAgDBUdy4UE6B1731GgCZ+7EMIZAmpSbknCCio4tnOQiz8svUchh/LB+HvaWowO8VOevosQRgKNg2rkrmJg0dFBPfUgpSVmOPmMCrCO2n85tE9DXkycn6XT3vxnZe8Y3B84/LNBLegDQ3991IFqdkVbMoKKgWGbrIAKAqZ0NKymy7NXDMuL0rkvyV9/3f3D818tp7QNaV7VPk5OTE/7zm/Pnz1/wQ0IzP+vCfFmz5kYCoWuIBwCouHZd17WPbeVFajNmS/Tx150LC3UiANTipknP0Lp52lbpWVtYm1v9D6Ao1rR+1GvnP0Jtoo/jWU+J9YiKogCg6PveZ32uTO8xZmOkpraWGk2cOvR/54+Nwbc3bW96swgDYmcl69sTkMs4gEpbduR4W0/7Fs2dknLL1v969I8LsXsvRbV0N0ECDZ2v1igQcjUyE1mNIBoARNTr+a37OQzFeuufRgGBWsnY3FEBAa0cbGxsbGyt9h2/MaSXl7umnF28TigHoFpzudXgIKBPYbeTUlI1rh7uAZ0rjpyx6tajpYdNRkLipR9/li89e/bP9ZNaGV406jDum6OL+fYfb2kVFqY6VQkHAE1pGTW3EN17dSn6ZZuqz+jJwQ5HNl10D+henUhMbm7hOPiT0xcvXrx48cKZNSF2proSY6k6aogHAF34tVy/PrWsr4oer8ww2/3D6TLQXq3JjSoVkkpVvVCW1+H2BC3UlmUMhBDOn+YjWk30sTyhrhIbIEqbjf7m0un56vWfHiipqaXSJxKvCdHV1b4g+ykaUYcEoUCJ6BAyhClkEkGKtPTYGUVx4eDOLa/GJLw+pu/CUQFvjO49aUBH+mjPy1PD4KVJyClOyVVVD1yIjCNPzykMT8jBume/NwYcEYHRUb1a5ubmvvfrpcNX71ZoNXIQpw/tWrx3n7owBwAEzqy6dDFp3epp7N28OCVT2dxD6RPQ3qFl9x7W1u6uqqTEYhWzd7KBgntRGXqJIYDQrE2HrrNf8z25+Yi6U2eXsDPXy1j2iRMPWnVtL5N3DGiLdj0H+9oMGNxK49wjwKpauqJ7z+aXdx5MY6CKup+oU3Tr4XZ15/5UxovvRSTUSDBUQ3whsISrsc696hyfLrScOafduS1/ZbHSmtyIf8fmN/YcSGOsqFiFIOtQh9vjG4+ltdupu7q0R79V4TVyGlpbm2XERKtZxrmLURIAKOSlKcklHDQ3vpz51t4MI32qimjm43iCoq4SjT+c3Iib8eDbs71pUUE5r6Gloxl1H5BRsIRLF+K1LOPClXgnDwAwtO/xOqkPCpQAEHknf9OOnZAAE0HKzy85fqRfN5+CrNJTd9Jd7UzupOYnZhcN6eLJOfkn5wbmFBZFpT86GsSQazAquzyvtAyAP+05uAiEgmQpVnTyb+vt5rp6drCNuYlSVLZr69JOrsvdtwcQ9ZRwKrOdPA5MTOplUngMpOSUXGcPd0HRJXB0/55egujprkxLbT2qx9VX27bs/WWOS07opUozNbEbPX9w1I87yYwlvc9Obu3TaXHipCWTnCiY9gocEzK0g0jtBw2b1L9XjcFC8Hpp1Yz0Rf7NXD0HLD6aCN4vrXohY1E7l2bewe+fTK7NpFL89ricK+HKgIC6CTCp0/hXg6O2/ZLQa0wNblfNZywZfHde++ZeQzY8lEDwmV2H22MhryXrUi5xaGadEZf6qOdQu8FjWx2e7OM5+OdcSwqg7BXS+eobC/by0vsXjpy8mWrMnF1JdOfjeDaSqO7utqld3D3G7nEfHexIa2jp5+Qe3eo/oLrg+WFbZnR0sPVbHDdy8TQAEByaWWfEPV4n9VHZExhH1f79WYvfRcYJouDZzHPvzkPRuk2nrk/u62+l4H7erjvP3DtwNTYpuwQohafYtfMIiNKb43qsf3WQQAkAMOQAMH/jma3HbiKA0ZMRGxQFAEAUvDzAv8W0/r7X7qblluqG9vLbuO/aV28O6n71Yumnn1YIVM646Nem2Z7tcms7UnfvXKOgLiqW2VhXfemlwoSofEvfVhaFKcXWHs513+PyzAcxpQ5tWzvKAQB4SVGpuY21AFxVVGpiY117GcdKkh+mEvc2HlYCAABTpUSnUTff5lZN3b9Wl5s67V6c3q29t41ghNtTybINX/pa6OxtS2rmXtTlxkSXObatki4VJqaht5dVXkqOiUezx+75fgLPxhDlqrSHCRUu7VrZ1V0aP+EBVUGTEx1TbNu6ctuT7urS10LX/rLk8Tqpg6pT3RlIpYVpU6br7j4EQiiCxcKXzBa+O/vrA75uzXp6W5WUCwcu3rO3t959/rZKEgF5E15DwvXd2jY/t+4FU5kcABhChUY/5L2doTHVToynkEolHtDGeUL/dpzS1t4Of50O33X+4YxBHb8Z3zF90nRdeorAgSLYfrDIbv4CFIjwrOJ6/o+BZ+5+7xv5krVjnzRW/Zeisn2fj3V6qmLVJ+wit7K0njaVCzJA4ICq3/ZDUtTKSQN3nb6VqOJ/Xr05eJC/vRUwvRaYpmkLHiQ0IaMgLqO4us7ozKJ7iVlY0/fTGDmIyLmVjaVM0Ns72V2+HfXqJ7vKddDc0frDSd2LNv1AUlIpUgTGW7W2nDIRBaTPjztsKqj90GUr/n/tNlDdvqcuVvkvARkIFqNHyDt3AiJRpKw0v+zLH1s1N5kX0umvU+GvjO4ffzdh57koUzOz7r6uIugR0ehhho8FKVJpo9KKkDNEhoC3Y3LUT2v25AwAFEADWjl89uaYwvyshTMGjezf5fCl6CVTets+vF227yAjTJSoRim6zntJtHchBo/PczQNcitr0/80h38TTWtfZc8x5JIWLa1dlixkZtYcqFaQl5w7V7F7/5wxAS3sFfcTCs48SBvWo8WPb4asfS3E3lxOUYKnSnAOAACc4+nQKL3hiA8gp65FVZ+d2BggIhIiCNKHswN7tLf9cnuoq7PTjztPHb0WN7B7i4ntnXPXbmZqFQDlgta2Ww/TkcMoIZQI1Pieuud4jibi0ftkOJDdpGdP6xem6EW9gnGi12V+/q3yzo3V80ZdC384bXiXUV18ZSL97fj11a+OGBnga4jKMaQ2bExlSCgBficxt1SHADSnsPxuajE+2VpcfdoHAKIcGNeKMalZfi4ur0/uEhOflq+3dLGhm14bqPn6W23MfSpQAoAW5k5L3iSmJsbPjH+O5/hnqLdbRkYc581RtGxFJdAJVCwsTF++0rWi5KMZAzbvuXw2PDk+u6B/F99jl6NmDu7s7WpFJS2AjGAjnZjIQYhLL76flAkSicnIT8kpgSd1OwSOhAHhlHF3R7OPXxrk52G+79KDwgrp0vXYg6FJiekpWxaMVRzap/pzPwLoKAcqWs9bKO/YGQltYlAPz7n41SujBwWPm7vhYs6jobUkfOvby/cZ81g0cLH8zqFjsQwAeOG1ja+OCh4+a83JjFra4gWhm18fN3hgyPTlh5IZaM+vGPn+iWe5q/w5/g3U7TkcCHW0d1n2Lrc2k6FWLUPZg9S0FZ91dzP9fP6wS1FpMoGG349zcjZPzMjPzNWM6dvO0ZIYjqh5YmWGUzrKdbqwmAJO+anrsQxBQOnxtgGCSBknkr6tt137li4+LubLZgxwtjHfffZumorFZWdtnDvGIz609OuNOs4BBFO9CMGDnF56gctkQlMHHO3lT+f9kN1m+FCP2HWTF+zO4wAALPm3l0Yvf2DXysbI1M/oxfIbn7367tFUCXjBgUXTN+V3Gtap6KfZr29/dKQCz/tr/vjP41sNHeovFBVwAJYfczM69985Gfo5nh3q2sMRCAHBpP9Ax/eWZq9aodRpNSLIT5zMkgsT1y6nMwO/3HF29vAB2Xk5K3+9ENzZYfW8ofO/3JdbZB6Vmk9QYoSCIXNTA/H8hBAEcuLy/VeGtL4elYXI683VqhNSVyZMpMAsBUUbP7fAdq5+zS2LJPHCtfCv3ppw937qhuO3N70ypg/m5L67hperFVzGiYb7+nl/spSYW8gQkPDG+4hqQhG44uwlUxdnpbZd3IHXrz+UpvaTFx5e8dGNgHWhC9obWVAau6gJ+2LB+oiKmQA878Cv5zp8cGfFLLscs/BOh87Ai7MM9+gjLtxymL579VvdKh+F8V1akiSJtU/V5pKEtcPNqsAYE4QGG80lCUSRAjCNqoKYmStojRJMU1ZBTM0VzxeFT0RdFYmECJSIlFhPG2c39QWRi5wiI/qyw0eSPlg+vpXDshdDNvx5/NNdXp5HrQAADtZJREFU552slS+PCwy7nzS2T6st747zcTJxsLMHCQApgIBVMFapEJuVdz4yIzIhA4FxIq/bdwivzAuFIuUwqW/bje+OXDKui5WZ3MpMdLIx8Xa1e/f7Y9sv3Pp1wfDhiqLEhQt1RbnABQAt2Ni6fvyO4NYcqOHYErFJPlsAauvirASAirw8ta2TowAsecemkz5L1k41tqnR2EVtxPpFO027+8oAQH837IFbl262FKhdm9Y2afGP2mplbVaQlFRUb/6njfxqTN8Fh3JZ7C8zOjhaKEztOs7ZmchAF/rxoPGL3h7gZt5sxrdfjBv2aZgEAKA+8Vbgy3+qrq4Z6GautHDrt/pa6m/T27SsRKuOL/+Zy1VhGye1tTczsfIZsfZyfuyGoX5zj5UD8NQt85Zd0AJA0Z/T27+0v7Qp+vo/B+MfF04IyJS27yyEQQMolzEKFBg7fDz1vQ9HeJv+8uYEPxfbjv4+EQ+T7W3MfZrZ/XDo8qIpfT97ue+U4M4eNgSQG/bzGBVOUMoo1Kz8/YJKV/vU0RpAzmWE9W5tN7ijW78e/lv2XURRlltcbm3n9NuBC2dvp5sJwo4lk/oVReXPfcMkK4NQCoBaawunlR8r+vYHBPZM8ijwvOMHrnsMHdFS4Pmnjt/Qx339/9q786iorjsO4L9735udYYCBgQFEZBdQQBGMKBKIEkFRoY1ardW2mmiNRo2pEc3akKhJ9aBGo4n1oCZaXKMoaOOCGyAuYVFW2Yd9k2W29+7tH1gtR5sqsWl78j5/zD/3vDczb+Y7750393d/wTK5c8SajP4zO54waMrfvCzF6Z2kSWoEAHxzc7vK1hYBAFYq5V0dDzcVB86YOej0q5FzN2XW/9MlmvHGhkXJplnLJmsYrVfsqmN3Kq+v9zr3QfJVE9U3l58+3bn4cnX+lvnj3GuPnCjkAIw5aWnIyy/zLzsafnFaV576xwhXu4ilm5KTk5M/WzTcjMJmxlpeeX/eVubNzHrdhaWw/fVNHeHhNjkXb5tIw6ljBw8fzTJC75Vzt4ZGRvz/dFb/b/pX11SAEWKs1S6bkiwiwoBiDgMFaj6VVvX6qhHK3mOf/EbM3T92XXchu7Ci4f7EQNdB9qrztyp8NMzKeVPe+kVQ+EhPpZiKqIFShGgPRWJMjBRMQClCZgro+1IdIASgp5SnhFKKgBqAN2PKSwGPDXBdM3/ClLChCxLGmY1twz3crt0uoQbjh3vO3SptlclkhxOne9443/LGu4aeDiOWEIKQXKZ95wPL6bEsI0IY8PP4A4cr/CL56shFC/xZ4EqLK8zKMYnpN47MM3+x/NNsE2nKOfTVrl2704seH+QKtyzbbZe4cYbDgwNM6cPCJIT6tSsVB719MuPj0SUfR4f88suSvnsHxoINi7fLVyQv9GAAlGEzp2nrcgtlbq7N5aW9AMAOnbFkmptGo1aOjIvqPXOihOfyzl5RRb7s6exs35Z3uZQNjRnrKBscEj1p0kSv2rMFwWsTI8VZqSfQxJnBqL5JGj5lVHPWdU1kmOnaxXsNp06VWXPnj2V33/jumuP4SI1wqfY0nlwS07fCJwMI22jst3yE31irP3tZLzJLOGI8f+leWYnrmrVbVsTvO5uXfDQnoMUkoebFCaFFJeUT5sRuTT2/Mj70ZvHV9X+IrW3tyLhW1tIqqmk3sEAosBQTAnIJNY0P9b98s1hvlmBAGIyIx4NdbCNH+CBTl72Dtrq+Vitju7Fi218vxI7y8PN0Zdjek9fuFRS1LJ89av4oV27T+pajx3kzxxKWJZxRKbd5522bhDh4MMnmeeSGNB1O2nF/xjeznTAA5Tiiffm3vxk9TOL1uzHb9uU0csqsgztTKvALtr990brf4N7Tu/K25atezv3zW5l5Fa0de/blTZNL9d3dFOyB9PQYFP1+1rE69LVdlyJHxId/tjN77gcApnPbUqyU1hU6I3jISd2hhROWXHIID4IqXmw2AwC2VKn63p84JC6y7b200nguk0R86iMNWPn56rw5scPPLNqT+qdoe0waj7y7uXv+kVmO2HShVqcr3LAkr+8j9wlyUoU6hdbuPnFAUjXxk1W6jYe/UVyThn8urPv+dP5dMRmiIpWjw+aNNWveVXx7xsiYEA+iyobqlSus5sx+bdniEG/Hj/ZdulhQgRTKkACvjKt3R/sO6jUzDg4OKoWk6t79WROHGw34+MUbC6aH/+XEFSyXXLtZPS925PgAjxBPm4yswtEjfFvaO1pqW909XdysDFJbNxGY0s+3vvhCiKG6fLjP4Louw559x6Qy8Qhf54zPZnhUlNbPf5W7W4iQCFEpx+iRrVqbuFaVMBWxQPAAbwk8znRjy/pzAW9cD5MCALAajZrVMQAAYrEIeMKz/ktTs5cCAAB/p/8gdZu8Ymk7AaD35SJGr1RKtU7qmtJSDtwZY3V1+6Dox55N4jEtZlji+SoOWMDuC/an+m+enLRnadjCtu1JmWN35+yMkX47z3P7Y5uNmRLRuD5lP24dtyZIDCAOWXbkRviGadFvJcdHfeRz+eP3b03ausOfBeCUKpXHnJ3n1vk9OjzNUUFLE/9sHZ8SF3/v63Hv7YFpKcMGVF74M/RvzswIY4ZFjI3aaUOSavlrILFgCOFYoAZ966699+a+6luZ//WqyXv/GN9S03zyavGpC3dD/V3TMgsQNQJAQnRwWV13R1t7zGgvJ2v5SG/HICf1YDvVmKAh6ZevTwz2nD7GPybEw0dr0w3SGwXlocEjXGwtejq6x4e4Saj+5O17xl7zwfRbHu7qT16dsH9+qP2+r2oWLeaLihBiCCIs4eUe3i47typemYpFCGGGeU6xAaL7OumLhrBob11OVlZOcStyDxvFXDmV3ck3nDqdqx4WqP2nQ8f0HxweGb0kcd26devWJS6KcLYKTJgaGBAaZPzu0JlWU2XqwWzvqBcfbWvK+/abq7qejvy/nirUDnFlAYD1GhHiN/ftGfXJG893drZ3WWqdLaAn/2ZRt7n/cjkAIB07eWzZtq3lY6JDJQDdeZeuNyv8xo+yb29s0n+/+e1DgxbMHdJWXV3ToB/50uiag9vONBDgm27fquAAQB0Z4dUpjogfI9dMjvPuNr8QFSL0THhKT/ULgwBYC0urFYtlnu61H24S1VaaRCChZpqb27SwkBk3NuwPC8LejT/6fc1X6beTdqQN8RwyyNl584HzSxIiHa2ljS2NY/yCWRZCvOxLG4xiTOo7utuMzJWCuiA/58rq+qEumoMXitta22uaeoE3Fuv0zlrLvcdzb5a0K8Xw6eoZL9khPu144+pUTlfHY54FDAAMRXzUuMEfr2VdhgClP7w06bMyXU/emNZSb14WcRQAJFNT2o79anmi74RY592UaqbvzAjv9xWThPcffGx/FrFvvvXFy68MtmVEXkuPznd7OMDXXtm+5PWM2QRZBixO+TJUDLUPdhm67E3/sKSUjR/ORNNe8t4vk/kEuJecTa/37r9nRXjkKHxcNDFcAWDKO7AkemujkjFqfp/qcfT9X+fUtWUFuy4HEAWsy8la/+nf4mZ5OVrIDDB6Q+aRhW6MU1RUTHVYmBSwZvL0SRfZcKEn3NN6qko1CpRSginwAHxBad0Hf9JfywaiBxDxCIkIMHKpNDpG9UocDRxa1oq//u5mdn5VYVWLm5ONu4vGQi5pqGucPiHESsrk3im7VdL665hRupaGwvKWuAjfy7mVIcN9Vn9+XNfeExs8pKVLX1LX5mZjHRQ4aE7MyCCmtzcjo23/AVJeTYAgwCzP8JgDGxvVggWaua9gaysMhAAG9Cx9FwbI0HCnuNPW58ntbH5wEABIV3Vhmd7Bz9uuf+UJ31lTVNamcPd3tXryCdNQf6eoU+3jY8fVVNxXuzv2/zvJkPb7gC/HXj46zw4AwNhcdreWd/T9F6+C76y8U2HU+Hjb95WukPbmDks7GwYAepqbwc5O8UNvX/DIs9V4EkLNCOB+V/fRY23bd5lrq1iOIRiZMZWagSgk2N3NYuoU1cTwXjun4tqe07ll5XUt9+qbC6ublRKZjGE0dnLOhIZ5acVS0dnscsIZeww8xtBrMLtq1YFuNmOHebwwzMleQmQ3b7Wln+Uzr+rbmyVG3swiTIBiYpBg29Bwu9WrWN+hRIREFP8EiflfZcz/Zl3i+4ek71w98CuHn+9h+G94tuTwBDA18RhzBKHa2pYdn7cdPiHuMhBECUI8IIZwmIDEUoX9fS2ixmMXF4vh/l2WqqZuU0OXqeN+b32PvqO1u6mjq6fLNFirdHfWam0VKplUgohagqV1lVBc0pOXb7yYY6irQZwZEAtAKKKIAkGIcfd2+N1sRcJUUCgQQpg+bPTz89T9t09WXnB6beXsoCdNCBL8Bz1bch5Ni6YIEKUcr88v7Nyb0p3+HWrrNGFCgcVARTzlGQCKGISx2pKqrWR+/pLBHqBWYpmEYcXASBAgnu9FJiNp7zLpmg1Fd80NtYaWVlGXsa+a5kEjLIow4ThWLPL1tps1UxY3gbW1Q4+a8aKHDwLBT+lHrchBKCFAGZ4YKytbjxwzHD5JauoIzxNEAQAhzGGKKWDKI+CBYgIShDAAwYgAQF9vQ0woRZgADwgoIIKABaCEIooIYjmlVBUQaJEwWRH9EmNtgwlgAPSE7u4CwU/qRyWnb31NAEoJAiBcU7O5oLA9LcNw87a+qoo1GzBhOIQRIQwAz1AOKAKEKIgenLwoRX1NexBFiAdAiDKEAmKNcrksyN9y3DhlVLjEzQ2kUqAI4b45oPD82iwIBAP045LTHwFqpJyIcHx7O1dW2XUxy1RSQpp0hpIK0mvCBIDnAXgKlGIEAIgCpggwQxFDEbC2NhJvb1brrBg3UubugT2HYIkc4b6au+f1GgWC5+N5JodSCpQHyvTtmCDEU4L0vVy9jrQ28XUtRl0jX1FhKCnWFxUTs1kW6CcPGC7x9hY7uWJLOWNrzWrszaxUhBDqO5/9IzJCcgT/a55ncgSCnw/hXqZAMBBCcgSCgRCSIxAMhJAcgWAghOQIBAMhJEcgGAghOQLBQAjJEQgGQkiOQDAQfwdysMuFEprWbwAAAABJRU5ErkJggg==" />
        </div>
        <div style="">
            <p style="font-size: 40px; font-weight: bold; margin: 0; text-align: center;">ZAMÓWIENIE</p>
            <p style="font-size: 25px; font-weight: bold; margin: 0; text-align: center;">Studnia DIN</p>
        </div>
        <div>
            <p style="text-align: right; font-weight: bold;">
                ZMB kontakt:<br>
                tel. (48) 360-28-48<br>
                fax: (48) 365-57-77<br>
                e-mail: handel@spec-bet.pl<br>
            </p>
        </div>
    </div>

    <table class="pdf_tabl_s" width="100%" style="border-collapse:collapse; border-top: 2px solid; border-left: 2px solid;">
        <thead>
            <tr>
                <th style="background: #cacaca; padding: 5px;" colspan="2">ZAMÓWIENIE NR ................................................ z dnia: ...............................</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="background: #e2e2e2; padding: 5px;" width="180px">LOKALIZACJA BUDOWY</td>
                <td style="padding: 5px;"><input id="lokalizacja_budowy" style="width: 100%;" type="text"></td>
            </tr>
            <tr>
                <td style="background: #e2e2e2; padding: 5px;" width="180px">KIEROWNIK BUDOWY</td>
                <td style="padding: 5px;"><input id="kierownik_budowy" style="width: 100%;" type="text"></td>
            </tr>
            <tr>
                <td style="background: #e2e2e2; padding: 5px;" width="180px">TELEFON KONTAKTOWY</td>
                <td style="padding: 5px;"><input id="telefon_kontaktowy" style="width: 100%;" type="text"></td>
            </tr>
            <tr>
                <td style="background: #e2e2e2; padding: 5px;" width="180px">TERMIN DOSTAWY</td>
                <td style="padding: 5px;"><input id="termin_dostawy" style="width: 100%;" type="text"></td>
            </tr>
        </tbody>
    </table>

    <table class="pdf_tabl_s" width="100%" style="border-collapse:collapse; border-top: 2px solid; border-left: 2px solid; margin-top: 7px;">
        <thead>
            <tr>
                <th style="background: #cacaca; padding: 5px;" colspan="2">PARAMETRY STUDNI DIN</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="background: #e2e2e2; padding: 5px;" width="180px">USZCZELKI MIĘDZYKRĘGOWE</td>
                <td style="padding: 5px;"><input id="uszczelki_miedzykregowe" style="width: 100%;" type="text"></td>
            </tr>
        </tbody>
    </table>
    <table class="pdf_tabl_s" width="100%" style="border-collapse:collapse; border-left: 2px solid;">
        <tbody>
            <tr>
                <td style="background: #e2e2e2; padding: 5px;" width="180px">RZĘDNA TERENU<br>(z włazem)</td>
                <td style="padding: 5px;"><input id="rzedna_terenu" style="width: 100%;" type="text"></td>
                <td rowspan="2" style="padding: 5px; width: 140px;"><span style="float: left;">h=<br></span><input id="rzedna_tk_h" style="width: 80%;" type="text"></td>
            </tr>
            <tr>
                <td style="background: #e2e2e2; padding: 5px;" width="180px">RZĘDNA KANAŁU<br>(wylotu)</td>
                <td style="padding: 5px;"><input id="rzedna_kanalu" style="width: 100%;" type="text"></td>
            </tr>
        </tbody>
    </table>
    <table class="pdf_tabl_s" width="100%" style="border-collapse:collapse; border-left: 2px solid;">
        <tbody>
            <tr>
                <td style="background: #e2e2e2; padding: 5px;" width="180px">ŚREDNICA STUDNI</td>
                <td style="padding: 5px;"><input type="checkbox" id="ss10" name="ss10"/><label for="ss10">1000</label></td>
                <td style="padding: 5px;"><input type="checkbox" id="ss12" name="ss12"/><label for="ss12">1200</label></td>
                <td style="padding: 5px;"><input type="checkbox" id="ss15" name="ss15"/><label for="ss15">1500</label></td>
                <td style="padding: 5px;"><input type="checkbox" id="ss20" name="ss20"/><label for="ss20">2000</label></td>
            </tr>
            <tr>
                <td style="background: #e2e2e2; padding: 5px;" width="180px" rowspan="2">ZWIEŃCZENIE STUDNI</td>
                <td style="padding: 5px;" colspan="2"><input type="checkbox" id="zzwezka" name="zzwezka"/><label for="zzwezka">ZWĘŻKA BETONOWA</label></td>
                <td style="padding: 5px;" colspan="2"><input type="checkbox" id="zplytaip" name="zplytaip"/><label for="zplytaip">PŁYTA I PIERŚCIEŃ ODC.</label></td>
            </tr>
            <tr>
                <td style="padding: 5px;" colspan="2"><input type="checkbox" id="zplytap" name="zplytap"/><label for="zplytap">PŁYTA POKRYWOWA</label></td>
                <td style="padding: 5px;" colspan="2"><input type="checkbox" id="zpokrywa" name="zpokrywa"/><label for="zpokrywa">POKRYWA DIN</label></td>
            </tr>
            <tr>
                <td style="background: #e2e2e2; padding: 5px;" width="180px">USZCZELKI MIĘDZYKRĘGOWE</td>
                <td style="padding: 5px;" colspan="2"><input type="checkbox" id="ttak" name="ttak"/><label for="ttak">TAK</label></td>
                <td style="padding: 5px;" colspan="2"><input type="checkbox" id="tnie" name="tnie"/><label for="tnie">NIE</label></td>
            </tr>
            <tr>
                <td style="background: #e2e2e2; padding: 5px;" width="180px">ZEJŚCIE</td>
                <td style="padding: 5px;" colspan="2"><input type="checkbox" id="tzstopnie" name="tzstopnie"/><label for="tzstopnie">STOPNIE</label></td>
                <td style="padding: 5px;" colspan="2"><input type="checkbox" id="tzszczeble" name="tzszczeble"/><label for="tzszczeble">SZCZEBLE</label></td>
            </tr>
            <tr>
                <td style="background: #e2e2e2; padding: 5px;" width="180px">TYP ZEJŚCIA</td>
                <td style="padding: 5px;" colspan="2"><input type="checkbox" id="ttstal" name="ttstal"/><label for="ttstal">RDZEŃ STALOWY</label></td>
                <td style="padding: 5px;" colspan="2"><input type="checkbox" id="ttstalkwas" name="ttstalkwas"/><label for="ttstalkwas">RDZEŃ STAL KWAS.</label></td>
            </tr>
            <tr>
                <td style="background: #e2e2e2; padding: 5px;" width="180px">STOPNIE ZŁAZOWE</td>
                <td style="padding: 5px;"><input type="checkbox" id="tsz90" name="tsz90"/><label for="tsz90">90</label></td>
                <td style="padding: 5px;"><input type="checkbox" id="tsz180" name="tsz180"/><label for="tsz180">180</label></td>
                <td style="padding: 5px;"><input type="checkbox" id="tsz270" name="tsz270"/><label for="tsz270">270</label></td>
                <td style="padding: 5px;"><input type="checkbox" id="tszinny" name="tszinny"/><label for="tszinny">inny: <input type="text" style="width: max-content;" id="tszinny_inpt" name="tszinny_inpt"/></label></td>
            </tr>
        </tbody>
    </table>
    <table class="pdf_tabl_s" width="100%" style="border-collapse:collapse; border-left: 2px solid; border-top: 2px solid; margin-top: 10px;">
        <tbody>
            <tr>
                <td style="padding: 5px;"><label for="tuwagi">UWAGI:<br></label><textarea id="tuwagi" style="width: 100%; min-height: 100px;" name="tuwagi" id="tuwagi"></textarea></td>
            </tr>
        </tbody>
    </table>
    <table class="pdf_tabl_s" width="100%" style="border-collapse:collapse; border-left: 2px solid; border-top: 2px solid; margin-top: 7px;">
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




    <table class="pdf_tabl_s" width="100%" style="border-collapse:collapse; border-top: 2px solid; border-left: 2px solid; margin-top: 10px;">
        <thead>
            <tr>
                <th style="background: #cacaca; padding: 5px;" colspan="2">ELEMENTY DODATKOWE STUDNI DIN</th>
            </tr>
        </thead>
    </table>
    <table class="pdf_tabl_s" width="100%" style="border-collapse:collapse;border-left: 2px solid;">
        <tbody>
            <tr>
                <td style="background: #e2e2e2; padding: 5px;" width="180px" rowspan="2">RODZAJ DNA</td>
                <td style="padding: 5px;"><input type="checkbox" id="trbez" name="trbez"/><label for="trbez">BEZ KINETY</label></td>
                <td style="padding: 5px;"><input type="checkbox" id="trpredl" name="trpredl"/><label for="trpredl">PREDL</label></td>
                <td style="padding: 5px;"><input type="checkbox" id="trkinbet" name="trkinbet"/><label for="trkinbet">KINETA BETONOWA ½</label></td>
            </tr>
            <tr>
                <td style="padding: 5px;"><input type="checkbox" id="trosadnik" name="trosadnik"/><label for="trosadnik">OSADNIK</label></td>
                <td style="padding: 5px;" colspan="2"><input type="checkbox" id="trinna" name="trinna"/><label for="trinna">INNA: <input type="text" style="width: max-content;" id="trinna_inpt" name="trinna_inpt"/></label></td>
            </tr>
        </tbody>
    </table>
    <table class="pdf_tabl_s" width="100%" style="border-collapse:collapse; border-left: 2px solid;">
        <thead>
            <tr>
                <th style="background: #cacaca; padding: 5px;" width="70px"></th>
                <th style="background: #cacaca; padding: 5px;">KĄT</th>
                <th style="background: #cacaca; padding: 5px;">TYP RURY</th>
                <th style="background: #cacaca; padding: 5px;">WYSOKOŚĆ<br>OD DNA (cm)</th>
                <th style="background: #cacaca; padding: 5px;">ŚREDNICA<br>WEWNĘTRZNA<br>RURY</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="background: #e2e2e2; padding: 5px;" width="70px">WYLOT</td>
                <td style="padding: 5px;" width="180px"><input style="width: 100%;" type="text" id="tw01" name="tw01"/></td>
                <td style="padding: 5px;" width="180px"><input style="width: 100%;" type="text" id="tw02" name="tw02"/></td>
                <td style="padding: 5px;" width="180px"><input style="width: 100%;" type="text" id="tw03" name="tw03"/></td>
                <td style="padding: 5px;" width="180px"><input style="width: 100%;" type="text" id="tw04" name="tw04"/></td>
            </tr>
            <tr>
                <td style="background: #e2e2e2; padding: 5px;" width="70px">WYLOT 1</td>
                <td style="padding: 5px;" width="180px"><input style="width: 100%;" type="text" id="tw11" name="tw11"/></td>
                <td style="padding: 5px;" width="180px"><input style="width: 100%;" type="text" id="tw12" name="tw12"/></td>
                <td style="padding: 5px;" width="180px"><input style="width: 100%;" type="text" id="tw13" name="tw13"/></td>
                <td style="padding: 5px;" width="180px"><input style="width: 100%;" type="text" id="tw14" name="tw14"/></td>
            </tr>
            <tr>
                <td style="background: #e2e2e2; padding: 5px;" width="70px">WYLOT 2</td>
                <td style="padding: 5px;" width="180px"><input style="width: 100%;" type="text" id="tw21" name="tw21"/></td>
                <td style="padding: 5px;" width="180px"><input style="width: 100%;" type="text" id="tw22" name="tw22"/></td>
                <td style="padding: 5px;" width="180px"><input style="width: 100%;" type="text" id="tw23" name="tw23"/></td>
                <td style="padding: 5px;" width="180px"><input style="width: 100%;" type="text" id="tw24" name="tw24"/></td>
            </tr>
            <tr>
                <td style="background: #e2e2e2; padding: 5px;" width="70px">WYLOT 3</td>
                <td style="padding: 5px;" width="180px"><input style="width: 100%;" type="text" id="tw31" name="tw31"/></td>
                <td style="padding: 5px;" width="180px"><input style="width: 100%;" type="text" id="tw32" name="tw32"/></td>
                <td style="padding: 5px;" width="180px"><input style="width: 100%;" type="text" id="tw33" name="tw33"/></td>
                <td style="padding: 5px;" width="180px"><input style="width: 100%;" type="text" id="tw34" name="tw34"/></td>
            </tr>
            <tr>
                <td style="background: #e2e2e2; padding: 5px;" width="70px">WYLOT 4</td>
                <td style="padding: 5px;" width="180px"><input style="width: 100%;" type="text" id="tw41" name="tw41"/></td>
                <td style="padding: 5px;" width="180px"><input style="width: 100%;" type="text" id="tw42" name="tw42"/></td>
                <td style="padding: 5px;" width="180px"><input style="width: 100%;" type="text" id="tw43" name="tw43"/></td>
                <td style="padding: 5px;" width="180px"><input style="width: 100%;" type="text" id="tw44" name="tw44"/></td>
            </tr>
        </tbody>
    </table>
    <div style="width: 100%; margin: 30px auto 10px auto;">
        <label for="email_forpdf_file_cli">Twój adres e-mail, na który chcesz otrzymać plik</label>
        <input type="email" id="email_forpdf_file_cli" name="email_forpdf_file_cli" placeholder="Email.." size="80" value=""9 />
    </div>
    <div style="width: 100%; margin: 10px auto 30px auto;"><button id="genpdf_site">Generowanie pdf</button></div>


    <div id="pdf__gen_ajax_send_form"></div>
</div>

';

return $pdfgen_shortcode_html;
}