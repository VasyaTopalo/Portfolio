<?if(isset($messages[0])):?>
<div class="wrapper">
    <div class="main-image">
        <a href="<?=BASE_URL?>article/<?=$messages[0]['id_message']?>"><img src="<?=BASE_URL?><?=$messages[0]['main_image']?>" alt=""></a>
    </div>
    <div class="main-container">
        <section class="main-post">
            <div class="category-link colored-link">
                <a href="<?=BASE_URL?>category/<?=$messages[0]['id_category']?>"><?=getOneCategory($messages[0]['id_category'])['name']?></a>
            </div>
            <div class="title">
                <h2><?=$messages[0]['title']?></h2>
            </div>
            <div class="text-block">
                <p><?=$messages[0]['first_text']?></p>
            </div>
            <div class="leave-comment colored-link">
                <a href="<?=BASE_URL?>article/<?=$messages[0]['id_message']?>">Leave a comment</a>
            </div>
        </section>
        <section class="small-posts">
            <?for ($i = 1; $i <= 4; $i++):?>
                <?if(isset($messages[$i])):?>
                    <div class="small-post-item">
                        <div class="small-post-image">
                            <a href="<?=BASE_URL?>article/<?=$messages[$i]['id_message']?>"><img src="<?=BASE_URL?><?=$messages[$i]['main_image']?>" alt=""></a>
                        </div>
                        <div class="category-link colored-link"><a href="<?=BASE_URL?>category/<?=$messages[$i]['id_category']?>"><?=getOneCategory($messages[$i]['id_category'])['name']?></a></div>
                        <div class="title">
                            <h2><?=$messages[$i]['title']?></h2>
                        </div>
                        <div class="small-text-block">
                            <p><?=$messages[$i]['first_text']?></p>
                        </div>
                    </div>
                <?endif;?>
            <?endfor;?>
        </section>
    </div>
</div>

<div class="newsletter">
    <div class="newsletter-content">
        <h2>Sign up for our newsletter!</h2>
        <form method="post">
            <div class="newsletter-form">
                <input type="email" name="email" class="newsletter-input" placeholder="Enter a valid email address">
                <button type="submit"><img src="assets/images/send-icon.png" alt=""></button>
            </div>
        </form>
    </div>
</div>

<div class="main-container">
    <div class="small-posts" id="hidden-content">
        <?for ($i = 5; $i < 11; $i++):?>
            <?if(isset($messages[$i])):?>
                <div class="small-post-item">
                    <div class="small-post-image">
                        <a href="<?=BASE_URL?>article/<?=$messages[$i]['id_message']?>"><img src="<?=BASE_URL?><?=$messages[$i]['main_image']?>" alt=""></a>
                    </div>
                    <div class="category-link colored-link"><a href="<?=BASE_URL?>category/<?=$messages[$i]['id_category']?>"><?=getOneCategory($messages[$i]['id_category'])['name']?></a></div>
                    <div class="title">
                        <h2><?=$messages[$i]['title']?></h2>
                    </div>
                    <div class="small-text-block">
                        <p><?=$messages[$i]['first_text']?></p>
                    </div>
                </div>
            <?endif;?>
        <?endfor;?>
        <?if(isset($messages[12])):?>
            <div class="customized-button"><a href="<?=BASE_URL?>all/page/1">See all</a></div>
        <?endif;?>
    </div>
</div>

<?if(isset($messages[6])):?>
    <div class="customized-button" id="load-more-button">Load more</div>
<?endif;?>
<?endif;?>