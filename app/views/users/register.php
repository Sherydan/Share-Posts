<?php require_once(APPROOT . '/views/inc/header.php'); ?>


<div class="row mt-5 justify-content-lg-center justify-content-md-center">
    <div class=" col col-md-8 col-lg-6 col-12">
        <div class="border-aqua">
            <div class="card">
                <div class="card-header bg-aqua">
                    <h2>Create Account</h2>
                    <p>Please fill out this form to register with us</p>
                </div>

                <div class="card-body">
                    <form action="<?php echo URLROOT; ?>/users/register" method="POST" id="frmRegister" class="needs-validation">
                        <label for="name" class="sr-only">Name</label>
                        <div class="input-group mb-4 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fa fa-user"></span>
                                </div>
                            </div>
                            <input name="name" type="text" class="form-control  <?php echo  (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>"
                                 placeholder="Name" value="<?php echo $data['name']; ?>" required id="name">
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
                            <input name="email" type="email" class="form-control  <?php echo  (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                                 placeholder="Email" value="<?php echo $data['email']; ?>" id="email" required>
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
                            <input name="password" type="password" class="form-control  <?php echo  (!empty($data['password_err'])) ? 'is-invalid' : ''; ?> "
                                 placeholder="Password" value="<?php echo $data['password']; ?>" required id="password">
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
                            <input name="confirm_password" type="password" class="form-control  <?php echo  (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>"
                                 placeholder="Confirm password" value="<?php echo $data['confirm_password']; ?>" required id="confirm_password">
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

<script>
    $(document).ready(function(){
        $("#frmRegister").validate({
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                confirm_password: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password"
                }

            },
            messages: {
                name: {
                    required: 'Please enter a name'
                },
                email: {
                    required: 'Please enter your email'
                },
                password: {
                    required: 'Please enter a password',
                    minlength: 'Password must be at least 6 characters long'
                },
                confirm_password: {
                    required: 'Please re enter your password',
                    minlength: 'Password must be at least 6 characters long',
                    equalTo: 'Passwords doesnt match'
                }
            },
            errorClass: "invalid-feedback",

            highlight: function(element, errorClass) {
            var $element = $(element);
            // Add the red outline.
            $element.parent().addClass(errorClass);
            //$element.parent().css('font-size', '1rem');
            // Add the red cross.
            // $element.siblings(".error_status").addClass("check");
            },
            unhighlight: function(element, errorClass) {
            var $element = $(element);
            // Remove the red cross.
            // $element.siblings(".error_status").removeClass("check");
            // Remove the red outline.
            $element.parent().removeClass(errorClass);
            }
        });
    });
</script>

<?php require_once(APPROOT . '/views/inc/footer.php'); ?>