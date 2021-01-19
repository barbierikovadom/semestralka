function tmavyRezim() {
    document.getElementById("telo").style.backgroundColor = "#000000";
    document.getElementById("telo").style.color = "#ffffff";
    pohare = document.getElementsByClassName("obrazok");
    for (i = 0; i < pohare.length; i++) {
       pohare[i].style.backgroundColor = "#ffffff";
    }
    bunkyTabulky = document.getElementsByTagName("td");
    for(i = 0, j = bunkyTabulky.length; i < j; ++i)
        bunkyTabulky[i].style.color = "#ffffff";
    nazvyStlcov = document.getElementsByTagName("th");
    for(i = 0, j = nazvyStlcov.length; i < j; ++i)
        nazvyStlcov[i].style.color = "#DAA520";
}

function odstranPrvok(element) {
    var vymazanyPrvok = element;
    var answer = confirm ("Are you sure?");
    if (answer){
        $.ajax({
            url: '',
            type: 'POST',
            data: {
                funkcia: 'odstranPrvok',
                vymazannyPrvok: vymazanyPrvok,
            }
        }).done(function () {
            setInterval(refreshPage(), 2000);
        });
    }
}

function vytvorPrvok() {
    var obrazok = $('#obrazok').val();
    var nazovPiva = $('#nazovPiva').val();
    var typPiva = $('#typPiva').val();
    $.ajax({
        url: "",
        type: "POST",
        data: {
            funkcia: 'vytvorPrvok',
            obrazok: obrazok,
            nazovPiva: nazovPiva,
            typPiva : typPiva,
        }
    }).done(function () {
        $('#obrazok').val("");
        $('#nazovPiva').val("");
        $('#typPiva').val("");
        setInterval(refreshPage(), 1000);
    });
}

function refreshPage() {
    location.reload();
}