<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <title>Content Management System</title>
</head>

<body>
    <?php
        include __DIR__ . '/../header.php';
        require_once __DIR__ . '/../../controllers/cmsController.php';
        generateHeader('Content Management System', 'dark');
    ?>
        <div class="mt-[100px]">
        <button type="submit" class="w-[100px] h-[40px] ml-[10px] mb-[10px] text-[#ffffff] font-semibold dark:bg-blue-600 flex items-center justify-center border-2 border-[#29334E] cursor-pointer rounded-md" onclick="back()">Back</button>
                
            <form method="post" id="editorForm" name="editorForm">  
                <input class="text-[32px] m-[10px] outline outline-black outline-[1px]" type="text" name="pageNameInput" id="pageNameInput" placeholder="Insert Page Name">
                <input type="hidden" name="pageName" id="pageName" value="<?php echo $_GET['page']; ?>">
                <textarea id="editor" name="editor">
                    <?php
                        echo $this->content;
                    ?>
                </textarea>
                
                <div class="flex justify-end">
                    <button type="submit" class="w-[100px] h-[40px] mr-[50px] mt-[20px] text-[#ffffff] font-semibold dark:bg-blue-600 flex items-center justify-center border-2 border-[#29334E] cursor-pointer rounded-md" onclick="save()">Save</button>
                </div>
            </form>
        </div>

    <script>
        CKEDITOR.replace( 'editor' );
        CKEDITOR.config.height = 600;
        CKEDITOR.config.allowedContent = true;

        function onLoad() {
            pageName = document.getElementById("pageName").value;
            pageNameInput = document.getElementById("pageNameInput");
            if (pageName == "custom") {
                pageNameInput.classList.remove("hidden");
            } else {
                pageNameInput.classList.add("hidden");
            }
            
        }

        function back() {
            window.confirm("Are you sure you want to go back?")
            if (confirm()) {
                window.location.href = "/userPanel";
            } else {
                return;
            } 
        }

        function save() {
            var data = CKEDITOR.instances.editor.getData();   
            document.getElementById("editorForm").submit();
        }

        onLoad();
    </script>
</body>