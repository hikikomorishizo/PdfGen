window.onload = function(){ 
    
    var mainCont = document.querySelector('.shiz_reap');

    var radd = document.querySelector('.shiz_reap__add');
    radd.onclick = function(){
        let div = document.createElement('div');
        div.innerHTML += '<div class="shiz_reap__input"><input type="text" name="pdfgen_un[]" placeholder="Un.." size="80" value="" /><input type="text" name="pdfgen_pnp[]" placeholder="Pnp.." size="80" value="" /><input type="text" name="pdfgen_nalep[]" placeholder="NALEPKI.." size="80" value="" /><input type="text" name="pdfgen_gp[]" placeholder="Grupa pakowania.." size="80" value="" /><input type="text" name="pdfgen_kod[]" placeholder="Kod.." size="80" value="" /><input type="text" name="pdfgen_liczba[]" placeholder="Liczba i określenie sztuk przesyłki.." size="80" value="" /><input type="text" name="pdfgen_ilosc[]" placeholder="Ilość całkowita.." size="80" value="" /></div><input type="button" class="shiz_reap__remove" value="Remove">';

        div.classList.add('shiz_reap__cont');

        mainCont.appendChild(div);


        var rremove = document.querySelectorAll('.shiz_reap__remove');
        rremove.forEach(function(elm) {

            elm.addEventListener('click', function() {
                elm.parentElement.remove();
    
            })
        })
    }

    var rremove = document.querySelectorAll('.shiz_reap__remove');
    rremove.forEach(function(elm) {

        elm.addEventListener('click', function() {
            elm.parentElement.remove();

        })
    })

};