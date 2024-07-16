jQuery(function($) {
    $(document).ready ( function(){

        $( "#genpdf_site" ).on( "click", function(e) {
            e.preventDefault();
            var $data;
            $data = $(this).parent('form').serializeArray();


            var lokalizacja_budowy = document.getElementById("lokalizacja_budowy").value;
            var kierownik_budowy = document.getElementById("kierownik_budowy").value;
            var telefon_kontaktowy = document.getElementById("telefon_kontaktowy").value;
            var termin_dostawy = document.getElementById("termin_dostawy").value;
            var uszczelki_miedzykregowe = document.getElementById("uszczelki_miedzykregowe").value;
            var rzedna_terenu = document.getElementById("rzedna_terenu").value;
            var rzedna_tk_h = document.getElementById("rzedna_tk_h").value;
            var rzedna_kanalu = document.getElementById("rzedna_kanalu").value;

            var ss10 = document.getElementById("ss10");
            if(ss10.checked) { ss10='checked=""'; }else { ss10='' }
            var ss12 = document.getElementById("ss12");
            if(ss12.checked) { ss12='checked=""'; }else { ss12='' }
            var ss15 = document.getElementById("ss15");
            if(ss15.checked) { ss15='checked=""'; }else { ss15='' }
            var ss20 = document.getElementById("ss20");
            if(ss20.checked) { ss20='checked=""'; }else { ss20='' }
            var zzwezka = document.getElementById("zzwezka");
            if(zzwezka.checked) { zzwezka='checked=""'; }else { zzwezka='' }
            var zplytaip = document.getElementById("zplytaip");
            if(zplytaip.checked) { zplytaip='checked=""'; }else { zplytaip='' }
            var zplytap = document.getElementById("zplytap");
            if(zplytap.checked) { zplytap='checked=""'; }else { zplytap='' }
            var zpokrywa = document.getElementById("zpokrywa");
            if(zpokrywa.checked) { zpokrywa='checked=""'; }else { zpokrywa='' }
            var ttak = document.getElementById("ttak");
            if(ttak.checked) { ttak='checked=""'; }else { ttak='' }
            var tnie = document.getElementById("tnie");
            if(tnie.checked) { tnie='checked=""'; }else { tnie='' }
            var tzstopnie = document.getElementById("tzstopnie");
            if(tzstopnie.checked) { tzstopnie='checked=""'; }else { tzstopnie='' }
            var tzszczeble = document.getElementById("tzszczeble");
            if(tzszczeble.checked) { tzszczeble='checked=""'; }else { tzszczeble='' }
            var ttstal = document.getElementById("ttstal");
            if(ttstal.checked) { ttstal='checked=""'; }else { ttstal='' }
            var ttstalkwas = document.getElementById("ttstalkwas");
            if(ttstalkwas.checked) { ttstalkwas='checked=""'; }else { ttstalkwas='' }
            var tsz90 = document.getElementById("tsz90");
            if(tsz90.checked) { tsz90='checked=""'; }else { tsz90='' }
            var tsz180 = document.getElementById("tsz180");
            if(tsz180.checked) { tsz180='checked=""'; }else { tsz180='' }
            var tsz270 = document.getElementById("tsz270");
            if(tsz270.checked) { tsz270='checked=""'; }else { tsz270='' }
            var tszinny = document.getElementById("tszinny");
            if(tszinny.checked) { tszinny='checked=""'; }else { tszinny='' }

            var tszinny_inpt = document.getElementById("tszinny_inpt").value;
            var tuwagi = document.getElementById("tuwagi").value;

            var trbez = document.getElementById("trbez");
            if(trbez.checked) { trbez='checked=""'; }else { trbez='' }
            var trpredl = document.getElementById("trpredl");
            if(trpredl.checked) { trpredl='checked=""'; }else { trpredl='' }
            var trkinbet = document.getElementById("trkinbet");
            if(trkinbet.checked) { trkinbet='checked=""'; }else { trkinbet='' }
            var trosadnik = document.getElementById("trosadnik");
            if(trosadnik.checked) { trosadnik='checked=""'; }else { trosadnik='' }
            var trinna = document.getElementById("trinna");
            if(trinna.checked) { trinna='checked=""'; }else { trinna='' }

            var trinna_inpt = document.getElementById("trinna_inpt").value;
            var tw01 = document.getElementById("tw01").value;
            var tw02 = document.getElementById("tw02").value;
            var tw03 = document.getElementById("tw03").value;
            var tw04 = document.getElementById("tw04").value;
            var tw11 = document.getElementById("tw11").value;
            var tw12 = document.getElementById("tw12").value;
            var tw13 = document.getElementById("tw13").value;
            var tw14 = document.getElementById("tw14").value;
            var tw21 = document.getElementById("tw21").value;
            var tw22 = document.getElementById("tw22").value;
            var tw23 = document.getElementById("tw23").value;
            var tw24 = document.getElementById("tw24").value;
            var tw31 = document.getElementById("tw31").value;
            var tw32 = document.getElementById("tw32").value;
            var tw33 = document.getElementById("tw33").value;
            var tw34 = document.getElementById("tw34").value;
            var tw41 = document.getElementById("tw41").value;
            var tw42 = document.getElementById("tw42").value;
            var tw43 = document.getElementById("tw43").value;
            var tw44 = document.getElementById("tw44").value;

            var email_forpdf_file_cli = document.getElementById("email_forpdf_file_cli").value;


            $.ajax({
                url: '../../wp-content/plugins/PdfGen/pdf__gen_ajax_send_form.php?email_forpdf_file='+email_forpdf_file+'&lokalizacja_budowy='+lokalizacja_budowy+'&kierownik_budowy='+kierownik_budowy+'&telefon_kontaktowy='+telefon_kontaktowy+'&termin_dostawy='+termin_dostawy+'&uszczelki_miedzykregowe='+uszczelki_miedzykregowe+'&rzedna_terenu='+rzedna_terenu+'&rzedna_tk_h='+rzedna_tk_h+'&rzedna_kanalu='+rzedna_kanalu+'&ss10='+ss10+'&ss12='+ss12+'&ss15='+ss15+'&ss20='+ss20+'&zzwezka='+zzwezka+'&zplytaip='+zplytaip+'&zplytap='+zplytap+'&zpokrywa='+zpokrywa+'&ttak='+ttak+'&tnie='+tnie+'&tzstopnie='+tzstopnie+'&tzszczeble='+tzszczeble+'&ttstal='+ttstal+'&ttstalkwas='+ttstalkwas+'&tsz90='+tsz90+'&tsz180='+tsz180+'&tsz270='+tsz270+'&tszinny='+tszinny+'&tszinny_inpt='+tszinny_inpt+'&tuwagi='+tuwagi+'&trbez='+trbez+'&trpredl='+trpredl+'&trkinbet='+trkinbet+'&trosadnik='+trosadnik+'&trinna='+trinna+'&trinna_inpt='+trinna_inpt+'&tw01='+tw01+'&tw02='+tw02+'&tw03='+tw03+'&tw04='+tw04+'&tw11='+tw11+'&tw12='+tw12+'&tw13='+tw13+'&tw14='+tw14+'&tw21='+tw21+'&tw22='+tw22+'&tw23='+tw23+'&tw24='+tw24+'&tw31='+tw31+'&tw32='+tw32+'&tw33='+tw33+'&tw34='+tw34+'&tw41='+tw41+'&tw42='+tw42+'&tw43='+tw43+'&tw44='+tw44+'&email_forpdf_file_cli='+email_forpdf_file_cli+'&site_url_fpdf='+site_url_fpdf,
                type: 'post',
                data: $data,
                success: function(result) {
                    $('#pdf__gen_ajax_send_form').html(result);
                    $("#pdf__gen_ajax_send_form").fadeIn();
                }
            });

        });



    });
});