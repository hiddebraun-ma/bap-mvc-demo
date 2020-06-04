<?php $this->layout( 'website' ); ?>

<h2>Contact</h2>

<p>Laat ons weten waar we u mee kunnen helpen vai het formulier hier onder.</p>

<form action="<?php echo url( 'contact.handle' ) ?>" method="POST">
    <div class="form-group">
        <label for="">Uw naam</label>
        <input type="text" name="from_name" placeholder="Uw naam" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Uw e-mail</label>
        <input type="email" name="from_email" placeholder="Uw e-mail" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Uw bericht</label>
        <textarea name="contact_message" class="form-control"></textarea>
    </div>
    <p>
        <button type="submit" class="btn btn-primary">Opsturen</button>
    </p>
</form>
