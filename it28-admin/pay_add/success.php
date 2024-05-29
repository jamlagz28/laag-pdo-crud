<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #007bff;
        }

        p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #0056b3;
        }
        body {
    background: #f0f0f0;
    font-family: sans-serif;
    padding-top: 30px;
}
ul.timeline {
    position: relative;
    list-style-type: none;
    padding-left: 180px;
}
ul.timeline:before {
    position: absolute;
    display: block;
    left: 136px;
    width: 8px;
    height: 100%;
    border-radius: 4px;
    background-color: #07b;
    content: ' ';
}
ul.timeline .event {
    position: relative;
    padding: 16px;
    background: white;
    border-radius: 2px;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .2), 0 1px 1px 0 rgba(0, 0, 0, .14), 0 2px 1px -1px rgba(0, 0, 0, .12);
    padding: 16px;
    margin-bottom: 30px;
}
ul.timeline .event:before {
    display: block;
    position: absolute;
    top: 30px;
    left: -55px;
    width: 30px;
    height: 30px;
    border: 6px solid #07b;
    border-radius: 50%;
    background-color: white;
    box-shadow: 0 0 4px -1px rgba(0, 0, 0, 0.6);
    content: ' ';
}
ul.timeline h3 {
    font-size: 1.5em;
    margin-top: 0;
    margin-bottom: 10px;
}
ul.timeline .time {
    position: absolute;
    display: block;
    width: 120px;
    top: 35px;
    left: -179px;
    font-size: 0.9em;
    text-align: right;
    font-weight: 600;
    text-transform: uppercase;
}
ul.timeline .time > .glyphicon-time {
    top: 2px;
}
ul.timeline .left-arrow:before {
    position: absolute;
    top: 30px;
    left: -15px;
    display: inline-block;
    border-top: 15px solid transparent;
    border-right: 15px solid #ddd;
    border-left: 0 solid #ddd;
    border-bottom: 15px solid transparent;
    content: ' ';
}
ul.timeline .left-arrow:after {
    position: absolute;
    top: 30px;
    left: -14px;
    display: inline-block;
    border-top: 15px solid transparent;
    border-right: 15px solid #fff;
    border-left: 0 solid #fff;
    border-bottom: 15px solid transparent;
    content: ' ';
}

    </style>
</head>
<body>
    <div class="container">
        <h2>Thank You for Your Order!</h2>
        <p>Your address has been recorded successfully.</p>
        <a href="../../index.php" class="button">Back to Products</a>
    </div>
    <div class="container">
        <ul class="timeline">
          <li class="event">
            <div class="left-arrow"></div>
            <div class="time">9 April, 2020<br> 11:34 AM <span class="glyphicon glyphicon-time"></span></div>
            <h3>Payment Successful</h3>
            <div class="description"><p>Thank you for shopping with us. Your Payment using KBZ Pay was successful</p></div>
          </li>
          <li class="event">
            <div class="left-arrow"></div>
            <div class="time">9 April, 2020 <br> 11:37 AM <span class="glyphicon glyphicon-time"></span></div>
            <h3>Order Verified</h3>
            <div class="description"><p>Your order has been successfully verified.
      </p></div>
          </li>
           <li class="event">
            <div class="left-arrow"></div>
            <div class="time">10 April, 2020 <br> 09:11 AM <span class="glyphicon glyphicon-time"></span></div>
            <h3>Order Handed over to Logistics Partner</h3>
            <div class="description"><p>Your order has been packed and handed over to a Logistics Partner.
      </p></div>
          </li>
           <li class="event">
            <div class="left-arrow"></div>
            <div class="time">10 April, 2020 <br> 02:22 PM <span class="glyphicon glyphicon-time"></span></div>
            <h3>Order Shipped</h3>
            <div class="description"><p>Your order has been shipped using Myanmar Post. You can track this package using the OrderID at <a href="https://myanmarpost.com/"> https://myanmarpost.com</a>
      </p></div>
          </li>
        </ul>
      </div>
</body>
</html>