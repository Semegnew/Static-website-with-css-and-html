Tedy Dorm, [8/22/2022 4:56 PM]
</nav>
        <!-- /. NAV SIDE  -->
       
        <div id="page-wrapper" >
            <div id="page-inner">
       <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           ADMINISTRATOR<small> accounts </small>
                        </h1>
                    </div>
                </div> 
                 
                                 
            <?php
            include ('db.php');
            $sql = "SELECT * FROM login";
            $re = mysqli_query($con,$sql)
        ?>
                
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                      <th>User name</th>
                                            <th>Password</th>
                                            
                      <th>Update</th>
                      <th>Remove</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                  <?php
                    while($row = mysqli_fetch_array($re))
                    {
                    
                      $id = $row['id'];
                      $us = $row['usname'];
                      $ps = $row['pass'];
                      if($id % 2 ==0 )
                      {
                        echo"<tr class='gradeC'>
                          <td>".$id."</td>
                          <td>".$us."</td>
                          <td>".$ps."</td>
                          
                          <td><button class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
                               Update 
                          </button></td>
                          <td><a href=usersettingdel.php?eid=".$id ." <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Delete</button></td>
                        </tr>";
                      }
                      else
                      {
                        echo"<tr class='gradeU'>
                          <td>".$id."</td>
                          <td>".$us."</td>
                          <td>".$ps."</td>
                          
                          <td><button class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
                              Update 
                            </button></td>
                          <td><a href=usersettingdel.php?eid=".$id ." <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Delete</button></td>
                        </tr>";
                      
                      }
                    
                    }
                    
                  ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
          <div class="panel-body">
                            <button class="btn btn-primary btn" data-toggle="modal" data-target="#myModal1">
                              Add New Admin
                          </button>
                            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">

Tedy Dorm, [8/22/2022 4:56 PM]
<div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Add the User name and Password</h4>
                                        </div>
                    <form method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                            <label>Add new User name</label>
                                            <input name="newus"  class="form-control" placeholder="Enter User name">
                      </div>
                    </div>
                    <div class="modal-body">
                                            <div class="form-group">
                                            <label>New Password</label>
                                            <input name="newps"  class="form-control" placeholder="Enter Password">
                      </div>
                                        </div>
                    
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      
                                           <input type="submit" name="in" value="Add" class="btn btn-primary">
                      </form>
                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php
            if(isset($_POST['in']))
            {
              $newus = $_POST['newus'];
              $newps = $_POST['newps'];
              
              $newsql ="Insert into login (usname,pass) values ('$newus','$newps')";
              if(mysqli_query($con,$newsql))
              {
              echo' <script language="javascript" type="text/javascript"> alert("User name and password Added") </script>';
              
            
              }
            header("Location: usersetting.php");
            }
            ?>
            
          <div class="panel-body">
                            
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Change the User name and Password</h4>
                                        </div>
                    <form method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                            <label>Change User name</label>
                                            <input name="usname" value="<?php echo $us; ?>" class="form-control" placeholder="Enter User name">
                      </div>
                    </div>
                    <div class="modal-body">
                                            <div class="form-group">
                                            <label>Change Password</label>
                                            <input name="pasd" value="<?php echo $ps; ?>" class="form-control" placeholder="Enter Password">
                      </div>
                                        </div>
                    
                                        <div class="modal-footer">