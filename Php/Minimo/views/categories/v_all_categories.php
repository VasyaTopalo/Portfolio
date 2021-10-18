<div class="wrapper">
    <div class="main-container">
        <?foreach ($categories as $category) :?>
        <?if(isset(getOneCategoryMessages($category['id_category'])[0])):?>
            <h2 class="title"><?=ucfirst(getOneCategory($category['id_category'])['name'])?></h2>
            <section class="small-posts small-posts-in-category">
                <?foreach (array_slice(getOneCategoryMessages($category['id_category']), 0,  2) as $message):?>
                    <div class="small-post-item">
                        <div class="small-post-image">
                            <a href="<?=BASE_URL?>article/<?=$message['id_message']?>"><img src="<?=BASE_URL?><?=$message['main_image']?>" alt=""></a>
                        </div>
                        <div class="category-link colored-link"><a href="<?=BASE_URL?>category/<?=$message['id_category']?>"><?=ucfirst(getOneCategory($category['id_category'])['name'])?></a></div>
                        <div class="title">
                            <h2><?=$message['title']?></h2>
                        </div>
                        <div class="small-text-block">
                            <p><?=$message['first_text']?></p>
                        </div>
                    </div>
                <?endforeach;?>
            </section>
        <?endif;?>
        <?endforeach;?>
    </div>
</div>