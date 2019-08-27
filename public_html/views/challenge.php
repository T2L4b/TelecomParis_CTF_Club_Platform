<?php
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.html');
	exit();
}

if ( !isset($_GET['chall']) ) {
	// Could not get the data that should have been sent.
  header('Location: 400.php');
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CTF Club - Challenge</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom js for this page-->
  <script src="js/challenge.js"></script>

</head>

<body id="page-top">

  <script>
    loadPage();
  </script>

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

          <div class="row">

            <!-- Difficulty Card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div id="difficulty_border" class="card shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div id="difficulty_text" class="text-xs font-weight-bold text-uppercase mb-1">Difficulté</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div id="difficulty" class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div id="difficulty_progress_bar" class="progress-bar" role="progressbar" style="width: 0%"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Validation card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Valdations</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Author card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Auteur(s)</div>
                      <div id="authors" class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Reward card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Récompense</div>
                      <div id="points" class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>          

          <div class="row">
            <div class="col-lg-12">
              <div class="card shadow mb-4">              
                <div class="card-header">
                    <h1 class="h4 mb-0 text-gray-800">Enoncé</h1>
                </div>
                <div class="card-body">
                    <p id="statement"></p>
                    <a id="chall_url" href="" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                        <i class="fas fa-arrow-right"></i>
                        </span>
                        <span class="text">Démarrer le challenge</span>
                    </a>
                </div>
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="card shadow mb-4">
                <div class="card-header">
                    <h1 class="h4 mb-0 text-gray-800">Valider le challenge</h1>
                </div>
                <div class="card-body">
                    <div class="card mb-3 text-gray-100 p-2" style="display:none" id="msgFlag"></div>
                    <p>
                        Saisir le mot de passe
                    </p>
                    <input type="password" class="form-control mb-4" id="flag" placeholder="">
                    <a href="#" onClick="validateChall()" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                        <i class="fas fa-flag"></i>
                        </span>
                        <span class="text">Valider</span>
                    </a>
                </div>
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

</body>

</html>
