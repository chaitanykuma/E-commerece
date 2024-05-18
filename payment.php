<?php
require_once "config.php";
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="favicon.png">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap4" />
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
	<link href="css/tiny-slider.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/styles.css">
	<title>Furniture || Checkout</title>
</head>
<body>
	<?php
	if(isset($_POST["placeorder"])){
        // $address = $_POST["address"];
        // $inse = mysqli_query($conn, "INSERT INTO ORDER (user_id, address_id) VALUES ('$_SESSIOM[id]', '$address')");
		echo"<script>alert('order place successfull');
		</script>";
	}
	?>
	<?php require_once "navbar.php"; ?>
	<!-- Start Hero Section -->
	<div class="hero">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-5">
					<div class="intro-excerpt">
						<h1>Payment</h1>
					</div>
				</div>
				<div class="col-lg-7">

				</div>
			</div>
		</div>
	</div>
	<!-- End Hero Section -->
	<div class="untree_co-section">
		<div class="container">
			<div class="row">
            <?php require_once "address.php"; ?>
				<div class="col-md-6">
					<form method="POST">
						<div class="row mb-5">
							<div class="row mb-5">
								<div class="col-md-12">
									<h2 class="h3 mb-3 text-black">Your Order</h2>
									<div class="p-3 p-lg-5 border bg-white">
										<table class="table site-block-order-table mb-5">
											<thead>
												<th>Product</th>
												<th>Total</th>
											</thead>
											<tbody>
												<?php
												$que = mysqli_query($conn, "SELECT * FROM user_cart WHERE user_id = '$_SESSION[id]'");
												if(mysqli_num_rows($que)){
													while($var = $que->fetch_assoc()){
														$product_id = $var["product_id"];
														$quantity = $var["quantity"];
														$amount = $var["total_amount"];
														$query = mysqli_query($conn, "SELECT * FROM products WHERE product_id = '$product_id'");
														if(mysqli_num_rows($query)){
															while($res = $query->fetch_assoc()){
																$name = $res["name"];
																?>
																<tr>
																	<td><?php echo $name; ?> <strong class="mx-2">x</strong><?php echo $quantity; ?></td>
																	<td><?php echo $amount; ?></td>
																	<?php
																	}
																}
															}
														}
														?>
														</tr>
														<?php
														$ques = "SELECT SUM(total_amount) FROM user_cart WHERE user_id = '$_SESSION[id]'";
														$results = $conn->query($ques);
														if($results->num_rows > 0) {
															while ($row = $results->fetch_array()) {
																$total = $row["SUM(total_amount)"];
															}
														}
														?>
														<tr>
															<td class="text-black font-weight-bold"><strong>Order Total</strong></td>
															<td class="text-black font-weight-bold"><strong><?php echo $total; ?></strong></td>
														</tr>
											</tbody>
										</table>
										<div class="border p-3 mb-3">
                                        <div style="display: flex;"><input type="radio" style="margin-right: 10px;" requiured="required">
											<h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsecreditcard" role="button" aria-expanded="false" aria-controls="collapsebank">Credit or debit card</a></h3></div>
											<div class="collapse" id="collapsecreditcard">
												<div class="py-2" style="margin-bottom: 10px;">
												<!-- <form class="credit-card" method="POST"> -->
													<div class="form-header">
														<h4 class="title">Credit card detail</h4>
													</div>
													<div class="form-body">
														<input type="text" class="card-number" placeholder="Card Number" required>
														<div class="date-field">
															<div class="month">
																<select name="Month" required>
																	<option value="january">January</option>
																	<option value="february">February</option>
																	<option value="march">March</option>
																	<option value="april">April</option>
																	<option value="may">May</option>
																	<option value="june">June</option>
																	<option value="july">July</option>
																	<option value="august">August</option>
																	<option value="september">September</option>
																	<option value="october">October</option>
																	<option value="november">November</option>
																	<option value="december">December</option>
																</select>
															</div>
															<div class="year">
																<select name="Year">
																	<option value="2016">2024</option>
																	<option value="2017">2025</option>
																	<option value="2018">2026</option>
																	<option value="2019">2027</option>
																	<option value="2020">2028</option>
																	<option value="2021">2029</option>
																	<option value="2022">2030</option>
																	<option value="2023">2031</option>
																	<option value="2024">2032</option>
																</select>
															</div>
														</div>
														<div class="card-verification">
															<div class="cvv-input">
																<input type="text" placeholder="CVV" required>
															</div>
															<div class="cvv-details">
																<p>3 or 4 digits usually found <br> on the signature strip</p>
															</div>
														</div>
														<input type="submit" class="btn btn-info" value="Submit" name="cardsubmit" style="width: 150px; height:50px; border-radius: 10px;">
													</div>
												<!-- </form> -->
											</div>
										</div>
									</div>
									<div class="border p-3 mb-3">
                                        <div style="display: flex;"><input type="radio" value="UPI" style="margin-right: 10px;">
										<h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsedebitupi" role="button" aria-expanded="false" aria-controls="collapsecheque">UPI</a></h3></div>
										<div class="collapse" id="collapsedebitupi">
											<!-- <form method="POST"> -->
												<p class="mb-0">Please enter your UPI ID.</p>
												<div class="py-2" style="display: flex;">
												<input type="text" class="form-control" style="width: 300px; margin-right: 10px;" placeholder="Enter UPI ID" required>
												<input type="submit" value="verify" name="upisubmit" style="width: 90px; border-radius: 15px;">
												</div>
											<!-- </form> -->
		                  				</div>
									</div>
									<div class="border p-3 mb-5">
										<h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsecod" role="button" aria-expanded="false" aria-controls="collapsepaypal">Cash on Delivery</a></h3>
										<div class="collapse" id="collapsecod">
											<div class="py-2">
												<p class="mb-0">Cash, UPI and Cards accepted.</p>
											</div>
										</div>
									</div>
									<div class="form-group">
										<input type="submit" class="btn btn-black btn-lg py-3 btn-block" name="placeorder" value="Place order">
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Start Footer Section -->
	<?php require_once "footer.php"; ?>
	<!-- End Footer Section -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script>
	function myfunction(address_id){
		// alert (address_id);
		$(document).ready(function () {
			$.ajax({
				type: "GET",
				url: "show.php?address_id="+address_id,
				dataType: "html",
				success: function (data) {
					$("#billingdetails").html(data);
				}
			});
		});
	}
	function confirmorder(){
		return confirm('Are you sure you want to place the order');
		location.replace(thankyou.php);
	}
	</script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/tiny-slider.js"></script>
	<script src="js/custom.js"></script>
</body>
</html>
