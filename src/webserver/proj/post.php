<?php include 'header.html';
$post_id = $_GET['post'];
?>
<html>

<body>
    <h1 id="post_title"></h1>
    <div class="post" style="text-align: center;">
        <div class="post_metadata" id="post_metadata" style="text-align: center; padding-bottom: 10px;"></div>
        <div class="post_content">
            <span id="post_text_content" style="font-size: 1.25em"></span>
            <hr>
            <div id="post_images" class="post_images"></div>
        </div>
        <div class="post_engagements" style="text-align: center; font-size: larger;">
            <button type="button" id="like_button">💚 </button>
            -
            <button type="button" id="comment_button"
                onclick="document.getElementById('comment_input').hidden = false">💬
            </button>
            <br><br>
            <div id="comment_input" hidden>
                <textarea id="comment_textarea" rows="4" cols="50"
                    placeholder="Write your comment here..."></textarea><br><br>
                <button type="button" id="submit_comment_button"
                    onclick="document.getElementById('comment_input').hidden = true">Submit Comment</button>
            </div>
        </div>
        <h2 style="text-align: center;">Comments:</h2>
        <div id="comments_section">
        </div>
    </div>
</body>
<script>
    populatePost(<?php echo $post_id; ?>);
</script>