<?php $this->layout('website') ?>

<h3><?php echo $blogItem['titel']?></h3>
<p>
    <em><?php echo $blogItem['datum']?></em>
    <?php echo $blogItem['auteur']?>
</p>

<p>
    <?php echo $blogItem['content']?>
</p>

<p>
    <a href="<?php echo url('blog.index')?>" class="btn btn-primary">Terug naar overzicht</a>
</p>
