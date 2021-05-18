// ambil data yang dibutuhkan

console.log("Script siap!!");
var btncari = document.getElementById('btn-cari');
var loc = "<?= base_url('Lokasi') ?>;"
// console.log(nomer);

btncari.addEventListener('click', function() {
    // console.log(nama);
    console.log("Didengar");
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log("Ajax Siap digunakan");
            //     }else{
            //         console.log("Ajax error");
        }
    }
    xhr.open('GET', loc+'?keyword', true);
    xhr.send();
});