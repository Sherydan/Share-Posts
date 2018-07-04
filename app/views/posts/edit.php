<?php require_once(APPROOT . '/views/inc/header.php'); ?>
<div class="container bg-light p-3">
    <div class="row">
        <div class="col">
            <h2>Edit Post</h2>
            <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['id']; ?>" method="post">
                <div class="form-row ">
                    <div class="col-md-8 col-sm-12 p-2 bg-white mb-3" id="main-form-add">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
                            <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
                        </div>

                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea name="body" id="body" cols="30" rows="10" class="form-control <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
                            <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12 mb-3">
                        <ul class="list-group p-0 ml-1">
                            <li class="list-group-item p-1 bg-light">
                                <strong>Poll</strong>
                            </li>
                            <li class="list-group-item p-1">
                                <a href="#">Manage Topic Poll</a>
                            </li>
                            <li class="list-group-item p-1 bg-light">
                                <strong>Post Options</strong>
                            </li>
                            <li class="list-group-item p-1">
                                <input type="checkbox" name="emoticons" id="emoticons">
                                <strong>Enable </strong>emoticons?</li>
                            <li class="list-group-item p-1">
                                <input type="checkbox" name="signature" id="signature">
                                <strong>Enable </strong>signature?</li>
                            <li class="list-group-item p-1">
                                <input type="checkbox" name="follow" id="follow">
                                <strong>Follow </strong>this topic?</li>
                        </ul>
                    </div>

                </div>
                <div class="text-center">
                    <input type="submit" value="Submit" class="btn btn-success">

                    <input type="button" value="Preview" class="btn btn-info">
                    <p class="d-inline">Or</p>
                    <a href="<?php echo URLROOT;?>/posts" class="btn btn-secondary">Cancel</a>

                </div>

            </form>
        </div>


    </div>
</div>

<?php require_once(APPROOT . '/views/inc/footer.php'); ?>