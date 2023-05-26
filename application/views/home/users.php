<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-data-gagal" data-flashdata="<?= $this->session->flashdata('flash-gagal'); ?>"></div>
<div class="w-full px-5 mt-4">
    <div class="mt-3 rounded-lg bg-primary p-10 h-32 relative overflow-hidden flex items-center group">
        <h1 class="text-3xl font-bold text-white z-10"><i class="bi bi-people-fill"></i> Users</h1>
        <div class="absolute -top-2 z-0 right-1 opacity-40 group-hover:blur-sm ease-in duration-300">
            <img src="/assets/images/undraw_people_re_8spw.svg" width="200" alt="">
        </div>
    </div>
</div>

<div class="w-full px-5 mt-5">
    <div class="bg-base-100 rounded-lg shadow-lg p-3 h-96 overflow-x-auto overflow-y-auto">
        <a href="/home/tambahuser" class="btn btn-primary">Tambah User</a>
        <table class="table w-full table-zebra mt-4">
            <thead>
                <tr>
                    <th class="normal-case">No</th>
                    <th class="normal-case">Nama</th>
                    <th class="normal-case">Username</th>
                    <th class="normal-case">Role</th>
                    <th class="normal-case text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($dataUsers as $user) :
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $user->nama; ?></td>
                        <td><?= $user->username; ?></td>
                        <td><?= $user->role; ?></td>
                        <td class="flex gap-2 justify-center">
                            <a class="btn btn-accent" href="/home/edituser/<?= $user->id_user ?>"><i class="bi bi-pencil-fill"></i></a>
                            <a class="btn btn-error tombol-hapus" href="/home/hapus_user/<?= $user->id_user ?>"><i class="bi bi-trash-fill"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>