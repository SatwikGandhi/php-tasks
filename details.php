<?php
    include('db_conn.php');
    if(isset($_POST['delete'])){
        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
        $sql = "DELETE FROM task WHERE id = $id_to_delete";
        if(mysqli_query($conn, $sql)){
            header('Location:index.php');
        } else {
            echo 'quey error : ' . mysqli_error($conn);
        }
    }
    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT * FROM task WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        $task = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        mysqli_close($conn);
    }
?>
<!DOCTYPE html>
<html>
    <?php  include('header.php'); ?>

    <div class="container center">
        <?php if($task){?>
            <h4><?php echo htmlspecialchars($task['title']);?></h4>
            <p><?php echo htmlspecialchars($task['details']);?></p>
            <p><?php echo htmlspecialchars($task['created at']);?></p>
            <form action="details.php" method="POST">
                <input type="hidden" name="id_to_delete" value="<?php echo $task['id'];?>">
                <input type="submit" name="delete" value="delete" class="btn brand z-depth-0">
            </form>
        <?php } else { 
            echo 'No such task exists!!'?>
        <?php }?>
    </div>

    <?php  include('footer.php'); ?>

</html>
