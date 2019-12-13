<?php

if ($IdUser) {
    header("location:".BASE_URL);
}
?>
<div id="containerUserAkses">
    <form action="<?php echo BASE_URL."proses-register.php"; ?>" method="POST">
        <?php
        $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
        $name = isset($_GET['name']) ? $_GET['name'] : false;
        $email = isset($_GET['email']) ? $_GET['email'] : false;
        $hp = isset($_GET['hp']) ? $_GET['hp'] : false;
        $adress = isset($_GET['adress']) ? $_GET['adress'] : false;

        if ($notif == "require") {
            echo "<div class='notif'>Maaf, LENGKAPI FORM</div>";
        } elseif ($notif == "password") {
            echo "<div class='notif'>Maaf, PASSWORD yang Anda masukkan BERBEDA</div>";
        } elseif ($notif == "email") {
            echo "<div class='notif'>Maaf, EMAIL SUDAH DIGUNAKAN</div>";
        }
        ?>
        <div class="elementForm">
            <label>Nama</label>
            <span>
                <input type="text" name="name" value="<?php echo $name; ?>">
            </span>
        </div>
        <div class="elementForm">
            <label>Email</label>
            <span>
                <input type="email" name="email" value="<?php echo $email; ?>">
            </span>
        </div>
        <div class="elementForm">
            <label>Nomor HP</label>
            <span>
                <input type="tel" name="hp" value="<?php echo $hp; ?>">
            </span>
        </div>
        <div class="elementForm">
            <label>Alamat</label>
            <span>
                <textarea name="adress" cols="30" rows="10"><?php echo $adress; ?></textarea>
            </span>
        </div>
        <div class="elementForm">
            <div class="labelPassword">
                <label>Password</label>
                <i class="btn-hide-show far fa-eye-slash" title="Show Password"></i>
            </div>
            <span>
                <input class="inputPassword" type="password" name="password">
            </span>
        </div>
        <div class="elementForm">
            <div class="labelPassword">
                <label>Re-type Password</label>
            </div>
            <span>
                <input class="inputPassword" type="password" name="rePassword">
            </span>
        </div>
        <div class="elementForm">
            <span>
                <input type="submit" name="submit" value="REGISTER">
            </span>
        </div>
    </form>
</div>