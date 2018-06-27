<?php require_once(APPROOT . '/views/inc/header.php'); ?>

<div class="row mt-5">
    <div class="col-md-6 mx-auto">
        <div class="border-aqua">
            <div class="card">
                <div class="card-header bg-aqua">
                    <h2 id="login-title">Login</h2>

                    <div class="float-right" id="forgot-pass">
                        <a href="#">Forgot password?</a>
                    </div>

                </div>

                <div class="card-body ">
                    <form action="<?php echo URLROOT; ?>/users/login" method="post" class="needs-validation" novalidate>

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
 
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Remember me
                            </div>
                        </div>



                        <div class="row">
                            <div class="col">
                                <input type="submit" value="Login" class="btn btn-success btn-block">
                            </div>

                            <div class="col">
                                <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-light btn-block">Not have an account?</a>
                            </div>
                        </div>




                    </form>
                </div>
            </div>
        </div>

    </div>
</div>




<?php require_once(APPROOT . '/views/inc/footer.php'); ?>