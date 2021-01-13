<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SPK SMART</title>
    <link rel="icon" href="<?php echo base_url() ?>assets/img/upgris.png">

    <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  

    <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>

</head>

<body id="page-top">

  <div id="wrapper">

    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url() ?>">
        <div class="sidebar-brand-icon">
          <!-- <i class="fas fa-award"></i> --> 
          <img src="<?php echo base_url() ?>assets/img/upgris.png" alt="" height="50">
        </div>
        <div class="sidebar-brand-text mx-3">UPGRIS</div>
      </a>


      <hr class="sidebar-divider my-0">

      <li class="nav-item <?php if($this->uri->segment(1) == "" || $this->uri->segment(1) == "home"){echo "active";} ?>">
        <a class="nav-link" href="<?php echo base_url() ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item <?php if($this->uri->segment(1) == "kriteria"){echo "active";} ?>">
        <a class="nav-link" href="<?php echo base_url('kriteria') ?>">
          <i class="fas fa-fw fa-key"></i>
          <span>Data Kriteria</span></a>
      </li>     
      <li class="nav-item <?php if($this->uri->segment(1) == "alternatif"){echo "active";} ?>">
        <a class="nav-link" href="<?php echo base_url('alternatif') ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Data Alternatif</span></a>
      </li>     
      <li class="nav-item <?php if($this->uri->segment(1) == "proses"){echo "active";} ?>">
        <a class="nav-link" href="<?php echo base_url('proses') ?>">
          <i class="fas fa-fw fa-chart-bar"></i>
          <span>Proses SPK</span></a>
      </li>     

      <hr class="sidebar-divider d-none d-md-block">

      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>

    <div id="content-wrapper" class="d-flex flex-column">

      <div id="content">

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <!-- <form class="d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"> -->
              <!-- <img src="<?php echo base_url('assets/img/logo-big2.png') ?>" height="30" alt=""> -->
          <!-- </form> -->
          <div class="float-left">
              <h5>SPK Pemilihan Penerima Beasiswa dengan Metode S.M.A.R.T</h5>          
          </div>

          <ul class="navbar-nav ml-auto">


            <div class="topbar-divider d-none d-sm-block"></div>

            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="<?php echo base_url() ?>assets/#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">User</span>
                <img class="img-profile rounded-circle" src="https://www.flaticon.com/svg/static/icons/svg/848/848043.svg">
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">               
                <a class="dropdown-item" href="<?php echo base_url() ?>assets/#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>

        <div class="container-fluid">
            <?php $this->load->view($content); ?>
        </div>

      </div>


    </div>

  </div>

  <a class="scroll-to-top rounded" href="<?php echo base_url() ?>assets/#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url('login/logout') ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script>
      $('#example').DataTable();
  </script>

</body>

</html>
