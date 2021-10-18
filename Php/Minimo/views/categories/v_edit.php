<div class="container">

    <div class="title error-list mt-5">
        <?foreach ($validateErrors as $error):?>
            <p class="text-danger"><?=$error?></p>
        <?endforeach;?>
    </div>

    <form method="post">
        <div class="row">
            <div class="col">
                <input type="text" name="name" placeholder="Title" class="form-control" required value="<?=$category['name']?>">
            </div>
        </div>
        <button type="submit" class="mt-4 mb-2 btn btn-dark">Edit</button>
    </form>

</div>