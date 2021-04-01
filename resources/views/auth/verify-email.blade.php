<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Verification</title>
</head>
<body>
    <h1>Verify Email</h1>
    <h3>
        The confirmatory email has been sent to {{ $email[0]->email }}.
        Please check the spam if you haven't received it from the mail.
    </h3>
</body>
</html>