<?php require_once(APPROOT. '/views/inc/header.php'); ?>
    <div class="table-responsive mt-3" >
        <table class="table table-striped table-hover" id="posts_table">
        <thead>
            <tr>
            >
            <th scope="col">Title</th>
            <th scope="col">Body</th>
           
           
            </tr>
        </thead>
        
        </table>

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
        });
    </script>

<?php require_once(APPROOT. '/views/inc/footer.php'); ?>