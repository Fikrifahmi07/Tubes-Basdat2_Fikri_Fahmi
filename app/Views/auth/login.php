<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login SIAKAD</title>

    <!-- Bootstrap -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>

        body{
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background: linear-gradient(135deg,#0f2027,#203a43,#2c5364);
            overflow:hidden;
            font-family: 'Segoe UI', sans-serif;
            position:relative;
        }

        /* WATERMARK */
        body::before{
            content:"";
            position:absolute;
            width:500px;
            height:500px;
            background:url("<?= base_url('logo.png') ?>") no-repeat center;
            background-size:contain;
            opacity:0.05;
            z-index:0;
        }

        .login-card{
            width:100%;
            max-width:420px;
            border:none;
            border-radius:20px;
            overflow:hidden;
            backdrop-filter: blur(10px);
            background:rgba(255,255,255,0.08);
            box-shadow:0 8px 32px rgba(0,0,0,0.3);
            color:white;
            position:relative;
            z-index:2;
        }

        .login-header{
            text-align:center;
            padding:35px 20px 10px;
        }

        .login-header img{
            width:90px;
            margin-bottom:15px;
        }

        .login-header h3{
            font-weight:700;
            margin-bottom:5px;
        }

        .login-header p{
            color:#ddd;
            font-size:14px;
        }

        .card-body{
            padding:30px;
        }

        .input-group{
            margin-bottom:20px;
        }

        .input-group-text{
            background:rgba(255,255,255,0.1);
            border:none;
            color:white;
        }

        .form-control{
            background:rgba(255,255,255,0.08);
            border:none;
            color:white;
            height:48px;
        }

        .form-control:focus{
            background:rgba(255,255,255,0.12);
            color:white;
            box-shadow:none;
        }

        .form-control::placeholder{
            color:#ccc;
        }

        .btn-login{
            height:48px;
            border-radius:10px;
            font-weight:600;
            font-size:16px;
            background:#00c6ff;
            border:none;
            transition:0.3s;
        }

        .btn-login:hover{
            background:#0072ff;
            transform:translateY(-2px);
        }

        .footer-text{
            text-align:center;
            margin-top:20px;
            font-size:13px;
            color:#ccc;
        }

    </style>

</head>
<body>

    <div class="card login-card">

        <!-- HEADER -->
        <div class="login-header">

            <img src="<?= base_url('logo.png') ?>" alt="Logo">

            <h3>SIAKAD UNIPI</h3>

            <p>
                Sistem Informasi Akademik
            </p>

        </div>

        <!-- BODY -->
        <div class="card-body">

            <form action="<?= base_url('cek-login') ?>" method="post">

                <!-- USERNAME -->
                <div class="input-group">

                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>

                    <input type="text"
                           name="username"
                           class="form-control"
                           placeholder="Masukkan Username"
                           required>

                </div>

                <!-- PASSWORD -->
                <div class="input-group">

                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>

                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Masukkan Password"
                           required>

                </div>

                <!-- BUTTON -->
                <button type="submit" class="btn btn-login btn-block">

                    <i class="fas fa-sign-in-alt"></i>
                    Login

                </button>

            </form>

            <div class="footer-text">
                © <?= date('Y') ?> Universitas Persatuan Islam
            </div>

        </div>

    </div>

</body>
</html>