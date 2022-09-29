console.log("JS Подключен1");
window.onload = function Output1() {
    $.ajax({
        url: 'selectindexAdmin.php',
        method: 'get',
        cache: false,
        dataType: 'html',
        data: {},
        success: function(data) {
            alert(data);

            document.querySelector('swiper-wrapper').innerHTML = data;


        }
    });
}