<div class="flash-perhitungan" data-flashdata="<?= $this->session->flashdata('flash-perhitungan'); ?>"></div>
<div class="w-full px-5 mt-4">
    <div class="mt-3 rounded-lg bg-primary p-10 h-32 relative overflow-hidden flex items-center group">
        <h1 class="text-3xl font-bold text-white z-10"><i class="bi bi-gear-fill"></i> Histori</h1>
        <div class="absolute -top-2 z-0 right-1 opacity-40 group-hover:blur-sm ease-in duration-300">
            <img src="/assets/images/undraw_file_manager_re_ms29.svg" width="200" alt="">
        </div>
    </div>
</div>

<div class="w-full px-5 mt-5">
    <div class="bg-base-100 rounded-lg shadow-lg p-3 h-96 overflow-x-auto overflow-y-auto responsive" style="zoom:80%">
        <table class="table w-full table-zebra ">
            <thead>
                <tr>
                    <th></th>
                    <th class="normal-case">$b$ $($inci$)$</th>
                    <th class="normal-case">$d$ $($$inci)$</th>
                    <th class="normal-case">$A_s$ $($inci$^2)$</th>
                    <th class="normal-case">$f_y$ $(Psi)$</th>
                    <th class="normal-case">$f'c$ $(Psi)$</th>
                    <th class="normal-case">$M_n$</th>
                    <th class="normal-case">Dihitung Oleh</th>
                    <th class="normal-case">is_verified_by_engineer</th>
                    <th class="normal-case">is_verified_by_manager</th>
                    <th class="normal-case">Tanggal</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach (array_reverse($riwayat) as $history) :
                ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $history->b ?></td>
                        <td><?= $history->d ?></td>
                        <td><?= $history->as2 ?></td>
                        <td><?= $history->fy ?></td>
                        <td><?= $history->fc ?></td>
                        <td><?= $history->hasil ?></td>
                        <td><?= $history->username ?></td>
                        <!-- Jika tervirifikasi -->
                        <?php if ($history->is_verified_by_engineer === '1') { ?>
                            <td class="text-green-400 text-center"><i class="bi bi-check-circle-fill"></td>
                        <?php } elseif ($history->is_verified_by_engineer === '0') { ?>
                            <!-- Jika ditolak -->
                            <td class="text-red-400 text-center"><i class="bi bi-x-circle-fill"></i></td>
                        <?php } else { ?>
                            <td class="text-yellow-400 text-center"><i class="bi bi-exclamation-circle-fill"></i> Menunggu</td>
                        <?php } ?>
                        <?php if ($history->is_verified_by_manager === '1') { ?>
                            <td class="text-green-400 text-center"><i class="bi bi-check-circle-fill"></td>
                        <?php } elseif ($history->is_verified_by_manager === '0') { ?>
                            <!-- Jika ditolak -->
                            <td class="text-red-400 text-center"><i class="bi bi-x-circle-fill"></i></td>
                        <?php } else { ?>
                            <td class="text-yellow-400 text-center"><i class="bi bi-exclamation-circle-fill"></i> Menunggu</td>
                        <?php } ?>
                        <td><?= $history->date ?></td>
                        <td class="flex gap-2">
                            <?php
                            $rolee = $this->session->userdata('role');
                            // var_dump($rolee);
                            if ($rolee == 'engineer') {
                            ?>
                                <?php if ($history->is_verified_by_engineer == null) { ?>
                                    <?php if ($history->hasil !== '-') { ?>
                                        <a href="/home/verify/<?= $history->id ?>" class="bg-green-400 p-3 hover:bg-green-300 rounded-lg text-base-100 gap-2 align-middle"><i class="bi bi-check-circle-fill"></i> Verifikasi</a>
                                    <?php } else { ?>
                                        <a class="bg-green-400 p-3 hover:bg-green-300 rounded-lg text-base-100 gap-2 align-middle btn-disabled"><i class="bi bi-check-circle-fill"></i> Verifikasi</a>
                                    <?php } ?>
                                    <a href="/home/reject/<?= $history->id ?>" class="bg-red-400 p-3 hover:bg-red-300 rounded-lg text-base-100 gap-2 align-middle" id="reject<?= $history->id ?>" data-id="<?= $history->id ?>"><i class="bi bi-x-circle-fill"></i> Tolak</a>
                                <?php } else { ?>
                                    <a class="bg-green-400 p-3 hover:bg-green-300 rounded-lg text-base-100 gap-2 align-middle btn-disabled"><i class="bi bi-check-circle-fill"></i> Verifikasi</a>
                                    <a class="bg-red-400 p-3 hover:bg-red-300 rounded-lg text-base-100 gap-2 align-middle btn-disabled"><i class="bi bi-x-circle-fill"></i> Tolak</a>
                                <?php }
                            } elseif ($rolee == 'manager') { ?>
                                <?php if ($history->is_verified_by_manager == null) { ?>
                                    <?php if ($history->hasil !== '-') { ?>
                                        <a href="/home/verify/<?= $history->id ?>" class="bg-green-400 p-3 hover:bg-green-300 rounded-lg text-base-100 gap-2 align-middle"><i class="bi bi-check-circle-fill"></i> Verifikasi</a>
                                    <?php } else { ?>
                                        <a class="bg-green-400 p-3 hover:bg-green-300 rounded-lg text-base-100 gap-2 align-middle btn-disabled"><i class="bi bi-check-circle-fill"></i> Verifikasi</a>
                                    <?php } ?>
                                    <a href="/home/reject/<?= $history->id ?>" class="bg-red-400 p-3 hover:bg-red-300 rounded-lg text-base-100 gap-2 align-middle" id="reject<?= $history->id ?>" data-id="<?= $history->id ?>"><i class="bi bi-x-circle-fill"></i> Tolak</a>
                                <?php } else { ?>
                                    <a class="bg-green-400 p-3 hover:bg-green-300 rounded-lg text-base-100 gap-2 align-middle btn-disabled"><i class="bi bi-check-circle-fill"></i> Verifikasi</a>
                                    <a class="bg-red-400 p-3 hover:bg-red-300 rounded-lg text-base-100 gap-2 align-middle btn-disabled"><i class="bi bi-x-circle-fill"></i> Tolak</a>
                            <?php  }
                            } ?>
                            <a href="/home/detailHistory/<?= $history->id ?>" class="bg-yellow-400 p-3 hover:bg-yellow-300 rounded-lg text-base-100 gap-2 align-middle"><i class="bi bi-eye-fill"></i></a>
                        </td>

                    </tr>
                    <?php $no++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    MathJax = {
        tex: {
            inlineMath: [
                ['$', '$'],
                ['\\(', '\\)']
            ]
        }
    };
</script>
<script id="MathJax-script" async src="/assets/dist/tex-chtml.js">
</script>