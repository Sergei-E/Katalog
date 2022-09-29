console.log("JS Подключен1");
window.onload = function vdsf() {
    $.ajax({
        url: 'selectindexAdmin.php',
        method: 'get',
        cache: false,
        dataType: 'html',
        data: {},
        success: function(data) {
            /*alert(data); */
            document.querySelector(".swiper-wrapper").innerHTML = data;
            Output();

        }
    });
}
console.log("JS Подключен")

function Output() {
    $.ajax({
        url: 'selectindex.php',
        method: 'get',
        cache: false,
        dataType: 'html',
        data: {},
        success: function(data) {
            /*alert(data);*/

            document.getElementById('OtzovFull1').innerHTML = data;
            /**/

        }
    });
}
/*window.onload = function Output() {
    $.ajax({
        url: 'selectindexAdmin.php',
        method: 'get',
        cache: false,
        dataType: 'html',
        data: {},
        success: function(data) {
            /*alert(data);*/

/*document.getElementsByClassName('swiper-wrapper').innerHTML = "<p>" + data + "</p></br>";


}
});
}*/