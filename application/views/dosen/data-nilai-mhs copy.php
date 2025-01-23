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
            <?php 
            $i = 0;
            $grouped_nilai = [];
            foreach($nilai as $n) {
            $grouped_nilai[$n->nama_matkul][] = $n;
            }
            ?>
            <?php foreach($grouped_nilai as $matkul => $nilai_list): ?>
            <div class="flex flex-col justify-start text-center bg-slate-500/10 p-4 rounded-lg relative">


                <div id="editForm" class="top-0 inset-x-1/2 w-max flex flex-col gap-3 bg-slate-900 p-4 rounded-lg z-10 hidden absolute">
                    <div class="w-maxflex flex-col justify-start text-center relative">
                        <span id="close_Btn-<?= $n->id_nilai ?>" class="absolute top-0 right-0 text-4xl text-white cursor-pointer">&times;</span>
                        <form action="edit_nilai" method="post" class="flex flex-col gap-3">
                            <input type="hidden" name="id_nilai" value="<?= $n->id_nilai; ?>">
                            <input type="text" name="nilai" value="<?= $n->nilai; ?>" class="rounded-lg px-4 py-2 bg-slate-700/20 text-white">
                            <button type="submit" class="bg-blue-700 px-4 py-2 rounded-lg">Simpan</button>
                        </form>
                    </div>
                </div>

                
                <h2 class="text-lg font-semibold mb-4"><?= $matkul; ?></h2>
                <table class="w-full text-white mb-4 " > 
                    <tr class="py-2 bg-slate-500/20 rounded-lg grid grid-cols-3">
                        <th class="">Mahasiswa</th>
                        <th class="">Nilai</th>
                        <th class="">Aksi</th>
                    </tr>
                    <?php foreach($nilai_list as $n): ?>
                    <tr class="<?= ($i++ % 2 == 0) ? 'bg-transparent' : 'bg-slate-700/20'; ?> grid grid-cols-3 text-center py-2">  
                        <td><?= $n->nama_matkul; ?></td>
                        <td><?= $n->nilai; ?></td>
                        <td>
                            <span id="editBtn-<?= $n->id_nilai ?>" class="edit-button bg-blue-700 px-2 py-1 rounded cursor-pointer" data-id="<?= $n->id_nilai ?>">Edit</span>
                        </td>
                    </tr>
                    <div id="editForm-<?= $n->id_nilai ?>" class="edit-form top-20 inset-x-1/2 w-max flex flex-col gap-3 bg-slate-900 p-4 rounded-lg z-10 hidden absolute">
                        <div class="w-max flex-col justify-start text-center relative">
                            <span id="close_Btn-<?= $n->id_nilai ?>" class="absolute top-0 right-0 text-4xl text-white cursor-pointer">&times;</span>
                            <form action="edit_nilai" method="post" class="flex flex-col gap-3">
                                <input type="hidden" name="id_nilai" value="<?= $n->id_nilai; ?>">
                                <input type="text" name="nilai" value="<?= $n->nilai; ?>" class="rounded-lg px-4 py-2 bg-slate-700/20 text-white">
                                <button type="submit" class="bg-blue-700 px-4 py-2 rounded-lg">Simpan</button>
                            </form>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </table>
            </div>
            <?php endforeach; ?>

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