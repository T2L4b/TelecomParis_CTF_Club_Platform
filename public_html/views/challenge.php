<?php
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.html');
	exit();
}

if ( !isset($_GET['chall']) ) {
	// Could not get the data that should have been sent.
  header('Location: 404.php');
  exit();
}

$url = 'http://192.168.99.100:8082/api/challenge/read.php?idChall='.$_GET['chall'];

//create a new cURL resource
$ch = curl_init($url);

//return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//execute the POST request
$result = curl_exec($ch);

$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$result = json_decode($result);

if ($httpcode === 404) {
  header('Location: 404.php');
  exit();
}

if ($httpcode === 400) {
  header('Location: 400.php');
  exit();
}

if ($httpcode === 200) {
  $title = $result->title;
  $difficulty = $result->difficulty;
  $author = "";
  $url = $result->url;
  foreach ($result->authors as &$auth) {
    if ($author != "") {
      $author .= ", ";
    }
    $author .= $auth;
  }
  $points = $result->points;
  $statement = $result->statement;
}


//close cURL resource
curl_close($ch);

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

          <!-- Page Heading -->
          <!--<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Challenge 01</h1>
          </div>-->

          <div class="row">

            <!-- Difficulty Card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <?php 
                switch ($difficulty) {
                  case 'Accessible':
                    echo '<div class="card border-left-success shadow h-100 py-2">';
                    break;
                  case 'Intermédiaire':
                    echo '<div class="card border-left-warning shadow h-100 py-2">';
                    break;
                  case 'Difficile':
                    echo '<div class="card border-left-danger shadow h-100 py-2">';
                    break;
                  default:
                    echo '<div class="card border-left-gray-900 shadow h-100 py-2">';
                } 
                
              ?>
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <?php 
                      switch ($difficulty) {
                        case 'Accessible':
                          echo '<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Difficulté</div>';
                          break;
                        case 'Intermédiaire':
                          echo '<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Difficulté</div>';
                          break;
                        case 'Difficile':
                          echo '<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Difficulté</div>';
                          break;
                        default:
                          echo '<div class="text-xs font-weight-bold text-gray-900 text-uppercase mb-1">Difficulté</div>';
                      } 
                      
                      ?>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $difficulty ?></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <?php 
                            switch ($difficulty) {
                              case 'Accessible':
                                echo '<div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>';
                                break;
                              case 'Intermédiaire':
                                echo '<div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>';
                                break;
                              case 'Difficile':
                                echo '<div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>';
                                break;
                              default:
                                echo '<div class="progress-bar bg-gray-900" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';
                            } 
                            
                            ?>
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
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Auteur</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $author; ?></div>
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
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $points;?> points</div>
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
                    <p><?php echo $statement;?></p>
                    <a href="<?php echo $url;?>" class="btn btn-primary btn-icon-split">
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
                    <p>
                        Saisir le mot de passe
                    </p>
                    <input type="password" class="form-control mb-4" id="flag" placeholder="">
                    <a href="#" class="btn btn-primary btn-icon-split">
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
