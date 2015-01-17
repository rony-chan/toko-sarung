<div class="col-md-10 col-md-offset-1">
    <div class="col-md-12">
    
        <!-- Jssor Slider Begin -->
        <!-- You can move inline styles to css file or css block. -->
        <div id="slider1_container" style="position: relative; margin: 0 auto;
             top: 0px; left: 0px; width: 1010px; height: 285px; overflow: hidden;">
            <!-- Loading Screen -->
            <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block;
                     top: 0px; left: 0px; width: 100%; height: 100%;">
                </div>
                <div style="position: absolute; display: block; background: url('<?php echo base_url('resource/img/slider/loading.gif'); ?>') no-repeat center center;
                     top: 0px; left: 0px; width: 100%; height: 100%;">
                </div>
            </div>
            <!-- Slides Container -->
            <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1010px;
                 height: 285px; overflow: hidden;">
                <div>
                    <a href="<?php echo site_url('welcome/item'); ?>">
                        <img u="image" src="<?php echo base_url('resource/img/slider/01.jpg'); ?>" style="width: 1010px; height: 285px;" />
                    </a>
                </div>
                <div>
                    <a href="<?php echo site_url('welcome/item'); ?>">
                        <img u="image" src="<?php echo base_url('resource/img/slider/02.jpg'); ?>" style="width: 1010px; height: 285px;" />
                    </a>
                </div>
                <div>
                    <a href="<?php echo site_url('welcome/item'); ?>">
                        <img u="image" src="<?php echo base_url('resource/img/slider/03.jpg'); ?>" style="width: 1010px; height: 285px;" />
                    </a>
                </div>
                <div>
                    <a href="<?php echo site_url('welcome/item'); ?>">
                        <img u="image" src="<?php echo base_url('resource/img/slider/1920/purple.jpg'); ?>" style="width: 1010px; height: 285px;" />
                    </a>
                </div>
                <div>
                    <a href="<?php echo site_url('welcome/item'); ?>">
                        <img u="image" src="<?php echo base_url('resource/img/slider/1920/blue.jpg'); ?>" style="width: 1010px; height: 285px;" />
                    </a>
                </div>
                <!-- Example to add fixed static share buttons in slider BEGIN -->
                <!-- Remove it if no need -->
                <!-- Share Button Styles -->
                <style>
                    .share-icon {
                        display: inline-block;
                        float: left;
                        margin: 4px;
                        width: 32px;
                        height: 32px;
                        cursor: pointer;
                        vertical-align: middle;
                        background-image: url(<?php echo base_url('resource/img/slider/share/share-icons.png'); ?>);
                    }

                    .share-facebook {
                        background-position: 0px 0px;
                    }

                    .share-facebook:hover {
                        background-position: 0px -40px;
                    }

                    .share-twitter {
                        background-position: -40px 0px;
                    }

                    .share-twitter:hover {
                        background-position: -40px -40px;
                    }

                    .share-pinterest {
                        background-position: -80px 0px;
                    }

                    .share-pinterest:hover {
                        background-position: -80px -40px;
                    }

                    .share-linkedin {
                        background-position: -240px 0px;
                    }

                    .share-linkedin:hover {
                        background-position: -240px -40px;
                    }


                    .share-googleplus {
                        background-position: -120px 0px;
                    }

                    .share-googleplus:hover {
                        background-position: -120px -40px;
                    }


                    .share-stumbleupon {
                        background-position: -360px 0px;
                    }

                    .share-stumbleupon:hover {
                        background-position: -360px -40px;
                    }

                    .share-email {
                        background-position: -320px 0px;
                    }

                    .share-email:hover {
                        background-position: -320px -40px;
                    }
                </style>

                <!-- Example to add fixed static share buttons in slider BEGIN -->
                <!-- Remove it if no need -->
                <div u="any" style="position: absolute; display: block; bottom: 6px; right: 0px; width: 145px; height: 40px;">


                    <a class="share-icon share-facebook" target="_blank" href="http://www.facebook.com/" title="Facebook" data-toggle="tooltip" data-placement="top"></a>
                    <a class="share-icon share-twitter" target="_blank" href="http://twitter.com/" title="Twitter" data-toggle="tooltip" data-placement="top"></a>
                    <a class="share-icon share-googleplus" target="_blank" href="https://plus.google.com/" title="Google Plus" data-toggle="tooltip" data-placement="top"></a>
                </div>
                <!-- Example to add fixed static share buttons in slider END -->
            </div>

            <!-- Bullet Navigator Skin Begin -->
            <style>
                /* jssor slider bullet navigator skin 21 css */
                /*
                .jssorb21 div           (normal)
                .jssorb21 div:hover     (normal mouseover)
                .jssorb21 .av           (active)
                .jssorb21 .av:hover     (active mouseover)
                .jssorb21 .dn           (mousedown)
                */
                .jssorb21 div, .jssorb21 div:hover, .jssorb21 .av
                {
                    background: url(<?php echo base_url('resource/img/slider/b21.png'); ?>) no-repeat;
                    overflow:hidden;
                    cursor: pointer;
                }
                .jssorb21 div { background-position: -5px -5px; }
                .jssorb21 div:hover, .jssorb21 .av:hover { background-position: -35px -5px; }
                .jssorb21 .av { background-position: -65px -5px; }
                .jssorb21 .dn, .jssorb21 .dn:hover { background-position: -95px -5px; }
            </style>
            <!-- bullet navigator container -->
            <div u="navigator" class="jssorb21" style="position: absolute; bottom: 26px; left: 6px;">
                <!-- bullet navigator item prototype -->
                <div u="prototype" style="POSITION: absolute; WIDTH: 19px; HEIGHT: 19px; text-align:center; line-height:19px; color:White; font-size:12px;"></div>
            </div>
            <!-- Bullet Navigator Skin End -->

            <!-- Arrow Navigator Skin Begin -->
            <style>
                /* jssor slider arrow navigator skin 21 css */
                /*
                .jssora21l              (normal)
                .jssora21r              (normal)
                .jssora21l:hover        (normal mouseover)
                .jssora21r:hover        (normal mouseover)
                .jssora21ldn            (mousedown)
                .jssora21rdn            (mousedown)
                */
                .jssora21l, .jssora21r, .jssora21ldn, .jssora21rdn
                {
                    position: absolute;
                    cursor: pointer;
                    display: block;
                    background: url(<?php echo base_url('resource/img/slider/a21.png'); ?>) center center no-repeat;
                    overflow: hidden;
                }
                .jssora21l { background-position: -3px -33px; }
                .jssora21r { background-position: -63px -33px; }
                .jssora21l:hover { background-position: -123px -33px; }
                .jssora21r:hover { background-position: -183px -33px; }
                .jssora21ldn { background-position: -243px -33px; }
                .jssora21rdn { background-position: -303px -33px; }
            </style>
            <!-- Arrow Left -->
            <span u="arrowleft" class="jssora21l" style="width: 55px; height: 55px; top: 123px; left: 8px;">
            </span>
            <!-- Arrow Right -->
            <span u="arrowright" class="jssora21r" style="width: 55px; height: 55px; top: 123px; right: 8px">
            </span>
            <!-- Arrow Navigator Skin End -->
            <a style="display: none" href="http://www.jssor.com">javascript</a>
        </div>
        <!-- Jssor Slider End -->
        
    </div>
    <!-- untuk 2 tabel -->
    <!-- <div class="col-md-2">
        <div class="wrapper-cs" style="">
            <h5>Customer Service</h5>
            <img src="<?php echo base_url('resource/img/icon/cs.ico'); ?>" alt="Customer Service" width="141px" height="150px" />
            <a href="ymsgr:sendIM?hilmi_atiq"><img src="http://opi.yahoo.com/online?u=hilmi_atiq&m=g&t=1" border="0"></a>
            <a href="ymsgr:sendIM?hilmi_atiq"><img src="http://opi.yahoo.com/online?u=hilmi_atiq&m=g&t=1" border="0"></a>
            <a href="ymsgr:sendIM?hilmi_atiq"><img src="http://opi.yahoo.com/online?u=hilmi_atiq&m=g&t=1" border="0"></a>
        </div>
    </div> -->
</div>