<?php

	$IdPesanan = $_GET["IdPesanan"];

?>
<table class="tableList">
	<form action="<?php echo BASE_URL."assets/module/pesanan/action.php?IdPesanan=$IdPesanan"; ?>" method="POST">
		<div class="elementForm">
			<label>Nomor Rekening</label>
			<span>
                <input type="number" name="noRekening" />
            </span>
		</div>
		<div class="elementForm">
			<label>Nama Akun</label>
			<span>
                <input type="text" name="nameAccount" />
            </span>
		</div>
		<div class="elementForm">
			<label>Tanggal Transfer (format: yyyy-mm-dd)</label>
			<span>
                <input type="text" name="dateTransfer" />
            </span>
		</div>
		<div class="elementForm">
			<span>
                <input type="submit" value="Konfirmasi" name="button" />
            </span>
		</div>
	</form>
</table>