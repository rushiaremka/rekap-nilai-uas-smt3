<?php
$this->load->database();
?>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.css">
<div class="sticky top-0 font-poppins w-screen flex justify-center text-slate-50 bg-slate-900 opacity-100 z-50">
    <nav class="px-4 border-b-2 border-slate-300/10 bg-opacity-50 backdrop-blur bg-slate-900 w-screen max-w-screen grid grid-cols-3 flex flex-row items-start h-16">
        <div class="text-lg px-4 w-full h-16 flex items-center ">Abydos High School</div>
        <form action="" class="flex justify-center items-center h-16 relative ">
            <input type="text" class="h-9 w-full rounded-lg bg-slate-800 px-2  placeholder:text-slate-400" placeholder="Search...">
            <button class="rounded-lg absolute center right-3">
                <i class="bi bi-search text-slate-400"></i>
            </button>
        </form>
        <div class=" container flex items-center justify-end h-16 w-full px-8" >
            <div class="container cursor-pointer bg-slate-50  rounded-full w-auto h-auto flex items-center justify-center" id="userProfile">
                <?php 
                $query = $this->db->get('ci_users'); 
                $data = $this->session->userdata('user_id');

                $row = $this->db->get_where('ci_users', ['id_users' => $data])->row();
                    echo "<img class='w-12 h-12 flex items-center justify-right rounded-full border-2 border-slate-900/10 ' src='" . base_url($row->profile_picture ? $row->profile_picture : 'uploads/profile_photos/default.png') .  "'></img>";
                    echo "<p class='text-slate-700 text-center h-auto w-auto flex items-center justify-end text-2xl pl-2 pr-4 pb-1'>" . $row->username .  "</p>";
                ?>
            </div>
        </div>
    </nav>
</div>
<form action="profile/uploadImage" id="profileForm" enctype="multipart/form-data" class="p-4 absolute top-9 inset-x-1/4 h-auto flex flex-col justify-center bg-slate-50 rounded-lg border-b-2 border-gray-300 hidden z-50">
    <span id="closeBtn" class='absolute text-4xl top-1 right-4 cursor-pointer'>&times;</span>
    <div class=" w-full flex flex-col justify-center items-center gap-4">
        <div class="w-full h-auto flex flex-row justify-center items-center gap-4">
            <!-- <label for="profileImageInput">Photo Profile</label> -->
            <img src="<?= base_url($row->profile_picture ? $row->profile_picture : 'uploads/profile_photos/default.png') ?>" class="rounded-full w-36 h-36 cursor-pointer border-slate-900/10 border-2" id="profileImage">
            <input type="file" id="profileImageInput" name="profile_image" accept="image/*" class="hidden">
        </div>
        <div class="w-full text-center text-2xl">
            <?php echo $row->username; ?>
        </div>
        <div class="informasi-user text-center w-full">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt perspiciatis hic repudiandae! Debitis temporibus, magni nostrum nihil fugiat dicta, ipsam nesciunt nisi numquam, blanditiis cum ullam rem natus dolores id?
        </div>
    </div>
    <script>
        document.getElementById('profileImage').addEventListener('click', function() {
            document.getElementById('profileImageInput').click();
        });
    </script>
    <div class="container w-full h-auto p-4">
        <img id="previewImage" class="max-w-full hidden">
    </div>
    <button type="button" id="cropButton" class="hidden">Crop & Upload</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?= base_url('application\views\header\header.js') ?>"></script>
