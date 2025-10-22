<?php include 'header.html';
$content = $_GET['content'];
?>
<html>

<body>
    <h1>Create a New Post</h1>
    <div style="text-align: center"><input type="text" id="new_post_title" placeholder="Post Title"></div><br>
    <div class="post" style="text-align: center;">
        <textarea id="new_post_textarea" autocomplete="off"
            placeholder="Write your post content here..."><?php echo $content; ?></textarea>
        <br><br>
        <input type="file" id="post_image_upload" multiple autocomplete="off" accept="image/*">
        <br><br>
        <button type="button" id="submit_post_button" onclick="newPost()">Submit Post</button>
        <br><br>
    </div>
</body>