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
                    <form action="login" method="post">
                        <div class="login-form-element">
                            <label for="username">Email:</label>
                            <input type="text" name="email" required>
                        </div>
                        <div class="login-form-element">
                            <label for="password">Password:</label>
                            <input type="password"  name="password" required>
                            <span class="forgot-password">Forgot password?</span>
                        </div>                                               
                        <div class="login-form-element">
                            <input type="submit">
                        </div>        
                        <div class="login-form-element"></div>
                        <div class="login-form-element">
                            <span class="no-account">No account? <span class='create-new'><a style = "color: inherit;text-decoration: none;" href="register">Create New</a></span></span>
                        </div>                                                
                    </form>
                </div>
            </div>
        </main>
  </body>
</html>