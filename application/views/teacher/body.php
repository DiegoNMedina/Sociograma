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
          <div class="site-logo mr-auto w-25"><a href="index.html">Sociograma</a></div>
          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                <li><a href="#home-section" class="nav-link">Home</a></li>
                <li><a href="#programs-section" class="nav-link">Reportes</a></li>
              </ul>
            </nav>
          </div>
          <div class="ml-auto w-25">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
              <li class="cta"><a href="<?php echo base_url('sociograma/closeSession');?>" class="nav-link"><span>Cambiar Grupo</span></a></li>
              </ul>
            </nav>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
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
            <?php if (isset($_SESSION['group'])): ?>
            <p data-aos="fade-up" data-aos-delay="300"><a href="#programs-section"
                class="btn btn-primary py-3 px-5 btn-pill">Reportes</a></p>
                <?php endif ?>
          </div>
          <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">
          <?php if (!isset($_SESSION['group'])): ?>
          <form action="<?php echo base_url('sociograma/generateSessionTeacher'); ?>" method="post" class="form-box">
              <h3 class="h4 text-black mb-4">Selecciona un grupo</h3>
              <div class="form-group">
                <select name="group" id="" class="form-control">
                  <option label="Selecciona tu nombre"></option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                </select>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-pill" value="Buscar">
              </div>
            </form>
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php if (isset($_SESSION['group'])): ?>
    <div class="site-section" id="programs-section">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-lg-12 mb-auto" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-4">Actualmente estás consultando los datos del grupo <b><?php echo $_SESSION['group']?></b></h2>
            <form action="<?php echo base_url('sociograma/TeacherReports'); ?>" method="post">
              <div class="form-group question-grid">
                    <label for="exampleInputEmail1">Seleccionar pregunta</label>
                    <select name="query-question" id="" class="form-control">
                    <option label="Selecciona una pregunta"></option>
                    <?php $items = $questions; foreach($items as $item): ?>
                        <option value="<?php echo $item['id']; ?>"><?php echo $item['pregunta']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <br>
              </div>
                </form>
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Puntos</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                    /*  CODE  */
                      if(isset($qresults)) {
                        $resultados  = json_decode($qresults, true);
                        $temp_array = array();
                        $key_array = array();
                        $repite = array();
                        $studentname = '';
                        for ($i=0; $i < count($resultados) ; $i++) { 
                          if(!in_array($resultados[$i]['nombre'], $key_array)) {
                              array_push($key_array, $resultados[$i]['nombre']);
                              array_push($temp_array, $resultados[$i]);                          
                          } else {
                            for ($k=0; $k < count($temp_array); $k++) {
                              if($temp_array[$k]['nombre'] == $resultados[$i]['nombre']){ 
                                  $temp_array[$k]['puntos'] += $resultados[$i]['puntos'];
                              } 
                            }
                          }
                        }
                        /*MOSTRAR REPETIDOS Y EL MAYOR */
                        $currentMax = 0;
                        for ($p=0; $p < count($temp_array); $p++) { 
                          if($currentMax < $temp_array[$p]['puntos']){
                            $currentMax = $temp_array[$p]['puntos'];
                            $studentname = $temp_array[$p]['nombre'];
                            
                          } else if($currentMax == $temp_array[$p]['puntos']){
                            array_push($repite, $temp_array[$p]['nombre']);
                          }

                        }
                        echo $studentname." TIENE: "."<b>".$currentMax." PUNTOS</b>";
                        echo "<br><br>";
                        if(!empty($repite)) {
                          echo "<b>PERSONAS QUE TIENEN EL MISMO PUNTAJE:</b><br>";
                          for($r=0; $r < count($repite); $r++){
                            echo "<li>".$repite[$r]."</li>";
                            
                          }
                        }
                        //print_r($temp_array);
                        for ($l=0; $l < count($temp_array); $l++) { 
                          echo "<tr>";
                            echo '<th scope="row">'.$temp_array[$l]['nombre'].'</th>';
                            echo '<td>'.$temp_array[$l]['pregunta'].'</td>';
                            echo '<td>'.$temp_array[$l]['puntos'].'</td>';
                          echo "</tr>";
                        }
                      } else {
                        echo '<label for="exampleInputEmail1">No hay resultados</label>';
                      }
                        
                      ?>
                    </tbody>
                  </table>
          </div>
        </div>
      </div>
    </div>
    <?php endif ?>

    <footer class="footer-section bg-white">
      <div class="container">
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
            <p>Copyright &copy;
                <script>document.write(new Date().getFullYear());</script> All rights reserved | Contact me to coding :) <i class="icon-heart" aria-hidden="true"></i> <a href="https://diegomedina.ml"
                  target="_blank">Diego Medina</a>
            </p>
            </div>
          </div>
        </div>
      </div>
    </footer>

  
    
  </div> <!-- .site-wrap -->