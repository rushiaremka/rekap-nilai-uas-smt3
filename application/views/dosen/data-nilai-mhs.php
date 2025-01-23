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
        min-h-screen
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
            sticky top-16
        ">
            <a href="../susu/ganyu" class="
                w-full
                py-2
                text-left
                px-4
                text-slate-300
                hover:text-white
                border-l-2 border-slate-500
             ">
            Dashboard
            </a>
            <a href="edit_nilai" class="
                w-full
                py-2
                text-left
                px-4
                text-sky-400
                border-l-2 border-sky-400
                transition
            ">
            Data Nilai Mahasiswa
            </a>

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
            flex-col
            text-white
            gap-3
            p-3
            relative
        ">
            <!-- <a class="mb-6 bg-blue-700 rounded-lg py-2 text-center" href="">Input Nilai</a> -->
            <div class="w-full bg-slate-800 p-4 rounded-lg">
                <h1 class="text-2xl font-bold">Data Nilai Mahasiswa</h1>
                <h1>Daftar Kelas</h1>
                <ul>
                    <?php foreach ($kelas as $k): ?>
                        <li><a href="<?= site_url('kelas/mahasiswa/'.$k['id_kelas']); ?>"><?= $k['nama_kelas']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>




    <script>
document.querySelectorAll('.edit-button').forEach(button => {
    button.addEventListener('click', function() {
        const id = this.getAttribute('data-id'); // Ambil ID dari data-id

        // Menutup form lainnya yang terbuka
        document.querySelectorAll('.edit-form').forEach(form => {
            if (form.id !== 'editForm-' + id) {
                form.classList.add('hidden'); // Menyembunyikan form lain
            }
        });

        // Menampilkan form yang terkait dengan tombol yang ditekan
        document.getElementById('editForm-' + id).classList.remove('hidden');
    });
});

// Tambahkan event listener untuk tombol close setelah form ditampilkan
document.addEventListener('click', function(event) {
    if (event.target && event.target.classList.contains('close_Btn')) {
        const id = event.target.getAttribute('id').split('-')[1]; // Mengambil ID dari tombol close
        const formToClose = document.getElementById('editForm-' + id); // Cari form terkait berdasarkan ID

        if (formToClose) {
            formToClose.classList.add('hidden'); // Menyembunyikan form terkait
        }
    }
});

// Pastikan tombol close hanya menyembunyikan form yang benar


    </script>
</body>
</html>