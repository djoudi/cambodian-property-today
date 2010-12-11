
<div >
    <!--thumbnails slideshow begin-->
    <div id="SlideItMoo_outer">
        <div class="SlideItMoo_back"><!--slide back button--></div>
        <div id="SlideItMoo_inner">
            <div id="SlideItMoo_items">

                <?php foreach($items as $item):
                   $image = json_decode(stripcslashes($item->params));
                ?>
                   <div class="SlideItMoo_element" >
                       <a title="<?php echo htmlentities($item->name,ENT_QUOTES); ?>" href="<?php echo $item->clickurl; ?>" rel="lightbox[galerie]" >
                            <img src="<?php echo  $image->imageurl; ?>" width="100<?php //echo $image->width; ?>" height="100<?php //echo $image->height; ?>" />
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="SlideItMoo_forward"><!--slide forward button--></div>
    </div>
</div>

<?php
   $doc =& JFactory::getDocument();
   $doc->addScript(JURI::base()."templates/beez_20/javascript/slideitmoo-1.1.js");
   $doc->addStyleSheet(JURI::base()."templates/beez_20/css/fancy.css");
?>
<script language="javascript" type="text/javascript">
    window.addEvents({
        'domready': function(){
            new SlideItMoo({
                overallContainer:'SlideItMoo_outer',
                elementScrolled: 'SlideItMoo_inner',
                thumbsContainer: 'SlideItMoo_items',
                itemsVisible:4,
                elemsSlide:1,
                duration:300,
                itemsSelector: '.SlideItMoo_element',
                itemWidth: 110,
                showControls:1,
                startIndex:0,
                autoSlide:2000,
                onChange: function(index){

                }
            });
        }
    });
</script>
