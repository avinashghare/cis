<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>" type="text/javascript"></script>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <title><?php echo $title;?></title>

</head>
<body>
<div class="container">

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Car Inventary System</a>
    </div>
    <ul class="nav navbar-nav pull-right">
      <li><a href="<?php echo site_url('manufacturer/index'); ?>">Manufacturers</a></li>
      <li><a href="<?php echo site_url('carmodel/index'); ?>">Models</a></li>
    </ul>
  </div>
</nav>