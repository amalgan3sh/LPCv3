<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Composition</li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row">
                <?php
// Split compositions into chunks of 3
$chunked_compositions = array_chunk($products->result(), 3);

// Calculate the current page number
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$start_index = ($current_page - 1) * 3;
$end_index = $start_index + 3;

// Display compositions for the current page
for ($i = $start_index; $i < $end_index; $i++) {
    if (isset($chunked_compositions[$i])) {
        foreach ($chunked_compositions[$i] as $row) :
            ?>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        Type
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="lead"><b><?php echo $row->name; ?></b></h2>
                            </div>
                            <div class="col-5 text-center">
                                <img src="" alt="user-avatar" class="img-circle img-fluid">
                                <!-- <?php echo base_url('assets/')?>dist/img/user1-128x128.jpg -->
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <a href="#" class="btn btn-sm bg-teal">
                                <i class="fas fa-comments"></i>
                            </a>
                                <a href="<?php echo base_url('index.php/Usercontroller/userViewCart')?>?product_id=<?php echo urlencode($row->id)?>" class="btn btn-sm btn-primary">

                                <i class="fas fa-user"></i> Add to Cart
                            </a>
                        </div>
                    </div>
                </div>
            </div>
<?php
        endforeach;
    }
}
?>

                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <nav aria-label="Contacts Page Navigation">
                    <ul class="pagination justify-content-center m-0">
                    <?php
                        // Generate pagination links
                        $total_pages = ceil(count($products->result()) / 3);
                        $max_pages = min(10, $total_pages); // Limit to a maximum of 10 pages
                        for ($i = 1; $i <= $max_pages; $i++) :
                        ?>
                            <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?>&composition_name=<?php echo urlencode($_GET['composition_name']); ?>">
                                    <?php echo $i; ?>
                                </a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </nav>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/')?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/')?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/')?>dist/js/demo.js"></script>
</body>
</html>
