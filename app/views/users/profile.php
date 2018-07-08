<?php require_once(APPROOT . '/views/inc/header.php'); ?>
<div class="container">

    <div class="row">
        <div class="col col-lg-12 col-md-12 col-12">
   
             <?php if ($data['user']->id == $_SESSION['user_id']) : ?>
                <a href="<?php echo URLROOT; ?>/users/edit/<?php echo $_SESSION['user_id'] ?>" class="btn btn-info float-right">Edit Profile
                    <i class="fas fa-edit"></i>
                </a>
                <?php endif; ?>
            
        </div>
    </div>

    <div class="row mb-2">
        <div class="col col-lg-3 col-md-3 col-4">
            <div class="text-center">
                
                <img src="<?php echo URLROOT; ?><?php echo !empty($data['profile_image']) ? '/img/users_img/'.$data['profile_image'] : '/img/default_profile.png'; ?>" class="img-thumbnail" alt="">
                <img src="" class="img-thumbnail" alt="">

                <a href="#" class="d-block">0 Warning Post</a>
            </div>
        </div>

        <div class="col col-lg-2 col-md-3 col-8">
            <h1>
                <?php echo ucwords($data['user']->name); ?>
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

        <div class="col col-lg-7 col-md-6 col-12">
            <div id="main-status" class="mb-2">
                <h5>Last status</h5>
                <div id="status-card" class="p-2">
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
        
        <div class="col col-md-3 col-sm-3 col-3">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-overview-list" data-toggle="list" href="#list-overview"
                    role="tab" aria-controls="overview">Overview</a>
                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab"
                    aria-controls="profile">Profile Feed</a>
                <a class="list-group-item list-group-item-action" id="list-likes-list" data-toggle="list" href="#list-likes" role="tab" aria-controls="likes">Likes</a>
                <a class="list-group-item list-group-item-action" id="list-frineds-list" data-toggle="list" href="#list-frineds" role="tab"
                    aria-controls="frineds">Friends</a>
                <a class="list-group-item list-group-item-action" id="list-replies-list" data-toggle="list" href="#list-replies" role="tab"
                    aria-controls="replies">Replies</a>
                <a class="list-group-item list-group-item-action" id="list-posts-list" data-toggle="list" href="#list-posts" role="tab" aria-controls="posts">Posts</a>
            </div>
        </div>

        <div class="col col-md-9 col-sm-9 col-9">
            <div class="tab-content" id="nav-tabContent">
                <!-- OVERVIEW START-->
                <div class="tab-pane fade show active" id="list-overview" role="tabpanel" aria-labelledby="list-overview-list">
                    <div class="row">
                        <div class="col col-md-8 col-lg-8 col-12">
                            <div class="card mb-2">
                                <div class="card-header">
                                    <strong>Community stats</strong>
                                </div>

                                <div class="card-body">
                                    <dl class="row ">
                                        <dt class="col col-md-6 col-lg-4 col-6 ">Group</dt>
                                        <dd class="col col-md-6 col-lg-8 col-6">Members</dd>

                                        <dt class="col col-md-6 col-lg-4 col-6">Active Posts</dt>
                                        <dd class="col col-md-6 col-lg-8 col-6"><?php echo $data['quantity']; ?></dd>

                                        <dt class="col col-md-6 col-lg-4 col-6">Profile Views</dt>
                                        <dd class="col col-md-6 col-lg-8 col-6">3959</dd>

                                        <dt class="col col-md-6 col-lg-4 col-6">Member Title</dt>
                                        <dd class="col col-md-6 col-lg-8 col-6">Expert</dd>

                                        <dt class="col col-md-6 col-lg-4 col-6">Age</dt>
                                        <dd class="col col-md-6 col-lg-8 col-6">26 years old</dd>

                                        <dt class="col col-md-6 col-lg-4 col-6">Birthday</dt>
                                        <dd class="col col-md-6 col-lg-8 col-6">June 25, 1992</dd>

                                        <dt class="col col-md-6 col-lg-4 col-6">Gender</dt>
                                        <dd class="col col-md-6 col-lg-8 col-6">Male</dd>

                                        <dt class="col col-md-6 col-lg-4 col-6">Location</dt>
                                        <dd class="col col-md-6 col-lg-8 col-6">San Fernando</dd>

                                    </dl>
                                </div>
                            </div>

                        </div>


                        <div class="col col-md-4 col-lg-4 col-12">
                            <div class="card bg-green">
                                <div class="text-center">
                                    <h1 class="text-white m-0">273</h1>
                                    <p class="text-white m-0">Excellent</p>
                                </div>

                            </div>

                            <div class="card mt-1">
                                <div class="card-header">
                                    <h5>User Tools</h5>
                                </div>
                                <div class="card-body">
                                    <a href="#">
                                        <i class="fas fa-pencil-alt"></i>

                                        Display name history</a>
                                </div>
                            </div>

                            <div class="card mt-1">
                                <div class="card-header">
                                    <h5>Friends</h5>
                                </div>
                                <div class="card-body">

                                </div>
                            </div>

                            <div class="card mt-1">
                                <div class="card-header">
                                    <h5>Latest Visitors</h5>
                                </div>
                                <div class="card-body">

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--OVERVIEW ENDS -->

                <!-- PROFILE FEED START-->
                <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                    <div class="card">
                        <div class="card-header">
                            Profile Feed
                        </div>

                        <div class="card-header bg-light-aqua">
                            <form action="#" method="post">
                                <div class="form-row">
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="mind" id="mind" placeholder="What's on your mind?">
                                    </div>

                                    <div class="col-3">
                                        <input type="submit" value="Post" class="btn btn-block btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="card-body">

                        </div>
                    </div>
                </div>
                <!-- PROFILE FEED END-->
                <div class="tab-pane fade" id="list-likes" role="tabpanel" aria-labelledby="list-likes-list">Likes</div>
                <div class="tab-pane fade" id="list-frineds" role="tabpanel" aria-labelledby="list-frineds-list">Friends</div>
                <div class="tab-pane fade" id="list-replies" role="tabpanel" aria-labelledby="list-replies-list">Replies</div>
                <div class="tab-pane fade" id="list-posts" role="tabpanel" aria-labelledby="list-posts-list">Posts</div>
            </div>
        </div>
    </div>

</div>
<?php require_once(APPROOT . '/views/inc/footer.php'); ?>