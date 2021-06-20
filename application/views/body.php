<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo mr-auto w-25"><a href="index.html">SOCIOGRAMA</a></div>

          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                <li><a href="#home-section" class="nav-link">Inicio</a></li>
                <li><a href="#programs-section" class="nav-link">Sociograma</a></li>
              </ul>
            </nav>
          </div>
          <div class="ml-auto w-25">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li class="cta"><a href="" class="nav-link"><?php $this->session->sess_destroy(); ?><span>Finalizar</span></a></li>
              </ul>
            </nav>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span
                class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>

    </header>

    <div class="intro-section" id="home-section">

      <div class="slide-1" style="background-image: url('<?= base_url() ?>assets/images/hero_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                  <h1 data-aos="fade-up" data-aos-delay="100">Dirección de equipos de alto rendimiento</h1>
                  <p class="mb-4" data-aos="fade-up" data-aos-delay="200">Llena los formularios en orden, ya que son dinámicos.</p>
                  <?php if (isset($_SESSION['fullname'])): ?>
                  <p data-aos="fade-up" data-aos-delay="300"><a href="#programs-section"
                      class="btn btn-primary py-3 px-5 btn-pill">Contestar Cuestionario</a></p>
                  <?php endif ?>
                </div>
                <?php if (!isset($_SESSION['fullname'])): ?>
                <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">
                  <form action="<?php echo base_url('sociograma/generateSession'); ?>" method="post" class="form-box">
                    <h3 class="h4 text-black mb-4">Inicia Aquí</h3>
                    <div class="form-group">
                      <select name="fullName" id="" class="form-control">
                        <option label="Selecciona tu nombre"></option>
                        <?php $items = $querys; foreach($items as $item): ?>
                        <option value="<?php echo $item['nombre']; ?>"><?php echo $item['nombre']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-pill" value="Buscar">
                    </div>
                  </form>

                </div>
                <?php endif ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php if (isset($_SESSION['fullname'])): ?>
    <div class="site-section" id="programs-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title"><?php echo 'HOLA! '.$_SESSION['fullname'] ?></h2>
            <p>Del siguiente cuestionario elige a tres compañeros en orden de preferencia. La primera opción será
              la de mayor valor.
            </p>
          </div>
        </div>
        <div class="row mb-5 align-items-center">
          <div class="col-lg-12 mb-auto" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-4">Efectivas</h2>
            <form action="<?php echo base_url('sociograma/answerEfectiva'); ?>" method="post">
              <div class="content-question">

                <!--    PRIMERA PREGUNTA    -->

                <div class="form-group question-grid">
                  <label for="exampleInputEmail1">¿A quién elegirías para realizar un proyecto de programación?</label>
                  <select name="efectiva-q1-r1" id="" class="form-control">
                  <option label="Selecciona un alumno"></option>
                  <?php $items = $querys; foreach($items as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Primera Opción.</small>
                  <select name="efectiva-q1-r2" id="" class="form-control">
                  <option label="Selecciona un alumno"></option>
                  <?php $items = $querys; foreach($items as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Segunda Opción.</small>
                  <select name="efectiva-q1-r3" id="" class="form-control">
                  <option label="Selecciona un alumno"></option>
                  <?php $items = $querys; foreach($items as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Tercera Opción.</small>
                </div>

                <!--    SEGUNDA PREGUNTA    -->

                <div class="form-group">
                  <label for="exampleInputEmail1">¿A quién descartarías para que te diera asesorías de
                    programación?</label>
                  <select name="efectiva-q2-r1" id="" class="form-control">
                  <option label="Selecciona un alumno"></option>
                  <?php $items = $querys; foreach($items as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Primera Opción.</small>
                  <select name="efectiva-q2-r2" id="" class="form-control">
                  <option label="Selecciona un alumno"></option>
                  <?php $items = $querys; foreach($items as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Segunda Opción.</small>
                  <select name="efectiva-q2-r3" id="" class="form-control">
                  <option label="Selecciona un alumno"></option>
                  <?php $items = $querys; foreach($items as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Tercera Opción.</small>
                </div>

                <!--    TERCERA PREGUNTA    -->

                <div class="form-group">
                  <label for="exampleInputEmail1">¿Si se descompone tu computadora a quién recurrirías para que te ayude
                    a repararla? </label>
                  <select name="efectiva-q3-r1" id="" class="form-control">
                  <option label="Selecciona un alumno"></option>
                  <?php $items = $querys; foreach($items as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Primera Opción.</small>
                  <select name="efectiva-q3-r2" id="" class="form-control">
                  <option label="Selecciona un alumno"></option>
                  <?php $items = $querys; foreach($items as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Segunda Opción.</small>
                  <select name="efectiva-q3-r3" id="" class="form-control">
                  <option label="Selecciona un alumno"></option>
                  <?php $items = $querys; foreach($items as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Tercera Opción.</small>
                </div>

                <!--    CUARTA PREGUNTA    -->

                <div class="form-group">
                  <label for="exampleInputEmail1">¿A cuál de tus compañeros evitarías si tu equipo de cómputo tuviera
                    alguna falla?</label>
                  <select name="efectiva-q4-r1" id="" class="form-control">
                  <option label="Selecciona un alumno"></option>
                  <?php $items = $querys; foreach($items as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Primera Opción.</small>
                  <select name="efectiva-q4-r2" id="" class="form-control">
                  <option label="Selecciona un alumno"></option>
                  <?php $items = $querys; foreach($items as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Segunda Opción.</small>
                  <select name="efectiva-q4-r3" id="" class="form-control">
                  <option label="Selecciona un alumno"></option>
                  <?php $items = $querys; foreach($items as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Tercera Opción.</small>
                </div>

                <!--    QUINTA PREGUNTA    -->

                <div class="form-group">
                  <label for="exampleInputEmail1">Si vas a presentar un proyecto a tu cliente, ¿a quién elegirías para
                    que lo exponga? </label>
                  <select name="efectiva-q5-r1" id="" class="form-control">
                  <option label="Selecciona un alumno"></option>
                  <?php $items = $querys; foreach($items as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Primera Opción.</small>
                  <select name="efectiva-q5-r2" id="" class="form-control">
                  <option label="Selecciona un alumno"></option>
                  <?php $items = $querys; foreach($items as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Segunda Opción.</small>
                  <select name="efectiva-q5-r3" id="" class="form-control">
                  <option label="Selecciona un alumno"></option>
                  <?php $items = $querys; foreach($items as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Tercera Opción.</small>
                </div>

                <!--    SEXTA PREGUNTA    -->

                <div class="form-group">
                  <label for="exampleInputEmail1">Si un cliente llega a tu empresa y pide que le expliquen su método de
                    trabajo, ¿a quién no le pedirías que hablara con él?</label>
                  <select name="efectiva-q6-r1" id="" class="form-control">
                  <option label="Selecciona un alumno"></option>
                  <?php $items = $querys; foreach($items as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Primera Opción.</small>
                  <select name="efectiva-q6-r2" id="" class="form-control">
                  <option label="Selecciona un alumno"></option>
                  <?php $items = $querys; foreach($items as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Segunda Opción.</small>
                  <select name="efectiva-q6-r3" id="" class="form-control">
                  <option label="Selecciona un alumno"></option>
                  <?php $items = $querys; foreach($items as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Tercera Opción.</small>
                </div>

                <!--    SEPTIMA PREGUNTA    -->

                <div class="form-group">
                  <label for="exampleInputEmail1">¿A cuál de tus compañeros elegirías para documentar un
                    trabajo?</label>
                  <select name="efectiva-q7-r1" id="" class="form-control">
                  <option label="Selecciona un alumno"></option>
                  <?php $items = $querys; foreach($items as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Primera Opción.</small>
                  <select name="efectiva-q7-r2" id="" class="form-control">
                  <option label="Selecciona un alumno"></option>
                  <?php $items = $querys; foreach($items as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Segunda Opción.</small>
                  <select name="efectiva-q7-r3" id="" class="form-control">
                  <option label="Selecciona un alumno"></option>
                  <?php $items = $querys; foreach($items as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Tercera Opción.</small>
                </div>

                <!--    OCTAVA PREGUNTA    -->

                <div class="form-group">
                  <label for="exampleInputEmail1">¿A quién evitarías preguntarle cuando tienes dudas de ortografía o
                    redacción?</label>
                  <select name="efectiva-q8-r1" id="" class="form-control">
                  <option label="Selecciona un alumno"></option>
                  <?php $items = $querys; foreach($items as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Primera Opción.</small>
                  <select name="efectiva-q8-r2" id="" class="form-control">
                  <option label="Selecciona un alumno"></option>
                  <?php $items = $querys; foreach($items as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Segunda Opción.</small>
                  <select name="efectiva-q8-r3" id="" class="form-control">
                  <option label="Selecciona un alumno"></option>
                  <?php $items = $querys; foreach($items as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Tercera Opción.</small>
                </div>

                <!--    NOVENA PREGUNTA    -->

                <div class="form-group">
                  <label for="exampleInputEmail1">¿A quién elegirías para que te apoye en un trabajo como
                    freelance?</label>
                  <select name="efectiva-q9-r1" id="" class="form-control">
                  <option label="Selecciona un alumno"></option>
                  <?php $items = $querys; foreach($items as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Primera Opción.</small>
                  <select name="efectiva-q9-r2" id="" class="form-control">
                  <option label="Selecciona un alumno"></option>
                  <?php $items = $querys; foreach($items as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Segunda Opción.</small>
                  <select name="efectiva-q9-r3" id="" class="form-control">
                  <option label="Selecciona un alumno"></option>
                  <?php $items = $querys; foreach($items as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Tercera Opción.</small>
                </div>

                <!--    DECIMA PREGUNTA    -->

                <div class="form-group">
                  <label for="exampleInputEmail1">¿A quién evitarías recomendar en un puesto de trabajo?</label>
                  <select name="efectiva-q10-r1" id="" class="form-control">
                  <option label="Selecciona un alumno"></option>
                  <?php $items = $querys; foreach($items as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Primera Opción.</small>
                  <select name="efectiva-q10-r2" id="" class="form-control">
                  <option label="Selecciona un alumno"></option>
                  <?php $items = $querys; foreach($items as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Segunda Opción.</small>
                  <select name="efectiva-q10-r3" id="" class="form-control">
                  <option label="Selecciona un alumno"></option>
                  <?php $items = $querys; foreach($items as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Tercera Opción.</small>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Enviar</button>
            </form>

          </div>
        </div>
        <!--        FIN CUESTIONARIO EFECTIVAS        -->


        <!--        CUESTIONARIO AFECTIVAS        -->
        <div class="row mb-5 align-items-center">
          <div class="col-lg-12 mb-auto" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-4">Afectivas</h2>
            <form>
              <div class="content-question">

                <!--    PRIMERA PREGUNTA    -->

                <div class="form-group question-grid">
                  <label for="exampleInputEmail1">Si vas a un congreso fuera de tu estado, ¿Con quién te gustaría
                    compartir habitación?</label>
                  <select name="" id="" class="form-control">
                    <option value="3">Diego Medina</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Primera Opción.</small>
                  <select name="" id="" class="form-control">
                    <option value="2">Diego Medina</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Segunda Opción.</small>
                  <select name="" id="" class="form-control">
                    <option value="1">Diego Medina</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Tercera Opción.</small>
                </div>

                <!--    SEGUNDA PREGUNTA    -->

                <div class="form-group">
                  <label for="exampleInputEmail1">Si vas a un evento fuera de tu ciudad, ¿Con quién evitarías compartir
                    habitación?</label>
                  <select name="" id="" class="form-control">
                    <option value="3">Diego Medina</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Primera Opción.</small>
                  <select name="" id="" class="form-control">
                    <option value="2">Diego Medina</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Segunda Opción.</small>
                  <select name="" id="" class="form-control">
                    <option value="1">Diego Medina</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Tercera Opción.</small>
                </div>

                <!--    TERCERA PREGUNTA    -->

                <div class="form-group">
                  <label for="exampleInputEmail1">¿A quién le pedirías que te ayude a organizar una fiesta? </label>
                  <select name="" id="" class="form-control">
                    <option value="3">Diego Medina</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Primera Opción.</small>
                  <select name="" id="" class="form-control">
                    <option value="2">Diego Medina</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Segunda Opción.</small>
                  <select name="" id="" class="form-control">
                    <option value="1">Diego Medina</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Tercera Opción.</small>
                </div>

                <!--    CUARTA PREGUNTA    -->

                <div class="form-group">
                  <label for="exampleInputEmail1">¿Quién sería la persona menos adecuada para organizar un
                    evento?</label>
                  <select name="" id="" class="form-control">
                    <option value="3">Diego Medina</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Primera Opción.</small>
                  <select name="" id="" class="form-control">
                    <option value="2">Diego Medina</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Segunda Opción.</small>
                  <select name="" id="" class="form-control">
                    <option value="1">Diego Medina</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Tercera Opción.</small>
                </div>

                <!--    QUINTA PREGUNTA    -->

                <div class="form-group">
                  <label for="exampleInputEmail1">¿A quién le compartirías un secreto? </label>
                  <select name="" id="" class="form-control">
                    <option value="3">Diego Medina</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Primera Opción.</small>
                  <select name="" id="" class="form-control">
                    <option value="2">Diego Medina</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Segunda Opción.</small>
                  <select name="" id="" class="form-control">
                    <option value="1">Diego Medina</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Tercera Opción.</small>
                </div>

                <!--    SEXTA PREGUNTA    -->

                <div class="form-group">
                  <label for="exampleInputEmail1">¿A quién evitarías contarle algo importante para ti?</label>
                  <select name="" id="" class="form-control">
                    <option value="3">Diego Medina</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Primera Opción.</small>
                  <select name="" id="" class="form-control">
                    <option value="2">Diego Medina</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Segunda Opción.</small>
                  <select name="" id="" class="form-control">
                    <option value="1">Diego Medina</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Tercera Opción.</small>
                </div>

                <!--    SEPTIMA PREGUNTA    -->

                <div class="form-group">
                  <label for="exampleInputEmail1">¿A quién le contraías un secreto pero con la seguridad de que se
                    enteraría todo el salón?</label>
                  <select name="" id="" class="form-control">
                    <option value="3">Diego Medina</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Primera Opción.</small>
                  <select name="" id="" class="form-control">
                    <option value="2">Diego Medina</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Segunda Opción.</small>
                  <select name="" id="" class="form-control">
                    <option value="1">Diego Medina</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Tercera Opción.</small>
                </div>

                <!--    OCTAVA PREGUNTA    -->

                <div class="form-group">
                  <label for="exampleInputEmail1">¿A quién recurres cuando necesitas un consejo?</label>
                  <select name="" id="" class="form-control">
                    <option value="3">Diego Medina</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Primera Opción.</small>
                  <select name="" id="" class="form-control">
                    <option value="2">Diego Medina</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Segunda Opción.</small>
                  <select name="" id="" class="form-control">
                    <option value="1">Diego Medina</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Tercera Opción.</small>
                </div>

                <!--    NOVENA PREGUNTA    -->

                <div class="form-group">
                  <label for="exampleInputEmail1">Si tuvieras un conflicto legal, ¿A quién le pedirías que te ayude a
                    resolver tu caso?</label>
                  <select name="" id="" class="form-control">
                    <option value="3">Diego Medina</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Primera Opción.</small>
                  <select name="" id="" class="form-control">
                    <option value="2">Diego Medina</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Segunda Opción.</small>
                  <select name="" id="" class="form-control">
                    <option value="1">Diego Medina</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Tercera Opción.</small>
                </div>
                
                <!--    DECIMA PREGUNTA    -->

                <div class="form-group">
                  <label for="exampleInputEmail1">Si tuvieras un problema con la policía, ¿a quién NO le pedirías
                    ayuda?</label>
                  <select name="" id="" class="form-control">
                    <option value="3">Diego Medina</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Primera Opción.</small>
                  <select name="" id="" class="form-control">
                    <option value="2">Diego Medina</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Segunda Opción.</small>
                  <select name="" id="" class="form-control">
                    <option value="1">Diego Medina</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Tercera Opción.</small>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Enviar</button>
            </form>

          </div>
        </div>
      </div>
    </div>

    <?php endif ?>


    <!-- <div class="site-section bg-image overlay" style="background-image: url('<?= base_url() ?>assets/images/hero_1.jpg');">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-md-8 text-center testimony">
            <img src="<?= base_url() ?>assets/images/person_4.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
            <h3 class="mb-4">Jerome Jensen</h3>
            <blockquote>
              <p>&ldquo; Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum rem soluta sit eius
                necessitatibus voluptate excepturi beatae ad eveniet sapiente impedit quae modi quo provident odit
                molestias! Rem reprehenderit assumenda &rdquo;</p>
            </blockquote>
          </div>
        </div>
      </div>
    </div> -->

    <footer class="footer-section bg-white">
      <div class="container">
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>document.write(new Date().getFullYear());</script> All rights reserved | Contact me to coding :) <i class="icon-heart" aria-hidden="true"></i> <a href="https://diegomedina.ml"
                  target="_blank">Diego Medina</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
            </div>
          </div>

        </div>
      </div>
    </footer>



  </div> <!-- .site-wrap -->