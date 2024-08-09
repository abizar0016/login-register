<?php
// session_start();

// date_default_timezone_set('Asia/Jakarta');

// // Koneksi database
// include "koneksi.php";

// // Panggil library
// require_once "vendor/autoload.php";

// // Accommodate client id, client secret, and redirect uri
// $client_id = '347747034178-sgobcagjmbojeju8keenr22ove26sgsj.apps.googleusercontent.com';
// $client_secret = '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';
// $redirect_uri = 'http://localhost/OspekMalang/login.php';

// // Inisiasi Google Client
// $client = new Google_Client();

// // Konfigurasi Google Client 
// $client->setClientId($client_id);
// $client->setClientSecret($client_secret);
// $client->setRedirectUri($redirect_uri);

// // View account 
// $client->addScope('email');
// $client->addScope('profile');

// if (isset($_GET['code'])) {
//     $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

//     if (!isset($token['error'])) {
//         $client->setAccessToken($token['access_token']);

//         // Inisiasi Google Service OAuth2
//         $service = new Google_Service_Oauth2($client);
//         $profile = $service->userinfo->get();
//         $currtime = date('Y-m-d H:i:s');

//         // Accommodate data response from account google
//         $g_name = $profile['name'];
//         $g_email = $profile['email'];
//         $g_id = $profile['id'];
//         $g_picture = isset($profile['picture']) ? $profile['picture'] : ''; // Check if 'picture' key exists

//         echo "<pre>";
//         $profile;
//         echo "</pre>";

//         // // If the ID already exists in the table, then just update it
//         // // If the ID doesn't exist in the table, then insert the data
//         $query_check = 'SELECT * FROM users WHERE oauth_id = "' . $g_id . '"';
//         $run_query_check = mysqli_query($conn, $query_check);
//         $data = mysqli_fetch_object($run_query_check);

//         if ($data) {
//             // Update last_login if user exists
//             $query_update = 'UPDATE users SET last_login = "' . $currtime . '" WHERE oauth_id = "' . $g_id . '"';
//             $run_query_update = mysqli_query($conn, $query_update);
//         } else {
//             // Insert new user if not exists
//             $query_insert = 'INSERT INTO users (fullname, email, oauth_id, last_login) VALUES ("' . $g_name . '", "' . $g_email . '", "' . $g_id . '", "' . $currtime . '")';
//             $run_query_insert = mysqli_query($conn, $query_insert);
//         }

//         $_SESSION['logged_in'] = true;
//         $_SESSION['access_token'] = $token['access_token'];
//         $_SESSION['uname'] = $g_name;
//         $_SESSION['picture'] = $g_picture; // Store the picture URL in the session

//         if ($data->status == 'admin') {
//             header("Location: admin.php");
//         } else {
//             header("Location: user.php");
//         }
//         exit();
//     } else {
//         echo "Login gagal";
//     }
// }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OspekMalang</title>
    <link rel="stylesheet" href="/css/login.css">
    <link rel="icon" type="image/x-icon" href="img/1.jpg" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div id="loading-screen">
        <div class="spinner"></div>
    </div>
    <div class="container" id="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action=".env" method="POST" class="sign-in-form">
                    <h2 class="title">
                        Masuk
                    </h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Nama Pengguna" name="uname">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password">
                    </div>
                    <input type="submit" value="Masuk" name="masuk" class="btn solid">
                    <p class="social-text">
                        atau masuk dengan platform sosial
                    </p>
                    <div class="social-media">
                        <a href="" class="social-icon">
                            <i class="fab fa-google"></i> 
                        </a>
                    </div>
                </form>

                <form class="sign-up-form">
                    <h2 class="title">
                        Daftar
                    </h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Nama Pengguna" name="uname">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" placeholder="Email" name="email">
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password">
                    </div>
                    <input type="submit" value="Daftar" name="daftar" class="btn solid">
                    <p class="social-text">
                        atau masuk dengan platform sosial
                    </p>
                    <div class="social-media">
                        <a href="" class="social-icon">
                            <i class="fab fa-google"></i> 
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Anda Baru Disini?
                    </h3>
                    <p>
                        Dapatkan fitur menarik lainnya dari Ospek Malang dengan mendaftarkan diri anda.
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Daftar
                    </button>
                </div>

                <img src="img/" class="image" alt="">
                
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>Anda Sudah Punya Akun?
                    </h3>
                    <p>
                        Dapatkan fitur menarik lainnya dari Ospek Malang dengan memasukan akun anda.
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Masuk
                    </button>
                </div>

                <img src="img/" class="image" alt="">

            </div>
        </div>
    </div>
    <script src="js/loading.js"></script>
    <script src="js/form.js"></script>


</body>

</html>