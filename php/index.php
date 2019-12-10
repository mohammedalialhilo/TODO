<!DOCTYPE html>
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
    $sql = " SELECT * FROM projects  ORDER BY `timestamp` ASC";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) == true) : ?>
        <table class="">
            <?php foreach ($result as $row) : $id = $row['ID'];?>
                <tr class="" onclick="showtask()" id ="<?php  echo $row['ID']  ?>">
                    <td><?php echo $row['name'] ?> </td>
                    <td><?php echo $row['ID']  ?>  </td>
                </tr> 
                <?php endforeach; ?>
        </table>
    <?php endif;
     echo $id;
    $sl = " SELECT * FROM tasks WHERE project='$id'  ORDER BY `piority` DESC ";
    $result = mysqli_query($link, $sl);
    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) == true) : ?>
        <table >
            <?php foreach ($result as $row) : ?><tr  id="tasks" >
                    <td><?php echo $row['taskname'] ?> </td>
                </tr>
                <tr ><td id=""><?php echo $row['taskdescription'] ?></td></tr>
                <tr ><td id=""><?php echo $row['progration'] ?></td</tr><?php endforeach; ?>
        </table>
    <?php endif;
    ?>

</body>
<script src="../js/show.js"></script>

</html>