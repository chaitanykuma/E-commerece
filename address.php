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

		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="css/tiny-slider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<title>Furniture || Address-form</title>
	</head>
<body>
    <?php
    
    ?>

<div class="col-md-6 mb-5 mb-md-0">
    <h2 class="h3 mb-3 text-black">Billing Details</h2>
    <div class="p-3 p-lg-5 border bg-white">
    <div class="col-md-12">
        <h2 class="h3 mb-3 text-black">Address</h2>
        <div class="p-3 p-lg-5 border bg-white">
            <div class="input-group w-75 couponcode-wrap">
                <div class="input-group-append">
                    <?php
                    $request = mysqli_query($conn, "SELECT * FROM `user_address` WHERE address_id = '$_SESSION[address_id]'");
                    if(mysqli_num_rows($request) > 0){
                        while($value = $request->fetch_assoc()){
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
							?>
                            <div>
                            <textarea id="address" class="address" name="address" rows="4" cols="42" readonly>
                            <?php echo $firstname; echo ", "; echo $lastname; echo", "; echo"$country"; echo", "; echo"$state";echo", "; echo"$district"; echo", "; echo"$sub_division"; echo", "; echo"$postal"; echo", "; echo $address_lan_1; echo " ,"; echo"$address_lan_2"; echo", "; echo"$email"; echo", "; echo $phone; ?>
                            </textarea>
                            <style>
                                .address{
                                    margin-left: 1px;
                                    background-color: gainsboro;
                                }
                            </style>
                        </div>
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
</div>
</div>
</body>
</html>