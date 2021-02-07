<?php
session_start();
require_once 'DBBlackbox.php';
?>
<html>

<head>
    <title>Movie Database</title>
</head>

<body>

    <?php
    if (isset($_SESSION['messages']) && count($_SESSION['messages']) > 0) :
        foreach ($_SESSION['messages'] as $msg) {
    ?>
            <div><strong><?= $msg ?></strong></div>
    <?php
        }
        unset($_SESSION['messages']);
    endif;
    ?>

    <h1>Coding Bootcamp Movie Database</h1>

    <div id="menu">
        <a href="index.php">Homepage</a>
        <a href="index.php?page=add">Add movie</a>
        <a href="index.php?page=browse">Browse movies</a>
        <a href="index.php?page=about">About a project</a>
    </div>

    <?php if (isset($_GET['page']) && ($_GET['page'] == "add" || $_GET['page'] == "edit")) { ?>

        <?php
        if ($_GET['page'] == "edit") {
            $is_edit = true;
            $movie = find($_GET['id']);
            $button_text = "Edit";
            $id = $_GET['id'];
        } else {
            $is_edit = false;
            $movie['name'] = '';
            $movie['description'] = '';
            $movie['year'] = '';
            $button_text = "Add";
            $id = null;
        }
        ?>

        <?php if ($is_edit) { ?>
            <p>Edit <?= $movie['name'] ?> here.</p>
        <?php } else { ?>
            <p>Add your movie here.</p>
        <?php } ?>

        <form action="handler.php" method="POST">
            <input type="hidden" id="id" value="<?= $id ?>">
            <p>Movie name: <input type="text" value="<?= $movie['name'] ?>" name="name" /></p>
            <p>Movie description: <input type="text" value="<?= $movie['description'] ?>" name="description" /></p>
            <p>Year: <input type="text" value="<?= $movie['year'] ?>" name="year" /></p>
            <p><input type="submit" value="<?= $button_text ?> Add the movie!" /></p>
        </form>

    <?php } elseif (isset($_GET['page']) && $_GET['page'] == "browse") { ?>

        <p>Movie database:</p>
        <?php
        $movies = select();
        foreach ($movies as $id => $movie) {
        ?>
            <p><?= $movie['name'] ?> <a href="index.php?page=edit&id=<?= $id ?>">edit</a></p>
        <?php
        }
        ?>

    <?php } elseif (isset($_GET['page']) && $_GET['page'] == "about") { ?>

        <p>About this movie database</p>

    <?php } else { ?>

        <p>Welcome to CBMD.</p>

    <?php } ?>
</body>

</html>