function odstranPrvokMenu(element) {
    var vymazanyPrvok = element;
    $.ajax({
        url: '',
        type: 'POST',
        data: {
            funkcia: 'odstranPrvokMenu',
            vymazanyPrvok: vymazanyPrvok,
        }
    }).done(function (data) {
        zobrazStretnutia();
    });
}

function upravPrvokMenu(element) {
    var id = element.id;
    var noveMiesto = $('.zmenaMiesto').val();
    var novyDatum = $('.zmenaDatum').val();
    $.ajax({
        url: '',
        type: 'POST',
        data: {
            metoda: 'upravStretnutie',
            id: id,
            noveMiesto: noveMiesto,
            novyDatum: novyDatum,
        },
    }).done(function (data) {
        $('.zmenaMiesto').val("");
        $('.zmenaDatum').val("");
        zobrazStretnutia();
    });
}

function odstranCeleMenu() {
    var vymazaneStretnutie = element;
    $.ajax({
        url: '',
        type: 'POST',
        data: {
            funkcia: 'odstranStretnutie',
            vymazaneStretnutie: vymazaneStretnutie,
        }
    }).done(function (data) {
        zobrazStretnutia();
    });
}