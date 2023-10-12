
<!DOCTYPE html>
<html>
	<head>
        
		<?php include('header.php') ?>
        <?php 
        session_start();
        if(isset($_SESSION['login_id'])){
            header('Location:home.php');
        }
        ?>
		<title>Login | Simple Online Quiz System</title>
	</head>

	<body id='login-body' class="bg-light" style="background-image: url('/ONLINE_QUIZ/image/IITB-lc-lh-l.jpeg'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed; background-position: center;">

        <div class="card col-md-6 offset-md-3 text-center bg-primary mb-4">
            <h3 class="he3-responsive text-white">Learning Management System(LMS)</h3>
        </div>
		<div class="card col-md-4 offset-md-4 mt-4" style="padding-left:0px;padding-right:0px;">
                <div class="card-header-edge text-white">
                    <strong>Login</strong>
                </div>
            <div class="card-body" >
                     <form id="login-frm">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="username" name="username" class="form-control" placeholder="Enter your username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password">
                        </div> 
                        <div class="form-group text-right">
                            <button class="btn btn-primary btn-block" name="submit">Login</button>
                        </div>
                        
                    </form>
            </div>
        </div>


    <!--    <footer style="background-color: #333; color: #fff; text-align: center; padding: 5px;margin-top:280px;">
        <p>&copy; Learning Management System. All rights reserved.</p>
        <p>Contact: <a href="mailto:contact@yourwebsite.com" style="color: #fff; text-decoration: none;">sachin576123@gmail.com</a></p>
    </footer> -->
		</body>

        <script>
            $(document).ready(function(){
                $('#login-frm').submit(function(e){
                    e.preventDefault()
                    $('#login-frm button').attr('disable',true)
                    $('#login-frm button').html('Please wait...')

                    $.ajax({
                        url:'./login_auth.php',
                        method:'POST',
                        data:$(this).serialize(),
                        error:err=>{
                            console.log(err)
                            alert('An error occured');
                            $('#login-frm button').removeAttr('disable')
                            $('#login-frm button').html('Login')
                        },
                        success:function(resp){
                            if(resp == 1){
                                location.replace('home.php')
                            }else{
                                alert("Incorrect username or password.")
                                $('#login-frm button').removeAttr('disable')
                                $('#login-frm button').html('Login')
                            }
                        }
                    })

                })
            })
        </script>
</html>