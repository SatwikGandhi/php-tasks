<?php

    include('db_conn.php');

    $title = $details = '';
    $errors = array('title'=>'', 'details'=>'');

    if(isset($_POST['submit'])){
        if(empty($_POST['title'])){
            $errors['title'] = 'A title is required';
        }else{
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
                $errors['title'] = 'Title must be letters and spaces only!!';
            }
        }
        if(empty($_POST['details'])){
            $errors['details'] = 'Task details are required';
        }else{
            $details = $_POST['details'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $details)){
                $errors['details'] = 'details must be letters and spaces only!!';
            }
        }
        if(array_filter($errors)){
            
        }else{
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $details = mysqli_real_escape_string($conn, $_POST['details']);
            $sql = "INSERT INTO task(title, details) VALUES('$title', '$details')";
            if(mysqli_query($conn, $sql)){
                header('Location: index.php');
            } else {
                echo 'query error: ' . mysqli_error($conn);
            }

        }
    }

?>

<!DOCTYPE html>
<html>
    <?php  include('header.php'); ?>
        <section class="container grey-text">
            <h4 class="center">Add a Task</h4>
            <form action="add.php" class="white" method="POST">
                <label>Title</label>
                <input type="text" name="title" value="<?php echo htmlspecialchars($title)?>">
                <div class="red-text"><?php echo $errors['title']; ?></div>
                <label>Details</label>
                <input type="text" name="details" value="<?php echo htmlspecialchars($details)?>">
                <div class="red-text"><?php echo $errors['details']; ?></div>
                <div class="center">
                    <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
                </div>
            </form>
        </section>
    <?php  include('footer.php'); ?>
</html>
