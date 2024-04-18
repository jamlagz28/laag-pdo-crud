<?php
// Include config file
require_once "../db/config.php";
 
// Define variables and initialize with empty values
// $name = $address = $salary = "";
// $name_err = $address_err = $salary_err = "";
$product_id = $product_thumbnail_link = $product_name = $product_description = $product_retail_price = $product_date_added = $product_updated_date = "";
$Pname_err = $Pdescription_err = $Pprice_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["product_id"]) && !empty($_POST["product_id"])){
    // Get hidden input value
    $id = $_POST["product_id"];
    
    // Validate name
    $input_product_name= trim($_POST["product_name"]);
    if(empty($input_product_name)){
        $Pname_err = "Please enter a product_name.";
    } elseif(!filter_var($input_product_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $Pname_err = "Please enter a valid name.";
    } else{
        $product_name = $input_product_name;
    }
    
    // Validate description
    $input_product_description = trim($_POST["product_description"]);
    if(empty($input_product_description)){
        $Pdescription_err = "Please enter an product_description.";     
    } else{
        $product_description = $input_product_description;
    }
    
    // Validate retail_price
    $input_product_retail_price = trim($_POST["product_retail_price"]);
    if(empty($input_product_retail_price)){
        $Pprice_err = "Please enter the retail_price amount.";     
    } elseif(!ctype_digit($input_product_retail_price)){
        $Pprice_err = "Please enter a positive integer value.";
    } else{
        $product_retail_price = $input_product_retail_price;
    }
    
    // Check input errors before inserting in database
    if(empty($Pname_err) && empty($Pdescription_err) && empty($Pprice_err)){
        // Prepare an update statement
 $sql = "UPDATE products SET product_name=:product_name,product_description=:product_description,, product_retail_price=:product_retail_price, product_date_added=:product_date_added, product_updated_date=:product_updated_date, name=:name, address=:address, salary=:salary
  WHERE product_id=:product_id";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":name", $param_name);
            $stmt->bindParam(":address", $param_address);
            $stmt->bindParam(":salary", $param_salary);
            $stmt->bindParam(":id", $param_id);
            
            // Set parameters
            $param_name = $name;
            $param_address = $address;
            $param_salary = $salary;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records updated successfully. Redirect to landing page
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM employees WHERE id = :id";
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":id", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                    // Retrieve individual field value
                    $name = $row["name"];
                    $address = $row["address"];
                    $salary = $row["salary"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        unset($stmt);
        
        // Close connection
        unset($pdo);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
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
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>