<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<title>Credit Card</title>
    <form action="formRegisterCard.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="cars">Choose a credit card:</label>
            <select name="credit_card_type" id=>
            <option value="1">Master</option>
            <option value="2">Visa</option>
            </select>
        </div>

        <div>
            <label>Card owner</label><br>
            <input type="text" name="card_owner"><br>
            <label>Card Number</label><br>
            <input type="text" name="card_number"><br>
            <label>CVC</label><br>
            <input type="text" name="cvc"><br>
            <label>Month</label><br>
            <input type="number" min="1" max="12" name="month"><br>
            <label>Year</label><br>
            <input type="number" name="year" min="2023"><br>
        </div>
        <div>
            <button type="submit">Send</button>
            </div>






    </form>


   
</body>
</html>