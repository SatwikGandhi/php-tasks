<?php

    include('db_conn.php');

    $sql = 'SELECT title, details, id FROM task';

    $result = mysqli_query($conn, $sql);

    $tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
    <?php  include('header.php'); ?>

    <h4 class="center grey-text">Tasks!</h4>

    <div class="container">
        <div class="row">
            <?php foreach($tasks as $task){?>
                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($task['title']); ?></h6>
                            <div><?php echo htmlspecialchars($task['details']); ?></div>
                        </div>
                        <div class="card-action right-align">
                            <a class="brand-text" href="details.php?id=<?php echo $task['id']?>">more info</a>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
    
    <?php  include('footer.php'); ?>
</html>
