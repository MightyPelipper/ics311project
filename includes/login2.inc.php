<?php



if(isset($_POST['submit'])) {

    include 'dbh.inc.php';

    $uid = $_POST['username'];
    $pwd = $_POST['password'];

    //error handlers

    //check if inputs are empty
    if(empty($uid) || empty($pwd)) {
        header("Location: ../login.php?login=emptyfields");
        exit();
    }

    else {
        $sql = "SELECT * FROM Users WHERE user_uid=? or user_email=?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){

            header("Location: ../login.php?error=sqlerror");
            exit();
        }

        else{
            mysqli_stmt_bind_param($stmt, "ss", $uid, $uid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($pwd, $row['user_pwd']);

                if($pwdCheck == false){
                    header("Location: ../login.php?error=wrongpassword");
                    exit();
                }

                elseif($pwdCheck == true ){

                    session_start();
                    $_SESSION['userId']= $row['user_id'];
                    $_SESSION['userUid']= $row['user_uid'];

                    header("Location: ../adminmenu.php?login=Succsess");
                    exit();

                    


                }

                else{
                    header("Location: /login.php?error=wrongpass");
                    exit();
                }


            }

            else{
                header("Location: ../login.php?error=nouser");
                exit();
            }


        }
    }


    
}  
    