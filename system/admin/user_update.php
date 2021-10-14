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
                if(isset($_POST["update_user"])){
                    $id = $_POST["id"];
                    $sql = "SELECT * FROM account WHERE id=$id";
                    $result = mysqli_query($connection,$sql);
                    if(mysqli_num_rows($result)>0){
                      foreach($result as $r){
                        ?>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title "> <?php echo $r['username'] ?> Update  </h4>
                  <p class="card-category"> Here is information your.</p>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                    <img width="100%"  src="../upload/<?php echo $r['image'] ?>" class="img-responsive" alt="">

                        <p>Name : <?php echo $r['username'] ?></p>

                        <p>Role : <?php echo $r['role'] ?>  </p>

                       
                        <hr>

                        <div class="row">

                            <a href="user.php" class="btn btn-primary"> Back </a>


                        </div>
                    </div>

                    <div class="col-md-6">
                    <form action="../backend.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo $r['id'] ?>" name="id">             
                    <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                        <label class="bmd-label-floating"> Name</label>
                        <input value="<?php echo $r['username'] ?>" required type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <label class="bmd-label-floating">Role</label>
                        <select name="role" required class="form-control">
                              <option value="nothing">--- Select Role----</option>    
                              <option value="staff"> Staff </option>
                              <option value="admin"> Admin </option>
                            </select>
                        </div>
                    </div>


                    <div class="row">
                    <div class="col-md-6">
                            <input type="file" required name="image">
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                        <button type="submit" name="update_user_data" class="btn btn-warning pull-right"> Update this Category </button>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    </div>


                    </form>
 
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