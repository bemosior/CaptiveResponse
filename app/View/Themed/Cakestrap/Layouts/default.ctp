<?php echo $this->element('includes/top'); ?>

			<div class="well">
				<h2><?php echo $title_for_layout; ?></h2>
				<?php echo $this->fetch('content'); ?>
			</div>

<?php echo $this->element('includes/bottom'); ?>