<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="w-auto h-auto flex justify-center bg-indigo-50 overflow-x-hidden">
    <div class="font-poppins absolute top-0 min-h-screen max-w-screen min-w-screen bg-indigo-50 flex items-start justify-center flex-col overflow-x-hidden">
        <div class="container-xl w-full mt-24 bg-indigo-50 flex items-start justify-center">
            <div class="container-xl h-auto w-96 flex items-start justify-start flex-col">
                <h1 class="text-5xl drop-shadow">Register Cuy</h1>
                <p class="text-1xl pr-10 pt-5">
                Langkah pertama selalu penuh arti. Daftarkan dirimu sekarang dan bukalah pintu menuju dunia akademik yang dipenuhi tantangan, peluang, dan kemenangan. Di sini, setiap informasi yang kamu isi adalah awal dari cerita besar tentang perjalanan hidupmu.
                <br>
                Bayangkan masa depan di mana setiap pencapaian akademikmu menjadi batu loncatan menuju impian. Jangan ragu untuk melangkah! Sistem ini dirancang untuk membantumu mencatat sejarah akademikmu dengan presisi dan kemudahan.
                <br>
                Waktunya datang! Jangan biarkan dirimu terjebak dalam keraguan. Masa depan menunggu, dan semuanya dimulai dari satu klik di bawah ini. Apakah kamu siap menjadi bagian dari sesuatu yang lebih besar? Saatnya kamu menentukan takdirmu.
                </p>
            </div>
            <div class="container-xl h-auto w-96 flex items-center justify-center bg-indigo-100 shadow-lg">
                <form action="<?php echo site_url('auth/proses_register')?>" method="post" class="w-full h-full bg-indigo-100 p-7 rounded-lg container-lg">
                    <div class="w-full flex flex-col mb-4">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" placeholder="Masukkan Nama" class="rounded-md w-full px-4 py-2" require>
                    </div>
                    <div class="w-full flex flex-col mb-4">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="Masukkan Username" class="rounded-md w-full px-4 py-2" require>
                    </div>
                    <div class="w-full flex flex-col mb-4">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Masukkan Email" class="rounded-md w-full px-4 py-2" require> 
                    </div>
                    <div class="w-full flex flex-col mb-4">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Masukkan Password" class="rounded-md w-full px-4 py-2" require>
                    </div>
                    <div class="w-full flex flex-col mb-4">
                        <label for="confirmPassword">Password</label>
                        <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Masukkan Password" class="rounded-md w-full px-4 py-2" require>
                    </div>
                    <div class="w-full h-auto flex flex-col justify-center mt-4">
                        <a href="<?php echo site_url('auth/forgotten_password') ?>" class="w-full flex items-center justify-center text-blue-500">Lupa Password?</a>
                        <button  type="submit" class="w-full h-auto bg-indigo-700 rounded-lg py-2 text-indigo-50 mt-2">Register</button>
                        <a href="<?php echo site_url('susu/ayakalogin')?>" class="rounded-lg w-full h-auto bg-transparent border border-indigo-700 text-indigo-700 mt-2 py-2 text-center">Login</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-32 h-32 w-full relative">
            <div class="absolute -top-32 left-0 h-full w-full">
                <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#4338CA" fill-opacity="1" d="M0,192L48,165.3C96,139,192,85,288,96C384,107,480,181,576,224C672,267,768,277,864,250.7C960,224,1056,160,1152,133.3C1248,107,1344,117,1392,122.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg></body>
            </div>
        </div>
        
        <div class="container-xl h-full w-full p-20 bg-indigo-700 grid grid-cols-3 gap-10">
           <div class="container rounded-lg w-auto h-auto flex flex-col bg-indigo-100 gap-3 p-10">
                <div class='container flex justify-center px-5'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-journal-text text-indigo-700" viewBox="0 0 16 16">
                        <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                    </svg>
                </div>
                <p class='text-2xl container flex items-center justify-center text-center px-5 text-indigo-700'>
                    Lihat nilai tugas anda
                </p>
           </div>
           <div class="container rounded-lg w-auto h-auto flex flex-col bg-indigo-100 gap-3 p-10">
                <div class='container flex justify-center px-5'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-opencollective text-indigo-700" viewBox="0 0 16 16">
                        <path fill-opacity=".4" d="M12.995 8.195c0 .937-.312 1.912-.78 2.693l1.99 1.99c.976-1.327 1.6-2.966 1.6-4.683 0-1.795-.624-3.434-1.561-4.76l-2.068 2.028c.468.781.78 1.679.78 2.732z"/>
                        <path d="M8 13.151a4.995 4.995 0 1 1 0-9.99c1.015 0 1.951.273 2.732.82l1.95-2.03a7.805 7.805 0 1 0 .04 12.449l-1.951-2.03a5.07 5.07 0 0 1-2.732.781z"/>
                    </svg>
                </div>
                <p class='text-2xl container flex items-center justify-center text-center px-5 text-indigo-700'>
                    Lihat nilai ujian anda
                </p>
           </div>
           <div class="container rounded-lg w-auto h-auto flex flex-col bg-indigo-100 gap-3 p-10">
                <div class='container flex justify-center px-5'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-list-check text-indigo-700" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0m0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0m0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0"/>
                    </svg>
                </div>
                <p class='text-2xl container flex items-center justify-center text-center px-5 text-indigo-700'>
                    Lihat nilai kehadiran anda
                </p>
           </div>
        </div>

    </div>
</html>
