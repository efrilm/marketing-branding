  <!-- Header -->
  <header class="is-sticky is-shrink is-boxed header-s1" id="header">
      <div class="header-box">
          <div class="header-main">
              <div class="header-wrap">
                  <!-- Logo  -->
                  <div class="header-logo logo">
                      <a href="./" class="logo-link">
                          <img class="logo-white" src="<?= base_url('assets/images/logo/blackLogo.png') ?>" width="70" alt="logo">
                      </a>
                  </div>

                  <!-- Menu Toogle -->
                  <div class="header-nav-toggle">
                      <a href="#" class="search search-mobile search-trigger"><i class="icon ti-search"></i></a>
                      <a href="#" class="navbar-toggle" data-menu-toggle="header-menu">
                          <div class="toggle-line">
                              <span></span>
                          </div>
                      </a>
                  </div>
                  <!-- Menu Toogle -->

                  <!-- Menu -->
                  <div class="header-navbar">
                      <nav class="header-menu" id="header-menu">
                          <ul class="menu">
                              <li class="menu-item">
                                  <a class="menu-link nav-link <?php if ($this->uri->segment(1) == '/') {
                                                                    echo 'active';
                                                                } ?>" href="<?= base_url("/") ?>"><?= mblang('Home') ?></a>
                              </li>
                              <li class="menu-item has-sub">
                                  <a class="menu-link nav-link menu-toggle" href=""><?= mblang('Services') ?></a>
                                  <ul class="menu-sub menu-drop">
                                      <?php
                                        $category  = $this->category->getCategoryAll()->result();
                                        foreach ($category as $key => $value) {
                                            $service = $this->service->getServiceByCategory($value->id_category)->result();
                                        ?>
                                          <li class="menu-item has-sub">
                                              <a class="menu-link nav-link menu-toggle" href=""><?= $value->category_name ?></a>
                                              <ul class="menu-sub menu-drop">
                                                  <?php foreach ($service as $key => $v) { ?>
                                                      <li class="menu-item"><a class="menu-link nav-link" href="<?= base_url('detail-service/' . $v->service_seo) ?>"><?= $v->service_name ?></a></li>
                                                  <?php } ?>
                                              </ul>
                                          </li>
                                      <?php } ?>
                                  </ul>
                              </li>
                              <li class="menu-item"><a class="menu-link nav-link <?php if ($this->uri->segment(1) == 'portfolio') {
                                                                                        echo 'active';
                                                                                    } ?>" href="<?= base_url('portfolio') ?>"><?= mblang('Portfolio') ?></a></li>
                              <li class="menu-item"><a class="menu-link nav-link <?php if ($this->uri->segment(1) == 'about') {
                                                                                        echo 'active';
                                                                                    } ?>" href="<?= base_url('about') ?>"><?= mblang('About') ?></a></li>
                              <li class="menu-item"><a class="menu-link nav-link <?php if ($this->uri->segment(1) == 'contact') {
                                                                                        echo 'active';
                                                                                    } ?>" href="<?= base_url('contact') ?>"><?= mblang('Contact') ?></a></li>
                              <li class="menu-item"><a class="menu-link nav-link" href="dallas-work.html"><?= mblang('Blog') ?></a></li>
                          </ul>
                      </nav>
                  </div><!-- .header-navbar -->
              </div>
          </div>
      </div>
  </header>
  <!-- end header -->