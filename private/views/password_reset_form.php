<?php $this->layout( 'website' ); ?>

<h3>Wachtwoord resetten</h3>

<p>Vul je nieuwe wachtwoord in:</p>

<form action="<?php echo url('password.reset', ['reset_code' => $reset_code])?>" method="POST">
	<div class="form-group">
		<label for="password">Wachtwoord</label>
		<input type="password" name="password" class="form-control">
		<?php if ( isset( $errors['password'] ) ): ?>
			<span class="error"><?php echo $errors['password'] ?></span>
		<?php endif; ?>
		<label for="password_confirm">Wachtwoord bevestigen</label>
		<input type="password" name="password_confirm" class="form-control">
	</div>

	<button type="submit" class="btn btn-primary">Wachtwoord resetten</button>
</form>





