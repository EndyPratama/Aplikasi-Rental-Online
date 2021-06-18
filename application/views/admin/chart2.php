<div class="col content">
    <div id="kosong"></div>
    <h1>Statistik : </h1>
    <!-- <div class="row"> -->
    <div class="form-group col-md-4">
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
        <button class="btn btn-outline-primary" onclick="tampilkan()">Tampilkan</button>
    </div>
    <script>
        function tampilkan() {

            jenis = document.getElementById("jenis").value;
            // console.log(jenis);
            diagram = document.getElementById("diagram").value;
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
            // console.log(diagram);
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
                <form id="Uji_form">
                    <p>Form Kosong : </p>
                    <input type="text" name="nama" id="">
                    <button>Coba</button>
                </form>
                <div class="kontent"></div>
                <script>
                    $(document).ready(function(e) {
                        $('#Uji_form').submit(function() {
                            e.ajax({
                                url: '<?= base_url('Admin/Chart/Graphdata'); ?>',
                                type: 'POST',
                                data: $(this).serialize(),
                                success: function(data) {
                                    // console.log(data);
                                    data = JSON.parse(data)
                                    // console.log(data);
                                    // console.log(data[0]["terpinjam"]);
                                    $('[name=nama]').val("");
                                    $('.kontent').append('berhasil');
                                },
                                error: function() {
                                    alert("Gagal Memuat data");
                                }
                            });
                            return false;
                        })
                    });
                </script>
                <?php
                //Inisialisasi nilai variabel awal
                $label1 = "";
                $jumlah1 = null;
                $jumlah1x = null;
                // echo $jenis;
                foreach ($kendaraan as $item) {
                    $merk = $item->merk;
                    $label1 .= "'$merk'" . ", ";
                    $total = $item->total;
                    $jumlah1 .= "$total" . ", ";
                    $jumlah1x .= "$total" . " ";
                }
                echo $jumlah1;
                echo $jumlah1x;
                $label2 = "";
                $jumlah2 = "";
                foreach ($transaksi as $item) {
                    $merk = $item->merk;
                    $label2 .= "'$merk'" . ", ";
                    $total = $item->terpinjam;
                    $jumlah2 .= "$total" . ", ";
                }
                echo $jumlah2;
                $label = "";
                $jumlah = null;

                ?>

                <script>
                    var aaa = 10;
                    var chartdiagram = "pieChart";
                    var chartBar = "pie";
                    var jumlah = "<?= $jumlah1x; ?>";
                    console.log("jumlah : " + jumlah);
                    $(function() {
                        $('select[name=jenis]').on('change', function() {
                            jenis = $(this).children("option:selected").val();
                            console.log("Jenis : " + jenis);
                            if (jenis == "kendaraan") {
                                <?php
                                $label = $label1;
                                $jumlah = $jumlah1;
                                ?>
                            } else if (jenis == "transaksi") {
                                <?php
                                $label = $label1;
                                $jumlah = $jumlah2;
                                ?>
                            }
                        });
                        $('select[name=diagram]').on('change', function() {
                            D_chart = $(this).children("option:selected").val();
                            chartdiagram = D_chart + "Chart";
                            console.log(chartdiagram);

                            chartBar = D_chart;
                            Chart_Diagram(chartdiagram, chartBar);
                            console.log(<?= $jumlah1; ?>);
                        });
                    });

                    function Chart_Diagram(chartdiagram, chartBar) {
                        var dataset = {
                            labels: [<?php echo $label; ?>],
                            datasets: [{
                                label: 'Data Jumlah Member',
                                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)', 'rgb(90,120,45)', 'rgb(45,17,150)', 'rgb(59,190,241)', 'rgb(6,5,69)'],
                                borderColor: ['rgb(255, 255, 255)'],
                                data: [<?= $jumlah1; ?>]
                            }]
                        }
                        var ctx = document.getElementById(chartdiagram).getContext('2d');
                        var chart = new Chart(ctx, {
                            type: chartBar,
                            data: dataset,
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
                    }
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
                    <?php foreach ($kendaraan as $p) : ?>
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