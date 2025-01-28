<?php

header("Location: login.php?error=correo_ya_registrado");
if (isset($_GET['error']) && $_GET['error'] === 'correo_ya_registrado'): ?>
    <p style="color: red;">Este correo ya está registrado. Por favor, inicia sesión.</p>
<?php endif; ?>