<body>
<div class="blog">
    <?php
        foreach ($data['posts'] as $post) {
            echo '<div class="post" id="'.$post->getId().'">';
            echo '<div class="head">';
            echo '<span class="time">'.$post->getDate().'</span>';
            echo '<span class="theme">'.$post->getTheme().'</span>';
            echo '</div>';
            if ($post->getImage() !== null) {
                echo '<img src="/assets/blog/res/'.$post->getImage().'"/>';
            }
            echo '<span class="main-text">'.$post->getText().'</span>';
            echo '</div>';
            ?>
            <form class="comment-form" method="POST" id="<?php echo $post->getId() ?>">
                <label>Прокомментировать</label>
                <input type="text" name="comment_text">
                <input type="submit">
            </form>
            <?php

        }
    ?>
    <?php
    echo '<div class="btn-block">';
    $previousPage = $data['currentPage'] - 3;

    if ($previousPage > 0) {
        echo '<a class="btn" href="' . 1 . '">' . 1 . '</a>';
        if ($previousPage > 1) {
            echo '<span> ... </span>';
        }
    }

    $previousPage += 1;

    if ($previousPage > 0) {
        echo '<a class="btn" href="' . $previousPage . '">' . $previousPage . '</a>';
    }

    $previousPage += 1;

    if ($previousPage > 0) {
        echo '<a class="btn" href="' . $previousPage . '">' . $previousPage . '</a>';
    }

    echo '<a class="current-page" href="' . $data['currentPage'] .'">' . $data['currentPage'] . '</a>';

    $nextPage = $data['currentPage'] + 1;

    if ($nextPage <= $data['maxPage']) {
        echo '<a class="btn" href="' . $nextPage . '">' . $nextPage . '</a>';
    }

    $nextPage += 1;

    if ($nextPage <= $data['maxPage']) {
        echo '<a class="btn" href="' . $nextPage . '">' . $nextPage . '</a>';
    }

    $nextPage += 1;

    if ($nextPage < $data['maxPage']) {
        echo ' ... ';

    }

    if ($data['currentPage'] !== $data['maxPage'] && $nextPage < $data['maxPage'] + 1) {
        echo '<a class="btn" href="' . $data['maxPage'] . '">' . $data['maxPage'] . '</a>';
    }

    echo '</div>';
    ?>
</div>
<script>
    let commentForms = document.querySelectorAll('.comment-form');
    console.log(commentForms);

    let currentBlogPosts = document.querySelectorAll('.post');

    console.log(currentBlogPosts);

    (async () => {
        for (let blog of currentBlogPosts) {
            let response = await fetch(`http://127.0.0.1:80/getcomments/${blog.id}`);

            let result = await response.text();

            blog.insertAdjacentHTML('afterend', result);
        }
    })();


    for (let form of commentForms) {
        form.addEventListener('submit', async (event) => {
            event.preventDefault();

            let blogId = form.id;
            let commentText = form.children[1].value;

            let json = {
                "commentText": commentText,
                "blogId": blogId
            }

            let response = await fetch('http://127.0.0.1:80/postcomment', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json;charset=utf-8;'
                },
                body: JSON.stringify(json)
            });

            let result = await response.text();

            let blogPost = document.querySelectorAll(`.commentary-section`);

            for (let blog of blogPost) {
                if (blogId === blog.id) blog.insertAdjacentHTML('afterbegin', result);
            }
        })
    }
</script>
</body>
