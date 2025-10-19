<?php include 'header.html'; ?>
<html>

<body>
    <?php
    $post_id = $_GET['post'];
    // grab post data from db using $post_id
    $post_data = [
        1,
        "Example Post Title",
        "Author Name",
        "01/01/2000",
        "This is the content of the post. It includes text, but we can have a good amount of it. BLAH BLAH BLAH. Computer, PC, parts, money, yeah yadda yadda yadda gthats fun to tyhpe yayy yipee!!!.",
        ["dog.jpg", "pc.jpg"],
        10,
        [["Omg love this", "Commenter One"], ["I hate you", "Commentor Two"], ["This is helpful", "Big Joe"], ["n9273bfuibnv861y3ubd8 238cyn82 yuic g c3afglg/; 43g;po6ygVITFW752F3B2LY N IU 3I7 yuj 53q u 5og8yubg34jhbyuu", "Little Joe"]]
    ]; // example data
    ?>

    <h1><?php echo $post_data[1]; ?></h1>
    <div class="post" style="text-align: center;">
        <div class="post_metadata" style="text-align: center; padding-bottom: 10px;">
            <span class="post_author"><?php echo $post_data[2] ?></span>
            -
            <span class="post_date"><?php echo $post_data[3] ?></span>
        </div>
        <div class="post_content">
            <span style="font-size: 1.25em"><?php echo $post_data[4] ?></span>
            <hr>
            <div class="post_images">
                <?php for ($i = 0; $i < count($post_data[5]); $i++): ?>
                    <img src="post_img/<?php echo $post_data[5][$i]; ?>" class="post_image"
                        style="max-width: calc(95%/<?php echo count($post_data[5]) ?>)">
                <?php endfor; ?>
            </div>
        </div>
        <div class="post_engagements" style="text-align: center; font-size: larger;">
            <button type="button" id="like_button">💚 <?php echo $post_data[6] ?></button>
            -
            <button type="button" id="comment_button"
                onclick="document.getElementById('comment_input').hidden = false">💬
                <?php echo count($post_data[7]) ?></button>

            <br><br>
            <div id="comment_input" hidden>
                <textarea id="comment_textarea" rows="4" cols="50"
                    placeholder="Write your comment here..."></textarea><br><br>
                <button type="button" id="submit_comment_button"
                    onclick="document.getElementById('comment_input').hidden = true">Submit Comment</button>
            </div>
        </div>
        <h2 style="text-align: center;">Comments:</h2>
        <?php for ($i = 0; $i < count($post_data[7]); $i++): ?>
            <div class="post_comment">
                <span class="comment_content"><?php echo $post_data[7][$i][0] ?></span>
                <div class="comment_author"><?php echo $post_data[7][$i][1] ?></div>
            </div>
        <?php endfor; ?>
    </div>