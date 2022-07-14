
    <!-- Revolution JavaScripts Files -->
    <script src="/assets/vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="/assets/vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <!-- Slider revolution 5.0 Extensions  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script src="/assets/vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="/assets/vendors/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="/assets/vendors/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="/assets/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="/assets/vendors/revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="/assets/vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="/assets/vendors/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="/assets/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="/assets/vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script>
    jQuery(document).ready(function() {
        var ttrevapi;
        var tpj =jQuery;
        if(tpj("#rev_slider_486_1").revolution == undefined){
            revslider_showDoubleJqueryError("#rev_slider_486_1");
        }else{
            ttrevapi = tpj("#rev_slider_486_1").show().revolution({
                        sliderType:"standard",
                        jsFileLocation:"assets/vendors/revolution/js/",
                        sliderLayout:"fullwidth",
                        dottedOverlay:"none",
                        delay:9000,
                        navigation: {
                keyboardNavigation:"on",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation:"off",
                            mouseScrollReverse:"default",
                            onHoverStop:"on",
                            touch:{
                    touchenabled:"on",
                                swipe_threshold: 75,
                                swipe_min_touches: 1,
                                swipe_direction: "horizontal",
                                drag_block_vertical: false
                            }
                            ,
                            arrows: {
                    style: "uranus",
                                enable: true,
                                hide_onmobile: false,
                                hide_onleave: false,
                                tmp: '',
                                left: {
                        h_align: "left",
                                    v_align: "center",
                                    h_offset: 10,
                                    v_offset: 0
                                },
                                right: {
                        h_align: "right",
                                    v_align: "center",
                                    h_offset: 10,
                                    v_offset: 0
                                }
                            },

                        },
                        viewPort: {
                enable:true,
                            outof:"pause",
                            visible_area:"80%",
                            presize:false
                        },
                        responsiveLevels:[1240,1024,778,480],
                        visibilityLevels:[1240,1024,778,480],
                        gridwidth:[1240,1024,778,480],
                        gridheight:[768,600,600,600],
                        lazyType:"none",
                        parallax: {
                type:"scroll",
                            origo:"enterpoint",
                            speed:400,
                            levels:[5,10,15,20,25,30,35,40,45,50,46,47,48,49,50,55],
                            type:"scroll",
                        },
                        shadow:0,
                        spinner:"off",
                        stopLoop:"off",
                        stopAfterLoops:-1,
                        stopAtSlide:-1,
                        shuffle:"off",
                        autoHeight:"off",
                        hideThumbsOnMobile:"off",
                        hideSliderAtLimit:0,
                        hideCaptionAtLimit:0,
                        hideAllCaptionAtLilmit:0,
                        debugMode:false,
                        fallbacks: {
                simplifyAll:"off",
                            nextSlideOnWindowFocus:"off",
                            disableFocusListener:false,
                        }
                    });
                }
    });
    </script>