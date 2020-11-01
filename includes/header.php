<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel ="stylesheet" href ="https://cdn.datatables.net/1.10.22/css/dataTables.jqueryui.min.css">
<link rel= "stylesheet"  href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
<script src ="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
<script src ="https://cdn.datatables.net/1.10.22/js/dataTables.jqueryui.min.js"> 



 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script> 
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-dark  mt-2">
  <a class="navbar-brand text-white ml-4" style= "font-size: 1.5rem;" href="dashboard.php">Inventory System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse ml-4" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ">
      <li class="nav-item active">
        <a class="nav-link text-white" href="dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="brand.php">Brand</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="category.php">Category</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="supplier.php">Supplier</a>
      </li><li class="nav-item">
        <a class="nav-link text-white" href="Basecustomer.php">Customer</a>
      </li><li class="nav-item">
        <a class="nav-link text-white" href="inventory.php ">Inventory</a>
      </li>
      </ul>
      <ul class="navbar-nav mr-4">
      <li class="nav-item">
        <a class="nav-link text-white" href="logout.php">Logout</a>
      </li>
      </ul>
     
    </ul>
    
  </div>
</nav>
</body>
</html>
