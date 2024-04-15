// DATATABLE
new DataTable('#table-data');
new DataTable('#table_acc');
new DataTable('#table_track');
new DataTable('#table_trans_barang');
new DataTable('#table_bangunan');
new DataTable('#table_lokasi_utama');
new DataTable('#table_lokasi_sekunder');
new DataTable('#table_lokasi_sekunder');

function startTime() {
    const today = new Date();
    let h = today.getHours();
    let m = today.getMinutes();
    let s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =  h + ":" + m + ":" + s;
    setTimeout(startTime, 1000);
}

function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}

// SWIPER (CAROUSEL CDN JS)
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

var swiper = new Swiper(".card-dash", {
    speed: 1000,
    spaceBetween: 30,
    loop: true,
    slidesPerView: "auto",
    // autoplay: {
    //     delay: 5000,
    //     disableOnInteraction: false,
    // },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    }
});

// FUNCTION
function VisiblePass(x){
    var pass = document.getElementById("password");
    var icon_change = document.getElementById("icon-change");
    if (pass.type === "password") {
        pass.type = "text";
        icon_change.classList.remove("fa-eye-slash");
        icon_change.classList.add("fa-eye");
    } else {
        pass.type = "password";
        icon_change.classList.remove("fa-eye");
        icon_change.classList.add("fa-eye-slash");
    }
}