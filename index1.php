<?php 
include("connection.php");

$price = $_GET['price'] ?? 0;
$email = $_GET['email'] ?? '';
$contact = $_GET['contact'] ?? '';

$name = 'User';
if (!empty($email)) {
    $query = "SELECT name FROM registration WHERE email = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $name = $row['name'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment Page</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>

<script>
    var amoun = parseInt("<?php echo $price; ?>");
    var contact = "<?php echo $contact; ?>";
    var name = "<?php echo $name; ?>";
    var email = "<?php echo $email; ?>";

    var options = {
        "key": "rzp_test_qe3wTUlGlJslMp",
        "amount": amoun * 100,
        "currency": "INR",
        "name": "Farmers Site",
        "description": "Product Purchase",
        "image": "images/logo.jpeg",
        "handler": function (response) {
            window.location = "lastpage.html";
        },
        "prefill": {
            "name": name,
            "email": email,
            "contact": contact
        },
        "theme": {
            "color": "#3399cc"
        }
    };

    var rzp1 = new Razorpay(options);
    
    window.onload = function () {
        rzp1.open();
    };

    rzp1.on('payment.failed', function (response){
        alert("Payment Failed: " + response.error.description);
    });
</script>

</body>
</html>
