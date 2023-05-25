<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-data-gagal" data-flashdata="<?= $this->session->flashdata('flash-gagal'); ?>"></div>
<div class="w-full px-5 mt-4">
    <div class="mt-3 rounded-lg bg-primary p-10 h-32 relative overflow-hidden flex items-center group">
        <h1 class="text-3xl font-bold text-white"><i class="bi bi-person-fill"></i> Profile</h1>
        <div class="absolute -top-5 z-0 right-1 opacity-40 group-hover:blur-sm ease-in duration-300">
            <img src="/assets/images/undraw_preferences_re_49in.svg" width="200" alt="">
        </div>
    </div>
    <div class="w-full grid grid-cols-3 mt-5 gap-5">
        <div class="col-span-2 row-span-2 rounded-lg shadow p-3">
            <form action="/home/update_profile/" method="post" id="formUs">
                <h1 class="text-2xl font-semibold">Edit Profile</h1>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Name</span>
                    </label>
                    <input type="text" placeholder="" name="nama" value="<?= $user['nama'] ?>" class="input input-bordered w-full" />
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Username</span>
                    </label>
                    <input type="text" name="username" placeholder="" value="<?= $user['username'] ?>" class="input input-bordered w-full" />
                </div>
                <div class="form-control w-32 mt-3">
                    <button class="btn btn-primary" onclick="submitForm()">Simpan</button>
                </div>
            </form>
        </div>
        <div class=" col-span-1 row-span-1 rounded-lg shadow bg-accent flex flex-col items-center justify-center p-5">
            <div class="avatar">
                <div class="w-32 rounded-full">
                    <img src="/assets/images/default_profile.jpg" alt="">
                </div>
            </div>
            <div class="mt-3 text-center text-white">
                <h2 class="text-xl font-bold"><?= $user['nama'] ?></h2>
                <h3 class="text-sm underline"><?= $user['role'] ?></h3>
            </div>
        </div>
        <div class="col-span-2 row-span-2 rounded-lg shadow p-3 mt-3">
            <form action="/home/changepassword" method="post" id="formPass">
                <h1 class="text-2xl font-semibold">Change Password</h1>
                <?= $this->session->flashdata('message'); ?>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Password Sekarang</span>
                    </label>
                    <input type="text" name="current_password" placeholder="" class="input input-bordered w-full" />
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Password Baru</span>
                    </label>
                    <input type="text" name="new_password" placeholder="" class="input input-bordered w-full" />
                </div>
                <div class="form-control w-32 mt-3">
                    <button class="btn btn-primary" onclick="submitForm2()">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</div>

<script>
    function submitForm() {
        document.getElementById("formUs").submit();
    }

    function submitForm2() {
        document.getElementById("formPass").submit();
    }
</script>