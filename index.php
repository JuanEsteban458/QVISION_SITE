<?php require_once __DIR__ . '/partials/header.php'; ?>

<section class="hero">
  <div class="hero__bg" style="background-image:url('https://izyacademy.com//wp-content/uploads/2024/05/banner_home.webp');"></div>
  <div class="hero__overlay"></div>
  <div class="container hero__content">
    <h1 class="hero__title">Continúa tu formación con IzyAcademy</h1>
    <p class="hero__subtitle">Te ofrecemos una experiencia de aprendizaje basada en la formación por proyectos, apoyada en el uso de recursos interactivos para que tu aprendizaje sea efectivo.</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <h2 class="sectionTitle">Novedades</h2>

    <div class="novedadesGrid">
      <!-- Left big card -->
      <article class="card">
        <img src="https://izyacademy.com//wp-content/uploads/2024/12/rb_1762.webp" alt="Estudiante" />
        <div class="card__titleBar">Bienvenidos a IzyAcademy</div>
        <div class="card__body">
          <p>Nos complace darte la bienvenida a este innovador espacio educativo donde la excelencia académica se encuentra con la comodidad y flexibilidad. Aquí, tu aprendizaje es nuestra prioridad y nuestro campus virtual está diseñado para ofrecerte una experiencia educativa enriquecedora desde la comodidad de tu hogar.</p>
        </div>
        <div class="promo">¡Aprovecha!, este mes hasta un <strong>35%</strong> de descuento en todos nuestros cursos y rutas de formación 🔒</div>
      </article>

      <!-- Right grid of 4 cards -->
      <div class="smallGrid">
        <article class="card miniCard">
          <img src="https://i.pinimg.com/originals/49/dc/4d/49dc4d30262b6767f432c44ee62681a7.png" alt="Comunidad" />
          <div class="card__titleBar">Generación de comunidad</div>
          <div class="card__body"><p>Nos complace generar vínculos sociales entre personas que comparten un mismo interés, incentivar la construcción de un sentido de pertenencia y colaboración dentro de la comunidad.</p></div>
        </article>

        <article class="card miniCard">
          <img src="https://i.pinimg.com/originals/f5/a2/bf/f5a2bf1085d40c8ece40aec882fd8303.jpg" alt="Conocimiento" />
          <div class="card__titleBar">Transferencia de conocimiento</div>
          <div class="card__body"><p>Nos apasiona compartir información, habilidades y experiencias con el objetivo de aplicar y aprovechar esta información para el desarrollo de las habilidades.</p></div>
        </article>

        <article class="card miniCard">
          <img src="https://i.pinimg.com/originals/cf/e4/59/cfe4593a81d29fb4690e126c7178842d.png" alt="Insignias" />
          <div class="card__titleBar">Certificaciones e insignias</div>
          <div class="card__body"><p>IzyAcademy te brinda certificaciones e insignias digitales para que compartas y avales los conocimientos adquiridos junto a nosotros.</p></div>
        </article>

        <article class="card miniCard">
          <img src="https://izyacademy.com//wp-content/uploads/2024/12/rb_2149247155.webp" alt="Apropiación" />
          <div class="card__titleBar">Apropiación del conocimiento</div>
          <div class="card__body"><p>Desde IzyAcademy nos importa que adquieras, comprendas y asimiles el conocimiento, habilidades e ideas que creamos para ti y para la comunidad.</p></div>
        </article>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="alliesHeader">
      <h2 class="sectionTitle">Aliados</h2>
      <p>Nuestros entrenamientos, procesos formativos y certificaciones cuentan con el respaldo de empresas que confían en nosotros.</p>
    </div>

    <div class="logos">
      <?php
        $logos = [
          ["CertiProf", "https://i.pinimg.com/originals/af/a5/2e/afa52e9b0ac2c82f657ebb5649838767.png"],
          ["Arcitura", "https://i.pinimg.com/564x/08/f4/ec/08f4ec17a4354d7f61dbbcac9863912d.jpg"],
          ["FORMARTE", "https://i.pinimg.com/originals/3f/22/4e/3f224e684f64ab2595dff1b0a6b08ee8.jpg"],
          ["Credly", "https://i.pinimg.com/originals/cf/e4/59/cfe4593a81d29fb4690e126c7178842d.png"],
          ["DigitalSchool.co", "https://i.pinimg.com/originals/49/dc/4d/49dc4d30262b6767f432c44ee62681a7.png"],
          ["ScrumStudy", "https://i.pinimg.com/originals/2e/ce/06/2ece06acaf4854ebcd7c203ebe68b71d.png"],
          ["Intersoftware", "https://i.pinimg.com/originals/b0/6c/eb/b06ceb5fd9e9bb2c519f66f0a75c7762.jpg"],
          ["Brightest", "https://izyacademy.com//wp-content/uploads/2024/12/rb_2149392284.webp"],
        ];
        foreach ($logos as $l) {
          echo '<div class="logoItem"><img src="'.h($l[1]).'" alt="'.h($l[0]).'" loading="lazy" /></div>';
        }
      ?>
    </div>
  </div>
</section>

<section class="section section--muted" id="registro">
  <div class="container">
    <div class="registerGrid">
      <div class="registerLeft" aria-hidden="true">
        <img src="https://izyacademy.com//wp-content/uploads/2024/12/rb_2149247155.webp" alt="" />
      </div>

      <div class="registerRight">
        <h2 class="sectionTitle">Regístrate</h2>
        <form class="form" method="POST" action="process_register.php" data-register-form novalidate>
          <label class="form__label">Nombre
            <input class="form__input" name="nombre" type="text" placeholder="Nombre" pattern="^[^0-9]+$" required />
          </label>

          <label class="form__label">Apellidos
            <input class="form__input" name="apellidos" type="text" placeholder="Apellidos" pattern="^[^0-9]+$" required />
          </label>

          <label class="form__label">Correo electrónico
            <input class="form__input" name="email" type="email" placeholder="Correo electrónico" required />
          </label>

          <label class="form__label">Contraseña
            <input class="form__input" name="password" type="password" placeholder="Contraseña" required />
          </label>

          <label class="form__label">Confirmar contraseña
            <input class="form__input" name="password2" type="password" placeholder="Confirmar contraseña" required />
          </label>

          <div class="checkRow">
            <label><input type="checkbox" name="tc" /> Acepto términos y condiciones</label>
            <label><input type="checkbox" name="pd" /> Acepto Política de tratamiento de datos</label>
          </div>

          <button class="btn btn--primary btn--block" type="submit" data-register-btn disabled>Registrarse</button>
        </form>
      </div>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/partials/footer.php'; ?>
