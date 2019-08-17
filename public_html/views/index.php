<?php
session_start();
// FIXME logged in for dev purposes only
$_SESSION['loggedin'] = true;

$title = "Accueil";
$page = "accueil"
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CTF CLUB - Accueil</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include 'nav.php';?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php
        include 'topbar.php';
        ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          
          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Utilisateurs</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">200</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Pending Requests Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Machines vituelles disponibles</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Challenges disponibles</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">57</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Nombre de compromissions</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">217</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card shadow mb-4">
                <div class="card-header">
                    <h1 class="h4 mb-0 text-gray-800">Qu'est ce que le CTF Club ?</h1>
                </div>
                <div class="card-body">
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aspernatur delectus incidunt fuga a. Esse repudiandae, ex tempora atque facilis qui rem odit molestiae ipsam ipsa. Facilis veritatis architecto numquam delectus?
                        This card uses Bootstrap's default styling with no utility classes added. Global styles are the only things modifying the look and feel of this default card example.
                    </p>
                    <a href="register.html" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                        <i class="fas fa-arrow-right"></i>
                        </span>
                        <span class="text">Rejoindre le club !</span>
                    </a>
                </div>
              </div>
            </div>
            
          </div>
         

          <!-- Content Row -->
          <div class="row">

            <!-- Pie Chart -->
            <div class="col-lg-5">
                <div class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h1 class="h4 mb-0 text-gray-800">Source(s) de revenus</h1>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body">
                    <div class="chart-pie">
                      <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                      <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> BDE
                      </span>
                    </div>
                  </div>
                </div>
              </div>

            <!-- Content Column -->
            <div class="col-lg-7 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h1 class="h4 mb-0 text-gray-800">Projets du club</h1>
                </div>
                <div class="card-body">
                  <h4 class="small font-weight-bold">Mise en place de la plateforme CTF <span class="float-right">100 %</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Organiser un CTF live <span class="float-right">20%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Organiser des events de sécu physique <span class="float-right">0%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>

            </div>

          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Evènements à venir</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Event</th>
                      <th>Lieu</th>
                      <th>Prix</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><a href="https://lehack.org/fr">Le Hack</a></td>
                      <td>Paris</td>
                      <td>60</td>
                    </tr>
                    <tr>
                      <td><a href="https://lehack.org/fr">Le Hack</a></td>
                      <td>Paris</td>
                      <td>60</td>
                    </tr>
                    <tr>
                      <td><a href="https://lehack.org/fr">Le Hack</a></td>
                      <td>Paris</td>
                      <td>60</td>
                    </tr>
                    <tr>
                      <td><a href="https://lehack.org/fr">Le Hack</a></td>
                      <td>Paris</td>
                      <td>60</td>
                    </tr>
                    <tr>
                      <td><a href="https://lehack.org/fr">Le Hack</a></td>
                      <td>Paris</td>
                      <td>60</td>
                    </tr>
                    <tr>
                      <td><a href="https://lehack.org/fr">Le Hack</a></td>
                      <td>Paris</td>
                      <td>60</td>
                    </tr>
                    <tr>
                      <td><a href="https://lehack.org/fr">Le Hack</a></td>
                      <td>Paris</td>
                      <td>60</td>
                    </tr>
                    <tr>
                      <td><a href="https://lehack.org/fr">Le Hack</a></td>
                      <td>Paris</td>
                      <td>60</td>
                    </tr>
                    <tr>
                      <td><a href="https://lehack.org/fr">Le Hack</a></td>
                      <td>Paris</td>
                      <td>60</td>
                    </tr>
                    <tr>
                      <td><a href="https://lehack.org/fr">Le Hack</a></td>
                      <td>Paris</td>
                      <td>60</td>
                    </tr>
                    <tr>
                      <td><a href="https://lehack.org/fr">Le Hack</a></td>
                      <td>Paris</td>
                      <td>60</td>
                    </tr>
                    <tr>
                      <td><a href="https://lehack.org/fr">Le Hack</a></td>
                      <td>Paris</td>
                      <td>60</td>
                    </tr>
                    <tr>
                      <td><a href="https://lehack.org/fr">Le Hack</a></td>
                      <td>Paris</td>
                      <td>60</td>
                    </tr>
                    <tr>
                      <td><a href="https://lehack.org/fr">Le Hack</a></td>
                      <td>Paris</td>
                      <td>60</td>
                    </tr>
                    <tr>
                      <td><a href="https://lehack.org/fr">Le Hack</a></td>
                      <td>Paris</td>
                      <td>60</td>
                    </tr>
                    <tr>
                      <td><a href="https://lehack.org/fr">Le Hack</a></td>
                      <td>Paris</td>
                      <td>60</td>
                    </tr>
                    <tr>
                      <td><a href="https://lehack.org/fr">Le Hack</a></td>
                      <td>Paris</td>
                      <td>60</td>
                    </tr>
                    <tr>
                      <td><a href="https://lehack.org/fr">Le Hack</a></td>
                      <td>Paris</td>
                      <td>60</td>
                    </tr>
                    <tr>
                      <td><a href="https://lehack.org/fr">Le Hack</a></td>
                      <td>Paris</td>
                      <td>60</td>
                    </tr>
                    <tr>
                      <td><a href="https://lehack.org/fr">Le Hack</a></td>
                      <td>Paris</td>
                      <td>60</td>
                    </tr>
                    <tr>
                      <td><a href="https://lehack.org/fr">Le Hack</a></td>
                      <td>Paris</td>
                      <td>60</td>
                    </tr>
                    <tr>
                      <td><a href="https://lehack.org/fr">Le Hack</a></td>
                      <td>Paris</td>
                      <td>60</td>
                    </tr>
                    <tr>
                      <td><a href="https://lehack.org/fr">Le Hack</a></td>
                      <td>Paris</td>
                      <td>60</td>
                    </tr>
                    <tr>
                      <td><a href="https://lehack.org/fr">Le Hack</a></td>
                      <td>Paris</td>
                      <td>60</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
