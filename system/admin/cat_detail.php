<?php
    include_once "head.php";
?>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo"><a href="#" class="simple-text logo-normal">
         My Hotel 
        </a></div>
      <div class="sidebar-wrapper">
        <?php
            include_once "slidebar.php";
        ?>

      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
        <?php
            include_once "navbar.php";
        ?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <?php 
              include_once "../flash_message.php";
          ?>
        <div class="row">
        
           <?php
                if(isset($_POST["cat_detail"])){
                    $id = $_POST["id"];
                    $sql = "SELECT * FROM room_category WHERE id=$id";
                    $result = mysqli_query($connection,$sql);
                    if(mysqli_num_rows($result)>0){
                      foreach($result as $r){
                        ?>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title "> <?php echo $r['category_name'] ?> Details  </h4>
                  <p class="card-category"> Here is information your.</p>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-5">
                      <img width="100%"  src="../upload/<?php echo $r['image'] ?>" class="img-responsive" alt="">
                    </div>

                    <div class="col-md-7">
                        <p>Name : <?php echo $r['category_name'] ?></p>

                        <p>Price : <?php echo $r['price'] ?> MMK </p>

                        <p>Description : <?php echo $r['description'] ?></p>
                        <hr>

                        <div class="row">

<a href="category.php" class="btn btn-primary"> Back </a>
                                <form action="../backend.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $r['id'] ?>">
                                        <input onclick="return confirm('Confirm Delete ! ')" type="submit" name="cat_delete" value="Delete" class="btn btn-danger">
                                </form>

                                <form action="cat_update.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $r['id'] ?>">
                                        <input type="submit" name="cat_update" value="Update" class="btn btn-warning">
                                </form>
                        
                      </div>
                    </div>
                  </div>

                 
                 
                   
                </div>
              </div>
                        <?php
                      }
                    }
                }
           ?>
           
          </div>
        </div>
      </div>
 
    </div>
  </div>
  
<?php
    include_once "footer.php";
?>