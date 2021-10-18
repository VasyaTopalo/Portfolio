<div class="container">
    <h2 class="title"><?=$title?></h2>

    <div class="title error-list mt-5">
        <?foreach ($validateErrors as $error):?>
            <p class="text-danger"><?=$error?></p>
        <?endforeach;?>
    </div>

    <div class="form">
        <form method="post" enctype="multipart/form-data">
            <div class="row mt-5">
                <div class="col">
                    <input type="text" name="name" placeholder="Title" class="form-control" required>
                </div>
            </div>
            <button type="submit" class="mt-2 btn btn-dark">Add</button>
        </form>
    </div>
</div>