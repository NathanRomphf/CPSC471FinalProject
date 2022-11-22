<!DOCTYPE html>

<html>
    <head>
        <title>To Do</title>

        <link rel="stylesheet" href="styles/general.css">
        <link rel="stylesheet" href="styles/to-do-list.css">
    </head>

    <body>
        <header class="header">
            <a class="header-link" href="index.php">
                <div class="header-tab">
                    <div>Log Out</div>
                </div>
            </a>
            <div class="selected-header-tab">
                <div>My Schedule</div>
            </div>
            <a class="header-link" href="view-schedules.php">
                <div class="header-tab">
                    <div>View Schedules</div>
                </div>
            </a>
        </header>

        <nav class="sidebar">
            
            <a class="sidebar-link" href="my-schedule-weekly.php">
                <div class="sidebar-tab">
                    <div>Weekly Schedule</div>
                </div>
            </a>
            <a class="selected-link" href="to-do-list.php"> <div class="selected-sidebar-tab">
                <div>To Do List</div>
            </div> </a>
            <a class="sidebar-link" href="assignments.html">
                <div class="sidebar-tab">
                    <div>Assigments</div>
                </div>
            </a>
            <a class="sidebar-link" href="exams.html">
                <div class="sidebar-tab">
                    <div>Exams</div>
                </div>
            </a>
            <a class="sidebar-link" href="courses.html">
                <div class="sidebar-tab">
                    <div>Courses</div>
                </div>
            </a>
        </nav>

        <main>
            <form method="post">
                <input class="add-task-box" type="text" name="task" placeholder="Task Name"><br>
                <input class="add-task-button" type="submit" value="Add Task">
            </form>
        </main>
    </body>

    <?php
        session_start();
        $con = new mysqli("localhost","admin","cpsc471","471_Final_Project");
        //create database connection

        if ($con->connect_error) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $task = $con->prepare("INSERT INTO Tasks (ListID, Task) VALUES (?, ?)");
        $task->bind_param("ss", $_SESSION['to-do-list-id'], $_POST['task']);
        $task->execute();
    ?>
</html>