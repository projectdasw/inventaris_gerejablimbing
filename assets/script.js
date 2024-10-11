// DATATABLE
new DataTable('table.display', {
    order: false,
    destroy: true
});
new DataTable('#table_track', {
    order: false,
    destroy: true
});

// SERVER SIDE PROCESSING
$('#datamaster').DataTable({
    serverSide: true,
    processing: true,
    ajax: {
        url: '../inc/datamaster_serverside.php',
        type: 'post'
    },
    ordering: false,
});

$('#datamaster-bangunan').DataTable({
    ordering: false,
    serverSide: true,
    processing: true,
    ajax: {
        url: '../inc/datamaster_bangunan_serverside.php',
        type: 'post'
    }
});

$('#laporan-bangunan').DataTable({
    ordering: false,
    serverSide: true,
    processing: true,
    ajax: {
        url: '../inc/laporanbangunan_serverside.php',
        type: 'post'
    }
});

$('#datamaster-loc').DataTable({
    ordering: false,
    serverSide: true,
    processing: true,
    ajax: {
        url: '../inc/datamaster_loc_serverside.php',
        type: 'post'
    }
});

$('#laporan-lokasiutama').DataTable({
    ordering: false,
    serverSide: true,
    processing: true,
    ajax: {
        url: '../inc/laporanlokasiutama_serverside.php',
        type: 'post'
    }
});

$('#datamaster-los').DataTable({
    ordering: false,
    serverSide: true,
    processing: true,
    ajax: {
        url: '../inc/datamaster_los_serverside.php',
        type: 'post'
    }
});

$('#laporan-lokasisekunder').DataTable({
    ordering: false,
    serverSide: true,
    processing: true,
    ajax: {
        url: '../inc/laporanlokasisekunder_serverside.php',
        type: 'post'
    }
});

$('#datadetail_baru').DataTable({
    order: false,
    serverSide: true,
    processing: true,
    ajax: {
        url: '../inc/detailbaru_serverside.php',
        type: 'post'
    }
});

$('#datadetail_tambah').DataTable({
    order: false,
    serverSide: true,
    processing: true,
    ajax: {
        url: '../inc/detailtambah_serverside.php',
        type: 'post'
    }
});

$('#datadetail_kurang').DataTable({
    order: false,
    serverSide: true,
    processing: true,
    ajax: {
        url: '../inc/detailkurang_serverside.php',
        type: 'post'
    }
});

$('#trans_barang').DataTable({
    order: [[0, 'desc']],
    serverSide: true,
    processing: true,
    ajax: {
        url: '../inc/transbarang_serverside.php',
        type: 'post'
    }
});
// SERVER SIDE PROCESSING

// Inisialisasi Select2
$('#nama_bangunan_select').select2( {
    theme: 'bootstrap-5',
    placeholder: $( this ).data( 'placeholder' ),
    allowClear: true
});

$('#nama_bangunan2_select').select2( {
    theme: 'bootstrap-5',
    placeholder: $( this ).data( 'placeholder' ),
    allowClear: true
});

$('#nama_bangunan3_select').select2( {
    theme: 'bootstrap-5',
    placeholder: $( this ).data( 'placeholder' ),
    allowClear: true,
    dropdownParent: $('#tambah_lokasiutama')
});

$('#nama_lokasi_utama_select').select2( {
    theme: 'bootstrap-5',
    placeholder: $( this ).data( 'placeholder' ),
    allowClear: true
});

$('#nama_lokasi_utama2_select').select2( {
    theme: 'bootstrap-5',
    placeholder: $( this ).data( 'placeholder' ),
    allowClear: true
});

$('#nama_lokasi_sekunder_select').select2( {
    theme: 'bootstrap-5',
    placeholder: $( this ).data( 'placeholder' ),
    allowClear: true
});

$('#nama_barang_select').select2( {
    theme: 'bootstrap-5',
    placeholder: $( this ).data( 'placeholder' ),
    allowClear: true
});

function FetchLOC(id){
    $("nama_bangunan_select").html('');
    
    $.ajax({
        type : "POST",
        url: "../inc/data_response.php",
        data: {nama_bangunan :id},
        success: function(data){
            $("#nama_lokasi_utama_select").html(data);
        }
    });

    // $.ajax({
    //     type : "POST",
    //     url: "../inc/data_response.php",
    //     data: {nama_bangunan :id},
    //     success: function(data){
    //         $("nama_bangunan_select").html(data);
    //     }
    // });
}

function FetchLOS(id){
    // $("nama_lokasi_sekunder_select").html('');
    $("nama_lokasi_utama_select").html('');
    $.ajax({
        type : "POST",
        url: "../inc/data_response.php",
        data: {nama_lokasi_utama :id},
        success: function(data){
            $("#nama_lokasi_sekunder_select").html(data);
        }
    });
}

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