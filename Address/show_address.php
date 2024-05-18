<?php
require_once "../config.php";
session_start();
if(empty($_SESSION["id"])){
	header("Location: ../index.php");
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="../favicon.png">
  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="../css/tiny-slider.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
  <title>Furniture || Show_Address_form</title>
</head>
<body>
<div class="flex">
    <li class="cont"><a href="../index.php">Furniture</a></li>
    <div class="disc">
    <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="../shop.php">Shop</a></li>
        <li><a href="../about.php">About Us</a></li>
        <li><a href="../service.php">Service</a></li>
        <li><a href="../blog.php">Blog</a></li>
        <li><a href="../contact.php">Contact Us</a></li>
        <li class="sub-item"><img src="user.svg"></li>
    </ul>
    </div>
</div>
<?php 
if(isset($_GET["address_id"])){
	$address_id = $_GET["address_id"];
	$fetch = mysqli_query($conn, "SELECT * FROM user_address WHERE address_id = '$address_id'");
	if(mysqli_num_rows($fetch) > 0){
		while($res = $fetch->fetch_assoc()){
			$firstname = $res["firstname"];
			$lastname = $res["lastname"];
			$country = $res["country"];
			$state = $res["state"];
			$district = $res["district"];
			$sub_division = $res["sub_division"];
			$postal = $res["postal_code"];
			$address_lan_1 = $res["address_lan_1"];
			$address_lan_2 = $res["address_lan_2"];
			$email = $res["email"];
			$phone = $res["phone"];
			$note = $res["note"];
		}
	}
?>
<div class="col-md-6 mb-5 mb-md-0" style="padding-top: 20px; margin-left: 300px;">
		          <h2 class="h3 mb-3 text-black">Billing Details</h2>
		          <div class="p-3 p-lg-5 border bg-white">
                    <form action="" method="POST">
		            <div class="form-group">
		              <label for="c_country" class="text-black">Country <span class="text-danger">*</span></label>
					  <input type="text" class="form-control" id="country" name="country" value="<?php echo $country; ?>" readonly>
		            </div>
		            <div class="form-group row">
		              <div class="col-md-6">
		                <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="user_firstname" name="user_firstname" value="<?php echo $firstname; ?>" readonly>
		              </div>
		              <div class="col-md-6">
		                <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="user_lastname" name="user_lastname" value="<?php echo $lastname; ?>" readonly>
		              </div>
		            </div>

		            <div class="form-group row">
		              <div class="col-md-12">
		                <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="user_address" name="user_address_1" placeholder="Street address" value="<?php echo $address_lan_1; ?>" readonly>
		              </div>
		            </div>

		            <div class="form-group mt-3">
		              <input type="text" class="form-control" placeholder="Address lane-2(optional)" name="user_address_2" value="<?php echo $address_lan_2; ?>"readonly>
		            </div>

		            <div class="form-group row">
		              <div class="col-md-6">
		                <label for="state" class="text-black">State<span class="text-danger">*</span></label>
						<input type="text" class="form-control" placeholder="Address lane-2(optional)" name="user_address_2" value="<?php echo $state; ?>"readonly>
		              </div>
		              <div class="col-md-6">
		                <label for="district" class="text-black">District<span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="district" name="district" value="<?php echo $district ?>" readonly>
		              </div>
		            </div>

                    <div class="form-group row">
		              <div class="col-md-6">
		                <label for="sub-division" class="text-black">Sub-division<span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="sub-division" name="sub_division" value="<?php echo $sub_division; ?>" readonly>
		              </div>
		              <div class="col-md-6">
		                <label for="postal-code" class="text-black">Postal-code<span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="postal_code" name="postal_code" value="<?php echo $postal; ?>" readonly>
		              </div>
		            </div>

		            <div class="form-group row mb-5">
		              <div class="col-md-6">
		                <label for="c_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>" readonly>
		              </div>
		              <div class="col-md-6">
		                <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="<?php echo $phone; ?>" readonly>
		              </div>
		            </div>
		            <div class="form-group">
		              <label for="c_order_notes" class="text-black">Order Notes</label>
		              <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Write your notes here..." name="notes" readonly><?php echo $note; ?></textarea>
		            </div>
                    <div class="form-group" style="margin-top: 30px;">
		                  <a class="btn btn-black btn-lg py-3 btn-block" href="edit_address.php?address_id=<?php echo $address_id ?>">Edit</a>
						  <a class="btn btn-black btn-lg py-3 btn-block" href="delete.php?address_id=<?php echo $address_id; ?>" onclick='return checkdelete()' >Delete</a>
		                </div></br>
                    </form>
		          </div>
		        </div>
				<?php
				}else{
					echo "The address ID retrieval process encountered an issue.";
				}
				?>
				<script>
					function checkdelete(){
						return confirm('Are you sure you want to delete the address?');
					}
					</script>
</body>
</html>