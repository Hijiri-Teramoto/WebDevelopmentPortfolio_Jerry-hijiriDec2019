<?php
  require_once 'class/User.php';
  $user = new User;
  
  session_start();

  $userid = $_SESSION['userid'];
  $result = $user->about($userid);
  $categories = $user->viewCategory();
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
  <style>
    @media screen { #files { display: none; } }
    .browse_btn{
  position: absolute;
  top: 40px;
  left: 50px; 
  height: 100px;
  width: 100px;
  cursor: pointer;
}
img {
  cursor: pointer;
}
  </style>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.php">Start Bootstrap</a>
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
  <header class="masthead" style="background-image: url('img/post-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>Man must explore, and this is exploration at its greatest</h1>
            <h2 class="subheading">Problems look mighty small from 150 miles up</h2>
            <span class="meta">Posted by
              <a href="#">Start Bootstrap</a>
              on August 24, 2019</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
    <div class="container">
      <form action="actionUser.php" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="card d-block p-0">

              <div class="card-header bg-white">
                <div class="row" style="max-height: 400px;">
                  <label for='files'>
                    <img src="img/white_color.jfif" id="image" class="w-100" style="height: 400px;">
                    <span class="browse_btn"><i class="far fa-images fa-2x text-secondary"></i></span><input type="file" name="file" id="files">
                  </label>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <h2 class="col-7">TITLE</h2>
                  <span id="view_todayE" style="font-size: 15px;" class="col-5 text-right"></span>
<script type="text/javascript" class="">
document.getElementById("view_todayE").innerHTML = getTodayE();

function getTodayE() {
	var now = new Date();
	var year = now.getFullYear();
	var mon = now.getMonth(); //１足さない
	var day = now.getDate();
	var you = now.getDay(); //曜日(0～6=日～土)

	//曜日の選択肢
	var youbi = new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
	//月名の選択肢
	var month = new Array("January","February","March","April","May","June","July","August","September","October","November","December");

	//出力用
	var s = "Date / "+month[mon] + " " + day + ", " + year + " (" +youbi[you] + ")";
	return s;
}
</script>
                <input type="text" name="title" Placeholder="Title" class="form-control border-0">
  <br>
                <div class="col-12">
                  <h2>Category</h2>
                  <select name="category" id="" class="form-control border-0" required>
                  <option selected disabled>Choose your category</option>
                
                  <?php
                  foreach($categories as $row){
                    echo "
                    <option value='".$row['category_id']."'>".$row['category']."</opution>
                    ";
                  }
                  ?>
                  </select>
                </div>
                <div class="col-12">
                  <h2>Content</h2>
                  <textarea name="content" id="" cols="30" rows="10" class="form-control border-0" placeholder="What Are you doing?"></textarea>
                </div>
                <div class="col-12">
                  <input type="submit" name="post" value="POST" class="btn btn-info p-2 float-right">
                  <a href="index.php" class="text-danger float-right mt-1 mr-2"><i class="fas fa-times-circle fa-lg"></i></a>
                </div>
              </div>
              </div>

            </div>
          </div>
        </div>
      </form>
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

  <!-- upload picture-->
  <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#files").change(function () {
            readURL(this);
        });
    </script>

</body>

</html>
