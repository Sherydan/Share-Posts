<?php require_once(APPROOT . '/views/inc/header.php'); ?>

<section id="main_area">
    <div id="contact_text">
        <h1>Contact Us</h1>
        <p>Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within matter
            of hours to help you.</p>
    </div>

    <div id="contact_form">
        <form action="<?php echo URLROOT; ?>/pages/contact" method="post">
            <div class="row">
                <div class="col ">
                    <input type="text" class="form-control p-2" placeholder="Your Name" name="name" required>
                </div>
                <div class="col ">
                    <input type="email" name="email" placeholder="Your Email" class="form-control p-2" class="email" required>
                </div>
            </div>
            <div class="form-control">
                <input type="text" name="subject" placeholder="Subject" class="form-control p-2" name="subject" required>
            </div>

            <div class="form-control">
                <label for="messagge">Message</label>
                <textarea name="message" class="form-control" cols="30" rows="10" placeholder="Write Your Message Here" required></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block">Send</button>
            </div>
            <p><?php echo !(empty($data['email_err'])) ? $data['email_err'] : '' ?></p>
        </form>

        

        
    </div>

    
</section>




<?php require_once(APPROOT . '/views/inc/footer.php'); ?>