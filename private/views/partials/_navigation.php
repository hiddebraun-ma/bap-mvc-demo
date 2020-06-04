<ul>
    <li>
        <a href="<?php echo url( 'home' ) ?>"<?php if ( current_route_is( 'home' ) ): ?> class="active"<?php endif ?>>Home</a>
    </li>
    <li>
        <a href="<?php echo url( 'register.form' ) ?>"<?php if ( current_route_is( 'register.form' ) ): ?> class="active"<?php endif ?>>Registreren</a>
    </li>
</ul>

<div class="user-menu">
	<?php if ( isLoggedIn() ): ?>
        <em><?php echo getLoggedInUserEmail(); ?></em>
	<?php endif; ?>
    <ul>
		<?php if ( isLoggedIn() ): ?>
            <li>
                <a href="<?php echo url( 'logout' ) ?>">Uitloggen</a>
            </li>
		<?php else: ?>
            <li>
                <a href="<?php echo url( 'login.form' ) ?>"<?php if ( current_route_is( 'login.form' ) ): ?> class="active"<?php endif ?>>Inloggen</a>
            </li>
		<?php endif; ?>
    </ul>
</div>