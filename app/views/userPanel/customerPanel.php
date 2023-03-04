<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />

    <title>Admin Panel</title>
</head>

<body class="w-[100vw] h-[100vh] overflow-hidden bg-[#F7F7FB]">
        <?php
            include __DIR__ . '/../header.php';
            generateHeader('home', 'dark');
        ?>
    <div class="w-screen h-[800px] grid grid-cols-6 grid-rows-6 mt-[100px]">
        <div class="col-span-6 row-span-1 border-y-[1px] border-[#656262]" id="header">
            <div class="flex items-center justify-center h-[100%]" id="nav">
                <ul class="decoration-none flex items-center justify-center flex-row gap-[20px] text-[#656262]">
                    <li class="transition ease-in-out hover:translate-y-[-5px] hover:text-[#121212]"><a href="">User information</a></li>
                    <li class="transition ease-in-out hover:translate-y-[-5px] hover:text-[#121212]"><a href="">Personal Program</a></li>
                </ul>
            </div>
        </div>

        </div>
        <div class="col-start-2 col-span-5 row-start-2 row-span-5 flex justify-center" id="Content">
            <div class="w-10/12 h-max p-16 mt-16 rounded-lg shadow" id="ContentWrapper">
                <div class="flex flex-col gap-4" id="contentItemsWrapper">
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>

</body>

</html>