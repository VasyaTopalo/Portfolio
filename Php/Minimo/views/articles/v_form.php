<div class="container">
<h2 class="mt-4 title"><?=$title?></h2>

<div class="title error-list mt-5">
    <?foreach ($validateErrors as $error):?>
        <p class="text-danger"><?=$error?></p>
    <?endforeach;?>
</div>
<div class="form">
    <form method="post" enctype="multipart/form-data">
        <div class="row mt-5">
            <div class="col-12">
                <h2 class="title">Title</h2>
                <input type="text" name="title" placeholder="Title" class="form-control" value="<?=$fields['title']?>" required>
            </div>

            <div class="col-12">
                <h4 class="title">Category</h4>
                <select name="id_category" class="form-select" required>
                    <?foreach ($categories as $category):?>
                        <?if($category['id_category'] == $fields['id_category']):?>
                            <option value="<?=$category['id_category']?>" selected><?=$category['name']?></option>
                        <?else:?>
                            <option value="<?=$category['id_category']?>"><?=$category['name']?></option>
                        <?endif;?>
                    <?endforeach;?>
                </select>
            </div>

            <div class="col-12 mt-2">
                <h2 class="title">Main image</h2>
                <input type="file" name="main_image" class="form-control" required>
            </div>

            <div class="col-12 mt-2">
                <h2 class="title">First text block</h2>
                <textarea name="first_text" rows="10" placeholder="Text" class="form-control" required><?=$fields['first_text']?></textarea>
            </div>

            <div class="col-12 mt-2">
                <h2 class="title">Second image</h2>
                <input type="file" name="second_image" class="form-control" required>
            </div>

            <div class="col-12 mt-2">
                <h2 class="title">Second text block</h2>
                <textarea name="second_text" rows="10" placeholder="Text" class="form-control" required><?=$fields['second_text']?></textarea>
            </div>

        </div>
        <button type="submit" class="mt-2 mb-5 btn btn-dark"><?=$title?></button>
    </form>
</div>

</div>