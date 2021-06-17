<div class="col content">
    <div id="kosong"></div>
    <h1>Statistik : </h1>
    <!-- <div class="row"> -->
    <div class="form-group col-md-4">
        <form action="<?= base_url('Admin/Chart'); ?>" method="POST">
            <select name="jenis" id="jenis" class="form-control">
                <option value="kendaraan" selected>Jumlah Kendaraan</option>
                <option value="transaksi">Transaksi</option>
            </select>
            <!-- </div>
        <div class="form-group col-md-4"> -->
            <select name="diagram" id="diagram" class="form-control">
                <option value="pie" selected>Lingkaran</option>
                <option value="bar">Batang</option>
                <option value="line">Garis</option>
            </select>
            <button class="btn btn-outline-primary" type="submit">Tampilkan</button>
        </form>
    </div>

    <div class="row">
        <div class="col-8">
            <div class="row">
                <canvas id="pieChart" width="40" style="display: none;"></canvas>
                <canvas id="barChart" width="40" style="display: none;"></canvas>
                <canvas id="lineChart" width="40" style="display: none;"></canvas>


                <?php
                // $nama = "kendaraan";
                $label = "";
                $jumlah = null;
                foreach ($graph as $item) {
                    $merk = $item->merk;
                    $label .= "'$merk'" . ", ";
                    $total = $item->total;
                    $jumlah .= "$total" . ", ";
                }
                ?>
                <script>
                    document.getElementById("jenis").value = "<?= $nama; ?>";
                    document.getElementById("diagram").value = "<?= $diagram; ?>";

                    var diagram = document.getElementById("diagram").value;
                    var diagramChart = diagram + "Chart";
                    if (diagram == 'pie') {
                        // chart = diagram + "Chart";
                        // console.log(chart);
                        document.getElementById('pieChart').style.display = 'block';
                        document.getElementById('barChart').style.display = 'none';
                        document.getElementById('lineChart').style.display = 'none';
                    } else if (diagram == 'bar') {
                        document.getElementById('barChart').style.display = 'block';
                        document.getElementById('pieChart').style.display = 'none';
                        document.getElementById('lineChart').style.display = 'none';
                    } else {
                        document.getElementById('lineChart').style.display = 'block';
                        document.getElementById('pieChart').style.display = 'none';
                        document.getElementById('barChart').style.display = 'none';
                    }
                </script>
                <script>
                    var ctx = document.getElementById(diagramChart).getContext('2d');
                    var chart = new Chart(ctx, {
                        // The type of chart we want to create
                        type: diagram,
                        // The data for our dataset
                        data: {
                            labels: [<?php echo $label; ?>],
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