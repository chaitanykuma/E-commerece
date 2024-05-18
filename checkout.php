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
<?php require_once "navbar.php"; ?>
	<!-- Start Hero Section -->
	<div class="hero">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-5">
					<div class="intro-excerpt">
						<h1>Checkout</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Hero Section -->
	<div class="untree_co-section">
		<div class="container">
			<div class="row">
				<?php require_once "address-form.php"; ?>
				<div class="col-md-6">
					<form method="POST">
						<div class="row mb-5">
							<div class="col-md-12">
								<h2 class="h3 mb-3 text-black">Address</h2>
								<div class="p-3 p-lg-5 border bg-white">
									<p>Your address</p>
									<div class="input-group w-75 couponcode-wrap">
										<div class="input-group-append">
											<?php
											$request = mysqli_query($conn, "SELECT * FROM user_address WHERE user_id = '$_SESSION[id]'");
											if(mysqli_num_rows($request) > 0){
												while($value = $request->fetch_assoc()){
													$address_id = $value["address_id"];
													$firstname = $value["firstname"];
													$lastname = $value["lastname"];
													$country = $value["country"];
													$state = $value["state"];
													$district = $value["district"];
													$sub_division = $value["sub_division"];
													$postal = $value["postal_code"];
													$address_lan_1 = $value["address_lan_1"];
													$address_lan_2 = $value["address_lan_2"];
													$email = $value["email"];
													$phone = $value["phone"];
													$note = $value["note"];
													?>
													<div style="display: flex;">
														<input type="radio" class="radio" name="address" placeholder="address" value="<?php echo $address_id; ?>" onclick="return myfunction(<?php echo $address_id ?>)" required="required">

														<textarea class="address" rows="3" readonly title="User's Address"><?php echo $firstname; echo ", "; echo $lastname; echo", "; echo"$country"; echo", "; echo"$state";echo", "; echo"$district"; echo", "; echo"$sub_division"; echo", "; echo"$postal"; echo", "; echo $address_lan_1; echo " ,"; echo"$address_lan_2"; echo", "; echo"$email"; echo", "; echo $phone; echo", "; echo $note; ?>"</textarea>
													</div>
													<style>
													.container1{
														width: 450px;
														max-width: 450px;
														padding-top: 10px;
													}
													.address{
														margin-top: 15px;
														margin-left: 20px;
														width: 400px;
														height: 50px;
														background-color: #f6f6f6;
													}
													.radio{
														width: 25px;
														margin-top: 15px;
													}
													</style>
												<?php
												}
											}else{
												echo "No address added yet";
											}
											?>
										</div>
		                			</div>
		              			</div>
		            		</div>
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
										<form method="POST">
										<div class="border p-3 mb-3">
											<div class="border p-3 mb-3" id="display" style="display: flex;">
												<input type="radio" class="payment" name="payment" value="card" id="card" required="required">
												<input type="text" class="funct" value="  Credit/Debit card" readonly>
											</div>
											<div class="collapse" id="collapsecreditcard">
												<div class="border p-3 mb-3">
													<div class="py-2">
														<form class="credit-card" method="POST" >
															<div class="form-header">
																<h4 class="title">Credit/Debit card details</h4>
															</div>
															<div class="form-body">
																<!-- Card Number -->
																<input type="text" class="card-number" id="card-number" placeholder="Card Number">
																<p id="checkcardnumber" style="color: red; font-size: 14px; position: relative; margin-top: -15px;">**card-number is necessary</p>
																<!-- Date Field -->
																<div class="date-field">
																<div class="month">
																	<select id="card_month" name="month" title="Month">
																	<option value="0">Select</option>
																	<option value="1">January</option>
																	<option value="2">February</option>
																	<option value="3">March</option>
																	<option value="4">April</option>
																	<option value="5">May</option>
																	<option value="6">June</option>
																	<option value="7">July</option>
																	<option value="8">August</option>
																	<option value="9">September</option>
																	<option value="10">October</option>
																	<option value="11">November</option>
																	<option value="12">December</option>
																	</select>
																</div>
																<div class="year">
																	<input type="text" class="card-year" id="card_year" placeholder="YYYY">
																	<p id="checkyear" style="color: red; font-size: 14px;">** Please provide a valid year.</p>
																</div>
																<p id="checkmonths" style="color: red; font-size: 14px;">** Please select a Month.</p>
																</div>
															
																<!-- Card Verification Field -->
																<div class="card-verification">
																<div class="cvv-input">
																	<input type="text" name="CVV" class="cvv" id="cvv-number" placeholder="CVV">
																</div>
																<div class="cvv-details">
																	<p>3 or 4 digits usually found <br> on the signature strip</p>
																</div>
																</div>
																<p id="checkcvv" style="color: red; font-size: 14px; margin-top: 15px;">Please ensure that the CVV you provide is valid.</p> 
																<!-- Buttons -->
																<button type="button" class="proceed-btn" id="submitbtn">Use This Method</button>
															</div>
														</form>
													</div>
												</div>
											</div>
											<div class="border p-3 mb-3" style="display: flex;">
												<input type="radio" class="payment" name="payment" value="upi" id="upi" required="required">
												<input type="text" class="funct" value="   UPI" readonly>
											</div>
											<div class="collapse" id="collapsedebitupi">
												<div class="border p-3 mb-3">
													<form method="POST">
														<p class="mb-0">Please enter your UPI ID.</p>
														<div class="py-2" style="display: flex;">
															<input type="text" class="form-control" name="upiid" id="upi-id" style="width: 300px; margin-right: 10px;" placeholder="Enter UPI ID" required>
															<input type="button" id="upibutton" name="upisubmit" style="width: 90px; border-radius: 15px;" value="Verify"/>
														</div>
														<p id="checkupiid" style="color: red; font-size: 14px; margin-top: 15px;">** Please provide a valid UPI ID.</p>
													</form>
												</div>
		                  					</div>
											<div class="border p-3 mb-3" style="display: flex;">
												<input type="radio" class="payment" name="payment" value="COD" id="COD" required="required">
												<input type="text" class="funct" value="  Cash on Delivery" readonly>
											</div>
											
											<style>
													.payment{
														margin-top: 20px;
														margin-bottom: 20px;
														width: 20px;
													}
													.funct{
														font-size: 16px;
														margin-top: 20px;
														margin-bottom: 20px;
														margin-left: 15px;
														border-radius: 10px;
														position: relative;
														border: none;
														outline: none;
														
													}
												</style>
										</div>
										</form>
										<div class="form-group" style="margin-top: 30px;" > 
											<input type="submit" class="btn btn-black btn-lg py-3 btn-block" name="placeorder" id="placeorder" value="Place order" onclick="return validate()">
										</div>
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

