<?php require_once(APPROOT. '/views/inc/header.php'); ?>

<div class="row mt-3 mb-3">
    <div class="col col-md-12 col-lg-12-col-12">
        <div class="accordion" id="accordionReports">
            <div class="card">
                <div class="card-header" id="headingUsers">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <h2>Users</h2>
                        </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingUsers" data-parent="#accordionReports">
                    <div class="card-body">
                        <form action="" method="post" class="mb-3">
                            <button type="submit" name="listAll" class="btn btn-block btn-primary">List All Users</button>
                        </form>
                        <p>
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseId" aria-expanded="false" aria-controls="collapseId"
                                id="collId">
                                List By ID
                            </button>

                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseName" aria-expanded="false" aria-controls="collapseName"
                                id="collName">
                                List By Name
                            </button>
                        </p>
                        <div class="collapse" id="collapseId">
                            <div class="card card-body">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="User Name" name="userName">
                                        </div>
                                        <div class="col">
                                            <input type="submit" value="Submit" class="btn btn-primary" name="listByName">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="collapse" id="collapseName">
                            <div class="card card-body">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="User ID" name="userID">
                                        </div>
                                        <div class="col">
                                            <input type="submit" value="Submit" class="btn btn-primary" name="ListByID">
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingPost">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                            aria-controls="collapseTwo">
                            <h2>Post</h2>
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingPost" data-parent="#accordionReports">
                    <div class="card-body">
                        <form action="" method="post" class="mb-3">
                            <button type="submit" class="btn btn-block btn-primary">List All Post</button>
                        </form>

                        <p>
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseByUser" aria-expanded="false" aria-controls="collapseByUser"
                                id="collByUser">
                                List By User 
                            </button>
                        </p>

                        <div class="collapse" id="collapseByUser">
                                <div class="card card-body">
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="User Name" name="userName">
                                            </div>
                                            <div class="col">
                                                <input type="submit" value="Submit" class="btn btn-primary" name="listByUser">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#collId').on('click', function () {
            $('#collapseName').collapse('hide');
            $('#collapseId').collapse('show');
        });

        $('#collName').on('click', function () {
            $('#collapseName').collapse('show');
            $('#collapseId').collapse('hide');
        });
    });

</script>

<?php require_once(APPROOT. '/views/inc/footer.php'); ?>