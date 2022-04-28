<body>
<div class="blog">
    <?php
        foreach ($data['posts'] as $post) {
            echo '<div class="post">';
            echo '<div class="head">';
            echo '<span class="time">'.$post->getDate().'</span>';
            echo '<span class="theme">'.$post->getTheme().'</span>';
            echo '</div>';
            if ($post->getImage() !== null) {
                echo '<img src="/assets/blog/res/'.$post->getImage().'"/>';
            }
            echo '<span class="main-text">'.$post->getText().'</span>';
            echo '</div>';

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
</body>
