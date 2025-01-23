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
        h-full
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
            <a href="ganyu" class="
                w-full
                py-2
                text-left
                px-4
                text-sky-400
                border-l-2 border-sky-400
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
                hover:text-white
                border-l-2 border-slate-500
                transition
                hover:border-white
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
                $id_users = $this->session->userdata('user_id');
            ?>
            <a href="<?php echo site_url('mahasiswa/lihat_data/' . $id_users); ?>"
                class="w-full
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
            h-full
            flex
            grid
            grid-cols-3
            text-white
            gap-3
            p-3
        ">
            <div class="w-full flex flex-col gap-3">
                <div class="profile flex flex-col justify-start text-center bg-slate-500/10 p-4 rounded-lg">
                    <p class="text-xl py-4 px-2">
                    Selamat Datang, 
                    <?php 
                    $query = $this->db->get('ci_users');
                    $data = $this->session->userdata('user_id');

                    $row = $this->db->get_where('ci_users', ['id_users' => $data])->row();
                    echo $row->nama_users
                    ?>
                    
                    </p>
                    <div class="w-full h-auto rounded-lg border-4 border-slate-300/10 flex items-center justify-center">
                        <img 
                        src="<?= base_url($row->profile_picture ? $row->profile_picture : 'uploads/profile_photos/default.png') ?>" 
                        class="w-full aspect-square rounded-lg"
                        >
                    </div>
                </div>
            </div>
            <div class="w-full flex flex-col gap-3">
                <?php 
                if($role && $role->role == 'admin'){
                ?>                
                <div class="py-4 px-2 bg-slate-500/10 h-auto flex flex-wrap rounded-lg">
                    <p class="text-2xl w-full text-center">
                        Admin
                    </p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor" class="bi bi-person-gear w-full" viewBox="0 0 16 16">
                        <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m.256 7a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
                    </svg>
                </div>
                <p class="py-4 px-4 bg-slate-500/10 h-auto flex flex-col  rounded-lg text-base leading-6">
                    Kamu dapat menambah, memodifikasi, atau menghapus data mahasiswa yang ada.
                </p>
                <?php 
                }

                elseif($role && $role->role == 'dosen'){
                ?>
                <div class="py-4 px-2 bg-slate-500/10 h-auto flex flex-wrap rounded-lg">
                    <p class="text-2xl w-full text-center">
                        Dosen
                    </p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor" class="bi bi-briefcase w-full" viewBox="0 0 16 16">
                        <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5m1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0M1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5"/>
                    </svg>
                </div>
                <p class="py-4 px-4 bg-slate-500/10 h-auto flex flex-col  rounded-lg text-base leading-6">
                    Kamu dapat menambah, memodifikasi, atau menghapus nilai mahasiswa.
                </p>
                <?php 
                }

                elseif($role && $role->role == 'mahasiswa'){
                ?>
                <div class="py-4 px-2 bg-slate-500/10 h-auto flex flex-wrap rounded-lg">
                    <p class="text-2xl w-full text-center">
                        Mahasiswa
                    </p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor" class="bi bi-mortarboard w-full" viewBox="0 0 16 16">
                        <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917zM8 8.46 1.758 5.965 8 3.052l6.242 2.913z"/>
                        <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46z"/>
                    </svg>
                </div>
                <p class="py-4 px-4 bg-slate-500/10 h-auto flex flex-col  rounded-lg text-base leading-6">
                    Kamu bisa melihat nilai kamu di <a class="text-blue-500 underline" href="susu/lihat_data">menu lihat data</a>
                </p>
                <?php
                }
                ?>
            </div>
            <div class="w-full flex flex-col gap-3">
                <?php 
                if($role && $role->role == 'admin') {
                ?>
                <div class="bg-slate-500/10 rounded-lg w-full h-auto flex justify-center p-4">
                    <img src="<?= base_url('assets/image/chart.png') ?>" alt="">
                </div>
                <?php 
                }

                elseif($role && $role->role == 'dosen'){
                ?>
                <div class="bg-slate-500/10 rounded-lg w-full h-auto flex justify-center p-4">
                    <img src="<?= base_url('assets/image/chart.png') ?>" alt="">
                </div>
                <?php
                }

                elseif($role && $role->role == 'mahasiswa') {
                ?>
                <div class="bg-slate-500/10 rounded-lg w-full h-auto flex justify-center p-4">
                    <img src="<?= base_url('assets/image/aurora.png') ?>" alt="">
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>