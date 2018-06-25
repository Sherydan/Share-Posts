<?php require_once(APPROOT . '/views/inc/header.php'); ?>


<div class="row mt-5">
    <div class="col-md-6 mx-auto">
        <div class="border-aqua">
            <div class="card">
                <div class="card-header bg-aqua">
                    <h2>Create Account</h2>
                    <p>Please fill out this form to register with us</p>
                </div>

                <div class="card-body">
                    <form action="<?php echo URLROOT; ?>/users/register" method="post">
                        <label class="sr-only" for="Name">Name</label>
                        <div class="input-group mb-4 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fa fa-user"></span>
                                </div>
                            </div>
                            <input required type="text" class="form-control form-control-lg <?php echo  (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                                placeholder="Name" name="name" value="<?php echo $data['name']; ?>">
                            <span class="inavlid-feedback">
                                <?php echo $data['name_err']; ?>
                            </span>
                        </div>

                        <div class="input-group mb-4 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fa fa-envelope"></span>
                                </div>
                            </div>
                            <input required type="email" class="form-control form-control-lg <?php echo  (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                                placeholder="Email" name="Email" value="<?php echo $data['email']; ?>">
                            <span class="inavlid-feedback">
                                <?php echo $data['email_err']; ?>
                            </span>
                        </div>

                        <div class="input-group mb-4 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fa fa-key"></span>
                                </div>
                            </div>
                            <input required type="password" class="form-control form-control-lg <?php echo  (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"
                                placeholder="Password" name="Password" value="<?php echo $data['password']; ?>">
                            <span class="inavlid-feedback">
                                <?php echo $data['password_err']; ?>
                            </span>
                        </div>

                        <div class="input-group mb-4 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fa fa-key"></span>
                                </div>
                            </div>
                            <input required type="password" class="form-control form-control-lg <?php echo  (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>"
                                placeholder="Confirm password" name="confirm_password" value="<?php echo $data['confirm_password']; ?>">
                            <span class="inavlid-feedback">
                                <?php echo $data['confirm_password_err']; ?>
                            </span>
                        </div>

                        <div class="row">
                            <div class="col">
                                <input type="submit" value="Register" class="btn btn-success btn-block">
                            </div>

                            <div class="col">
                                <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Have an account?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php require_once(APPROOT . '/views/inc/footer.php'); ?>