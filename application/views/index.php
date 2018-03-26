<html lang="en">
<head>
<title>Items</title>
<!-- Fonts -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
<link href='<?= base_url('assets/css/angular-auto-complete/angular-auto-complete.css') ?>' rel='stylesheet' type='text/css'>
<link href='<?= base_url('assets/css/style.css') ?>' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<!-- Angular JS -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.8/angular-material.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.2/angular.min.js"></script>  
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.2/angular-route.min.js"></script>

<script src="<?= base_url('assets/js/ng-file-upload/ng-file-upload-shim.min.js') ?>"></script>
<script src="<?= base_url('assets/js/ng-file-upload/ng-file-upload.min.js') ?>"></script>

<!-- MY App -->
<script src="app/routes.js"></script>
<script src="app/services/myServices.js"></script>
<!-- App Controller -->
<script src="app/controllers/ItemController.js"></script>
</head>
<body ng-app="main-App">
<nav class="navbar navbar-default">
<div class="container-fluid">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
<span class="sr-only">Toggle Navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">
<li><a href="#/">Items</a></li>
<li><a href="#/items/add">Add New Item</a></li>
</ul>
</div>
</div>
</nav>
<div class="container">
<ng-view></ng-view>
</div>
</body>
</html>