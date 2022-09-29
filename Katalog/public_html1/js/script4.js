console.log("JS Подключен");
$(document).ready(function() {
    $('#FormOtzov').submit(function(e) {
        e.preventDefault();
        var FioPol = document.getElementById('FIO').value;
        var TelefonPol = document.getElementById('Telefon').value;
        var EMailPol = document.getElementById('EMail').value;
        var OtzovPoluh = document.getElementById('OtzovPol').value;
        $.ajax({
            type: "POST",
            url: 'insert.php',
            data: {
                FioPol1: FioPol,
                TelefonPol1: TelefonPol,
                EMailPol1: EMailPol,
                OtzovPolPol1: OtzovPoluh
            },
            success: function() {
                console.log("Данные добавлены1");


                document.getElementById('Otvet').innerHTML = "<p>Ваш отзыв оставлен!</p></br>";
                /* block.scrollTop = 9999; * /
                 /*document.getElementById('sms').value = '';*/

            }
        });

    });
});

window.onload = function Output() {
    $.ajax({
        url: 'select.php',
        method: 'get',
        cache: false,
        dataType: 'html',
        data: {},
        success: function(data) {
            /*alert(data);*/
            document.getElementById('OtzovFull').innerHTML = data;

            /**/

        }
    });
}

/*function Times() {
    for (var i = 0; i < 100; i++) {
        setTimeout(Output, 6000 * (i + 1));
    }
}*/
/*function Output() {
    $.ajax({
        url: 'Select1.php',
        method: 'GET',
        cache: false,
        dataType: 'html',
        data: {},
        success: function(data) {
            alert(data);
            /*  document.getElementById('OtzovFull').innerHTML = data;*/

/*}
});
}*/