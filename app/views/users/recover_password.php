<?php require_once(APPROOT . '/views/inc/header.php'); ?>

<div class="row mt-3 justify-content-lg-center">
    <div class="col col-md-12 col-lg-9 col-12 "> 
        <div class="card">
            <div class="card-body">
                <form action="<?php echo URLROOT ?>/users/recoverPassword" method="post" class="needs-validation" >
                    <div class="text-center">
                        <i class="fas fa-lock"></i>
                        <h1>Forgot Password?</h1>
                        <p>You can reset your password here</p>
                    </div>

                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control <?php echo !empty($data['email_err']) ? 'is-invalid' : ''; ?>" placeholder="Enter your email here" required>
                        <div class="invalid-feedback"> <?php echo $data['email_err'] ?></div>
                        
                        <button type="submit" class="btn btn-primary btn-block mt-3">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
</div>




<?php require_once(APPROOT . '/views/inc/footer.php'); ?>