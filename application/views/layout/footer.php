</div>
<div class="drawer-side">
    <label for="my-drawer" class="drawer-overlay"></label>
    <ul class="menu p-4 w-80 bg-base-100 text-base-content">
        <!-- Sidebar content here -->
        <?php
        $role = $this->session->userdata('role');
        if ($role == 'admin' || $role == 'atasan') {
        ?>
            <li><a href="/" class="hover:bg-primary hover:text-white group"><i class="bi bi-speedometer2 text-primary group-hover:text-white"></i> Dasbor</a></li>
        <?php } ?>
        <li><a href="/home/perhitungan" class="hover:bg-primary hover:text-white group"><i class="bi bi-calculator text-primary group-hover:text-white"></i> Perhitungan</a></li>
        <li><a href="/home/history" class="hover:bg-primary hover:text-white group"><i class="bi bi-clock-history text-primary group-hover:text-white"></i> History</a></li>
        <?php if ($role == 'admin' || $role == 'atasan') { ?>
            <li><a href="/home/users" class="hover:bg-primary hover:text-white group"><i class="bi bi-people-fill text-primary group-hover:text-white"></i> Users</a></li>
            <li><a href="/home/setting" class="hover:bg-primary hover:text-white group"><i class="bi bi-gear-fill text-primary group-hover:text-white"></i> Setting</a></li>
        <?php } ?>

    </ul>

</div>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="/assets/js/sweetalert2.all.min.js"></script>
<script src="/assets/js/script.js"></script>
</body>

</html>