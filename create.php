<?php
// Include config file
require_once "../db/config.php";
 
// Define variables and initialize with empty values
// $name = $address = $salary = "";
// $name_err = $address_err = $salary_err = "";
$product_id = $product_thumbnail_link = $product_name = $product_description = $product_retail_price = $product_date_added = $product_updated_date = "";
$Pname_err = $Pdescription_err = $Pprice_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
// validate id
    if (isset($_POST["product_id"])) {
        $input_id = trim($_POST["product_id"]);
        if (empty($input_product_id)) {
            $id_err = "Please enter the id";
        } elseif (!ctype_digit($input_product_id)) {
            $id_err = "Please enter a positive integer value.";
        } else {
            $id = $input_product_id;
        }
    } else {
        $product_id_err = "ID is required";
    }
     // Validate name
     $input_product_name = trim($_POST["product_name"]);
     if(empty($input_product_name)){
         $Pname_err = "Please enter a product name.";
     } elseif (!preg_match("/^[a-zA-Z\s]+$/", $input_product_name)) {
         $name_err = "Please enter a valid name.";
     } else {
         $product_name = $input_product_name;
     }

        // Validate product description
    $input_product_description = trim($_POST["product_description"]);
    if(empty($input_product_description)){
        $Pdescription_err = "Please enter a product description.";
    } else {
        $product_description = $input_product_description;
    }
 
     // Validate product retail price
     $input_product_retail_price = trim($_POST["product_retail_price"]);
     if(empty($input_product_retail_price)){
         $Pprice_err = "Please enter the product retail price.";     
     } elseif(!ctype_digit($input_product_retail_price)){
         $Pprice_err = "Please enter a valid product retail price.";
     } else{
         $product_retail_price = $input_product_retail_price;
     }

    // Validate address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter an address.";     
    } else{
        $address = $input_address;
    }
    
    // Validate salary
    $input_salary = trim($_POST["salary"]);
    if(empty($input_salary)){
        $salary_err = "Please enter the salary amount.";     
    } elseif(!ctype_digit($input_salary)){
        $salary_err = "Please enter a positive integer value.";
    } else{
        $salary = $input_salary;
    }
    
   // Check input errors before inserting in database
    if(empty($Pname) && empty($Pdescription) && empty($Pprice)){
        // Prepare an insert statement
        $sql = "INSERT INTO products (product_id, product_thumbnail_link, product_name, product_description, product_retail_price, product_date_added, product_updated_date) 
        VALUES (:product_id, :product_thumbnail_link, :product_name, :product_description, :product_retail_price, :product_date_added, :product_updated_date)";

        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":name", $param_name);
            $stmt->bindParam(":address", $param_address);
            $stmt->bindParam(":salary", $param_salary);
            
            // Set parameters
            $param_name = $name;
            $param_address = $address;
            $param_salary = $salary;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>"><?php echo $address; ?></textarea>
                            <span class="invalid-feedback"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Salary</label>
                            <input type="text" name="salary" class="form-control <?php echo (!empty($salary_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $salary; ?>">
                            <span class="invalid-feedback"><?php echo $salary_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>