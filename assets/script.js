// DATATABLE
new DataTable('#table-data');
new DataTable('#table_acc');
new DataTable('#table_track');
new DataTable('#table_trans_barang');
new DataTable('#table_bangunan');
new DataTable('#table_lokasi_utama');
new DataTable('#table_lokasi_sekunder');
new DataTable('#table_report_bangunan');
new DataTable('#table_report_lokasi_utama');
new DataTable('#table_report_lokasi_sekunder');

// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
  
        form.classList.add('was-validated')
      }, false)
    })
})()

// SWIPER (CAROUSEL CDN JS)
var swiper = new Swiper(".inven-carousel", {
    speed: 1000,
    spaceBetween: 20,
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

var swiper = new Swiper(".dash-carousel", {
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

// SWEETALERT (Form Validation)
function confirmDelete(e){
    e.preventDefault();
    const link = e.currentTarget.getAttribute("href");

    Swal.fire({
        title: "Apakah Anda Yakin?",
        text: "Data terhapus secara permanen",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Hapus",
        cancelButtonText: "Tidak"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = link;
        }
    });
}

function showdata(e){
    e.preventDefault();
    // const link = e.currentTarget.getAttribute("href");

    document.getElementById("open-popup");
}

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