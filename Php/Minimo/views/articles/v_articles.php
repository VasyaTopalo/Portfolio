<div class="wrapper">
    <h3 class="title" align="center">All posts</h3>
    <div class="main-container">
        <div class="small-posts">
            <?for ($i = $pagesDivider * ($currantPage - 1); $i < $currantPage * $pagesDivider; $i++):?>
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
        </div>
    </div>

    <div class="pagination">
        <ul class="pagination-list">


            <?for($p = $currantPage - 4; $p < $currantPage + 3; $p++):?>
                <?if($p >= 0 && $p < $pagesAmountForButtons):?>
                    <?if($p == $currantPage - 1):?>
                        <li class="pagination-item pagination-item-active"><a href="<?=BASE_URL?>all/page/<?=$p + 1?>"><?=$p + 1?></a></li>
                    <?else:?>
                        <li class="pagination-item"><a href="<?=BASE_URL?>all/page/<?=$p + 1?>"><?=$p + 1?></a></li>
                    <?endif;?>
                <?endif;?>
            <?endfor;?>

        </ul>
    </div>
</div>
