
(function($) {
  "use strict";  
    jQuery(document).ready(function(){                   
    	var skx_gravity = new SKParallaxGravity();
    	skx_gravity.init();
    });

    var sectionsAC;
    var menuSectionsAC;
    var menuItemsAC;
    var restrictWaypointSelection = false;
    var menuIsOpen = false;
    var openAtPosition = 90;
    function SKParallaxGravity(){
        sectionsAC = new Array();   
        menuSectionsAC = new Array();
        menuItemsAC = new Array();             
    	var isMobileDevice = false;
    	var controller;
    	var animationEFX = function(){};
    	this.init = function(){    		            
    		isMobileDevice = (GRAVITY_PARALLAX_DATA.isMobileDevice=="true")?true:false; 
    		interateSections();            
            handleArrowsDisplacement();    		            
    	}



        //handle arrows displacement
        function handleArrowsDisplacement(){
            //gravityDownArrow           
            jQuery('.gravityDownArrow').each(function(indx){
                jQuery(this).css('left', jQuery(window).width()/2-jQuery(this).width()/2+'px');                
            });
            jQuery('.gravityUpArrow').each(function(indx){
                jQuery(this).css('left', jQuery(window).width()/2-jQuery(this).width()/2+'px');                
            });                         
        }

        jQuery(window).resize(function(){          
            handleArrowsDisplacement();
        });          


	


    	function interateSections(){
            var countMenuSections = 0;
    		jQuery('.gravitySection').each(function(indx){
    			if(isMobileDevice){
    				checkBackgroundOnMobile(jQuery(this));
    			}
                sectionsAC.push(jQuery(this));
                if(jQuery(this).hasClass('menuSection')){
                    countMenuSections++;
                    jQuery(this).attr('data-countIndx', countMenuSections);
                    menuSectionsAC.push(jQuery(this));                                        
                }
    		});
    	}

    	//add support for background for mobile devices
    	function checkBackgroundOnMobile(section){
    		if(section.attr('data-hasbackgroundimage')=="true"){
    			section.backstretch(section.attr('data-backimageurl'));     			
    		}
    	}
    }




})(jQuery);