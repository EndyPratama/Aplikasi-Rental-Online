<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css" type="text/css">

<!-- Promise polyfill script is required -->
<!-- to use Mapbox GL Geocoder in IE 11. -->
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>

<h3>Lokasi Kendaraan : </h3>
<hr>

<div class="container">
    <div class="row">
        <div class="col-3">
            <h5>List daerah : </h5>
            <table class="table">
                <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Lihat</th>
                </thead>
                <tbody>
                    <?php
                    $row = 0;
                    $no = 1;
                    $daerah = array("Pare", "Kediri", "Jombang");
                    // $koordinat = array("112.1891442,-7.7655118", "111.9461469,-7.8424163", "112.1191447,-7.5614566");
                    foreach ($lokasi as $l) :

                        if ($l->alamat != NULL) {
                    ?>
                            <tr>
                                <td id="nomer<?= $no; ?>"><?= $no; ?></td>
                                <td id="nama"><?= $l->username; ?></td>
                                <input type="hidden" id="koordinat<?= $no; ?>" value="<?= $l->alamat; ?>">
                                <td><button class="btn btn-success" id="btn-cari<?= $no; ?>"><i class='bx bxs-map'></i></button></td>
                                <a href="#" class="btn btn-success" onclick="formOpen(<?= $no; ?>)" data-toggle="modal" data-target="#exampleModal"><i class='bx bx-show-alt'></i></a>
                            </tr>
                            <script>

                            </script>
                            <!-- 
                        Kirim id daerah yang mau dipilih, masuk ke controller -> masuk ke modal -> kembali ke controller -> 
                        mengganti data wilayah -> data $daerah masuk ke halaman awal.
                     -->
                    <?php
                            $no++;
                        }
                        $row++;
                    endforeach;
                    ?>

                </tbody>
            </table>
        </div>
        <div class="col">
            <div id='map' style='width: 100%; height: 500px;'></div>
            <script>
                ambilData();

                function ambilData() {
                    $.ajax({
                        type: 'POST',
                        url: '<?= base_url('Lokasi/cari'); ?>',
                        dataType: 'json',
                        success: function(data) {
                            console.log("Sukses isi 1");
                        }
                    });
                }
                // ambil data yang dibutuhkan
                function formOpen(data) {
                    console.log(data);
                    console.log("Data siap!");
                    console.log("Script siap!!");
                    var btn = document.getElementById("btn-cari" + data);
                    // var target = ';
                    // console.log(nomer);

                    btn.addEventListener('click', function() {
                        // console.log(nama);
                        console.log("Data " + data + " Didengar");
                        var xhr = new XMLHttpRequest();

                        xhr.onreadystatechange = function() {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                console.log("Ajax Siap digunakan");
                            }
                        }
                        xhr.open('GET', 'http://localhost/fp_uts_framework/Lokasi/cari?keyword=' + data, true);
                        xhr.send();
                    });
                }
            </script>
            <script>
                mapboxgl.accessToken = 'pk.eyJ1IjoiZW5keXByYXRhbWEiLCJhIjoiY2tvOWR2dWg2MDk4MzJvcW1sbHJmeXpiYSJ9.RM5gAc-1m6q27uOWOGWXjA';
                var map = new mapboxgl.Map({
                    container: 'map',
                    style: 'mapbox://styles/mapbox/streets-v11',

                    // center: [112.1891442, -7.7655118], // starting position
                    center: [<?= $center; ?>], // starting position
                    zoom: 13 // starting zoom
                });
                // Set options
                <?php
                $warna = '#1f334a';
                ?>
                var marker = new mapboxgl.Marker({
                        color: "<?= $warna; ?>",
                        draggable: true
                    }).setLngLat([112.158293, -7.767023])
                    .setPopup(new mapboxgl.Popup().setHTML("<p>my home!</p>"))
                    .addTo(map);

                var marker = new mapboxgl.Marker({
                        color: "<?= $warna; ?>",
                        draggable: true
                    })
                    .setLngLat([112.1581974, -7.7670403])
                    .setPopup(new mapboxgl.Popup().setHTML("<p>Bubur Bendo</p>"))
                    .addTo(map);

                var marker = new mapboxgl.Marker({
                        color: "<?= $warna; ?>",
                        draggable: true
                    })
                    .setLngLat([112.1572948, -7.766908])
                    .setPopup(new mapboxgl.Popup().setHTML("<p>Lapangan Bendo</p>"))
                    .addTo(map);

                // marker.togglePopup(); // toggle popup open or closed

                map.addControl(
                    new MapboxGeocoder({
                        accessToken: mapboxgl.accessToken,
                        mapboxgl: mapboxgl
                    })
                );
                map.addControl(new mapboxgl.NavigationControl());
                map.addControl(
                    new mapboxgl.GeolocateControl({
                        positionOptions: {
                            enableHighAccuracy: true
                        },
                        trackUserLocation: true
                    })
                );
            </script>
        </div>
    </div>
</div>