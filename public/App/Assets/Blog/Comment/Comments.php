<div class="commentary-section" id="<?php echo $this->data[0]->getBlogId(); ?>">
    <span>Коментарии</span>
    <?php

        foreach (array_reverse($this->data) as $comment) {
            ?>
            <div id="<?php echo $comment->getId(); ?>">
                <span>Коментарий:</span><br>
                <span class="comment-text"><?php echo $comment->getCommentText() ?></span><br><br>
            </div>
    <?php
        }
    ?>
</div>
