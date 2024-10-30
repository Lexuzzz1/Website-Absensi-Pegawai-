<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        /* Poppins Font Classes */
        .poppins-thin { font-family: "Poppins", sans-serif; font-weight: 100; }
        .poppins-extralight { font-family: "Poppins", sans-serif; font-weight: 200; }
        .poppins-light { font-family: "Poppins", sans-serif; font-weight: 300; }
        .poppins-regular { font-family: "Poppins", sans-serif; font-weight: 400; }
        .poppins-medium { font-family: "Poppins", sans-serif; font-weight: 500; }
        .poppins-semibold { font-family: "Poppins", sans-serif; font-weight: 600; }
        .poppins-bold { font-family: "Poppins", sans-serif; font-weight: 700; }
        .poppins-extrabold { font-family: "Poppins", sans-serif; font-weight: 800; }
        .poppins-black { font-family: "Poppins", sans-serif; font-weight: 900; }

        /* General Reset */
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: "Poppins", sans-serif; }

        /* Full Container for Full-Page Layout */
        .full-container {
            width: 100%;
            height: 100vh;
            display: flex;
        }

        /* Left Side: Form Section Styling */
        .form-section {
            width: 70%;
            padding: 40px;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .form-box {
            width: 90%;

        }

        /* Form Section Headings and Text */
        .title {
            font-size: 32px;
            margin-bottom: 10px;
            color: #122539;
            font-weight: 700;
            /* text-align: center; */
        }

        .form-section h3 {
            color: #1F4062;
            margin-bottom: 10px;
            font-weight: 400;
            text-align: center;
        }

        .form-section p {
            color: #666;
            margin-bottom: 20px;
            font-weight: 400;
            text-align: center;
        }

        .form-section label {
            color: #333;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .form-section input[type="email"],
        .form-section input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .form-section .d-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .form-section a {
            color: #1a73e8;
            text-decoration: none;
        }

        .form-section a:hover {
            text-decoration: underline;
        }

        .form-section button {
            padding: 10px;
            background-color: #1a73e8;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            text-transform: uppercase;
            transition: background-color 0.3s;
        }

        .form-section button:hover {
            background-color: #155ab6;
        }

        /* Right Side: Gradient Section with Overlay */
        .gradient-section {
            width: 30%;
            background: linear-gradient(to bottom right, #1a73e8, #77a6f7);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .overlay-image {
            width: 100%;
            height: 100%;
            /* background-image: url('/images/overlay.png'); Ensure the image path is correct */
            background-size: cover;
            background-position: center;
            opacity: 0.5;
        }
    </style>
</head>
<body>
    <div class="full-container d-flex">
        <div class="form-section">
            <div class="form-box">
                <h1 class="mb-3 poppins-bold title" align="center">Login</h1>
                <h3 class="poppins-regular subtitle">Selamat datang</h3>
                <p class="poppins-regular subtitle">Silahkan masukkan email/ID dan password anda.</p>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label poppins-medium">Email / ID</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter Email / ID" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label poppins-medium">Password</label>
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <input type="checkbox" name="remember"> <span class="poppins-regular">Remember me</span>
                        </div>
                        <a href="#" class="poppins-regular">Forgot Password?</a>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 poppins-medium">LOGIN</button>
                </form>
            </div>
        </div>
        <div class="gradient-section">
            <div class="overlay-image"></div>
        </div>
    </div>
</body>
</html>
