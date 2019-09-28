<?php 

include_once '../api/config/SPDO.php';
include_once '../api/objects/challenge.php';

// prepare connexion and instantiate challenge object
$conn = new SPDO();
$challenge = new challenge($conn->getConnection());

$CHALL_CRYPTO = "crypto";
$CHALL_WEB = "web";

// read all challenges
$stmt = $challenge->readAll();
$num  = $stmt->rowCount();

// challenge array
$challenge_arr = array();
$challenge_arr[$CHALL_WEB] = array();
$challenge_arr[$CHALL_CRYPTO] = array();

// retrieve our table contents: fetch() is faster than fetchAll()
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);

    $challenge_item = array(
    "idChall"     => $idChall,
    "title"       => $title
    );

    // put the challenge in the appropriate array
    switch ($type) {
        case $CHALL_WEB:
            array_push($challenge_arr[$CHALL_WEB], $challenge_item);
            break;
        case $CHALL_CRYPTO:
            array_push($challenge_arr[$CHALL_CRYPTO], $challenge_item);
            break;
        default:
            break;
    }  
}
?>


<link href="css/nav.css" rel="stylesheet">

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-header d-flex align-items-center justify-content-center" href="index.php">
        <div class="h1 mx-3 hacked" >CTF Club</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Accueil</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Challenges
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Web</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <?php
            foreach ($challenge_arr[$CHALL_WEB] as $chall) {
                echo '<a class="collapse-item" href="challenge.php?chall=' . $chall["idChall"] . '">' . $chall["title"] . '</a>';
            }
            ?>
        </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item <?php if ($page=="crypto") {echo "active"; }?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Crypto</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <?php
            foreach ($challenge_arr[$CHALL_CRYPTO] as $chall) {
                echo '<a class="collapse-item" href="challenge.php?chall=' . $chall["idChall"] . '">' . $chall["title"] . '</a>';
            }
            ?>
        </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
        </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

<!-- End of Sidebar -->