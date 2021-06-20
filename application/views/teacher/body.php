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
                  <h1  data-aos="fade-up" data-aos-delay="100">Reportes de sociograma</h1>
                  <p class="mb-4"  data-aos="fade-up" data-aos-delay="200">Dirección de equipos de alto rendimiento</p>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>

    <div class="site-section" id="programs-section">
      <div class="container">
        
        <div class="row mb-5 align-items-center">
          <div class="col-lg-12 mb-auto" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-4">Mostrar datos por pregunta</h2>
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
                        $currentMax = 0;
                        $sutudenMax = '';
                        foreach($temp_array as $arr)
                        {
                          $puntos = $arr['puntos'];
                          
                          if($puntos > $currentMax){
                            $currentMax = $puntos;
                            $sutudenMax = $arr['nombre'];
                          }
                          //print_r($currentMax);
                        }
                        echo $sutudenMax." tiene más puntos, son: ".$currentMax;
                        echo "<br>";
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

    <footer class="footer-section bg-white">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h3>About OneSchool</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro consectetur ut hic ipsum et veritatis corrupti. Itaque eius soluta optio dolorum temporibus in, atque, quos fugit sunt sit quaerat dicta.</p>
          </div>

          <div class="col-md-3 ml-auto">
            <h3>Links</h3>
            <ul class="list-unstyled footer-links">
              <li><a href="#">Home</a></li>
              <li><a href="#">Courses</a></li>
              <li><a href="#">Programs</a></li>
              <li><a href="#">Teachers</a></li>
            </ul>
          </div>

          <div class="col-md-4">
            <h3>Subscribe</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt incidunt iure iusto architecto? Numquam, natus?</p>
            <form action="#" class="footer-subscribe">
              <div class="d-flex mb-5">
                <input type="text" class="form-control rounded-0" placeholder="Email">
                <input type="submit" class="btn btn-primary rounded-0" value="Subscribe">
              </div>
            </form>
          </div>

        </div>

        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
            <p>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </p>
            </div>
          </div>
          
        </div>
      </div>
    </footer>

  
    
  </div> <!-- .site-wrap -->