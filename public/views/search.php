<!DOCTYPE html>
<html>
  <head>
    <title>Inition</title>
    <link rel="stylesheet" type="text/css" href="public/styles/main-style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />   
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  </head>
  <body>
        <nav>
            <div class="nav-title">
                <span class="nav-title-text">Inition</span>
            </div>
            <div class="long-line"></div>
            <ul class="nav-links">
                <li><a href="tasks">Tasks</a></li>
                <div class="line"></div>
                <li style = "color: white;"><a href="searchTask">Search</a></li>
                <div class="line"></div>
                <li style = "color: white;"><a href="newTask">New</a></li>
                <div class="line"></div>
                <li><a href="logout">Logout</a></li>
                <div class="line"></div>
            </ul>
        </nav>
        <main>
            <div class="search-title">Search Tasks</div>
            
            <form action="action">
                <div class="search-container">
                
                    <div class="search-element">
                        <span class="search-element-title">Date</span>
                        <input type="date" name="bday" />                                                            
                    </div>
                    <div class="search-element">
                        <span class="search-element-text">OR</span>
                    </div>
                    <div class="search-element">
                        <div class="search-element">
                            <span class="search-element-title">Task name</span>
                            <input type="text" name="task-name" />                                                            
                        </div>
                    </div>
                    <div class="search-element"></div>
                    <div class="search-element">
                        <input type="submit" value="SEARCH">
                    </div>
            
                </div>
            </form> 
        </main>     
  </body>
</html>