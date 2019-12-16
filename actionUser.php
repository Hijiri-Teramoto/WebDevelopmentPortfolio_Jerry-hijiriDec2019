<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<?php
    require_once 'class/User.php';
    $user = new User;
    
    session_start();
    

    if(isset($_POST['signup'])){
        $username = $_POST['name'];
        $email = $_POST['email'];
        $password = md5($_POST['pass']);

        $user->register($username, $email, $password);
    }else if(isset($_POST['signin'])){
        $yourName = $_POST['your_name'];
        $yourPass = md5($_POST['your_pass']);

        $login = $user->login($yourName, $yourPass);

        if($login){
            foreach($login as $row){
                $_SESSION['userid'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['user_picture'] = $row['user_picture'];                
                
                header("Location: index.php");
            }
        }else{
            // header("Location: register&login/login.php");
            echo "
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>INVALID USERNAME OR PASSWORD</strong>
            <button type='button' class='Close'  aria-label='Close'>
              <span aria-hidden='true'><a href='register&login/login.php' style='text-decoration: none;color: gray;'>&times;</a></span>
            </button>
            </div>
            <figure><img src='register&login/images/lantern-3713468_1280.jpg' alt='sing up image' class='col-md-12'></figure>
          ";
        }

    }else if($_GET['actiontype']=='logout'){
        $userid = $_GET['userid'];
        session_unset();
        session_destroy();

        header("Location: register&login/login.php");
        
    }else if(isset($_POST['saveProfile'])){
        $userid = $_POST['userid'];
        $uname = $_POST['newUname'];
        $bio = $_POST['newBio'];
        $uFName = $_POST['newFName'];
        $uLName = $_POST['newLName'];
        $email = $_POST['newEmail'];
        $phone = $_POST['newPhone'];
        $nationality = $_POST['newNationality'];
        $occupation = $_POST['newOccupation'];
        $birthday = $_POST['newbirthday'];
        $pword = md5($_POST['newPword']);

        $image_name = $_FILES['file']['name'];
        
        $target_dir = "img/";
        
        echo $image_name;
        $target_file = $target_dir.basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'],$target_file);
        $user->updateProfile($userid, $uname, $bio, $uFName, $uLName, $email, $phone, $nationality, $occupation, $pword, $image_name, $birthday);
       
    }
?>

<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>