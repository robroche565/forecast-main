<?php
    require_once '../classes/account.class.php';
    require_once '../tools/functions.php';

    $page_title = 'Forecast - Login';

    //we start session since we need to use session values
    session_start();
    //creating an array for list of users can login to the system
    if(isset($_POST['username']) && isset($_POST['password'])){
        //Sanitizing the inputs of the users. Mandatory to prevent injections!
        $users = new Accounts;
        $users->username = htmlentities($_POST['username']);
        $users->password = htmlentities($_POST['password']);
        $res = $users->validate();
        if($res){
            $_SESSION['user'] = $res['id'];
            $_SESSION['logged-in'] = $res['username'];
            $_SESSION['fullname'] = $res['firstname'].' '.$res['lastname'];
            $_SESSION['user_type'] = $res['type'];
            if($res['type'] == 'admin'){
                header('location: ../admin/dashboard.php');
            }else{
                header('location: ../faculty/faculty.php');
            }
        }
        //set the error message if account is invalid
        $error = 'Invalid username/password. Try again.';
    }

    if(isset($_POST['save'])){

        $account = new Accounts();
        //sanitize user inputs
        $account->firstname = htmlentities($_POST['firstname']);
        $account->lastname = htmlentities($_POST['lastname']);
        $account->type = htmlentities($_POST['type']);
        $account->username = htmlentities($_POST['username']);
        $account->password = htmlentities($_POST['password']);
        if(validate_signup($_POST)){
            if($account->add()){
                //redirect user to program page after saving
                header('location: login.php');
            }
        }else{
            $user_taken = 'Username Already Taken.';
        }
    }

    require_once '../includes/header.php';

?>
    <div class="login-container">
        <form class="login-form" action="login.php" method="post">
            <div class="logo-details">
                <i class='bx bx-meteor'></i>
                <span class="logo-name">forecast</span>
            </div>
            <hr class="divider">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter username" required tabindex="1">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter password" required tabindex="2">
            <input class="button" type="submit" value="Login" name="login" tabindex="3">

            <div class="signup-login-box">
                <p>Still not registered?</p><a href="#" id="signup-show">SignUp Here</a>
            </div>

            <?php
                //Display the error message if there is any.
                if(isset($error)){
                    echo '<div><p class="error">'.$error.'</p></div>';
                }

            ?>
        </form>
    </div>
<?php
    require_once '../includes/footer.php';
?>

<div id="signup-modal">
        <div class="modal">
            <div class="top-form">
                <div class="close-modal">
                    &#10006;
                </div>
            </div>
            <div class="signup-form">
                <div class="logo-details">
                    <span class="logo-name">SignUp</span>
                </div>
                <hr class="divider">
                <form action="" method="post">
                    <input type="text" name="firstname" class="form-control" placeholder="Enter Firstname" required>
                    <input type="text" name="lastname" class="form-control" placeholder="Enter Lastname" required>
                    <input type="hidden" id="type" name="type" value="staff">
                    <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                    <button type="submit" value="create account" name="save" id="save">Create Account</button>
                    <?php
                        //Display the error message if there is any.
                        if(isset($user_taken)){
                            echo '<div><p class="error">'.$user_taken.'</p></div>';
                        }

                    ?>
                </form>
            </div>
        </div>
</div>

<script type="text/javascript">

    $(document).ready(function() {
        $(function(){
                $('#signup-show').click(function(){
                    $('#signup-modal').fadeIn().css('display', 'flex')
                });

                $('.close-modal').click(function(){
                    $('#signup-modal').fadeOut();
                });
            });
    });

</script>
