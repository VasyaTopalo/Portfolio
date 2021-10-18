<div class="wrapper">
    <div class="main-container">
        <h2 class="title">All posts from category <?=ucfirst($categoryName)?></h2>
        <section class="small-posts">
            <?foreach ($messages as $message):?>
                <div class="small-post-item">
                    <div class="small-post-image">
                        <a href="<?=BASE_URL?>article/<?=$message['id_message']?>"><img src="<?=BASE_URL?><?=$message['main_image']?>" alt=""></a>
                    </div>
                    <div class="category-link colored-link"><a href="<?=BASE_URL?>category/<?=$message['id_category']?>"><?=$categoryName?></a></div>
                    <div class="title">
                        <h2><?=$message['title']?></h2>
                    </div>
                    <div class="small-text-block">
                        <p><?=$message['first_text']?></p>
                    </div>
                </div>
            <?endforeach;?>
        </section>
    </div>
</div>