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
  <link href="css/form-reiauto.css" rel="stylesheet">
  <!--form reaauto css -->
  <style>
  @media screen { #files { display: none; } }
.browse_btn {
  background-color: #d3d3d3;
  padding: 6px;
  border-radius: 8px;
  font-weight: bold;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
  </style>
  <!-- 写真をすぐDisplayするJavascript-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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
            echo "<img src='img/$userPicture' alt='sing up image' class='rounded-circle' style='width: 40px; height: 40px;'>"; ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="actionUser.phpactiontype=logout&userid=<?php echo $_SESSION['userid'] ?>">Logout<i class="fas fa-sign-out-alt ml-1"></i></a>
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
    <h2>Your Profile</h2>
      <div class="card">
        
        <div class="card-header d-block bg-white border-0">
          <form action="actionUser.php" method="post" enctype="multipart/form-data">
          <div class="row p-2" style="">

          <?php
            foreach($result as $row){
                $userid = $row['user_id'];
                $uname = $row['username'];
                $bio = $row['bio'];
                $uFName = $row['user_first_name'];
                $uLName = $row['user_last_name'];
                $email = $row['email'];
                $phone = $row['phone'];
                $nationality = $row['nationality'];
                $occupation = $row['occupation'];
                $picture = $row['user_picture'];
                $birthday = $row['user_birthday'];
              
            echo "
            <div class='col-md-3'>
              <div class='profile-img'>
              <label for='files'>
              <img src='img/$picture' id='image' alt='sing up image' style='width: 150px; height: 200px;'>
              <span class='browse_btn'><i class='fas fa-camera'></i></span><input type='file' name='file' id='files'>
                </label>
              </div>
            </div>
            

              <div class='row col-md-9 ml-1'>
                <div class='col-md-12'>
                  <h2><input type='text' name='newUname' value='$uname'></h2>
                  <textarea name='newBio' class='mx-auto'>$bio</textarea>
                </div>
              </div>
              </div>
          </div>
        
        <div class='card-body mt-0 mx-5'>
          <div class='row'>
            <div class='col-md-6'>
                <p>First Name</p>
            </div>
            <div class='col-md-6 my-auto'>
                <input type='text' name='newFName' value='$uFName' class='form-control'>
            </div>
          </div>
          <div class='row'>
            <div class='col-md-6'>
              <p>Last Name</p>
            </div>
            <div class='col-md-6 my-auto'>
            <input type='text' name='newLName' value='$uLName' class='form-control'>
            </div>
          </div>
          <div class='row'>
            <div class='col-md-6'>
              <p>E-mail</p>
            </div>
            <div class='col-md-6 my-auto'>
            <input type='text' name='newEmail' value='$email' class='form-control'>
            </div>
          </div>
          <div class='row'>
            <div class='col-md-6'>
              <p>Phone</p>
            </div>
            <div class='col-md-6 my-auto'>
            <input type='text' name='newPhone' value='$phone' class='form-control'>
            </div>
          </div>
          <div class='row'>
            <div class='col-md-6'>
              <p>Nationality</p>
            </div>
            <div class='col-md-6 my-auto'>
            <input type='text' name='newNationality' value='$nationality' class='form-control'>
            </div>
          </div>
          <div class='row'>
            <div class='col-md-6'>
              <p>Occupation</p>
            </div>
            <div class='col-md-6 my-auto'>
            <select name='newOccupation' class='form-control'>
              <option value='$occupation' selected>$occupation</option>
              <option value='公務員'>公務員</option>
              <option value='経営者・役員'>経営者・役員</option>
              <option value='会社員'>会社員</option>
              <option value='自営業'>自営業</option>
              <option value='自由業'>自由業</option>
              <option value='専業主婦'>専業主婦</option>
              <option value='パート・アルバイト'>パート・アルバイト</option>
              <option value='学生'>学生</option>
              <option value='その他'>その他</option>
            </select>
            </div>
          </div>
          <div class='row'>
            <div class='col-md-6'>
              <p>Birth Day</p>
            </div>
            <div class='col-md-6 my-auto'>
            <input type='date' name='newbirthday' value='$birthday' class='form-control'>
            </div>
          </div>
          <div class='row'>
            <div class='col-md-6'>
              <p>Password</p>
            </div>
            <div class='col-md-6 my-auto'>
            <input type='password' name='newPword' placeholder='Enter a New Password' class='form-control' required>
            </div>
          </div>
          <input type='hidden' name='userid' value='$userid'>
          ";
          }
          ?>
            
            <input type="submit" name="saveProfile" value="Save" class="btn btn-info float-right">
            <a href="about.php" class="btn btn-warning float-right">CANCEL</a>
          </form>
      </div>

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
