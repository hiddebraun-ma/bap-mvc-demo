<ul>
    <li>
        <a href="<?php echo url( 'home' ) ?>"<?php if ( current_route_is( 'home' ) ): ?> class="active"<?php endif ?>>Home</a>
    </li>
    <li>
        <a href="<?php echo url( 'register.form' ) ?>"<?php if ( current_route_is( 'register.form' ) ): ?> class="active"<?php endif ?>>Inschrijven</a>
    </li>
    <li>
        <a href="<?php echo url( 'map' ) ?>"<?php if ( current_route_is( 'map' ) ): ?> class="active"<?php endif ?>>Overzicht / Kaart</a>
    </li>
    <li>
        <a href="<?php echo url( 'contact.form' ) ?>"<?php if ( current_route_is( 'contact.form' ) ): ?> class="active"<?php endif ?>>Contact</a>
    </li>
    <li>
        <a href="<?php echo url( 'login' ) ?>"<?php if ( current_route_is( 'login.form' ) ): ?> class="active"<?php endif ?>>Login</a>
    </li>
</ul>