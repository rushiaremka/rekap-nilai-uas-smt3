<?php 
$this->load->database();

$sesi_login = $this->session->userdata('user_id');

if(!$sesi_login) {
    redirect('susu/unlogged');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="overflow-x-hidden">
    <div class="
        w-screen
        h-auto
        font-poppins
        bg-slate-900
        flex
        flex-row
        px-4
    ">
        <div class="
            w-1/4
            h-auto
            min-h-screen
            bg-transparent
            backdrop-blur
            border-r-2 border-slate-300/10
            flex
            flex-col
            p-4
        ">
            <a href="../susu/ganyu" class="
                w-full
                py-2
                text-left
                px-4
                text-slate-300
                hover:text-white
                border-l-2 border-slate-500
                hover:border-white
             ">
            Dashboard
            </a>
            <?php 
            $username = $this->session->userdata('username');
            $role = $this->db->query("select role from ci_users where username = '$username'")->row();
            if($role && $role->role == 'admin') {
            ?>
            <a href="../mahasiswa/show_data" class="
                w-full
                py-2
                text-left
                px-4
                text-slate-300
                transition
                hover:text-white
                border-l-2 border-slate-500
                hover:border-white
            ">
            Data Mahasiswa
            </a>
            <a href="../mahasiswa/add_data" class="
                w-full
                py-2
                text-left
                px-4
                text-sky-400
                border-l-2 border-sky-400
                transition
            ">
            Tambah Data Mahasiswa
            </a>
            <?php } 
            
            elseif($role && $role->role == 'dosen') {
            ?>
            <a href="../nilai/nilai_mhs" class="
                w-full
                py-2
                text-left
                px-4
                text-slate-300
                transition
                hover:text-white
                border-l-2 border-slate-500
                hover:border-white
            ">
            Data Nilai Mahasiswa
            </a>
            <?php }

            elseif($role && $role->role == 'mahasiswa'){
            ?>
            <a href="lihat_data" class="
                w-full
                py-2
                text-left
                px-4
                text-slate-300
                hover:text-white
                transition
                border-l-2 border-slate-500
                hover:border-white
            ">
            Lihat Data saya
            </a>
            <?php } ?>
            <a href="../auth/logout" class="
                w-full
                py-2
                text-left
                px-4
                text-slate-300
                transition
                hover:text-white
                border-l-2 border-slate-500
                hover:border-white
                ">
            Logout
            </a>
        </div>
        <div class="
            container
            w-full
            min-h-screen
            h-auto
            flex
            flex
            flex-col
            text-white
            gap-3
            p-3
            relative
        ">
            <div id="form" class="top-0 w-full flex flex-col gap-3 bg-slate-900 p-4 rounded-lg z-10">
                <div class="flex flex-col justify-start text-center relative">
                    <h2 class="text-2xl text-left px-4 font-semibold mb-4">Tambah Data Mahasiswa</h2>
                    <form action="<?php echo site_url('mahasiswa/proses_tambah_data')?>" method="post" class="w-full h-auto bg-slate-500/10 p-7 rounded-lg container-lg text-black">
                        <div class="w-full flex flex-col mb-4">
                            <label class="text-white text-left" for="name">Nama</label>
                            <input type="text" name="nama" id="name" placeholder="Masukkan Nama" class="rounded-md w-full px-4 py-2" require>
                        </div>
                        <div class="w-full flex flex-col mb-4">
                            <label class="text-white text-left" for="NIM">NIM</label>
                            <input type="text" name="nim" id="NIM" placeholder="Masukkan NIM" class="rounded-md w-full px-4 py-2" require>
                        </div>
                        <div class="w-full flex flex-col mb-4">
                            <label class="text-white text-left" for="alamat">Alamat</label>
                            <input type="text" name="alamat" id="alamat" placeholder="Masukkan Alamat" class="rounded-md w-full px-4 py-2" require>
                        </div>
                        <div class="w-full flex flex-col mb-4">
                            <label class="text-white text-left" for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="Masukkan Email" class="rounded-md w-full px-4 py-2" require> 
                        </div>
                        <div class="w-full flex flex-col mb-4">
                            <label class="text-white text-left" for="prodi">Prodi</label>
                            <input type="text" name="prodi" id="prodi" placeholder="Masukkan Prodi" class="rounded-md w-full px-4 py-2" require> 
                        </div>
                        <div class="w-full flex flex-col mb-4">
                            <label class="text-white text-left" for="fakultas">Fakultas</label>
                            <input type="text" name="fakultas" id="fakultas" placeholder="Masukkan Fakultas" class="rounded-md w-full px-4 py-2" require> 
                        </div>
                        <div class="w-full flex flex-col mb-4">
                            <label class="text-white text-left" for="tahun_masuk">Tahun Masuk</label>
                            <input type="text" name="tahun_masuk" id="tahun_masuk" placeholder="Masukkan Tahun Masuk" class="rounded-md w-full px-4 py-2" require> 
                        </div>
                        <div class="w-full flex flex-col mb-4">
                            <label class="text-white text-left" for="password">Password</label>
                            <input type="password" name="password" id="password" placeholder="Masukkan Password" class="rounded-md w-full px-4 py-2" require>
                        </div>
                        <div class="w-full h-auto flex flex-col justify-center mt-4">
                            <button  type="submit" class="w-full h-auto bg-sky-400 rounded-lg py-2 text-slate-900 mt-2">Tambah Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




<script src="<?= base_url('application\views\admin\tambah-data.js') ?>"></script>
</body>
</html>