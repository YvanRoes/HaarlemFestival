
<html lang="en">
<script src="https://cdn.tailwindcss.com"></script>

<body>
    <div class="w-full h-full flex justify-center items-center">
        <div class="w-[400px] h-[400px] bg-[#F7F7FB8A] rounded-[15px] flex flex-col justify-center items-center">
            <h1 class="text-[30px] font-bold">Reset Password</h1>
            <?php
            if(isset($_SESSION['passwordVerified']))
            {
                if($_SESSION['passwordVerified'] == true){
                    echo '<h2 class="text-[20px] font-bold">Please enter your new password</h2>';
                 }
                 else
                 {
                     echo '<h2 class="text-[20px] font-bold">You have been send an email with a code please enter that code below</h2>';
                 }
            }
            else
            {
                echo '<h2 class="text-[20px] font-bold">You have been send an email with a code please enter that code below</h2>';
            }
                    ?>
            
            <form action="" method="POST" class="flex flex-col justify-center items-center gap-[10px] mt-[20px]">
                <?php
                if(isset($_SESSION['passwordVerified']))
                {
                    if($_SESSION['passwordVerified'] == true){
                        echo '<input type="text" name="newPassword" placeholder="newPassword" class="w-[300px] h-[40px] rounded-[10px] border-[1px] border-[#D0E9F7]">';
                     }
                     else
                     {
                         echo '<input type="text" name="passwordNumber" placeholder="number" class="w-[300px] h-[40px] rounded-[10px] border-[1px] border-[#D0E9F7]">';
                     }
                }
                else{
                    echo '<input type="text" name="passwordNumber" placeholder="number" class="w-[300px] h-[40px] rounded-[10px] border-[1px] border-[#D0E9F7]">';
                }
                    ?>

                <button type="submit" value="Send" class="w-[300px] h-[40px] rounded-[10px] border-[1px] border-[#D0E9F7]">Send</button>
            </form>
            <form action="" method="POST">
                <input type="submit" value="send-code" name="send-code" class="w-[300px] h-[40px] rounded-[10px] border-[1px] border-[#D0E9F7]">
            </form>
        </div>
    </div>
</html>