<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SIAKAD UNIPI</title>

  <!-- Bootstrap & AdminLTE CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <?= view('layout/sidebar') ?>
<?= view('layout/navbar') ?>
<?= view('layout/footer') ?>

  <div class="content-wrapper p-3">
    <?= $this->renderSection('content') ?>
  </div>

  <?= $this->include('layout/footer') ?>

</div>

<!-- JS CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

</body>
</html>