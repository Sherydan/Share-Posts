<?php require_once(APPROOT . '/views/inc/header.php'); ?>

<div class="row justify-content-lg-center">
    <div class="col col-md-12 col-lg-9 col-12">
        <div class="card mt-3">
            <div class="card-header">
                <h2>Image watermark (using intervention library)</h2>
            </div>
            <div class="card-body">

                <form enctype="multipart/form-data" action="<?php echo URLROOT ?>/pages/images" method="post">
                    <div class="form-group">

                        <input onchange="document.getElementById('image-to-process').src = window.URL.createObjectURL(this.files[0])" type="file"
                            accept="image/jpeg" class="form-control-file <?php echo (!empty($data['image_error'])) ? 'is-invalid' : '' ?>"
                            id="uploadImg" name="uploadImg" required>
                        <div class="invalid-feedback">
                            <?php echo $data['image_error']; ?>
                        </div>

                        <div id="image-unprocessed">
                            <img id="image-to-process" src="" class="img-thumbnail">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>

                </form>

                <hr>

                <div id="image-processed">
                    <img src="<?php echo URLROOT; ?><?php echo !empty($data['processed_image']) ? $data['processed_image'] : '' ?>" alt="" class="img-thumbnail">
                </div>
            </div>
        </div>
    </div>

    <div class="col col-md-12 col-lg-9 col-12">
        <div class="card mt-3">
            <div class="card-header">
                <h2>Image exif (using Simpleimage library)</h2>
            </div>
            <div class="card-body">

                <form enctype="multipart/form-data" action="<?php echo URLROOT ?>/pages/images" method="post">
                    <div class="form-group">
                        
                        

                        <input onchange="document.getElementById('image-to-exif').src = window.URL.createObjectURL(this.files[0])" type="file" accept="image/jpeg"
                            class="form-control-file <?php echo (!empty($data['image_error'])) ? 'is-invalid' : '' ?>" id="uploadImg"
                            name="uploadImg" required>
                        <div class="invalid-feedback">
                            <?php echo $data['image_error']; ?>
                        </div>

                        <div id="image-unprocessed">
                            <img id="image-to-exif" src="" class="img-thumbnail">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>

                </form>
                <!--
                <pre>
                    <?php# print_r($data['exif_data']); ?>
                </pre>
                -->
                <hr>
                <ul class="list-group">
                    <?php if(!empty($data['exif_data'])) : ?>
                        <?php foreach($data['exif_data'] as $key => $value) : ?>
                            <?php if(is_array($data['exif_data'][$key])) : ?>
                                <?php $sub_array = $data['exif_data'][$key]; ?>
                                <?php foreach($sub_array as $k => $v) :?>
                                    <li class="list-group-item"><strong><?php echo $k; ?></strong> <?php echo $v; ?></li>
                                <?php endforeach ?>
                                <?php unset($sub_array); ?>
                                <?php continue; ?>
                            <?php endif ?>
                            <li class="list-group-item"><strong><?php echo $key; ?></strong> <?php echo $value; ?></li>
                        <?php endforeach ?>
                    <?php endif ?>    
                </ul>

            </div>
        </div>
    </div>

</div>






<?php require_once(APPROOT . '/views/inc/footer.php'); ?>