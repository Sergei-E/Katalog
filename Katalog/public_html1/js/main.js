new Swiper('.swiper', {
    // Вывод стрелок навигации
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: '.swiper-pagination',
    },
    scrollbar: {
        el: '.swiper-scrollbar',
        draggable: true
    },
})