function validate(){
		event.preventDefault();
		
		let select = $(".radio:checked").val();
		if(select == null){
			alert("Please choose an address.");
		}else{
		let val = $(".payment:checked").val();
		if(val == "COD"){
			// alert("COD");
			if(confirm("Would you like to proceed with placing the order?")){
				var address_id = select;
				var payment_method = val;
				$.ajax({
					url:'Ajax/codinsert.php',
					method:'POST',
					data:{
						address_id:address_id,
						payment_method:payment_method,
					},
					success:function(data){
						alert("Your order has been successfully placed.");
						window.location.replace('thankyou.php');
					}
				});
			}else{
				return false;
			}
		}else if(val == "upi"){
			// alert("upi");
			let upivalue = $("#upi-id").val();
			if(upivalue.length == 0){
				$("#checkupiid").show();
				upiError = false;
				return false;
			}
			else{
				if(confirm("Could you please confirm that you want to proceed with the payment?")){
					var address_id = select;
					var payment_method = val;
					let upi_id = $("#upi-id").val();
							$.ajax({
								url:'Ajax/upiinsert.php',
								method:'POST',
								data:{
									address_id:address_id,
									payment_method:payment_method,
									upi_id:upi_id
								},
								success:function(data){
									alert("Your order has been successfully placed.");
									window.location.replace('thankyou.php');
								}
							});
				
				}else{
					return false;
				}
			}
		}else if(val == "card"){
			let cardnumber = $("#card-number").val();
			let years = $("#card_year").val();
			let CVV = $("#cvv-number").val();

			if(cardnumber.length == ""){
				$("#checkcardnumber").show();
				cardnumberError = false;
				return false;
			}else if(years.length == ""){
				$("#checkyear").show();
				yearError = false;
				return false;
			}
			else if(CVV.length == ""){
				$("#checkcvv").show();
				CVVError = false;
				return false;
			}else{
				if(confirm("Could you please confirm that you want to proceed with the payment?")){
				var address_id = select;
				var payment_method = val;
				var card_number=$("#card-number").val();
				var months=$("#card_month").val();
				var year=$("#card_year").val();
				var cvv=$("#cvv-number").val();
				$.ajax({
					url:'Ajax/order.php',
					method:'POST',
					data:{
						address_id:address_id,
						payment_method:payment_method,
						card_number:card_number,
						months:months,
						year:year,
						cvv:cvv
					},
					success:function(data){
						alert("Your order has been successfully placed.");
						window.location.replace('thankyou.php');
					}
				});
			}else{
				return false;
			}
			}
		}else{
			alert("Kindly select a payment method.");
		}
	}
	}
	$(document).ready(function(){
		$("#card").click(function(){
			var input = $( "div input:radio#card" ).wrap("<span></span>").parent()
			if($(this).val() === "card"){
				$( "input:radio#upi" ).parent().removeAttr("style");
				$("#collapsedebitupi").hide("fast");
				$("#collapsecreditcard").show("slow");
				$("#checkcardnumber").hide();
			let cardnumberError = true;
			$("#card-number").keyup(function () {
				validatecardnumber();
			}); 
			function validatecardnumber() {
				let cardnumber = $("#card-number").val();
				if(cardnumber.length == ""){
					$("#checkcardnumber").show();
					cardnumberError = false;
					return false;
				}else if(cardnumber.length != 12) {
					$("#checkcardnumber").show();
					$("#checkcardnumber").html("** The card number should consist of 12 digits."); 
					cardnumberError = false;
					return false;
				}else {
					$("#checkcardnumber").hide();
				}
			}
			//validate Months
			$("#checkmonths").hide();
			let monthError = true;
			$( "select" ).change(function() {
				validatemonth();
			})
			function validatemonth(){
				let str = "";
				$( "select option:selected" ).each(function() {
					let Months = str += $( this ).val() + " ";
					if(Months == 0){
						$("#checkmonths").show();
						//   alert('Error');
						monthError = false;
						return false;
					}else{
						$("#checkmonths").hide()
						return true;
					}
				});
			}
			//Validate Year
			$("#checkyear").hide();
			let yearError = true;
			$("#card_year").keyup(function(){
				validateyear();
			});
			function validateyear(){
				let years = $("#card_year").val();
				if(years.length == ""){
					$("#checkyear").show();
					yearError = false;
					return false;
				}else if(years.length != 4){
					$("#checkyear").show();
					$("#checkyear").html("** Provided year is not valid.");
					yearError = false;
					return false;
				}else{
					$("#checkyear").hide();
				}
			}
			//Validate CVV
			$("#checkcvv").hide();
			let CVVError = true;
			$("#cvv-number").keyup(function (){
				validateCVV(); 
			});
			function validateCVV(){
				let CVV = $("#cvv-number").val();
				if(CVV.length == ""){
					$("#checkcvv").show();
					CVVError = false;
					return false;
				}else if(CVV.length < 3 || CVV.length > 4){
					$("#checkcvv").show();
					$("#checkcvv").html("The CVV number must be either 3 or 4 digits in length.");
					CVVError = false;
					return false;
				}else{
					$("#checkcvv").hide();
				}
			}
			// Submit button 
			$('body').on('click', '#submitbtn', function() {
				validatecardnumber();
				validatemonth();
				validateyear();
				validateCVV();
				var card_number=$("#card-number").val();
				var months=$("#card_month").val();
				var year=$("#card_year").val();
				var cvv=$("#cvv-number").val();
				if ( 
					card_number.length == 12 &&
					months.length != 0 && 
					year.length == 4 && 
					cvv.length >= 3 &&
					cvv.length <= 4
					){
						$.ajax({
							url:'Ajax/insert.php',
							method:'POST',
							data:{
								card_number:card_number,
								months:months,
								year:year,
								cvv:cvv
							},
							success:function(data){
								alert(data);
							}
						});
					}else{
						return false;
					} 
				}); 
			}else{$("#collapsecreditcard").hide("fast");
			}
		});
	});


	$(function(){
        $("#upi").click(function(){
			
			var input = $( "div input:radio#upi" ).wrap("<span></span>").parent()
			if($(this).val() === "upi"){
				$( "input:radio#card" ).parent().removeAttr("style");
				$("#collapsecreditcard").hide("fast");
				$("#collapsedebitupi").show("slow");
				$("#checkupiid").hide();
				let upiError = true;
				$("#upi-id").keyup(function () {
					validateupi(); 
				}); 
				function validateupi() {
					let upivalue = $("#upi-id").val();
					let regex = new RegExp(/^[a-zA-Z0-9.\-_]{2,256}@[a-zA-Z]{2,64}$/);
					if(upivalue.length == 0){
						$("#checkupiid").show();
						upiError = false;
						return false;
					}else if (regex.test(upivalue) == true) {
						$("#checkupiid").hide();
						upiError = true;
						return true;
					}
				}
				$("#upibutton").click(function (){
					validateupi();
					if ( 
						upiError == true
						) {
							var upi_id = $("#upi-id").val();
							$.ajax({
								url:'Ajax/upi.php',
								method:'POST',
								data:{
									upi_id:upi_id
								},
								success:function(data){
									alert(data);
								}
							});
						}else{
							return false;
						} 
					});
			}else{
				$("#collapsedebitupi").hide("fast");
			}
	});
});
</script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/tiny-slider.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
