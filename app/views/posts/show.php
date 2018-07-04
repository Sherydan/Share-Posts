<?php require_once(APPROOT. '/views/inc/header.php'); ?>

<div class="card mb-3 p-2">
    <div class="card-header text-center ">
        <h2>
            <?php echo $data['post']->title; ?>
        </h2>
    </div>

    <div class="card-body">
        <p class="card-text">
            <?php echo $data['post']->body ?>
        </p>


    </div>

    <div class="card-footer text-muted mb-3">
        Writen By
        <?php echo $data['user']->name; ?> On
        <?php echo $data['post']->created_at; ?>
    </div>


    <?php if($data['user']->id == $_SESSION['user_id']) :?>
    <hr>
    <div class="mb-3">
        <form action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post">

            <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>" class="btn btn-secondary">Edit
                <i class="fas fa-edit"></i>

            </a>
            <button type="submit" class="btn btn-danger float-right">Delete
                <i class="fas fa-trash-alt"></i>

            </button>
        </form>
    </div>

    <?php endif; ?>

    <a href="<?php echo URLROOT; ?>/posts" class="btn btn-primary">Go Back
        <i class="fas fa-arrow-left"></i>

    </a>
</div>

<?php require_once(APPROOT. '/views/inc/footer.php'); ?>