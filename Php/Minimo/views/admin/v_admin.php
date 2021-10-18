<div class="wrapper">
    <h3 class="title" align="center">Welcome <?=$user['login']?></h3>

    <div class="accordion mb-3" id="accordionPanelsStayOpen">
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    Articles
                </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                <div class="accordion-body">
                    <a href="<?=BASE_URL?>article/add"><button type="button" class="btn btn-success mb-3">Add article</button></a><br>
                    <div class="admin-article-title">
                        <div>Title</div>
                        <div>Category</div>
                        <div>Delete</div>
                        <div>Edit</div>
                        <div>Dt_added</div>
                    </div>
                    <?foreach ($messages as  $message):?>
                        <div class="admin-article-item">
                            <div><a href="<?=BASE_URL.'article/'.$message['id_message']?>"><?=$message['title']?></a></div>
                            <div><a href="<?=BASE_URL.'category/'.$message['id_category']?>"><?= getOneCategory($message['id_category'])['name']?></a></div>
                            <div><a href="<?=BASE_URL.'article/delete/'.$message['id_message']?>"><button type="button" class="btn btn-danger">Delete</button></a></div>
                            <div><a href="<?=BASE_URL.'article/edit/'.$message['id_message']?>"><button type="button" class="btn btn-secondary">Edit</button></a></div>
                            <div><?=$message['dt_add']?></div>
                        </div>
                    <?endforeach;?>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                    Categories
                </button>
            </h2>
            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                <div class="accordion-body">
                    <a href="<?=BASE_URL?>category/add"><button type="button" class="btn btn-success mb-3">Add Category</button></a><br>
                    <div class="admin-article-title">
                        <div>Title</div>
                        <div>Delete</div>
                        <div>Edit</div>
                    </div>
                    <?foreach ($categories as  $category):?>
                        <div class="admin-article-item">
                            <div><a href="<?=BASE_URL.'category/'.$category['id_category']?>"><?=$category['name']?></a></div>
                            <div><a href="<?=BASE_URL.'category/delete/'.$category['id_category']?>" title="Attention! Will be deleted all posts that are in the selected category"><button type="button" class="btn btn-danger">Delete</button></a></div>
                            <div><a href="<?=BASE_URL.'category/edit/'.$category['id_category']?>"><button type="button" class="btn btn-secondary">Edit</button></a></div>
                        </div>
                    <?endforeach;?>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                    Users
                </button>
            </h2>
            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                <div class="accordion-body">
                    <div class="admin-article-title">
                        <div>Login</div>
                        <div>Admin status</div>
                    </div>
                    <?foreach ($users as $user):?>
                        <div class="admin-article-item">
                            <div><?=$user['login']?></div>
                            <?if($user['admin_status']):?>
                                <div><i class="fas fa-check text-success"></i></div>
                            <?else:?>
                                <div><i class="fas fa-times text-danger"></i></div>
                            <?endif;?>
                        </div>
                    <?endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>
