<!DOCTYPE html>
<html>
<head>
    <title>Agent Timeline</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/')?>plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/')?>dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Timeline</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Timeline</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="timeline">
                            <?php foreach ($timeline as $event): ?>
                            
                                <?php if (!empty($event['event_date'])): ?>
                                    <div class="time-label">
                                        <span class="bg-red"><?php echo date('d M. Y', strtotime($event['event_date'])); ?></span>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <i class="<?php echo $event['icon']; ?>"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i> <?php echo date('H:i', strtotime($event['event_time'])); ?></span>
                                        <h3 class="timeline-header"><a href="#"><?php echo $event['header']; ?></a></h3>
                                        <div class="timeline-body">
                                            <?php echo $event['body']; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div>
                                <i class="fas fa-clock bg-gray"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.2.0
        </div>
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>

<script src="<?php echo base_url('assets/')?>plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url('assets/')?>dist/js/adminlte.min.js"></script>
</body>
</html>
