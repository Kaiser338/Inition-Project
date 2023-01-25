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
    <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
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
                <?php 
                if ($is_admin){
                    echo "<li><a href='admin'>Admin</a></li>";
                    echo  "<div class='line'></div>";    
                }
                ?>        
            </ul>
        </nav>
        <main>
            <div class="tasks-container">
                <div class="tasks-container-title">
                    <span class="tasks-container-title-text">Tasks list</span>
                </div>
                <div class="tasks-container-date">
                    <span class="tasks-container-date-today">Today</span>
                    <span class="tasks-container-date-text"><?php echo date('Y-m-d', strtotime('today')) ?></span>
                </div>              
                <div class="tasks-container-table">

                    <?php if(count($tasks) > 0): ?>
                    <?php foreach($tasks as $task): ?>
                        <div class="tasks-container-task">
                            <label class="container">
                            <input type="checkbox" onchange="onChange(this)" value="<?= $task['id']?>"<?= $task['done'] ? 'checked="checked"' : '' ?>>
                                <span class="checkmark"></span>
                            </label>
                            <span class="task-container-task-text"><?= $task['task_name']?></span>
                        </div>
                        <div class="task-line"></div>
                    <?php endforeach; ?>
                    <?php endif; ?>

                </div>      
                
                <div class="tasks-container-date">
                    <span class="tasks-container-date-today"></span>
                    <span class="tasks-container-date-text"><?php echo date('Y-m-d', strtotime('tomorrow')) ?></span>
                </div>   

                <div class="tasks-tommorow-table">
                    <div class="tasks-tommorow-list">
                        <?php if(count($tasks_tommorow) > 0): ?>
                            <?php foreach($tasks_tommorow as $task): ?>
                                <div class="tasks-container-task-tommorow">
                                    <span class="material-symbols-outlined" style = "color: rgba(0, 0, 0, 0.705);">adjust</span>
                                    <span class="tasks-container-task-tommorow-text"><?= $task['task_name']?></span>  
                                </div>                          
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </div>
                </div>
                
            </div>  
                
        </main>  
        <script type="text/javascript">

            function onChange(element) {
                axios.post('changeTask', {
                    id: element.value,
                    checked: element.checked
                })
                .then(function (response) {
                })
                .catch(function (error) {
                    console.log(error);
                });
            }

        </script>   
  </body>
</html>