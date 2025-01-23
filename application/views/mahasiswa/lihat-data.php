<?php 
$this->load->database();

$sesi_login = $this->session->userdata('user_id');

if (!$sesi_login) {
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="overflow-x-hidden">
    <div class="w-screen h-auto font-poppins bg-slate-900 flex flex-row px-4">
        <!-- Sidebar -->
        <div class="w-1/4 h-auto min-h-screen bg-transparent backdrop-blur border-r-2 border-slate-300/10 flex flex-col p-4">
            <a href="../../susu/ganyu" class="w-full py-2 text-left px-4 text-slate-300 hover:text-white border-l-2 border-slate-500 hover:border-white">
                Dashboard
            </a>
            <?php 
            $username = $this->session->userdata('username');
            $role = $this->db->query("SELECT role FROM ci_users WHERE username = ?", [$username])->row();
            if ($role && $role->role == 'admin') { ?>
                <a href="../mahasiswa/show_data" class="w-full py-2 text-left px-4 text-slate-300 hover:text-white border-l-2 border-slate-500 hover:border-white">
                    Data Mahasiswa
                </a>
                <a href="../mahasiswa/add_data" class="w-full py-2 text-left px-4 text-slate-300 hover:text-white border-l-2 border-slate-500 hover:border-white">
                    Tambah Data Mahasiswa
                </a>
            <?php } elseif ($role && $role->role == 'dosen') { ?>
                <a href="../nilai/nilai_mhs" class="w-full py-2 text-left px-4 text-slate-300 hover:text-white border-l-2 border-slate-500 hover:border-white">
                    Data Nilai Mahasiswa
                </a>
            <?php } elseif ($role && $role->role == 'mahasiswa') { ?>
                <a href="lihat_data" class="w-full py-2 text-left px-4 text-sky-400 border-l-2 border-sky-400">
                    Lihat Data saya
                </a>
            <?php } ?>
            <a href="../auth/logout" class="w-full py-2 text-left px-4 text-slate-300 hover:text-white border-l-2 border-slate-500 hover:border-white">
                Logout
            </a>
        </div>
        <!-- Content -->
        <div class="container w-full min-h-screen h-full flex flex-row text-white gap-3 p-3">
            <!-- Data Mahasiswa -->
            <div class="w-full h-auto flex justify-start">
                <div class="w-full py-2 px-4 h-max bg-slate-800 p-4 rounded-lg">
                    <h1 class="text-2xl text-center pb-2 border-b-2 border-slate-500/20 text-white">Data Diri</h1>
                    <div class="flex flex-col gap-3 mt-4">
                        <div class="flex w-full grid grid-cols-11 gap-3">
                            <p class="text-lg col-span-5">Nama</p>
                            <p class="text-lg">:</p>
                            <p class="text-lg col-span-5"><?php echo $mahasiswa->nama_mahasiswa; ?></p>
                        </div>
                        <div class="flex w-full grid grid-cols-11 gap-3">
                            <p class="text-lg col-span-5">NIM</p>
                            <p class="text-lg">:</p>
                            <p class="text-lg col-span-5"><?php echo $mahasiswa->nim; ?></p>
                        </div>
                        <div class="flex w-full grid grid-cols-11 gap-3">
                            <p class="text-lg col-span-5">Alamat</p>
                            <p class="text-lg">:</p>
                            <p class="text-lg col-span-5"><?php echo $mahasiswa->alamat_mahasiswa; ?></p>
                        </div>
                        <div class="flex w-full grid grid-cols-11 gap-3">
                            <p class="text-lg col-span-5">Email</p>
                            <p class="text-lg">:</p>
                            <p class="text-lg col-span-5"><?php echo $mahasiswa->email_mahasiswa; ?></p>
                        </div>
                        <div class="flex w-full grid grid-cols-11 gap-3">
                            <p class="text-lg col-span-5">Prodi</p>
                            <p class="text-lg">:</p>
                            <p class="text-lg col-span-5"><?php echo $mahasiswa->prodi; ?></p>
                        </div>
                        <div class="flex w-full grid grid-cols-11 gap-3">
                            <p class="text-lg col-span-5">Fakultas</p>
                            <p class="text-lg">:</p>
                            <p class="text-lg col-span-5"><?php echo $mahasiswa->fakultas; ?></p>
                        </div>
                        <div class="flex w-full grid grid-cols-11 gap-3">
                            <p class="text-lg col-span-5">Tahun Masuk</p>
                            <p class="text-lg">:</p>
                            <p class="text-lg col-span-5"><?php echo $mahasiswa->tahun_masuk; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Diagram Progress -->
            <div class="w-full h-max flex flex-col flex justify-center items-center">
                <?php
                $grouped_nilai = [];
                foreach ($nilai as $n) {
                    $grouped_nilai[$n->nama_matkul][] = $n;
                }

                $data_for_chart = [];
                foreach ($grouped_nilai as $matkul => $nilai_list) {
                    $total_nilai = 0;
                    foreach ($nilai_list as $n) {
                        $total_nilai += $n->nilai; 
                    }
                    $data_for_chart[] = ['matkul' => $matkul, 'total_nilai' => $total_nilai];
                }
                ?>
                <div id="progress-container" class="w-full h-full flex flex-row gap-3 flex-wrap">
                    <?php foreach ($data_for_chart as $data): ?>
                        <div class="progress-item bg-slate-300/10 rounded-lg w-1/4 h-56 p-4 flex flex-col items-center">
                            <h3 class="text-center h-20"><?= $data['matkul'] ?></h3>
                            <canvas class="h-20 " id="progressCircle_<?= str_replace(' ', '_', $data['matkul']) ?>" width="200" height="200"></canvas>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <script>
    <?php foreach ($data_for_chart as $data): ?>
        (function() {
            const nilai = <?= $data['total_nilai'] ?>;
            const ctx = document.getElementById('progressCircle_<?= str_replace(' ', '_', $data['matkul']) ?>').getContext('2d');

            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Progress', 'Remaining'],
                    datasets: [{
                        data: [nilai, 100 - nilai],
                        backgroundColor: ['#38bdf8', '#E0E0E0'],
                        borderWidth: 0
                    }]
                },
                options: {
                    cutout: '85%',
                    responsive: true,
                    plugins: {
                        tooltip: { enabled: false },
                        legend: { display: false },
                        title: {
                            display: true,
                            text: `${nilai}`,
                            font: { size: 20, weight: 'bold' },
                            color: '#38bdf8'
                        }
                    }
                }
            });
        })();
    <?php endforeach; ?>
    </script>
</body>
</html>
