<?php $this->layout( 'website' ); ?>

<h3>Wachtwoord vergeten</h3>

<?php if ( ! $mail_sent ): ?>
    <p>Vul hier je e-mail adres in en we sturen je een wachtwoord reset link/</p>

    <form action="<?php echo url( 'password.form' ) ?>" method="POST">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" value="<?php echo input( 'email' ) ?>" class="form-control" id="email" aria-describedby="emailHelp">
			<?php if ( isset( $errors['email'] ) ): ?>
                <span class="error"><?php echo $errors['email'] ?></span>
			<?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary">Reset wachtwoord</button>
    </form>
<?php else: ?>
    <h4>De mail is verstuurd met de reset link</h4>
<?php endif; ?>




