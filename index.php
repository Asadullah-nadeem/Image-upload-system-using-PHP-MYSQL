<?php include "db_conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload Using PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-8 bg-white rounded shadow-lg">
        <h2 class="text-2xl font-bold mb-4">Upload Image</h2>
        <form action="upload.php" method="post" enctype="multipart/form-data" class="space-y-4">
            <?php if (isset($_GET['error'])): ?>
                <p class="text-red-500"><?php echo $_GET['error']; ?></p>
            <?php endif ?>
            <div>
                <input type="file" name="my_image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            </div>
            <div>
                <input type="submit" name="submit" value="Upload" class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 cursor-pointer">
            </div>
        </form>
        <a href="view.php" class="block mt-4 text-center text-blue-500 hover:underline">View uploads</a>
		<a href="api.php" class="block mt-4 text-center text-blue-500 hover:underline">Api here</a>
    </div>

</body>
</html>
