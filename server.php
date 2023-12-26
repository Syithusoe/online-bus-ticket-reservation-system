<?php

session_start();


//initializing variables

$username = "";
$email    = "";
$tel      = "";
$errors = array();

//connect to the database

$db = mysqli_connect('localhost', 'root', '', 'bus_reservation_system');



//register user
if(isset($_POST['register_user'])){
    //receive all the information from the form

    $username = mysqli_real_escape_string($db,$_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $tel=mysqli_real_escape_string($db,$_POST['tel']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    //form validation : ensure the form is correctly filled

    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($tel)){ array_push($errors,"Phone Number is required");}
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }


//first check the database to make sure
//a user does not already exit with the same username or same email

    $user_check_query = "SELECT * FROM user_data WHERE username='$username' OR email='$email' OR tel='$tel' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }

    //finally register the user if there is no error in the form

    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database

        $query = "INSERT INTO user_data (username, email,tel, password) 
                  VALUES('$username', '$email','$tel','$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        header('location: login.php ');
    }
    }

//...........................................

//LOGIN USER

    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }

    /*    if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM user_data WHERE username='$username' AND password='$password'";
            $results = mysqli_query($db, $query);


           if(mysqli_num_rows($results) == 1) {
                $_SESSION['username'] = $username;
                if(isset($_POST['redirect'])){
                    $link = "location:".$_POST['redirect'].".php";
                    if(isset($_POST['bid'])){
                        $link = $link . "?bid=" .$_POST['bid'];
                    }
                    header($link);
                }
               
                else{
                    header("location:index.php");
                }
           
            }
            else {
                array_push($errors, "Wrong username/password combination");
            }
        }*/   

        if(count($errors==0)){
            $password=md5($password);
            $sql="select * from user_data where username='$username' and password='$password'";
            $res= $db->query($sql);
            if ($res->num_rows>0) {
                $row=$res->fetch_assoc();
                $name=$row['userlevel'];
                $_SESSION['username'] = $username;
            }
            if(isset($_POST['redirect'])){
                    $link = "location:".$_POST['redirect'].".php";
            if(isset($_POST['bid'])){
                        $link = $link . "?bid=" .$_POST['bid'];
                    }
                    header($link);
                }
            

            if($name=='admin')
                header("location:admin/main.php");   
            else
                header("location:index.php");

            

        }
        
    }
    mysqli_close($db);

?>