<?php
include_once __DIR__ . '/../config/config.php';
include_once __DIR__ . '/../layout/top_admin.php';

 
?>
                <div class="main-panel">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 mt-5">
                                    <div class="card">
                                        <div class="card-header">
                                        <h1>Search Data</h1>
    <form class="search-form" action="search.php" method="GET">
        <input type="text" name="query" placeholder="Enter search term..." required>
        <input type="submit" value="Search">
    </form>
 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            require_once '../layout/footer.php';
           ?>
  
