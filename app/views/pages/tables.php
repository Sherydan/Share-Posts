<?php require_once(APPROOT. '/views/inc/header.php'); ?>
    
    
    <div class="row mt-3">
        <div class="col col-md-12 col-lg-12 col-12">
            <div class="card">
                <div class="card-header"><h2>Table From REST API</h2></div>
                <div class="card-body">
                    <div class="table-responsive mt-3" >
                            <table class="table table-striped table-hover" id="posts_table">
                            <thead>
                                <tr>
                                
                                <th scope="col">Title</th>
                                <th scope="col">Body</th>
                                
                                </tr>
                            </thead>
                            
                            </table>
                    
                        </div>
                </div>
            </div>

            <div class="card mt-3 mb-3">
                <div class="card-header"><h2>Table directly from database</h2></div>
                <div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-striped table-hover" id="posts_table_db">
                            <thead>
                                <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Body</th>
                                </tr>
                            </thead>

                            <tbody>
                               
                                <?php foreach($data['posts'] as $post) :?>
                                <tr>
                                    <td><?php echo $post->title ?></td>
                                    <td><?php echo $post->body ?></td>
                                </tr>
                                <?php endforeach ?>
                                
                                
                            </tbody>
                            
                            </table>
                    </div>
                </div>
            </div>

            
           
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#posts_table').DataTable( {
                "pagingType": "full_numbers",
                //                 indices             nombres
               // "lengthMenu": [[1, 5, 10, -1], [1, 5, 10, "All"]],
               "ajax": {
                   url: "http://localhost/api_rest/api/post/read.php",
                   dataSrc: "data"
                   },
                "columns":[
                    {data: 'title'},
                    {data: 'body'},
                ]
            });

            $('#posts_table_db').DataTable( {
                "pagingType": "full_numbers"
            });
        });

        
    </script>

<?php require_once(APPROOT. '/views/inc/footer.php'); ?>