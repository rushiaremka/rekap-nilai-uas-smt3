<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unlogged</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="w-screen h-screen font-poppins flex items-center justify-center bg-indigo-50">
       <div class="container w-96 h-auto flex items-center justify-center flex-col gap-2">
            <div class="w-full flex justify-center mb-4 animate-bounce">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-ban" viewBox="0 0 16 16">
                    <path d="M15 8a6.97 6.97 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0"/>
                </svg>
            </div>
            <p class="text-center mb-4">
                Oops, you should login before access the dashboard...
            </p>
            <a href="ayakalogin" class="text-center w-full bg-indigo-700 py-2 rounded-lg hover:bg-indigo-950 hover:text-indigo-700">Login</a>
            <a href="ayakaregister" class="text-center w-full bg-indigo-50 border border-indigo-700 py-2 rounded-lg hover:text-indigo-700 hover:border-indigo-950">Register</a>
       </div>
    </div>
</body>
</html>