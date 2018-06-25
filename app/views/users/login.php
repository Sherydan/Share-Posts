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
                    <form action="<?php echo URLROOT; ?>/users/login" method="post">

                        <label class="sr-only" for="Email">Email</label>
                        <div class="input-group mb-4 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fa fa-user"></span>
                                </div>
                            </div>
                            <input required type="email" class="form-control form-control-lg <?php echo  (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                                placeholder="Email" name="email" value="<?php echo $data['email']; ?>">
                            <span class="inavlid-feedback">
                                <?php echo $data['email_err']; ?>
                            </span>
                        </div>

                        <label class="sr-only" for="Password">Password</label>
                        <div class="input-group mb-4 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fa fa-key"></span>
                                </div>
                            </div>
                            <input required type="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"
                                placeholder="Password" name="password" value="<?php echo $data['password']; ?>">
                            <span class="inavlid-feedback">
                                <?php echo $data['password_err']; ?>
                            </span>
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