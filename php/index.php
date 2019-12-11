<?php include 'id.php';
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <title>Document</title>
</head>

<body>
    <?php
    $link = mysqli_connect("localhost", "root", "", "todo");
    
    //project table
    $sql = " SELECT * FROM projects  ORDER BY `timestamp` ASC";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) == true) : ?>
        <div class="table1">
            <?php foreach ($result as $row) : ?>
                <h2><a href="index.php?id=<?php echo $row['id'] ?>"> <?php echo $row['name'] ?> </a> </h2>
            <?php endforeach; ?>
            <form method="POST" action="index.php">
                <input type="text" name="project" placeholder="Name of the new project">
                <input class="name" type="submit" name="submit" value="ADD">
            </form>
        </div>
    <?php endif;
    if (isset($_POST['submit'])) {
        if (!isset($_POST['project'])) {
            echo "Please enter the information!";
            exit;
        } else {
            $project = $_POST['project'];
            $sq = "INSERT INTO projects(`name`) VALUES ('$project')";
            if (mysqli_query($link, $sq)) {
                echo "<br>Info added";
                header('Location:index.php');
            }
        }
    }
    //tasks table 

    $id = $_GET["id"];
    $_SESSION["id"] = "$id";
    $sl = " SELECT * FROM tasks WHERE project='$id'  ORDER BY `piority` ASC ";
    $res = mysqli_query($link, $sl);
    $row2 = mysqli_fetch_array($res);
    if (mysqli_num_rows($res) == true) : ?>
        <div class="table2">
            <?php foreach ($res as $row2) : ?>
                <h2 id="tasks"><a href="index.php? id2=<?php echo $row2['id'] ?>"><?php echo $row2['taskname'] ?> </a> </h2>
                <div id="hidden">
                    <h2><?php echo $row2['taskdescription'] ?></h2>
                    <h2><?php echo $row2['progration'] ?></h2>
                </div><?php endforeach; ?>

        </div> <?php endif;

                if ($_SESSION["id"] == true) : ?>
        <form method="POST" action="index.php">
            <input type="text" name="task" placeholder="Name of the new task">
            <input class="name" type="submit" name="submittask" value="ADD task">
        </form>
    <?php endif; echo $_SESSION["id"];
    if (isset($_POST['submittask'])) {
        
        if (empty($_POST['task'])) {
            echo "Please enter the information!";
           // exit;
        } else {
            $task = $_POST['task'];
            $id = $_SESSION["id"];
            $s = "INSERT INTO tasks(taskname, project) VALUES ('$task', '$id') ";
            if (mysqli_query($link, $s)) {
                echo "<br>Info added";
               // header('Location:index.php');
            }
        }
    }
    ?>

</body>
<script src="../js/show.js">
</script>

</html>