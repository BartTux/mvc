<?php require_once APP_ROOT . '/Views/inc/header.php' ?>
    <a href="<?= URL_ROOT ?>/posts" class="btn btn-light">
        <span class="fa fa-backward"></span> Back
    </a>

    <h1 class="mt-4"><?= $data['title'] ?></h1>
    <div class="bg-secondary text-white p-2 mb-3">
        Written by <?= $data['user_name'] ?> on <?= $data['created_at'] ?>
    </div>
    <p><?= $data['body'] ?></p>

    <?php if ($data['user_id'] === $_SESSION['user_id']) : ?>
        <hr>
        <a href="<?= URL_ROOT ?>/posts/edit/<?= $data['id'] ?>" class="btn btn-dark float-left">Edit</a>
        <form action="<?= URL_ROOT ?>/posts/delete/<?= $data['id'] ?>" method="post">
            <input type="submit" value="Delete" class="btn btn-danger ml-2">
        </form>
    <?php endif ?>
<?php require_once APP_ROOT . '/Views/inc/footer.php' ?>


