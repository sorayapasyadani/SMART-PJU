<?php
    //include 'koneksi.php';
    // $sensor = mysqli_query($conn,"SELECT * FROM data");  
    // $result = mysqli_query ($conn,"INSERT INTO data  VALUES ('".$_GET["data"]."')");
    // require_once('./Antares.php');
    // $row=mysqli_fetch_array($sensor);
?>
<?php
            require_once('./Antares.php');

            Antares::init([
                "PLATFORM_URL" => 'https://platform.antares.id:8443', // TODO: Change this to your platform URL
                "ACCESS_KEY" => '0f92c46a8284269e:393d5daa980c9cdb' // TODO: Change this to your access key
            ]);
            try {
                $resp = Antares::getInstance()->get('/antares-cse/antares-id/SmartPju/smartpju3'); // TODO: Change this to your container uri
                $first10 = $resp->listContentInstanceUris(1);
                foreach ($first10 as $uri) {
                    $payload = Antares::getInstance()->get($uri);
                    $date=strtotime($payload->getCreationTime());
                    $resuri=$payload->con;
                    //$data=$resuri->data;
                    $resuri=json_decode($resuri);
                    //print_r($resuri->data->S);
                    $datenow= date('Y-m-d h:i:s', $date);
                    $I  = $resuri->data->Lux;
                    //echo "Intensitas:$I";
                    echo "<br>";
                    $S  = $resuri->data->suhu;
                    //echo "Suhu:$S";
                    echo "<br>";
                    $J = $resuri->data->Jarak;
                    //echo "Jarak: $J";
                    echo "<br>";
                    // $A  = $resuri->data->S;
                    // echo "Arus: $A";
                    // echo "<br>";
                    // $T  = $resuri->data->voltage;
                    // echo "Tegangan: $T";
                    // echo "<br>";
                    // echo "Waktu: $datenow";
                    // echo "<br>";
                    // echo "<br>";
                }
            } catch (Exception $e) {
                echo($e->getMessage());
            }
                            
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Smart PJU</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/lampu.png" rel="icon">
  <link href="assets/img/lampu.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/lampu.png" alt="">
        <span class="d-none d-lg-block">Smart PJU</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/lampu.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Admin</h6>
              <span>Admin</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->



      <li class="nav-item">
        <a class="nav-link collapsed" href="index2.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Cahaya Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Sensor Cahaya </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-brightness-high"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo "$I";?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Cahaya Card -->

            <!-- Temperature Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card temperature-card">

                <div class="card-body">
                  <h5 class="card-title">Temperature </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-thermometer-half"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo "$S";?>&#8451;</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- Jarak Card -->

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Jarak </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-lightning"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo "$J";?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div>

            <!-- Arus Card -->
            <div class="col-xxl-4 col-md-6">

              <div class="card info-card arus-card">

                <div class="card-body">
                  <h5 class="card-title">Arus</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-lightning-charge"></i>
                    </div>
                    <div class="ps-3">
                      <h6>3 Ampere</h6>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Arus Card -->
            <!-- Tegangan Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Tegangan</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-brightness-high"></i>
                    </div>
                    <div class="ps-3">
                      <h6>2</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- Tegangan Card -->

            <!-- Data Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
               <a href = "example-dashboard.php"
                <div class="card-body">
                  <h5 class="card-title">More Info </h5>
                  <div class="d-flex align-items-center">
                    </div>
                    <div class="ps-3">
                      <h6></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- Data Card -->

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="card-body">
                  <h5 class="card-title"><?php echo"Data Date: $datenow";?></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <!-- <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Cahaya',
                          data: []
                        }, {
                          name: 'Temperature',
                          data: []
                        }, {
                          name: 'Jarak',
                          data: []
                        }, {
                          name: 'Arus',
                          data: []
                        }, {
                          name: 'Tegangan',
                          data: []
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d', '#FF33F6','#B22222'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'datetime',
                          categories: ["2022-10-07T00:00:00.000Z", "2022-10-07T01:30:00.000Z", "2022-10-07T02:30:00.000Z", "2022-10-07T03:30:00.000Z", "2022-10-07T04:30:00.000Z", "2022-10-07T05:30:00.000Z", "2022-10-07T06:30:00.000Z"]
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                        }
                      }).render();
                    });
                  </script>
                  End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->


          </div>
        </div><!-- End Left side columns -->

            </div>
          </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>