<div class="w-full px-5 mt-4">
    <div class="mt-3 rounded-lg bg-primary p-10 h-32 relative overflow-hidden flex items-center group">
        <h1 class="text-3xl font-bold text-white z-10"><i class="bi bi-gear-fill"></i> Histori</h1>
        <div class="absolute -top-2 z-0 right-1 opacity-40 group-hover:blur-sm ease-in duration-300">
            <img src="/assets/images/undraw_file_manager_re_ms29.svg" width="200" alt="">
        </div>
    </div>
</div>

<div class="w-full px-5 mt-5">
    <div class="bg-base-100 rounded-lg shadow-lg p-3 h-96 overflow-x-auto overflow-y-auto">
        <table class="table w-full table-zebra">
            <thead>
                <tr>
                    <th></th>
                    <th class="normal-case">$b$ $($inci$)$</th>
                    <th class="normal-case">$d$ $($$inci)$</th>
                    <th class="normal-case">$A_s$ $($inci$^2)$</th>
                    <th class="normal-case">$f_y$ $(Psi)$</th>
                    <th class="normal-case">$f'c$ $(Psi)$</th>
                    <th class="normal-case">$M_n$</th>
                    <th class="normal-case">Tanggal</th>
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
                        <td><?= $history->date ?></td>
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