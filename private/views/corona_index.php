<?php $this->layout( 'website' ) ?>

<h3>Corona landen overzicht</h3>

<p>Kies het land waarover u info wilt.</p>

<section class="corona-stats">
	<?php foreach ( $countries as $country ): ?>
        <a href="<?php echo url('corona.details', ['country' => $country['Slug']])?>" class="corona-stats__country"><?php echo $country['Country']?> (<?php echo $country['ISO2']?>)</a>
    <?php endforeach;?>
</section>