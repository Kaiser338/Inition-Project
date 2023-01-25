<!DOCTYPE html>
<html>
  <head>
    <title>Inition</title>
    <link rel="stylesheet" type="text/css" href="public/styles/login-register.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
  </head>
  <body>
        <main>
            <div class="main-container">
                <div class="container-title">
                    <span class="container-title-text">
                        Inition
                    </span>
                </div>
                <div class="login-form">               
                    <form action="registerForm" method="post">
                        <div class="register-form-element">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username">
                        </div>
                        <div class="register-form-element">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password">
                        </div>          
                        <div class="register-form-element">
                            <label for="repassword">Retype password:</label>
                            <input type="password" id="repassword" name="repassword">
                        </div>      
                        <div class="register-form-element">
                            <label for="email">Email:</label>
                            <input type="text" id="email" name="email">
                        </div>        
                        <div class="register-form-element"></div>                                 
                        <div class="register-form-element">
                            <input type="submit">
                        </div>                                                    
                    </form>
                </div>
            </div>
        </main>    
        
        <script type="text/javascript">
            document.getElementById("registerForm").addEventListener('submit', function (e) {
                e.preventDefault();
                fetch('api.php?p=register', {
                    method: 'post',
                    body: new FormData(this),
                }).then((response) => response.json()).then((data) => {
                    console.log(data);
                })
            })
        </script>
  </body>
</html>