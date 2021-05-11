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
        <div class="col-6">
            <h5>Cari Kendaraan : </h5>
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Cari disini...">
                <!-- 
                    Yang dicari itu kendaraan, karena tidak semua user menyewakan kendaraannya...
                 -->
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class='bx bx-search-alt'></i></div>
                </div>
            </div>
            <!-- <input type="search" name="keyword" id="keyword" placeholder="Cari disini..."> -->
            <h5>List daerah : </h5>
            <table class="table">
                <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kendaraan</th>
                    <th>Kota</th>
                    <th>Lihat</th>
                </thead>
                <tbody>
                    <?php
                    $row = 0;
                    $no = 1;
                    // $daerah = array("Pare", "Kediri", "Jombang");
                    // $koordinat = array("112.1891442,-7.7655118", "111.9461469,-7.8424163", "112.1191447,-7.5614566");
                    foreach ($user as $u) :

                        if ($u->alamat != NULL) {
                    ?>
                            <tr id="target">
                                <td id="nomer<?= $no; ?>"><?= $no; ?></td>
                                <td id="nama"><?= $u->username; ?></td>
                                <td>Mobil</td>
                                <td>Pare</td>
                                <td><a href="<?= base_url('admin/Lokasi/cari/' . $u->id); ?>" class="btn btn-success"><i class='bx bx-target-lock'></i></a></td>
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
            </script>
            <script>
                mapboxgl.accessToken = 'pk.eyJ1IjoiZW5keXByYXRhbWEiLCJhIjoiY2tvOWR2dWg2MDk4MzJvcW1sbHJmeXpiYSJ9.RM5gAc-1m6q27uOWOGWXjA';
                var map = new mapboxgl.Map({
                    container: 'map',
                    style: 'mapbox://styles/mapbox/streets-v11',

                    // center: [112.1891442, -7.7655118], // starting position
                    center: [<?= $lokasi; ?>], // starting position
                    zoom: 14 // starting zoom
                });
                // Set options
                <?php
                $warna = '#1f334a';
                ?>
                <?php
                foreach ($user as $u) :
                ?>
                    var marker = new mapboxgl.Marker({
                            color: "<?= $warna; ?>",
                            draggable: true
                        }).setLngLat([<?= $u->alamat; ?>])
                        .setPopup(new mapboxgl.Popup().setHTML("<p><?= $u->name; ?></p>"))
                        .addTo(map);
                <?php
                endforeach; ?>

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
                // ambil data yang dibutuhkan
            </script>
        </div>
    </div>
</div>