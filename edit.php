<?php
require_once 'inc/header.php';
require_once 'inc/connection.php';
require_once 'App.php';

if ($requestobject->checkget("id")) {
    $id = $requestobject->get("id");

    // Prepare the SQL statement with a parameter placeholder
    $stmt = $conn->prepare("SELECT title FROM do WHERE id = :id");
    $stmt->bindParam(':id', $id); // Bind the parameter value
    $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $note = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<body class="container w-50 mt-5">
    <form action="handle/edit.php?id=<?php echo $id ?>" method="post">
        <?php
        // Session show data
        require_once 'inc/errors.php';
        ?>

        <textarea class="form-control" name="title" placeholder="Enter your note here"><?php echo $note['title'] ?></textarea>
        <div class="text-center">
            <button type="submit" name="submit" class="form-control text-white bg-info mt-3">Update</button>
        </div>
    </form>
</body>

<?php
        } else {
            $sessionobject->set('errors', ["Error while updating"]);
            $requestobject->header("index.php");
        }
    
} else {
    $sessionobject->set('errors', ["Error while updating"]);
    $requestobject->header("index.php");
}
?>
</html>