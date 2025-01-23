

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
            <a href="tambah_data" class="
                w-full
                py-2
                text-left
                px-4
                text-sky-400
                border-l-2 border-sky-400
                transition
            ">
            Data Mahasiswa
            </a>
            <a href="../mahasiswa/add_data" class="
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
            <div class="w-full flex flex-col gap-3 relative">                
                <h2 class="text-2xl">Data Mahasiswa</h2>
                <?php  
                $j = 0;
                ?>
                <table class="w-full text-left rounded">
                    <thead class="text-white">
                        <tr class="bg-slate-500/20 rounded-t">
                            <th class="px-4 py-2">Nama</th>
                            <th class="px-4 py-2">NIM</th>
                            <th class="px-4 py-2">Alamat</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Fakultas</th>
                            <th class="px-4 py-2">Prodi</th>
                            <th class="px-4 py-2">Tahun Masuk</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-white/80">
                        <?php

                        foreach ($mahasiswa as $mhs) {
                            echo "<tr class='" . (($j++ % 2 == 0) ? 'bg-transparent' : 'bg-slate-500/20') . "'>";
                            echo "<td class='border-b-2 border-t-2 border-collapse px-4 py-2'>{$mhs->nama_mahasiswa}</td>";
                            echo "<td class='border-b-2 border-t-2 border-collapse px-4 py-2'>{$mhs->nim}</td>";
                            echo "<td class='border-b-2 border-t-2 border-collapse px-4 py-2'>{$mhs->alamat_mahasiswa}</td>";
                            echo "<td class='border-b-2 border-t-2 border-collapse px-4 py-2'>{$mhs->email_mahasiswa}</td>";
                            echo "<td class='border-b-2 border-t-2 border-collapse px-4 py-2'>{$mhs->fakultas}</td>";
                            echo "<td class='border-b-2 border-t-2 border-collapse px-4 py-2'>{$mhs->prodi}</td>";
                            echo "<td class='border-b-2 border-t-2 border-collapse px-4 py-2'>{$mhs->tahun_masuk}</td>";
                            echo "<td class='border-b-2 border-t-2 border-collapse px-4 py-2'>
                                <a href='delete/" . $mhs->id_mahasiswa . "' class='bg-red-500 rounded-lg px-2 py-1 text-white'>Hapus</a>
                            </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




<script src="<?= base_url('application\views\admin\tambah-data.js') ?>"></script>
</body>
</html>