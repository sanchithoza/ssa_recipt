<?php
 
include('leftbar.php');


$sql = "SELECT * FROM tbl_recipt_record";
$res = $conn->query($sql);

$conn->close();
?>
<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                                <div class="row"><div class="col-lg-10">
                    <h4>Sales Record</h4></div><div class="col-lg-2"><a href="index.php" class="btn btn-info" role="button">Add</a></div></div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Recipt Number</th>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>COURSE</th>
                                            <th>ACADEMIC YEAR</th>
                                            <th>AMOUNT</th>
                                            <!-- <th>Remark</th>
                                            <th>Total Amount</th> -->
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                       if ($res->num_rows > 0) {
                                        // output data of each row
                                        while($result = $res->fetch_object()) {
                                           // print_r($result);
                                            /*print_r($res);*/
                                            ?>  
                                            <tr class="odd gradeX">
                                              <td><?php echo $result->recipt_number; ?></td>
                                              <td><?php echo htmlentities( strtoupper($result->recipt_date));?></td>
                                              <td><?php echo htmlentities(strtoupper($result->name));?></td>
                                              <td><?php echo htmlentities(strtoupper($result->course));?></td>
                                              <td><?php echo htmlentities(strtoupper($result->academic_year));?></td>
                                              <td><?php echo htmlentities(strtoupper($result->amount));?></td>
                                              <td>
                                                <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo "del".$result->id;?>">Delete</button>-->
                                                <a href="invoice.php?id=<?php echo htmlentities($result->id); ?>" class="btn btn-info" role="button" target="_blank">View</a>

                                                <div class="modal" tabindex="-1" role="dialog" id="<?php echo "del".$result->id;?>">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title">Do You Want To Delete ?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                      </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <p><?php echo htmlentities(strtoupper($result->name));?> </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="database.php?del=<?php echo htmlentities($result->id); ?>" class="btn btn-info" role="button">Yes</a>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                            </tr>

                        <?php 
                          }
                      } else {
                        echo "0 results";
                      }
                        ?>                
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
            <!--  <a target="_blank" href="clientListPDF.php" class="btn btn-info" role="button">Print Client List</a> -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->



</div>

<!-- /#wrapper -->
<?php include('footer.php');?>