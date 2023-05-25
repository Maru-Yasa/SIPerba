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
    <title>SIPerba | Login</title>
</head>

<body>
    <div class="bg-gradient-to-r from-violet-600 to-indigo-600 h-screen w-full flex flex-col items-center justify-center">
        <div class="p-3 bg-base-100 w-80 rounded-lg">
            <h1 class="text-3xl font-bold text-center w-full"><span class="text-primary">SIPerba</span> Login</h1>

            <form action="/auth" method="POST">
                <?= $this->session->flashdata('message'); ?>
                <div class="form-control w-full max-w-xs mt-5">
                    <input type="text" placeholder="Username" name="username" class="input input-bordered w-full max-w-xs" />
                </div>
                <div class="form-control w-full max-w-xs mt-3">
                    <input type="password" placeholder="Password" name="password" class="input input-bordered w-full max-w-xs" />
                </div>
                <div class="form-control w-full mt-3">
                    <button class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>