<?php
    require_once 'includes/header.php';
    require_once "db_connect.php";
?>

<?php 
    $result = $connect->query("SELECT * FROM category") or die($connect->error);
?>

<div class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-labelledby="deleteCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteCategoryModalLabel">Alert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="EditDelCategory.php" method="POST">
            <div class="modal-body">
                <input type="hidden" name="category_id" id="delete_id">
                <h4>Do you want to delete it permanently ?? </h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="delete_category" class="btn btn-danger">Delete</button>
            </div>
        </form>
    </div>
  </div>
</div>


<html>
<head>
    <link rel="stylesheet" href="./customs/css/dashboard.css">
</head>
<div class = "container">
    <div>
        <h1 style="position: relative;margin-top: 8%;">Manage Category</h1>
    </div>
    <div>
                <a href="addCategory.php" class = "btn btn-info">Add Category</a>   
    </div>
    <br><br>  
    <div class = "row justify-content-center">
        <table class= "table">
            <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th colspan ="2">Action<th>
                </tr>
            </thead>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td class= "category_id"><?php echo $row['category_id'] ?></td>
                <td><?php echo $row['category_name'] ?></td>
                <td><a href="EditCategory.php?edit=<?php echo $row['category_id']?>" class ="btn btn-info">Edit</a>
                    <a href="#" class = "btn btn-danger deletebtn">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div> 
</div>


<script>
        $(document).ready(function () {
            
            $('.deletebtn').click(function (e) { 
                e.preventDefault();

                var category_id = $(this).closest('tr').find('.category_id').text();
               
                $('#delete_id').val(category_id);
                $('#deleteCategoryModal').modal('show');
            });

        });
    </script>



    

</html>

