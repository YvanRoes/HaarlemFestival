<?php
 include __DIR__ . '/../../services/mailService.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button onclick="<?php sendMail('codykoning1@gmail.com', 'test', 'this has been send via the website', 'test'); ?>" >Send Mail</button>
</body>
</html>