<?php $this->layout( 'website' ); ?>

<h3>Login</h3>

<form action="<?php echo url('login.handle')?>" method="POST">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo input( 'email' ) ?>" class="form-control" id="email" aria-describedby="emailHelp">
		<?php if ( isset( $errors['email'] ) ): ?>
            <span class="error"><?php echo $errors['email'] ?></span>
		<?php endif; ?>
    </div>
    <div class="form-group">
        <label for="wachtwoord">Wachtwoord</label>
        <input type="password" name="wachtwoord" class="form-control" id="wachtwoord">
		<?php if ( isset( $errors['wachtwoord'] ) ): ?>
            <span class="error"><?php echo $errors['wachtwoord'] ?></span>
		<?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary">Inloggen</button>
</form>





