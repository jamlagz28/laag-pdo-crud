<?php
// Check existence of id parameter before processing further
if(isset($_GET["product_id"]) && !empty(trim($_GET["product_id"]))){
    // Include config file
    require_once "../db/config.php";
    
    // // Prepare a select statement
    // $sql = "SELECT * FROM employees WHERE id = :id";
    $sql = "SELECT * FROM products WHERE product_id = :product_id";

    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":product_id", $param_product_id);
        
        // Set parameters
        $param_product_id = trim($_GET["product_id"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            if($stmt->rowCount() == 1){
              
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                 // Retrieve individual field value
                 $product_id =  $row["product_id"];
                 $product_thumbnail_link =  $row["product_thumbnail_link"];
                 $product_name = $row["product_name"];
                 $product_description =  $row["product_description"];
                 $product_retail_price = $row["product_retail_price"];
                 $product_date_added =  $row["product_date_added"];
                 $product_updated_date =  $row["product_updated_date"];
 
             } else{
                 // URL doesn't contain valid id parameter. Redirect to error page
                 header("location: public/error.php");
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
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
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
                    <h1 class="mt-5 mb-3">View Record</h1>
                    <div class="form-group">
                        <label>Name</label>
                        <p><b><?php echo $row["name"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <p><b><?php echo $row["address"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Salary</label>
                        <p><b><?php echo $row["salary"]; ?></b></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>