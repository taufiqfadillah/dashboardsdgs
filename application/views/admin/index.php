<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h5 mb-0 text-gray-800"><?= $title; ?></h1>
        <button onclick="window.print();" class="noPrint d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i> Print Report</a>
        </button>

    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-gradient-primary border-0 shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <a href="<?= base_url('admin/allusers'); ?>" class="text-gray-300">
                                    Users (In Database)
                                </a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-300"><?= $count_user; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-gradient-info border-0 shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-gray-300 text-uppercase mb-1">
                                Visitor (in Dashboard)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-300">
                                <?php
                                $find_count = $this->db->get('visitor');
                                foreach ($find_count->result_array() as $row) {
                                    $current_count = $row['visit'];
                                    $new_count = $current_count + 1;
                                    $this->db->set('visit', $new_count);
                                    $this->db->update('visitor');
                                    echo $new_count;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-eye fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-gradient-success border-0 shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-gray-300 text-uppercase mb-1">User Online
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-300">
                                        <?= $online; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-auto">
                            <i class="fas fa-signal fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-gradient-warning border-0 shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-gray-300 text-uppercase mb-1">
                                Pending Activation</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-300"><?= $this->db->where(['is_active' => 0])->from("user")->count_all_results(); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-pause-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- Content Row -->

    <div class="row">

        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-dark">Monitoring</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div id="chart"></div>
                </div>
            </div>
        </div>

        <!-- Load Chart.js library -->
        <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.28.3/dist/apexcharts.min.js"></script>
        <script>
            var donaturData = <?php echo json_encode($this->db->get_where('data_donatur')->result_array()); ?>;

            var options = {
                series: [{
                    name: 'Donasi',
                    data: []
                }],
                chart: {
                    type: 'line',
                    height: 350
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                }
            };
            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();

            var jumlahData = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

            for (var i = 0; i < donaturData.length; i++) {
                var date = new Date(donaturData[i].date_created);
                var month = date.getMonth();
                var jumlah = donaturData[i].jumlah.replace(/\./g, ''); // menghapus tanda titik pada angka
                jumlahData[month] += parseInt(jumlah);
            }

            chart.updateSeries([{
                data: jumlahData
            }]);
        </script>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-dark">Accounts Sources</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body" style="height: 25em;">
                    <div class="chart-pie pt-2 pb-2">
                        <div id="pie"></div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts@latest"></script>
        <script>
            var options = {
                chart: {
                    type: 'donut',
                    height: 350
                },
                series: [<?= $count_user; ?>, <?= $this->db->where(['is_active' => 1])->from("user")->count_all_results(); ?>, <?= $datadonatur; ?>, <?= $datakelompok; ?>, <?= $proposal; ?>],
                labels: ['Data User', 'Data User Aktif', 'Data Donatur', 'Data Kelompok Masyarakat', 'Jumlah Pengajuan Proposal'],
            };

            var chart = new ApexCharts(document.querySelector("#pie"), options);
            chart.render();
        </script>

        <div class="col-xl-5 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-dark">Calender</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div id="calendar" class="calender"></div>
                </div>
            </div>
        </div>

        <!-- Include FullCalendar and moment.js -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />

        <!-- Initialize FullCalendar -->
        <script>
            $(document).ready(function() {
                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    defaultDate: new Date(),
                    editable: true,
                    eventLimit: true, // allow "more" link when too many events
                    events: [{
                            title: 'Event 1',
                            start: '2023-04-18T10:30:00',
                            end: '2023-04-18T12:30:00'
                        },
                        {
                            title: 'Event 2',
                            start: '2023-04-19T12:00:00',
                            end: '2023-04-19T13:00:00'
                        },
                        {
                            title: 'Event 3',
                            start: '2023-04-20T14:30:00',
                            end: '2023-04-20T16:30:00'
                        }
                        // more events here
                    ]
                });
            });
        </script>

        <!-- Cuaca -->
        <div class="col-xl-2 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold" style="color:dodgerblue;">Cuaca Hari Ini</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="weather-widget">
                        <div class="weather-icon"></div>
                        <div class="weather-info">
                            <div class="temperature"><span class="temp"></span>&deg;C</div>
                            <div class="description"></div>
                            <div class="location"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const weatherIcon = document.querySelector('.weather-icon');
            const temp = document.querySelector('.temp');
            const desc = document.querySelector('.description');
            const loc = document.querySelector('.location');

            function success(position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;
                const apikey = '3164758b1fde82e0268c9de2f85c7c90';
                const api = `https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=${apikey}&units=metric`;

                fetch(api)
                    .then(response => response.json())
                    .then(data => {
                        const icon = `https://openweathermap.org/img/w/${data.weather[0].icon}.png`;
                        weatherIcon.innerHTML = `<img src="${icon}" />`;
                        temp.innerHTML = data.main.temp.toFixed(0);
                        desc.innerHTML = data.weather[0].description;
                        loc.innerHTML = data.name;
                    });
            }

            function error() {
                loc.innerHTML = 'Lokasi tidak dapat diakses';
            }

            if (!navigator.geolocation) {
                loc.innerHTML = 'Geolocation tidak didukung oleh browser Anda';
            } else {
                navigator.geolocation.getCurrentPosition(success, error);
            }
        </script>

        <!-- Jam Digital -->
        <div class="col-xl-2 col-lg">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold" style="color: chocolate;">Jam Digital</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <h1 class="font-weight-bold" id="clock" style="font-size: 40px; color: chocolate;"></h1>
                </div>
            </div>
        </div>

        <script>
            function updateClock() {
                var now = new Date();
                var hours = now.getHours();
                var minutes = now.getMinutes();
                var seconds = now.getSeconds();

                if (hours < 10) {
                    hours = "0" + hours;
                }
                if (minutes < 10) {
                    minutes = "0" + minutes;
                }
                if (seconds < 10) {
                    seconds = "0" + seconds;
                }

                var timeString = hours + ':' + minutes + ':' + seconds;
                document.getElementById('clock').innerHTML = timeString;
            }

            setInterval(updateClock, 1000);
        </script>


    </div>

    <p><?= password_needs_rehash('$2y$10$xu3cc2hZT2ONJHTD4ecq..zyNyOUs10rKxQphHNB0xMU4ax9SKqUi', PASSWORD_DEFAULT); ?></p>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->