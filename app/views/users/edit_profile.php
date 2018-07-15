<?php require_once(APPROOT . '/views/inc/header.php'); ?>
<?php $tzL = generate_timezone_list(); ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-12 mb-3">
            <h2>My Settings</h2>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <form enctype="multipart/form-data" action="<?php echo URLROOT?>/users/edit/<?php echo $_SESSION['user_id']; ?>" method="post" class="needs-validation" novalidate>


                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Profile Settings
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <dl class="row">

                                    <dt class="col-sm-3 m-0">Photo</dt>
                                    <dd class="col-sm-9 m-0">
                                        <div class="form-group">
                                            <input type="file" accept="image/jpeg" class="form-control-file <?php echo (!empty($data['image_name_err'])) ? 'is-invalid' : '' ?>" id="uploadImg" name="uploadImg">
                                            <div class="invalid-feedback">
                                                <?php echo $data['image_name_err']; ?>
                                            </div>
                                        </div>
                                    </dd>

                                    <div class="col-12 m-0 p-0">
                                        <hr>
                                    </div>

                                    <dt class="col-sm-3">Timezone</dt>
                                    <dd class="col-sm-9">

                                        <div class="form-group mb-0">
                                            <select class="form-control p-2 <?php echo (!empty($data['timezone_err'])) ? 'is-invalid' : '' ?>" id="exampleFormControlSelect1" name="timezone">
                                                <?php foreach ($tzL as $key => $val) : ?>
                                                <option>
                                                    <?php echo $val; ?>
                                                </option>
                                                <?php endforeach; ?>
                                                <div class="invalid-feedback">
                                                    <?php echo $data['timezone_err']; ?>
                                                </div>
                                            </select>
                                            <small class="form-text text-muted">The time (including your current adjustment) is: 06 July 2018 - 17:19</small>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    <small class="text-muted">Automatically detect when my timezone is in DST</small>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    <small class="text-muted">My timezone is currently in DST</small>
                                                </label>
                                            </div>

                                        </div>
                                    </dd>

                                    <div class="col-12 m-0 p-0">
                                        <hr>
                                    </div>

                                    <dt class="col-sm-3">Comments & Visitors</dt>
                                    <dd class="col-sm-9">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                <small class="text-muted">Allow members to leave comments on my profile</small>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                <small class="text-muted">Allow me to approve comments before they are displayed on my profile</small>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                <small class="text-muted">Show last 5 visitors on my profile</small>
                                            </label>
                                        </div>
                                    </dd>

                                    <div class="col-12 m-0 p-0">
                                        <hr>
                                    </div>

                                    <dt class="col-sm-3">Friends</dt>
                                    <dd class="col-sm-9">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                <small class="text-muted">Show my friends in my profile</small>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                <small class="text-muted">Allow me to approve members before they're added as a friend</small>
                                            </label>
                                        </div>
                                    </dd>

                                    <div class="col-12 m-0 p-0">
                                        <hr>
                                    </div>

                                    <dt class="col-sm-3">Profile Information</dt>
                                    <dd class="col-sm-9">
                                        <div class="btn btn-secondary mb-1">Edit my About page</div>
                                        <div class="form-inline">
                                            <div class="form-group mb-2">
                                                <label for="birthday ">My Birthday</label>
                                                <select class="form-control p-1 ml-1" id="exampleFormControlSelect2">
                                                    <option>January</option>
                                                    <option>February</option>
                                                    <option>March</option>
                                                    <option>April</option>
                                                    <option>May</option>
                                                    <option>June</option>
                                                    <option>July</option>
                                                    <option>August</option>
                                                    <option>September</option>
                                                    <option>October</option>
                                                    <option>November</option>
                                                    <option>December</option>
                                                </select>

                                                <select class="form-control p-2 mr-2 ml-2" id="exampleFormControlSelect2">

                                                    <?php for ($i=1; $i <= 31 ; $i++) : ?>
                                                    <option>
                                                        <?php echo $i; ?> </option>
                                                    <?php endfor; ?>
                                                </select>

                                                <select class="form-control p-2  m-0" id="exampleFormControlSelect2">
                                                    <?php for ($i=1919; $i <= date("Y") ; $i++) : ?>
                                                    <option>
                                                        <?php echo $i; ?> </option>
                                                    <?php endfor; ?>
                                                </select>



                                            </div>




                                        </div>

                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <select name="gender" id="genderSelector" class="form-control ml-1 p-2 <?php echo (!empty($data['gender_err'])) ? 'is-invalid' : '' ?>">
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?php echo $data['gender_err']; ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="ubication">Location</label>
                                            <input type="text" name="location" id="location" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="interest">Interests</label>
                                            <textarea name="interests" id="" cols="30" rows="5" class="form-control"></textarea>
                                        </div>



                                    </dd>

                                    <div class="col-12 m-0 p-0">
                                        <hr>
                                    </div>

                                    <dt class="col-sm-3 m-0">Display Name</dt>
                                    <dd class="col-sm-9 m-0">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="displayName">Display Name</label>
                                                <input value="<?php echo $data['display_name']; ?>" type="text" name="display_name" id="display_name" class="form-control <?php echo (!empty($data['display_name_err'])) ? 'is-invalid' : '' ?>">
                                                <div class="invalid-feedback">
                                                <?php echo $data['display_name_err']; ?>
                                            </div>
                                            </div>
                                        </div>
                                    </dd>



                                </dl>




                            </div>


                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    Email & Password
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,
                                non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch
                                3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                   


                </div>

                <div class="card-footer">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="<?php echo URLROOT; ?>/users/profile/<?php echo $_SESSION['user_id']; ?>" class="btn btn-danger">Cancel</a>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>

<script>

    $(document).ready(function () {
        $('#collapseOne').collapse('show');
    });
</script>


<?php require_once(APPROOT . '/views/inc/footer.php'); ?>