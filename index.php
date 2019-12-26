<?php
 require_once 'class/User.php';
 $user = new User;
 $viewPost = $user->viewPost();
 session_start();

 $userid = $_SESSION['userid'];
 $result = $user->about($userid);
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
            <a class="nav-link pt-1" href="about.php"><?php 
            foreach($result as $row){
              $picture = $row['user_picture'];
            
            echo "<img src='img/$picture' alt='sing up image' class='rounded-circle' style='width: 35px; height: 35px;'>
            ";
            } 
            ?></a>

          </li>
          <li class="nav-item">
            <a class="nav-link" href="actionUser.php?actiontype=logout&userid=<?php echo $_SESSION['userid'] ?>">Logout<i class="fas fa-sign-out-alt ml-1"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Let's Blog</h1>
            <span class="subheading"></span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      <?php
        foreach($viewPost as $row){
          $postImage = $row['post_image'];
          $postid = $row['post_id'];
          $avatorImage = $row['user_picture'];
          $userid = $row['user_id'];
         echo "
            <div class='card border mb-4'>
              <div class='card-header post-preview bg-white border-0'>
                <div class='row' style='height: 10px;'>
                  <div class='col-1'>
                  <a href='userDetail.php?specID=$userid'>
                    <img src='img/$avatorImage' alt='sing up image' class='rounded-circle' style='width: 35px; height: 35px;'>
                  </a>
                  </div>
                  <div class='col-4'>
                    <h3>".$row['username']."</h3>
                  </div>
                  <div class='col-7 text-right'>
                    ".$row['post_date']."
                  </div>
                </div>
              </div>
              <div class='post-preview card-body px-0 pb-0' style='height: 400px;'>
                <a href='postDetail.php?postid=$postid'>
                  <img src='img/$postImage' alt='Picture of Post' class='w-100 h-100'>
              </div>                
              <div class='post-preview card-footer'>    
                <div class='row px-3'>
                  <h2 class='post-title'>
                    ".$row['title_name']."
                  </h2>
                </div>
                <div class='row px-3'>
                  <p data-bind='text: text()' class='text-truncate post-subtitle' style='max-width: 700px;'>
                </row>
                  ".$row['post_content']." 
                  </p>
                  <br>
                </div>  
                <div class='row d-inline-block px-3'>
                  <a href='postDetail.php?postid=$postid' class='border-info text-info'>view more</a>
                  <br>
                </div>
                <div class='row px-3'>
                  <p class='border d-block border-info rounded my-1 text-info'>".$row['category']."</p>
                </div>
                </a>
              </div>
            </div>

            "; 
          }
        ?>

            </div>        
          </div>        
        </div>        
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
