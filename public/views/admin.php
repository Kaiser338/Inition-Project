<!DOCTYPE html>
<html>
  <head>
    <title>Inition</title>
    <link rel="stylesheet" type="text/css" href="public/styles/main-style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />   
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="scripts/main.js"></script>
  </head>
  <body>
        <nav>
            <div class="nav-title">
                <span class="nav-title-text">Inition</span>
            </div>
            <div class="long-line"></div>
            <ul class="nav-links">
                <li style = "color: white;"><a href="tasks">Tasks</a></li>
                <div class="line"></div>
                <li><a href="searchTask">Search</a></li>
                <div class="line"></div>
                <li><a href="newTask">New</a></li>
                <div class="line"></div>
                <li><a href="logout">Logout</a></li>
                <div class="line"></div>
            </ul>
        </nav>
        <main>
            <div class="admin-style">
            <div class="tasks-container">
            <table id="tableBody" class="dataTable no-footer" aria-describedby="tableBody_info" style="width: 777px;">
        <thead>
          <tr><th class="sorting sorting_asc" tabindex="0" aria-controls="tableBody" rowspan="1" colspan="1" style="width: 41px;" aria-label="ID: activate to sort column descending" aria-sort="ascending">ID</th><th class="sorting" tabindex="0" aria-controls="tableBody" rowspan="1" colspan="1" style="width: 221px;" aria-label="Nick: activate to sort column ascending">Username</th>
          <th class="sorting" tabindex="0" aria-controls="tableBody" rowspan="1" colspan="1" style="width: 58px;" aria-label="Ping: activate to sort column ascending">Email</th><th class="sorting" tabindex="0" aria-controls="tableBody" rowspan="1" colspan="1" style="width: 160px;" aria-label="SteamHex: activate to sort column ascending">Grupa</th><th class="sorting" tabindex="0" aria-controls="tableBody" rowspan="1" colspan="1" style="width: 97px;" aria-label="Zarządzaj: activate to sort column ascending">Zarządzaj</th></tr>
        </thead>
        <tbody>

        <?php if(count($users) > 0): ?>
            <?php foreach($users as $user): ?>
                <tr class="odd"><td class="sorting_1"><?= $user['id']?></td><td><?= $user['username']?></td><td><?= $user['email']?></td><td><?= $user['group']?></td><td>
                <form name="form1" id="form1" method="POST" action="/info"> 
                <input type="text" name="id" value="3" hidden="">  <input style = "width:5vw; height: 4vh;margin-bottom: 2vh;" type="submit"  value="Usuń"> </form>
            <?php endforeach; ?>
        <?php endif; ?>


       </table>                
            </div>  
</div>
        </main>  

  </body>
</html>