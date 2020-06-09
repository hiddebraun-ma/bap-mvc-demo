<?php $this->layout( 'website' ) ?>

<?php if(count($stats) > 0):?>
	<h3><?php echo $stats[0]['Country'] ?></h3>
	<section class="corona-stats">
		<?php foreach ( $stats as $info ): ?>
			<div class="stat">
				<ul>
					<li><strong>Bevestigd:</strong> <?php echo $info['Confirmed'] ?></li>
					<li><strong>Overleden:</strong> <?php echo $info['Deaths'] ?></li>
					<li><strong>Hersteld:</strong> <?php echo $info['Recovered'] ?></li>
					<li><strong>Actief:</strong> <?php echo $info['Active'] ?></li>
				</ul>
			</div>
		<?php endforeach; ?>
	</section>
<?php else:?>
	<p>Er zijn geen gegevens gevonden</p>
<?php endif;?>
