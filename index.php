<?php include('leftbar.php');
 $recipt_number = "";
	
	
	$sql = "SELECT * FROM tbl_recipt_record ORDER BY inserted_at DESC LIMIT 1";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
		  $number = $row["recipt_number"];
		  $recipt_number = intval($number) + 1;
	//	echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["course"]. "<br>";
	  }
	} else {
		$recipt_number = "1";
	  echo "0 results";
	}
	$conn->close();
	

?>
<div class="container">
	<div class="row">
			<div class="panel panel-default">	
				<div class="panel-heading">
					<div class="row">
						<div class="col-lg-10">
							<h4>S. S. AGRAWAL GROUP OF COLLEGES, NAVSARI - RECEIPT ENTRY</h4>
						</div>
						<div class="col-lg-2">	
							<a href="record.php" class="btn btn-info" role="button">Records</a>
						</div>
					</div>
				</div> 
					<div class="panel-body">
						<h1>VNSGU Online Registration Fees </h1>
						<hr/>
						<form class="form-horizontal" id="receipt_entry">
							<div class="row">
										<div class="col-lg-7">
											<table class="table">
											<tr>
												<td><label class="control-label">
												STUDENT NAME :
											</label></td><td>
											<input type="text" id="name" name="name" class="form-control" required/></td>
										</tr>
											<tr><td><label class="control-label">COURSE :</label></td>
											<td><select class="form-control" name="course" required>
											<option value="none">-------</option>
												<option value="BCOM">BCOM</option>
												<option value="BBA">BBA</option>
												<option value="BCA">BCA</option>
												<option value="BSC_CHEMISTRY">BSC CHEMISTRY</option>
												<option value="BSC_MICROBIOLOGY">BSC MICROBIOLOGY</option>
											</select></td>
										</tr>
											<tr><td><label class="control-label" for="email">
											AMOUNT :
											</label></td><td>
											<input value="50" type="text" name="amount" class="form-control"/></td>
										</tr>
										</table>
										</div>
										<div class="col-lg-5">
											<table class="table">
												<tr>
													<td>
											<label class="control-label" for="email">
												RECEIPT NUMBER :
											</label></td>
											<td><input type="text" value="<?=$recipt_number?>"name="recipt_number" class="form-control" value=""/></td>
										</tr>
										<tr><td>
											<label class="control-label">DATE : </label></td><td>
											<input type="date" name="recipt_date" class="form-control" value="<?php echo date('Y-m-d'); ?>"/></td>
										</tr>
										<tr><td><label class="control-label">ACADEMIC YEAR :</label></td>
											<td><select class="form-control" name="academic_year">
											<option value="2021-22">2021-22</option>
												
											</select></td>
										</tr>
										</table>
										</div>

									</div>
									<input class="btn btn-success" id="btn_submit" type="submit" name="submit_recipt" value="Save & Print"/>
								<input class="btn" type="reset" name="reset" value="Reset"/>
							</div>
						</form>
					</div>
				</div>
			</div>


<?php include('footer.php');?>
<script>
	
	$(document).ready(function() {
		$("#btn_submit").click((e)=>{
			e.preventDefault();
			if($("#name").val() == ""){
				alert("Enter Student Name ! ! !")
				return false;
			}

			var formdata = $("#receipt_entry").serializeArray();
                        var data = "";
                        formdata.forEach(element => {
                         	// creating query string to be sent to server
							data += `${element.name}=${element.value}&`
                        });
						//to remove last & char from string
                        stringData = data.substring(0, data.length - 1);
						
	  $.ajax({  
         type:"POST",  
         url:"database.php",  
         data:stringData,  
         success:function(data){  
          	window.open(`invoice.php?id=${data}`);
			window.location.reload() 
         }  
      });  
	});
	});
</script>
