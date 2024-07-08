<?php include "db_conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View uploaded images</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        .overlay {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
        .overlay.show {
            display: flex;
        }
    </style>
</head>
<body class="bg-gray-100 p-6">
    <a href="index.php" class="text-red-500 text-2xl">&times;</a>
    <div class="container mx-auto mt-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php 
                $sql = "SELECT * FROM images ORDER BY id DESC";
                $res = mysqli_query($conn,  $sql);

                if (mysqli_num_rows($res) > 0) {
                    while ($images = mysqli_fetch_assoc($res)) {  
            ?>
            <div class="relative acc bg-white rounded-lg overflow-hidden shadow-lg">
                <img src="uploads/<?=$images['image_url']?>" alt="Uploaded Image" class="w-full h-auto cursor-pointer" onclick="showOverlay(this)">
                <div class="overlay">
                    <a href="uploads/<?=$images['image_url']?>" download class="text-white bg-blue-500 px-4 py-2 rounded">Download</a>
                </div>
            </div>
            <?php 
                    } 
                } 
            ?>
        </div>
    </div>
    <script>
        function showOverlay(img) {
            const overlays = document.querySelectorAll('.overlay');
            overlays.forEach(overlay => overlay.classList.remove('show'));
            img.nextElementSibling.classList.add('show');
        }

        document.addEventListener('click', function(event) {
            if (!event.target.closest('.acc')) {
                const overlays = document.querySelectorAll('.overlay');
                overlays.forEach(overlay => overlay.classList.remove('show'));
            }
        });
    </script>
</body>
</html>
