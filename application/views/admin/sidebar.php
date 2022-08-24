   <div class="app-sidebar">
       <div class="logo">
           <a href="<?= base_url('administration/dashboard') ?>" class="logo-icon"><span class="logo-text">MarketingBranding</span></a>
           <div class="sidebar-user-switcher user-activity-online">
               <a href="#">
                   <img src="<?= base_url() ?>/assets/images/profile/<?= $user->image ?>">
                   <span class="activity-indicator"></span>
                   <span class="user-info-text"><?= $user->first_name ?><br><span class="user-state-info">On a call</span></span>
               </a>
           </div>
       </div>
       <div class="app-menu">
           <ul class="accordion-menu">
               <li class="sidebar-title">
                   <?= mblang('Apps') ?>
               </li>
               <li class="<?php if ($this->uri->segment(2) == 'dashboard') {
                                echo 'active-page';
                            } ?>">
                   <a href="<?= base_url('administration/dashboard') ?>" class="active"><i class="material-icons-two-tone">dashboard</i><?= mblang('Dashboard') ?></a>
               </li>
               <li class="<?php if ($this->uri->segment(2) == 'service') {
                                echo 'active-page';
                            } ?>">
                   <a href="<?= base_url('administration/service') ?>" class="active"><i class="material-icons-two-tone">inventory</i><?= mblang('Services') ?></a>
               </li>
               <li class="<?php if ($this->uri->segment(2) == 'portfolio') {
                                echo 'active-page';
                            } ?>">
                   <a href="<?= base_url('administration/portfolio') ?>" class="active"><i class="material-icons-two-tone">inventory</i><?= mblang('Portfolio') ?></a>
               </li>
               <li class="<?php if ($this->uri->segment(2) == 'category') {
                                echo 'active-page';
                            } ?>">
                   <a href="<?= base_url('administration/category') ?>" class="active"><i class="material-icons-two-tone">category</i><?= mblang('Category') ?></a>
               </li>
               <li>
                   <a href=""><i class="material-icons-two-tone">supervisor_account</i><?= mblang('Clients') ?><i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                   <ul class="sub-menu">
                       <li>
                           <a href="<?= base_url('administration/client') ?>"><?= mblang('Client') ?></a>
                       </li>
                       <li>
                           <a href="<?= base_url('administration/company') ?>"><?= mblang('Company') ?></a>
                       </li>
                   </ul>
               </li>
               <li class="sidebar-title">
                   <?= mblang('Widgets') ?>
               </li>
               <li class="<?php if ($this->uri->segment(2) == 'backgrounds') {
                                echo 'active-page';
                            } ?>">
                   <a href="<?= base_url('administration/backgrounds') ?>" class="active"><i class="material-icons-two-tone">wallpaper</i><?= mblang('Backgrounds') ?></a>
               </li>
               <li class="sidebar-title">
                   <?= mblang('Users') ?>
               </li>
               <li class="sidebar-title">
                   <?= mblang('Configuration') ?>
               </li>
               <li class="<?php if ($this->uri->segment(2) == 'web-configuration') {
                                echo 'active-page';
                            } ?>">
                   <a href="<?= base_url('administration/web-configuration') ?>" class="active"><i class="material-icons-two-tone">settings</i><?= mblang('Website Configuration') ?></a>
               </li>
           </ul>
       </div>
   </div>