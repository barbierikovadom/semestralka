function tmavyRezim() {
    document.getElementById("telo").style.backgroundColor = "#000000";
    document.getElementById("telo").style.color = "#ffffff";
    pohare = document.getElementsByName("obrazok");
    for (i = 0; i < pohare.length; i++) {
       pohare[i].style.backgroundColor = "#ffffff";
    }
}

function odstranPrvokMenu(element) {
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
        }).done(function (data) {
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
        },
    }).done(function (data) {
        $('#obrazok').val("");
        $('#nazovPiva').val("");
        $('#typPiva').val("");
        setInterval(refreshPage(), 1000);
    });
}

function refreshPage() {
    location.reload();
}