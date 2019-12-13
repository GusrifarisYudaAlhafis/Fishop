<?php

if ($IdUser) {
    header("location:".BASE_URL);
}
?>
<div id="containerUserAkses">
    <form action="<?php echo BASE_URL."proses-login.php"; ?>" method="POST">
        <?php
        $notif = isset($_GET['notif']) ? $_GET['notif'] : false;

        if ($notif == true) {
            echo "<div class='notif'>Maaf, EMAIL atau PASSWORD SALAH</div>";
        }
        ?>
        <div class="elementForm">
            <label>Email</label>
            <span>
                <input type="email" name="email">
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
            <span>
                <input type="submit" name="submit" value="LOGIN">
            </span>
        </div>
    </form>
</div>