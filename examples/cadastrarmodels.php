<!-- -->
<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
          Exchanger
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <!-- <img src="../assets/img/logo-small.png">-->
          </div>
          <!-- <p>CT</p> -->
        </a>
         <a href="../index.php" class="simple-text logo-normal">
          Exchanger
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>

      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="listarmodels.php">
              <i class="nc-icon nc-paper"></i>
              <p>Listar Models</p>
            </a>
          </li>
          <li>
            <a href="cadastrarmodels.php">
              <i class="nc-icon nc-single-copy-04"></i>
              <p>Cadastrar Models</p>
            </a>
          </li>
          <li>
            <a href="gerarlink.php">
              <i class="nc-icon nc-globe"></i>
              <p>Gerar Links</p>
            </a>
          </li>
          <li>
            <a href="listarLinks.php">
              <i class="nc-icon nc-bell-55"></i>
              <p>Listar Links</p>
            </a>
          </li>
        </ul>
      </div>


    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;"></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
         
          <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Cadastrar Models</h5>
              </div>
              <div class="card-body">

                <form method="POST" action="processCadModels.php" name="form">
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>UTM-COD</label>
                        <input type="text" class="form-control" placeholder="Cod" name="cod" required="cod">
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>UTM-SOURCE</label>
                        <input type="text" class="form-control" placeholder="Utm-source"  name="source" required="source">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>UTM-MEDIUM</label>
                        <input type="text" class="form-control" placeholder="Utm-medium" name="medium" required="medium">
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>UTM-CAMPAIGN</label>
                        <input type="text" class="form-control" placeholder="Utm-campaign" name="campaign" required="campaign">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <input class="btn btn-primary btn-round" type="submit" name="btn">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, Criado por diego.maustem@gmail.com
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>

  

</body>

</html>