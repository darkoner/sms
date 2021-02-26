<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>

<body>
<h3>Verify Your Email Address</h3>

<div>
    Please follow the link below to verify your email address.
    <br/>
    {{ URL::to('profile/verify_email/' . $confirmation_code) }}<br/>

    <br><br>
    Kind Regards<br>

</div>

</body>
</html>