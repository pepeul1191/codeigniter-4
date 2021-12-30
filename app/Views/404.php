<?= $this->include('partials/blank_header') ?>

<div class="row text-center">
  <h1 class="align-text-bottom"><?php echo $number; ?></h1>
</div>
<div class="row text-center">
	<div class="error-divider">
		<h2><?php echo $message; ?></h2>
		<p class="description"><?php echo $description; ?></p>
	</div>
	<a href="<?php echo($constants->{'baseURL'} . $hrefError); ?>" class="return-btn"><i class="fa fa-home"></i>Ir al Inicio</a>
</div>

<?= $this->include('partials/blank_footer') ?>
