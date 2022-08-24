<div class="banner banner-inner tc-light" style="margin-top: 80px;">
    <div class="banner-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="banner-content">
                        <h1 class="banner-heading">Lets’s Work Together</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-image">
            <img src="<?= base_url('') ?>/assets/images/backgrounds/<?= $bg->bg_contact ?>" alt="banner">
        </div>
    </div>

</div>
<!-- .banner -->

<!-- section -->
<div class="secdtion section-x tc-grey-alt">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-8">
                <div class="section-head">
                    <h5 class="heading-xs dash">Feel the form</h5>
                    <h2>Describe your project and leave us your contact info</h2>
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
        <div class="row gutter-vr-30px">
            <div class="col-lg-4 order-lg-last">
                <div class="contact-text contact-text-s2 bg-secondary box-pad ">
                    <div class="text-box">
                        <h4>Genox Studio</h4>
                        <p class="lead">119 W 24th Street 4th New York, USA</p>
                    </div>
                    <ul class="contact-list">
                        <li>
                            <em class="contact-icon ti-mobile"></em>
                            <div class="conatct-content">
                                <a href="tel:19173303116">+1 917 330 3116</a>
                            </div>
                        </li>
                        <li>
                            <em class="contact-icon ti-email"></em>
                            <div class="conatct-content">
                                <a href="mailto:hello@this.work.com">hello@this.work.com</a>
                            </div>
                        </li>
                        <li>
                            <em class="contact-icon ti-map-alt"></em>
                            <div class="conatct-content">
                                <a href="#">Get Directions</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- .col -->
            <div class="col-lg-8">
                <form class="genox-form mt-10" action="form/contact.php" method="POST">
                    <div class="form-results"></div>
                    <div class="row">
                        <div class="form-field col-md-6">
                            <input name="cf_name" type="text" placeholder="Your Name" class="input bdr-b required">
                        </div>
                        <div class="form-field col-md-6">
                            <input name="cf_email" type="email" placeholder="Your Email" class="input bdr-b required">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-field col-md-6">
                            <input name="cf_address" type="text" placeholder="Your Address" class="input bdr-b required">
                        </div>
                        <div class="form-field col-md-6">
                            <input name="cf_company" type="text" placeholder="Your Compnay" class="input bdr-b required">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-field col-md-6">
                            <input type="text" name="cf_date" class="input bdr-b datepicker" placeholder="When do you want start?">
                        </div>
                        <div class="form-field form-select col-md-6">
                            <select name="cf_budget" class="form-control input-select bdr-b input required" id="selectid_b">
                                <option>What your Budget</option>
                                <option>$100 - $200</option>
                                <option>$200 - $300</option>
                                <option>$300 - $400</option>
                                <option>$400 - $500</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-field col-md-12">
                            <textarea name="cf_msg" placeholder="Briefly tell us about your project. " class="input input-msg bdr-b required"></textarea>
                            <input type="text" class="d-none" name="form-anti-honeypot" value="">
                            <button type="submit" class="btn">Send Message</button>
                        </div>
                    </div>
                </form>
            </div><!-- .col -->
        </div>
    </div><!-- .container -->
</div>);