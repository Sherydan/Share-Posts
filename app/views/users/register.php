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
                    <form action="<?php echo URLROOT; ?>/users/register" method="post" class="needs-validation" novalidate>
                        <label for="name" class="sr-only">Name</label>
                        <div class="input-group mb-4 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fa fa-user"></span>
                                </div>
                            </div>
                            <input name="name" type="text" class="form-control form-control-lg <?php echo  (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>"
                                 placeholder="Name" value="<?php echo $data['name']; ?>" required>
                            <div class="invalid-feedback">
                                <?php echo $data['name_err']; ?>
                            </div>
                        </div>

                        <label for="email" class="sr-only">Email</label>
                        <div class="input-group mb-4 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fa fa-envelope"></span>
                                </div>
                            </div>
                            <input name="email" type="email" class="form-control form-control-lg <?php echo  (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                                 placeholder="Email" value="<?php echo $data['email']; ?>" required>
                            <div class="invalid-feedback">
                                <?php echo $data['email_err']; ?>
                            </div>
                        </div>

                        <label for="password" class="sr-only">Password</label>
                        <div class="input-group mb-4 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fa fa-key"></span>
                                </div>
                            </div>
                            <input name="password" type="password" class="form-control form-control-lg <?php echo  (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"
                                 placeholder="Password" value="<?php echo $data['password']; ?>" required>
                            <div class="invalid-feedback">
                                <?php echo $data['password_err']; ?>
                            </div>
                        </div>

                        <label for="confirm_password" class="sr-only">Confirm password</label>
                        <div class="input-group mb-4 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fa fa-key"></span>
                                </div>
                            </div>
                            <input name="confirm_password" type="password" class="form-control form-control-lg <?php echo  (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>"
                                 placeholder="Confirm password" value="<?php echo $data['confirm_password']; ?>" required>
                            <div class="invalid-feedback">
                                <?php echo $data['confirm_password_err']; ?>
                            </div>
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