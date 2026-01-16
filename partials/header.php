<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function h(string $v): string {
    return htmlspecialchars($v, ENT_QUOTES, 'UTF-8');
}

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$loggedUser = $_SESSION['user'] ?? null;
$displayName = $loggedUser ? ($loggedUser['nombre'] ?? 'Usuario') : null;
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>IzyAcademy - Prueba Q-Vision</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600;700;800&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css" />
  <script defer src="assets/js/main.js"></script>
</head>
<body>
  <header class="topbar">
    <div class="container navwrap">
      <a class="brand" href="index.php" aria-label="Ir al inicio">
        <img src="https://izyacademy.com//wp-content/uploads/2024/03/logo_actualizado.png" alt="IzyAcademy" />
      </a>

      <nav class="nav" aria-label="Navegación principal">
        <button class="nav__toggle" type="button" aria-label="Abrir menú" data-nav-toggle>
          <span></span><span></span><span></span>
        </button>

        <ul class="nav__list" data-nav-list>
          <li><a href="index.php">Inicio</a></li>

          <li class="dropdown" data-dropdown>
            <button class="dropdown__btn" type="button" aria-haspopup="true" aria-expanded="false" data-dropdown-btn>
              Rutas De Formación <span class="caret">▾</span>
            </button>
            <ul class="dropdown__menu" data-dropdown-menu>
              <li><a href="#" onclick="return false;">Científico De Datos</a></li>
              <li><a href="ruta-net.php">Ruta de Formación En .NET</a></li>
              <li><a href="#" onclick="return false;">Ruta de Formación en Automatización</a></li>
            </ul>
          </li>

          <li><a href="#" onclick="return false;">Cursos</a></li>
          <li><a href="#" onclick="return false;">Quiénes somos</a></li>
        </ul>
      </nav>

      <div class="nav__actions">
        <?php if ($loggedUser): ?>
          <div class="userchip" title="Sesión iniciada">
            <span class="userchip__icon" aria-hidden="true">👤</span>
            <span class="userchip__name"><?php echo h($displayName); ?></span>
          </div>
          <a class="link" href="logout.php">Cerrar sesión</a>
        <?php else: ?>
          <a class="link" href="#" data-open-login>Iniciar sesión</a>
        <?php endif; ?>
      </div>
    </div>
  </header>

  <?php if ($flash): ?>
    <div class="container">
      <div class="flash <?php echo h($flash['type'] ?? 'info'); ?>">
        <?php echo h($flash['message'] ?? ''); ?>
      </div>
    </div>
  <?php endif; ?>

  
  <div class="modal" data-login-modal aria-hidden="true">
    <div class="modal__backdrop" data-close-login></div>
    <div class="modal__card" role="dialog" aria-modal="true" aria-labelledby="loginTitle">
      <button class="modal__close" type="button" aria-label="Cerrar" data-close-login>&times;</button>
      <h2 id="loginTitle" class="modal__title">Inicie sesión en su cuenta</h2>

      <form class="form" method="POST" action="process_login.php" novalidate>
        <label class="form__label">Correo electrónico
          <input class="form__input" type="email" name="email" placeholder="Correo electrónico" required />
        </label>

        <label class="form__label">Contraseña
          <input class="form__input" type="password" name="password" placeholder="Contraseña" required />
        </label>

        <button class="btn btn--primary btn--block" type="submit">Acceder</button>
      </form>
    </div>
  </div>

  <main>
