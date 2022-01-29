<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./style.css">

    <title>Remy Activity 1</title>
</head>

<body>

    <?php include_once "process.php"; ?>

    <h1 class="title"> App Credential </h1>

    <!-- <form action="process.php" method="POST" enctype="multipart/form-data"> -->
    <form action="http://cire.epizy.com/process.php" method="POST" enctype="multipart/form-data">
        <div>
            <input type="text" name="lastName" placeholder="Last Name">
            <input type="text" name="firstName" placeholder="First Name">
            <input type="text" name="middleName" placeholder="Middle Name">
            <input type="email" name="email" placeholder="Email">
        </div>
        <div>
            <div class="with-btn">
                <input type="text" name="id" placeholder="Id" id="id">
            </div>
            <div class="with-btn">
                <input type="text" name="token" placeholder="Verification token" maxlength="30" id="token">
                <button class="generate" id="token-btn">Gen Token</button>
            </div>
            <div class="with-btn">
                <input type="text" name="secret" placeholder="Client Secret" maxlength="50" id="secret">
                <button class="generate" id="secret-btn">Gen Secret</button>
            </div>
            <div class="with-btn">
                <input type="password" name="password" placeholder="Password" id="pass">
                <button class="generate" id="pass-btn">Gen Password</button>
            </div>
        </div>
        <div>
            <button class="w-full" id="upload-btn" style="margin-bottom: 2rem;"> Upload Photo </button>
            <input type="file" id="img-input" accept="image/jpeg" name="photo" style="display: none;">
            <button class="w-full" name="save"> Save </button>
        </div>
    </form>

    <script>
        window.onload = () => {
            const imgInput = document.getElementById('img-input');
            const uploadBtn = document.getElementById('upload-btn');
            uploadBtn.onclick = e => {
                e.preventDefault();
                imgInput.click();
            }

            imgInput.onchange = e => {
                const fileName = e.target.files[0].name
                uploadBtn.innerText = fileName;
            }

            const generateBtns = document.getElementsByClassName('generate');

            const id = document.getElementById('id');
            const token = document.getElementById('token');
            const secret = document.getElementById('secret');
            const pass = document.getElementById('pass');

            document.getElementById('token-btn').onclick = (e) => {
                e.preventDefault();
                token.value = generateToken(30);
            };
            document.getElementById('secret-btn').onclick = (e) => {
                e.preventDefault();
                secret.value = generateToken(50, true);
            };
            document.getElementById('pass-btn').onclick = (e) => {
                e.preventDefault();
                pass.value = generateToken(16, true);
            };

            function generateId() {
                let _id = '';
                for (let i = 0; i < 10; i++) {
                    let n = Math.floor(Math.random() * 10);
                    _id = _id + '' + n;
                }
                id.value = _id;
            }

            function generateToken(length, includeNumbers = false) {
                let result = '';
                var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz' + (includeNumbers ? '0123456789' : '');
                var charactersLength = characters.length;
                for (var i = 0; i < length; i++) {
                    result += characters.charAt(Math.floor(Math.random() *
                        charactersLength));
                }
                return result;
            }

            generateId();
            token.value = generateToken(30);
            secret.value = generateToken(50, true);
        }
    </script>
</body>

</html>