<?php require_once(APPROOT. '/views/inc/header.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Posts</h1>
            </div>

            <div class="col-md-6">
                <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary float-right">
                    <i class="fa fa-pencil-alt"></i> Add Post
                </a>
            </div>
        </div>
        <?php foreach($data['posts'] as $post) :?>
            <div class="card mb-3">
                <div class="card-header">
                    <?php echo $post->title; ?>
                </div>

                <div class="card-body">
                    <p class="card-text"><?php echo $post->body; ?></p>
                    <div class="text-center">
                    <a href="<?php echo URLROOT; ?>/post/show/<?php echo $post->postId; ?>" class="btn btn-dark btn-lg btn-block">More</a>
                    </div>
                    
                </div>

                <div class="card-footer text-muted">
                    Writen By <?php echo $post->name; ?> On <?php echo $post->postCreatedAt; ?>
                </div>
            </div>

        <?php endforeach; ?>
    </div>


<?php require_once(APPROOT. '/views/inc/footer.php'); ?>