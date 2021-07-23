<?php
$this->load->view('template/user/header');
?>
<div class="container">
	<div class="contents">
		<?php
		$this->load->view($page);
		?>
	</div>
</div>

<?php
$this->load->view('template/user/footer');
?>