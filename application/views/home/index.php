<div class="w-full px-5 mt-4">

    <h1 class="text-3xl mb-3 font-bold">Selamat datang, <span class="text-primary"><?= $user['username']; ?>!</span></h1>

    <?php
    $role = $this->session->userdata('role');
    if ($role == 'admin') {
    ?>
        <div class="w-full grid grid-cols-3 gap-3">
            <div class="shadow bg-primary text-white rounded-lg h-32 p-3 relative group overflow-hidden">
                <h1 class="text-3xl z-10 font-bold">Manager</h1>
                <p class="static z-10 text-4xl font-semi-bold break-words mt-2"><?= $countM; ?></p>
                <i style="font-size: 100px;" class="bi bi-people-fill absolute z-20 opacity-40 top-0 right-3 scale-150 group-hover:blur-sm ease-in duration-300"></i>
            </div>
            <div class="shadow bg-info text-white rounded-lg h-32 p-3 relative group overflow-hidden">
                <h1 class="text-3xl z-10 font-bold">Engineer</h1>
                <p class="static z-10 text-4xl font-semi-bold break-words mt-2"><?= $countE; ?></p>
                <i style="font-size: 100px;" class="bi bi-people-fill absolute z-20 opacity-40 top-0 right-3 scale-150 group-hover:blur-sm ease-in duration-300"></i>
            </div>
            <div class="shadow bg-success text-white rounded-lg h-32 p-3 relative group overflow-hidden">
                <h1 class="text-3xl z-10 font-bold">User</h1>
                <p class="static z-10 text-4xl font-semi-bold break-words mt-2"><?= $countU; ?></p>
                <i style="font-size: 100px;" class="bi bi-people-fill absolute z-20 opacity-40 top-0 right-3 scale-150 group-hover:blur-sm ease-in duration-300"></i>
            </div>
        </div>
    <?php } else { ?>
        <div class="w-full grid grid-cols-2 gap-3">
            <div class="shadow bg-primary text-white rounded-lg h-32 p-3 relative group overflow-hidden">
                <h1 class="text-3xl z-10 font-bold">Users</h1>
                <p class="static z-10 text-4xl font-semi-bold break-words mt-2"><?= $countUs; ?></p>
                <i style="font-size: 100px;" class="bi bi-people-fill absolute z-20 opacity-40 top-0 right-3 scale-150 group-hover:blur-sm ease-in duration-300"></i>
            </div>
            <div class="shadow bg-accent text-white rounded-lg h-32 p-3 relative group overflow-hidden">
                <h1 class="text-3xl z-10 font-bold">Perhitungan</h1>
                <p class="static z-10 text-4xl font-semi-bold break-words mt-2"><?= $countH; ?></p>
                <i style="font-size: 100px;" class="bi bi-database-fill-gear absolute z-20 opacity-40 top-0 right-3 scale-150 group-hover:blur-sm ease-in duration-300"></i>
            </div>
        </div>
    <?php } ?>

    <div class="mt-5 w-full h-64 shadow rounded-lg p-3 flex flex-col items-center justify-center bg-primary relative overflow-hidden group">
        <h1 class="text-3xl font-bold text-white z-10">Wellcome to <span class="">SIPerba</span></h1>
        <div class="flex flex-col md:flex-row gap-2 mt-3 z-10">
            <?php
            $role = $this->session->userdata('role');
            if ($role == 'admin') {
            ?>
                <a href="/home/users" class="btn btn-accent gap-2"><i class="bi bi-people"></i> Kelola User</a>
            <?php } else { ?>
                <a href="/home/perhitungan" class="btn btn-ghost bg-white text-black border-0 hover:bg-slate-200 gap-2"><i class="bi bi-calculator-fill"></i> Mulai Menghitung</a>
            <?php } ?>
        </div>
        <div class="absolute left-1 -buttom-5 opacity-40 group-hover:blur-sm ease-in duration-300 z-0">
            <img src="/assets/images/undraw_mathematics_-4-otb.svg" width="200" alt="">
        </div>
    </div>

</div>