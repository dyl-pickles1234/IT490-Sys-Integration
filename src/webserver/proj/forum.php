<?php include 'header.html'; ?>
<html>

<body>
    <h1>Forum</h1>

    <div style="text-align: center;"><a href="new_post.php" style="font-size: 1.25em">➕ Create a New Post</a></div><br>

    <?php
    // grab forum posts from db
    // do in pages
    $posts_on_page = [
        [1, "Title of a Really Cool Post", "Author Name", "01/01/2000", 10, 3],
        [3, "Title of a Second, Even Cooler Post", "Different Author", "01/01/2000", 0, 1]
    ]; // ex
    ?>

    <?php for ($i = 0; $i < count($posts_on_page); $i++): ?>
        <div class="forum_post_list_item">
            <span class="post_list_title">
                <a href="post.php?post=<?php echo $posts_on_page[$i][0] ?>">
                    <?php echo $posts_on_page[$i][1] ?>
                </a>
            </span>
            <div style="display: inline; float: right; padding-top: 3;">
                <span class="post_list_author"><?php echo $posts_on_page[$i][2] ?></span>
                <span class="post_list_date"><?php echo $posts_on_page[$i][3] ?></span>
                <span class="post_list_engagements">
                    💚 <?php echo $posts_on_page[$i][4] ?> |
                    💬 <?php echo $posts_on_page[$i][5] ?>
                </span>
            </div>
        </div>
    <?php endfor; ?>
</body>