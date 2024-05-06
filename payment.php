
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="payment.css">
</head>
<body>
<div class="payment-form-container">
    <form action="pay.php" method="post" id="payment-form">
        <div class="payment-option-buttons">
           
            <button type="button" id="paypal-button">PayPal</button>
            <button type="button" id="applepay-button">Apple Pay</button>
            <button type="button" id="googlepay-button">Google Pay</button>
        </div>

        <div class="or-divider">
            <span>or pay using credit card</span>
        </div>

        <div class="form-group">
            <label for="cardholder-name">Cardholder full name:</label>
            <input type="text" id="cardholder-name" name="name" placeholder="Full Name" required >
            <p id="result" ></p>
        </div>  

        <div class="form-group">
    <label for="card-number">Card Number:</label>
    <input type="text" id="cardNumber" name="card_number" pattern="\d*" minlength="16" maxlength="16" required onkeyup="checkCardType()">
</div>
<p id="result"></p>


        <div class="form-row">
            <div class="form-group">
                <label for="expiry-date">Expiry Date:</label>
                <input type="text" id="expiry-date" name="expirity_date" pattern="\d{2}/\d{2}" placeholder="MM/YY" required>
            </div>

            <div class="form-group">
                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv" pattern="\d*" minlength="3" maxlength="4" required>
            </div>
        </div>

        <div class="form-group">
       <a href="index2.php"> <button type="submit" class="btn btn-success" name="submit">Save</button></a>
       <a href="index2.php" class="btn btn-danger">Cancel</a>
        </div>
    </form>
</div>
<script>
    function checkCardType() {
    var cardNumber = document.getElementById('cardNumber').value;
    var firstDigit = cardNumber.charAt(0);
    var resultText = '';

    if (firstDigit === '4') {
        resultText = 'This is a Visa card.';
    } else if (firstDigit === '5' || firstDigit === '2') {
        resultText = 'This is a Mastercard.';
    } else {
        resultText = 'Unknown card type or invalid number.';
    }

    document.getElementById('result').innerText = resultText;
    }
</script>




            

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="pay.js"></script>




</body>
</html>