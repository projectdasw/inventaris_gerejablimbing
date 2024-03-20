var swiper = new Swiper(".landing-content-card", {
    speed: 1000,
    spaceBetween: 40,
    loop: true,
    grabCursor: true,
    slidesPerView: 3,
    // autoplay: {
    //     delay: 2500,
    //     disableOnInteraction: false,
    // },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});