<div class="col content">
    <div id="kosong"></div>
    <h1>Statistik : </h1>
    <!-- <div class="row"> -->
    <div class="form-group col-md-4">
        <select name="jenis" id="jenis" class="form-control">
            <option value="kendaraan" selected>Merk Kendaraan</option>
            <option value="transaksi">Transaksi</option>
        </select>
        <!-- </div>
        <div class="form-group col-md-4"> -->
        <select name="diagram" id="diagram" class="form-control">
            <option value="lingkaran" selected>Lingkaran</option>
            <option value="batang">Batang</option>
            <option value="garis">Garis</option>
        </select>
        <button class="btn btn-outline-primary" onclick="tampilkan()">Tampilkan</button>
    </div>
    <script>
        function tampilkan() {
            jenis = document.getElementById("jenis").value;
            console.log(jenis);
            diagram = document.getElementById("diagram").value;
            if (diagram == 'lingkaran') {
                document.getElementById('pieChart').style.display = 'block';
                document.getElementById('barChart').style.display = 'none';
                document.getElementById('lineChart').style.display = 'none';
            } else if (diagram == 'batang') {
                document.getElementById('barChart').style.display = 'block';
                document.getElementById('pieChart').style.display = 'none';
                document.getElementById('lineChart').style.display = 'none';
            } else {
                document.getElementById('lineChart').style.display = 'block';
                document.getElementById('pieChart').style.display = 'none';
                document.getElementById('barChart').style.display = 'none';
            }
            console.log(diagram);
        }
    </script>
    <!-- </div> -->
    <button onclick="window.print()" class="btn btn-outline-secondary shadow float-right" id="btn-print" type="submit" name="submit">Print <i class="fa fa-print"></i></button>
    <br>
    <br>

    <div class="row">
        <div class="col-8">
            <div class="row">
                <canvas id="pieChart" width="40" style="display: none;"></canvas>
                <canvas id="barChart" width="40" style="display: none;"></canvas>
                <canvas id="lineChart" width="40" style="display: none;"></canvas>
                <?php
                //Inisialisasi nilai variabel awal
                $type_mobil = "";
                $jumlah = null;
                foreach ($graph as $item) {
                    $merk = $item->merk;
                    $type_mobil .= "'$merk'" . ", ";
                    $total = $item->total;
                    // $jumlah .= "$total" . ", ";
                }
                ?>
                <script>
                    var ctx = document.getElementById('pieChart').getContext('2d');
                    var chart = new Chart(ctx, {
                        // The type of chart we want to create
                        type: 'pie',
                        // The data for our dataset
                        data: {
                            labels: [<?php echo $type_mobil; ?>],
                            datasets: [{
                                label: 'Data Jumlah Member',
                                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)', 'rgb(90,120,45)', 'rgb(45,17,150)', 'rgb(59,190,241)', 'rgb(6,5,69)'],
                                borderColor: ['rgb(255, 255, 255)'],
                                data: [<?php echo $jumlah; ?>]
                            }]
                        },
                        // Configuration options go here
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                </script>
                <script>
                    var ctx = document.getElementById('barChart').getContext('2d');
                    var chart = new Chart(ctx, {
                        // The type of chart we want to create
                        type: 'bar',
                        // The data for our dataset
                        data: {
                            labels: [<?php echo $type_mobil; ?>],
                            datasets: [{
                                label: 'Data Jumlah Member',
                                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)', 'rgb(90,120,45)', 'rgb(45,17,150)', 'rgb(59,190,241)', 'rgb(6,5,69)'],
                                borderColor: ['rgb(255, 255, 255)'],
                                data: [<?php echo $jumlah; ?>]
                            }]
                        },
                        // Configuration options go here
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                </script>
                <script>
                    var ctx = document.getElementById('lineChart').getContext('2d');
                    var chart = new Chart(ctx, {
                        // The type of chart we want to create
                        type: 'line',
                        // The data for our dataset
                        data: {
                            labels: [<?php echo $type_mobil; ?>],
                            datasets: [{
                                label: 'Data Jumlah Member',
                                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)', 'rgb(90,120,45)', 'rgb(45,17,150)', 'rgb(59,190,241)', 'rgb(6,5,69)'],
                                borderColor: ['rgb(255, 255, 255)'],
                                data: [<?php echo $jumlah; ?>]
                            }]
                        },
                        // Configuration options go here
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                </script>
            </div>
        </div>
        <div class="col-4">
            <h3>Detail :</h3>
            <table class="table">
                <thead class="thead-dark">
                    <th scope="col">#</th>
                    <th scope="col">Merk</th>
                    <th scope="col">Total</th>
                </thead>
                <tbody>
                    <?php $count = 1; ?>
                    <?php foreach ($graph as $p) : ?>
                        <tr>
                            <th scope="row">
                                <h6><?= $count++; ?></h6>
                            </th>
                            <td>
                                <h6><?= $p->merk; ?></h6>
                            </td>
                            <td>
                                <h6><?= $p->total; ?></h6>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>