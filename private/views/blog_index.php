<?php $this->layout( 'website' ) ?>

<h3>Blogs</h3>

<div class="row">
	<?php foreach ( $blogs as $blog ): ?>

        <div class="col-12 col-sm-6 pb-5">

            <h5><?php echo $blog['titel'] ?></h5>
            <strong><?php echo $blog['datum'] ?></strong><br/>
            <em><?php echo $blog['auteur'] ?></em><br/>

            <a href="<?php echo url('blog.detail', ['id' => $blog['id']])?>">Lees meer</a>
        </div>
	<?php endforeach; ?>
</div>
