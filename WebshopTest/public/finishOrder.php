

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="formFinishOrder.php" method="post" enctype="multipart/form-data">
    <h1>Finalize purchase</h1>

        <div>
        <h2>Delivery Address</h2>
        <label><b>Street</b></label><br>
        <input type="text" name="street"><br>
        <label><b>House number</b></label><br>
        <input type="text" name="house_number"><br>
        <label><b>Postal Code</b></label><br>
        <input type="text" name="postal_code"><br>
        <label><b>City</b></label><br>
        <input type="text" name="city"><br>
        </div>

        <div>
        <h2>Invoice Address</h2>
        <label><b>Street</b></label><br>
        <input type="text" name="in_street"><br>
        <label><b>House number</b></label><br>
        <input type="text" name="in_house_number"><br>
        <label><b>Postal Code</b></label><br>
        <input type="text" name="in_postal_code"><br>
        <label><b>City</b></label><br>
        <input type="text" name="in_city"><br>
        </div><br>
        <div>
        <h2>Type of payment</h2>
            <select name="payment_type" id="">
                <option value="1">Card</option>
                <option value="2">Invoice</option>
            </select><br><br>
            <button type="submit">Next</button>
        </div>
    </form>   
</body>
</html>

