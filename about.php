<?php
  require_once 'class/User.php';
  $user = new User;

  session_start();
  $userid = $_SESSION['userid'];
  $result = $user->about($userid);
  // print_r($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Clean Blog - Start Bootstrap Theme</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.php">Hi! <?php echo $_SESSION['username'] ?></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="post.php">Sample Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php"><?php $userPicture = $_SESSION['user_picture'];
            echo "<img src='img/$userPicture' id='image' alt='sing up image' class='rounded-circle' style='width: 40px; height: 40px;'>"; ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="actionUser.php?actiontype=logout&userid=<?php echo $_SESSION['userid'] ?>">Logout<i class="fas fa-sign-out-alt ml-1"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/about-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>About Me</h1>
            <span class="subheading">This is what I do.</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container d-block">
    <div class="col-lg-8 col-md-10 mx-auto">
    <h2><i class="fas fa-user-cog text-info"></i>Your Profile</h2>
      <div class="card">
        
        <div class="card-header d-block bg-white border-0">
          <div class="row p-0" style="">

          <?php
            foreach($result as $row){
              $picture = $row['user_picture'];

            echo "
            <figure class='col-md-3 mt-2'><img src='img/$picture' alt='sing up image' style='width: 150px; height: 150px;'></figure>

              <div class='row col-md-9 ml-1'>
                <div class='col-md-12'>
                <a href='about_edit.php' class='float-right mt-1 btn btn-outline-info btn-rounded waves-effec'>Edit</a>
                  <h2>".$row['username']."</h2>
                  <p class='m-0'>
                  ".$row['bio']."      
                  </p>
                </div>
              </div>
              </div>
          </div>
        
        <div class='card-body mt-0'>
          <div class='row'>
            <div class='col-md-6'>
              <p>First Name</p>
            </div>
            <div class='col-md-6'>
              <p>".$row['user_first_name']."</p>
            </div>
          </div>
          <div class='row'>
            <div class='col-md-6'>
              <p>Last Name</p>
            </div>
            <div class='col-md-6'>
              <p>".$row['user_last_name']."</p>
            </div>
          </div>
          <div class='row'>
            <div class='col-md-6'>
              <p>E-mail</p>
            </div>
            <div class='col-md-6'>
              <p>".$row['email']."</p>
            </div>
          </div>
          <div class='row'>
            <div class='col-md-6'>
              <p>Phone</p>
            </div>
            <div class='col-md-6'>
              <p>".$row['phone']."</p>
            </div>
          </div>
          <div class='row'>
            <div class='col-md-6'>
              <p>Nationality</p>
            </div>
            <div class='col-md-6'>
              <p>".$row['nationality']."</p>
            </div>
          </div>
          <div class='row'>
            <div class='col-md-6'>
              <p>Occupation</p>
            </div>
            <div class='col-md-6'>
              <p>".$row['occupation']."</p>
            </div>
          </div>
          <div class='row'>
            <div class='col-md-6'>
              <p>Birth Day</p>
            </div>
            <div class='col-md-6'>
              <p>".$row['user_birthday']."</p>
            </div>
          </div>
          ";
          }
          ?>


      </div>

    </div>
  </div>
  <div class="container d-block mt-5">
    <div class="col-lg-8 col-md-10 mx-auto">
    <h2><i class="fas fa-sticky-note text-success"></i>Your Categories</h2>
    
    </div>
  </div>

  <hr>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; Your Website 2019</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
