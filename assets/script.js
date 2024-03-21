new DataTable('#example');

var swiper = new Swiper(".landing-content-card", {
    speed: 1000,
    spaceBetween: 20,
    loop: true,
    slidesPerView: "auto",
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    }
});