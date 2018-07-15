<?php require_once(APPROOT . '/views/inc/header.php'); ?>

<div class="row mt-3 justify-content-lg-center">
    <div class="col col-md-12 col-lg-9 col-12 ">

        <?php if ($data['valid_token'] == 'valid') : ?>
        <div class="card">
            <div class="card-body">

                <form action="<?php echo URLROOT ?>/users/recover" method="post" class="needs-validation" id="recover_form">
                    <div class="text-center">
                        <i class="fas fa-lock"></i>
                        <h1>Please reset your password</h1>

                    </div>

                    <div class="form-group">
                        <label for="password">Enter a new password</label>
                        <input type="password" name="password" id="password" class="form-control <?php echo !empty($data['password_err']) ? 'is-invalid' : ''; ?>" placeholder="Password" required>
                        <div class="invalid-feedback"><?php echo $data['password_err']; ?></div>
                        <div class="msg-1"></div>
                    </div>

                    <div class="form-group">
                        <label for="re-enter">Re enter your password</label>
                        <input type="password" name="password2" id="password2" class="form-control <?php echo !empty($data['password2_err']) ? 'is-invalid' : ''; ?>" placeholder="Password" required>
                        <div class="invalid-feedback"><?php echo $data['password2_err']; ?></div>
                        <div class="msg-2"></div>
                    </div>

                    <input type="hidden" name="user_id" value="<?php echo $data['user_id'] ?>">

                    

                    <button type="submit" class="btn btn-primary btn-block">Reset</button>
                </form>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($data['valid_token'] == 'invalid') : ?>
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <div class="text-center">
                            <h1 class="display-4">Invalid token :(</h1>
                            <a href="<?php echo URLROOT ?>/pages/index" class="btn btn-primary">Return</a>
                    </div>
                </div>
            </div>
        <?php endif ?>




    </div>
</div>

<script>
    $(document).ready(function () {
        $("#recover_form").validate({
            rules: {
                password: {
                    required: true,
                    minlength: 6,
                },
                password2: {
                    required: true,
                    equalTo: "#password",
                    minlength: 6
                }
            },

            messages: {
                password: {
                    required: "The password is required",
                    minlength: "Password must be at least 6 characters long"
                },
                password2: {
                    equalTo: "Passwords doesnt match"
                }
            }

        });

    });
</script>

<?php require_once(APPROOT . '/views/inc/footer.php'); ?>