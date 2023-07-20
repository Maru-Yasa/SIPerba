<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/assets/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="/assets/dist/tailwind.css"></script>
    <link rel="stylesheet" href="/assets/dist/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>SIPerba | Reset Password</title>
</head>

<body>

    <div class="bg-gradient-to-r from-violet-600 to-indigo-600 h-screen w-full flex flex-col items-center justify-center prelative">
        <div class="absolute max-h-screen z-0 overflow-hidden">
            <img id="bg" src="/assets/images/construction-bg.jpg" class="h-screen md:w-screen object-cover opacity-40" alt="">
        </div>
        <div class="p-3 bg-base-100 w-80 rounded-lg z-10">
            <h1 class="text-xl font-bold text-center w-full"><span class="text-primary">SIPerba</span> Reset Password</h1>

            <form action="/auth/reset_password/<?= $token ?>" method="POST">
                <?= $this->session->flashdata('message'); ?>
                <div class="form-control w-full max-w-xs mt-3">
                    <input type="password" placeholder="New Password" name="password1" class="input input-bordered w-full max-w-xs" />
                    <?= form_error('password1', '<small class="text-error pl-3">', '</small>') ?>
                </div>
                <div class="form-control w-full max-w-xs mt-3">
                    <input type="password" placeholder="Repeat Password" name="password2" class="input input-bordered w-full max-w-xs" />
                    <?= form_error('password2', '<small class="text-error pl-3">', '</small>') ?>
                </div>
                <div class="form-control w-full mt-3">
                    <button class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
<style>
    .bg {
        object-fit: contain;
    }
</style>

</html>