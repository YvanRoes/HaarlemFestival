<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

    <title>Employee Panel</title>
</head>

<body class="w-[100vw] h-[100vh] overflow-x-hidden bg-[#F7F7FB] flex flex-col items-center ">
    <?php
    include __DIR__ . '/../header.php';
    generateHeader('home', 'dark');
    ?>
    <div class="w-screen h-fit  mt-[100px] mb-[50px]">
        <div class="col-span-6 row-span-1 border-y-[1px] border-[#656262]" id="header">
            <div class="flex items-center justify-center h-[100%]" id="nav">
                <ul class="decoration-none flex items-center justify-center flex-row gap-[20px] text-[#656262] mt-[20px] mb-[20px]">
                    <li class="transition ease-in-out hover:translate-y-[-5px] hover:text-[#121212] ">Scanner</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <h1 class="text-[36px] font-bold text-green-500 mt-[30px]" id="message"></h1>

    <div id="reader" class="w-[700px]"></div>

</body>

<script>
    message = document.getElementById("message");
     function onScanSuccess(decodedText, decodedResult) {
        if (decodedText == "111"){
            if (message.classList.contains("text-red-500")){
                message.classList.remove("text-red-500");
            }
            message.classList.add("text-green-500");
            message.innerHTML = "Valid Ticket";
        }
        console.log(`Code matched = ${decodedText}`, decodedResult);
    }

    function onScanFailure(error) {
        console.warn(`Code scan error = ${error}`);
        if (message.classList.contains("text-green-500")){
                message.classList.remove("text-green-500");
        }
        message.classList.add("text-red-500");
        message.innerHTML = "Invalid Ticket";
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
    "reader",
    { fps: 10, qrbox: {width: 250, height: 250} },
    /* verbose= */ false);
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>



</html>