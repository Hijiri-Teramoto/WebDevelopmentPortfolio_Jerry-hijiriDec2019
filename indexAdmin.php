<?php
    require_once 'class/User.php';
    $user = new User;   
    $viewUser = $user->viewUsers();
    $viewCategory = $user->viewCategory();
    // print_r($viewCategory);
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
<style>
td, th {
  padding: 5px 10px;
}
 
thead th {
  background: #110303;
  color: #fff;
}
 
tbody tr {
  border-bottom: 1px dotted #D8D5D5;
}
 
tbody td {
  border-width: 0px 1px;
  -webkit-transition: background-color .1s linear;
  -moz-transition: background-color .1s linear;
  transition: background-color .1s linear;
}
 
tbody tr:first-child {
  border-top: none;
}
 
tbody tr.even td {
  background: #fbfbfb;
}

tbody tr.clickable:hover td {
  background: #ecf2fa;
  cursor: pointer;
}
</style>


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
            <h1>Clean Blog</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="col-xs-8 col-lg-12 mx-auto border">
      <div class="row">
        <div class="col-lg-4 mr-5">
          <h2>Categories</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Categorie Name</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                      foreach($viewCategory as $row){
                        $categoryid = $row['category_id'];
                        echo "
                        <tr>
                          <td>$categoryid</td>
                          <td>".$row['category']."</td>
                          <td><a href='actionUser.php?actiontype=deleteCategory&id=$categoryid' class='btn btn-danger p-2 rounded'><i class='fas fa-trash-alt fa-lg'></i></a></td>
                        </tr>
                        ";

                      }
                    ?>
                    <tr>
                      <form action="actionUser.php" method="post">
                      <td><button type="submit" name="getCategory" class='btn btn-info rounded' style="padding: 1px 3px;"><i class="fas fa-plus-square fa-2x"></i></button></td>
                      <td><input type="text" name="categoryName" placeholder="Category Name" class="form-control"></td>
                      <td></td>
                      </form>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-7">
          <table class="table">
            <h2>Uses</h2>
                <thead>
                    <tr>
                        <th></th>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Register</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach($viewUser as $row){
                      $avatarPicture = $row['user_picture'];
                      $userid = $row['user_id'];
                      echo "
                      <tr data-href='userDetailAdmin.php?specID=$userid'>
                        <td>$userid</td>
                        <td><a href='userDetailAdmin.php?specID=$userid'><img src='img/$avatarPicture' class='rounded-circle' style='width: 40px; height: 40px;'></a></td>
                        <td>".$row['username']."</td>
                        <td data-bind='text: text()' class='text-truncate' style='max-width: 100px;'>".$row['email']."</td>
                        <td>".$row['registrationDate']."</td>
                        <td><a href='actionUser.php?actiontype=deleteUser&id=$userid' class='btn btn-danger p-2 rounded'><i class='fas fa-trash-alt fa-lg'></i></a></td>
                        <td><a href='userDetailAdmin.php?specID=$userid'><i class='fas fa-external-link-alt'></i></a></td>
                      </tr>
                      ";
                    }
                    ?>
                </tbody>
            </table>
                <h4 class="form-title">Sign up</h4>
                        <form action="actionUser.php" method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Username" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" class="form-control"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="register" id="signup" class="btn btn-info p-3" value="Register"/>
                            </div>
                        </form>
                    </div>
        </div>

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

    <!-- table scripts for tables -->
 <script src="./jquery.min.js"></script>
<script>
jQuery( function($) {
    $('tbody tr[data-href]').addClass('clickable').click( function() {
        window.location = $(this).attr('data-href');
    }).find('a').hover( function() {
        $(this).parents('tr').unbind('click');
    }, function() {
        $(this).parents('tr').click( function() {
            window.location = $(this).attr('data-href');
        });
    });
});
</script>

</body>

</html>
