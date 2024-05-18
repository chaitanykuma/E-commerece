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
<?php
    if(isset($_POST["update"])){
        $firstname = $_POST["user_firstname"];
        $lastname = $_POST["user_lastname"];
        $country = $_POST["country"];
        $state = $_POST["state"];
        $district = $_POST["district"];
        $sub_division = $_POST["sub_division"];
        $postal = $_POST["postal_code"];
        $address_lan_1 = $_POST["user_address_1"];
        $address_lan_2 = $_POST["user_address_2"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $note = $_POST["note"];
        date_default_timezone_set('Asia/Kolkata');
        $created_at = date( 'd-m-Y h:i:s A', time ());
        $postal_code = strlen($postal);
        function numeric_validation($postal){
            return (preg_match('/^[0-9]+$/' ,$postal));
        }
        function phone_validation($phone){
            return (preg_match('/^[0-9]+$/' ,$phone));
        }
            if($postal_code <= 5){
                    $errmessage = "A valid postal code consists of six digits and must not be smaller than six.";
                }
                elseif($postal_code >=7){
                    $errmessage = "A postal code typically comprises six digits and should not exceed that length.";
                }
                elseif($postal_code = 6){
                if(numeric_validation("$postal")){
                    $phoneno = strlen($phone);
                    if($phoneno <= 9){
                        $errmessage = "Invalid mobile no should not less then 10.";
                    }
                    elseif($phoneno >= 11){
                        $errmessage = "invalid mobile no should not greater than 10.";
                    }
                    elseif($phoneno = 10){
                        if(phone_validation("$phone")){
                            $insert = mysqli_query($conn, "UPDATE user_address SET user_id='$_SESSION[id]', firstname='$firstname', lastname='$lastname', country='$country', state='$state', district='$district', sub_division='$sub_division', postal_code='$postal', address_lan_1='$address_lan_1', address_lan_2='$address_lan_2', email='$email', phone='$phone', note='$note' WHERE address_id = $_GET[address_id]");
                            echo "<script>alert('The address has been successfully updated.');
                            window.location.replace('../checkout.php');
                            </script>";

                        }else{
                            $errmessage = "The phone number provided appears to be invalid.";
                    }
                }
                }else{
                    $errmessage = "The provided postal code does not appear to be valid.";
                }
                }
    }
    ?>
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
    $address = $_GET["address_id"];
$fetch = mysqli_query($conn, "SELECT * FROM user_address WHERE address_id = '$address'");
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
}
?>
<div class="col-md-6 mb-5 mb-md-0" style="padding-top: 20px; margin-left: 300px;">
		          <h2 class="h3 mb-3 text-black">Billing Details</h2>
		          <div class="p-3 p-lg-5 border bg-white">
                    <form action="" method="POST">
		            <div class="form-group">
		              <label for="c_country" class="text-black">Country <span class="text-danger">*</span></label>
		              <select id="country" class="form-control" name="country" required>
		                <option value="Bharat(India)"><?php echo $country; ?></option>    
		              </select>
		            </div>
		            <div class="form-group row">
		              <div class="col-md-6">
		                <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="user_firstname" name="user_firstname" value="<?php echo $firstname; ?>" required>
		              </div>
		              <div class="col-md-6">
		                <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="user_lastname" name="user_lastname" value="<?php echo $lastname; ?>" required>
		              </div>
		            </div>

		            <div class="form-group row">
		              <div class="col-md-12">
		                <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="user_address" name="user_address_1" placeholder="Street address" value="<?php echo $address_lan_1; ?>" required>
		              </div>
		            </div>

		            <div class="form-group mt-3">
		              <input type="text" class="form-control" placeholder="Address lane-2(optional)" name="user_address_2" value="<?php echo $address_lan_2; ?>">
		            </div>

		            <div class="form-group row">
		              <div class="col-md-6">
		                <label for="state" class="text-black">State<span class="text-danger">*</span></label>
                        <select id="country" class="form-control" name="state" required>
		                <option value="<?php echo $state; ?>"><?php echo $state; ?></option>
                        <option value="Andra Pradesh">Andra Pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madya Pradesh">Madya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Orissa">Orissa</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttaranchal">Uttaranchal</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="West Bengal">West Bengal</option>
                        <option disabled style="background-color:#aaa; color:#fff">UNION Territories</option>
                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                        <option value="Daman and Diu">Daman and Diu</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Lakshadeep">Lakshadeep</option>
                        <option value="Pondicherry">Pondicherry</option>
                      </select>       
		              </select>
		              </div>
		              <div class="col-md-6">
		                <label for="district" class="text-black">District<span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="district" name="district" value="<?php echo $district ?>" required>
		              </div>
		            </div>

                    <div class="form-group row">
		              <div class="col-md-6">
		                <label for="sub-division" class="text-black">Sub-division<span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="sub-division" name="sub_division" value="<?php echo $sub_division; ?>" required>
		              </div>
		              <div class="col-md-6">
		                <label for="postal-code" class="text-black">Postal-code<span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="postal_code" name="postal_code" value="<?php echo $postal; ?>" required>
		              </div>
		            </div>

		            <div class="form-group row mb-5">
		              <div class="col-md-6">
		                <label for="c_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="email" name="email" value="<?php  echo $email ?>" required>
		              </div>
		              <div class="col-md-6">
		                <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="<?php echo $phone; ?>" required>
		              </div>
		            </div>
		            <div class="form-group">
		              <label for="c_order_notes" class="text-black">Order Notes</label>
		              <textarea name="note" id="note" cols="30" rows="5" class="form-control" placeholder="Write your notes here..." name="notes"><?php echo $note; ?></textarea>
		            </div>
                    <div class="form-group" style="margin-top: 30px;">
                    <input type="submit" class="btn btn-black btn-lg py-3 btn-block" name="update" value="Update" />
		                  <!-- <a class="btn btn-black btn-lg py-3 btn-block" name="submit">Edit</a> -->
						  <a class="btn btn-black btn-lg py-3 btn-block" href="delete.php?address_id=<?php echo $address; ?>" onclick='return adddelete()' >Delete</a>
		                </div></br>
                        <p class="error" style="color: #FF0000;"><?php if(!empty($errmessage)){ echo "* ".$errmessage; }?></p>
                    </form>
		          </div>
		        </div>
                <script>
                    function adddelete(){
                        return confirm('Are you sure you want to delete the address?');
                    }
                    </script>
</body>
</html>