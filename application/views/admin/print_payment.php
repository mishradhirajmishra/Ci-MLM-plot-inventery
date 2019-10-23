<!DOCTYPE html>
<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 80%;
    margin-left:16%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>
    <div class="container">
<div class="row">
    <br><br>
<h2 style="text-align: center;">List of New Recieve Payment</h2>
 <h4 style="text-align: center;">( <?php echo date("l jS \of F Y h:i:s A")  ?> )</h4>
	<div>
											<table style="" id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
															<label class="pos-rel">
																Sno
																<span class="lbl"></span>
															</label>
														</th>
														
														<th class="hidden-480">User Name</th>
														
														<th>Payment Amount</th>
														

														<th>Payment Date</th>
														<th> Action</th>
													</tr>
												</thead>

												<tbody>
<?php //print_r($newpay);?>
<?php $i=1;


foreach($newpay as $row){ ?>
<tr>
<td id="id" class="hidden"><?php echo $row['payment_id'];?></td>
<td ><?php echo $i; ?></td>
<td><?php echo $row['user_name'];?></td>
<td><?php echo $row['amount']; ?></td>
<td><?php echo $row['payment_date'];?></td>
		
</tr>
<?php $i++;} ?>
												</tbody>
											</table>
										</div>

</div>
</div>

</body>
</html>
