<div class="wrapper">
    <div class="main-image">
        <img src="<?=BASE_URL . $message['main_image']?>" alt="">
    </div>
    <div class="main-container">
        <section class="main-post">
            <div class="category-link colored-link">
                <a href="<?=BASE_URL .'category/'. $category['id_category']?>"><?=$category['name']?></a>
            </div>
            <div class="title">
                <h2><?=$message['title']?></h2>
            </div>
            <div class="text-block">
                <p><?=$message['first_text']?></p>
            </div>
            <div class="main-image second-image">
                <img src="<?=BASE_URL . $message['second_image']?>" alt="">
            </div>
            <div class="text-block">
                <p><?=$message['second_text']?></p>
            </div>
            <div class="article-social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                <a href="#"><i class="fab fa-tumblr"></i></a>
                <a href="#"><i class="fab fa-pinterest-p"></i></a>
            </div>
        </section>
    </div>
</div>

<div class="recommended">
    <div class="recommended-content">
        <h3>You may also like</h3>
        <div class="recommended-cards">
            <?foreach ($recommendedMessages as $recommendedMessage):?>
            <div class="recommended-card">
                <div class="recommended-card-image">
                    <a href="<?=BASE_URL .'article/'. $recommendedMessage['id_message']?>"><img src="<?=BASE_URL . $recommendedMessage['main_image']?>" alt=""></a>
                </div>
                <h4 class="recommended-card-title"><?=$recommendedMessage['title']?></h4>
            </div>
            <?endforeach;?>
        </div>
    </div>
</div>

<div class="main-container">
    <div class="comment-amount">
        <h4><?=$commentsAmount?> comments</h4>
    </div>
    <div class="comments">
        <?if ($user !== null):?>
            <div class="comment-item add-comment">
                <div class="comment-image">
                    <img src="<?=BASE_URL?>assets/images/user.png" alt="">
                </div>
                <div class="comment-content">
                    <form method="post">
                        <textarea name="text" placeholder="join the discussion" required></textarea>
                        <button type="submit"><img src="<?=BASE_URL?>assets/images/send-icon.png" alt=""></button>
                        <?foreach ($validateErrors as $err):?>
                            <p class="text-danger"><?=$err?></p>
                        <?endforeach;?>
                    </form>
                </div>
            </div>
        <?else:?>
            <div class="alert alert-primary mt-5" role="alert">
                Comments can leave only authorized users!
            </div>
        <?endif;?>
        <?foreach ($comments as $comment):?>
            <div class="comment-item">
                <div class="comment-image">
                    <img src="<?=BASE_URL?>assets/images/user.png" alt="">
                </div>
                <div class="comment-content">
                    <h5><?=$comment['username']?></h5>
                    <p><?=$comment['text']?></p>
                    <p><?=$comment['dt_add']?></p>
                </div>
                <?if($user !== null && $user['admin_status']):?>
                    <a href="<?=BASE_URL .'comment/delete/'. $comment['id_comment']?>"><button type="button" class="btn btn-danger">Delete</button></a>
                <?endif;?>
            </div>
        <?endforeach;?>
    </div>
</div>
