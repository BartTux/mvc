<?php require_once APP_ROOT . '/Views/inc/header.php' ?>
    <a href="<?= URL_ROOT ?>/posts" class="btn btn-light">
        <span class="fa fa-backward"></span> Back
    </a>
    <div class="card card-body bg-light mt-5">
        <h2>Add Post</h2>
        <p>Create a post with this form</p>
        <form action="<?= URL_ROOT ?>/posts/add" method="post">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" class="form-control form-control-lg <?= (!empty($data['title_error'])) ? 'is-invalid' : '' ?>" value="<?= $data['title'] ?>">
                <span class="invalid-feedback"><?= $data['title_error'] ?></span>
            </div>
            <div class="form-group">
                <label for="body">Body:</label>
                <textarea name="body" class="form-control form-control-lg <?= (!empty($data['body_error'])) ? 'is-invalid' : '' ?>"><?= $data['body'] ?></textarea>
                <span class="invalid-feedback"><?= $data['body_error'] ?></span>
            </div>
            <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>
<?php require_once APP_ROOT . '/Views/inc/footer.php' ?>