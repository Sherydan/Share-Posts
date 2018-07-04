<?php require_once(APPROOT . '/views/inc/header.php'); ?>
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <a href="#" class="btn btn-info float-right">Edit Profile
                <i class="fas fa-edit"></i>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <img src="<?php echo URLROOT; ?>/img/default_profile.png" class="img-thumbnail" alt="">
            <div class="text-center ">
                <a href="#">0 Warning Post</a>
            </div>
        </div>

        <div class="col-md-2">
            <h1>
                <?php echo ucwords($_SESSION['user_name']); ?>
            </h1>
            <p>Member since: </p>
            <p>
                <span class="badge badge-success">Online</span> Last active Now</p>
            <p>
                <i class="fas fa-star"></i>

                <i class="fas fa-star"></i>

                <i class="fas fa-star"></i>

                <i class="fas fa-star"></i>

                <i class="far fa-star"></i>
            </p>
        </div>

        <div class="col-md-7">
            <div id="main-status">
                <h5>Last status</h5>
                <div id="status-card">
                    <p>Lorem ipsum dolor sit amet.</p>
                    <p>On December 21</p>
                </div>
            </div>

            <button class="btn btn-secondary btn-sm float-right">Find content
                <i class="far fa-file-alt"></i>
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-overview-list" data-toggle="list" href="#list-overview"
                    role="tab" aria-controls="overview">Overview</a>
                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab"
                    aria-controls="profile">Profile Feed</a>
                <a class="list-group-item list-group-item-action" id="list-likes-list" data-toggle="list" href="#list-likes" role="tab" aria-controls="likes">Likes</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab"
                    aria-controls="settings">Friends</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab"
                    aria-controls="settings">Replies</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab"
                    aria-controls="settings">Posts</a>
            </div>
        </div>

        <div class="col-md-9 col-sm-9">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-overview" role="tabpanel" aria-labelledby="list-overview-list">Overview</div>
                <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">Profile feed</div>
                <div class="tab-pane fade" id="list-likes" role="tabpanel" aria-labelledby="list-likes-list">Likes</div>
                <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">.4..</div>
                <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">.4..</div>
                <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">.4..</div>
            </div>
        </div>
    </div>

</div>
<?php require_once(APPROOT . '/views/inc/footer.php'); ?>