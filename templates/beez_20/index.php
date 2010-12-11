<?php
/**
 * @version                $Id: index.php 19398 2010-11-08 11:42:07Z infograf768 $
 * @package                Joomla.Site
 * @subpackage        tpl_beez2
 * @copyright        Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license                GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

// check modules
$showRightColumn        = ($this->countModules('position-3') or $this->countModules('position-6') or $this->countModules('position-8'));
$showbottom                        = ($this->countModules('position-9') or $this->countModules('position-10') or $this->countModules('position-11'));
$showleft                        = ($this->countModules('position-4') or $this->countModules('position-7') or $this->countModules('position-5'));

if ($showRightColumn==0 and $showleft==0) {
        $showno = 0;
}

JHTML::_('behavior.mootools');

// get params
$color              = $this->params->get('templatecolor');
$logo               = $this->params->get('logo');
$navposition        = $this->params->get('navposition');
$app                = JFactory::getApplication();
$templateparams     = $app->getTemplate(true)->params;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://opengraphprotocol.org/schema/"
      xml:lang="<?php echo $this->language; ?>"
      lang="<?php echo $this->language; ?>"
      dir="<?php echo $this->direction; ?>" >
        <head>
                <jdoc:include type="head" />
                <!--Open graph -->
                <meta property="og:title" content="Cambodia realestate agentcy" />
                <meta property="og:type" content="business" />
                <meta property="og:url" content="<?php echo $this->baseurl; ?>" />
                <meta property="og:image" content="<?php echo $this->baseurl ?>/images/log.jpg" />
                
                <meta property="og:site_name" content="Real estate services" />
                
                
                <!--End graph-->

                <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
                <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/beez_20/css/template.css" type="text/css" />
                <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/beez_20/css/position.css" type="text/css" media="screen,projection" />
                <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/beez_20/css/layout.css" type="text/css" media="screen,projection" />
                 <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/beez_20/css/custome.css" type="text/css"  />
                <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/beez_20/css/jd.gallery.css" type="text/css"  />
                <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/beez_20/javascript/QuickBox/css/quickbox.css" type="text/css"  />

                <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/beez_20/css/print.css" type="text/css" media="Print" />
<?php
        $files = JHtml::_('stylesheet','templates/beez_20/css/general.css',null,false,true);
        if ($files):
                if (!is_array($files)):
                        $files = array($files);
                endif;
                foreach($files as $file):
?>
                <link rel="stylesheet" href="<?php echo $file;?>" type="text/css" />
<?php
                 endforeach;
        endif;
?>
                <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/beez_20/css/<?php echo $color; ?>.css" type="text/css" />
                <?php if ($this->direction == 'rtl') : ?>
                <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/beez_20/css/template_rtl.css" type="text/css" />
                <?php endif; ?>
                <!--[if lte IE 6]>
                <link href="<?php echo $this->baseurl ?>/templates/beez_20/css/ieonly.css" rel="stylesheet" type="text/css" />

                <?php if ($color=="personal") : ?>
                <style type="text/css">
                #line
                {      width:98% ;
                }
                .logoheader
                {
                        height:200px;

                }
                #header ul.menu
                {
                display:block !important;
                      width:98.2% ;


                }
                 </style>
                <?php endif;  ?>
                <![endif]-->
                <!--[if IE 7]>
                        <link href="<?php echo $this->baseurl ?>/templates/beez_20/css/ie7only.css" rel="stylesheet" type="text/css" />
                <![endif]-->
                <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/beez_20/javascript/md_stylechanger.js"></script>
                <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/beez_20/javascript/hide.js"></script>
                <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/beez_20/javascript/jd.gallery.js"></script>
                <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/beez_20/javascript/jd.gallery.set.js"></script>
                <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/beez_20/javascript/QuickBox/src/QuickBox.js"></script>

                <script type="text/javascript">
                        var big ='<?php echo $this->params->get('wrapperLarge');?>%';
                        var small='<?php echo $this->params->get('wrapperSmall'); ?>%';
                        var altopen='<?php echo JText::_('TPL_BEEZ2_ALTOPEN',true); ?>';
                        var altclose='<?php echo JText::_('TPL_BEEZ2_ALTCLOSE',true); ?>';
                        var bildauf='<?php echo $this->baseurl ?>/templates/beez_20/images/plus.png';
                        var bildzu='<?php echo $this->baseurl ?>/templates/beez_20/images/minus.png';
                        var rightopen='<?php echo JText::_('TPL_BEEZ2_TEXTRIGHTOPEN',true); ?>';
                        var rightclose='<?php echo JText::_('TPL_BEEZ2_TEXTRIGHTCLOSE'); ?>';
                        var fontSizeTitle='<?php echo JText::_('TPL_BEEZ2_FONTSIZE'); ?>';
                        var bigger='<?php echo JText::_('TPL_BEEZ2_BIGGER'); ?>';
                        var reset='<?php echo JText::_('TPL_BEEZ2_RESET'); ?>';
                        var smaller='<?php echo JText::_('TPL_BEEZ2_SMALLER'); ?>';
                        var biggerTitle='<?php echo JText::_('TPL_BEEZ2_INCREASE_SIZE'); ?>';
                        var resetTitle='<?php echo JText::_('TPL_BEEZ2_REVERT_STYLES_TO_DEFAULT'); ?>';
                        var smallerTitle='<?php echo JText::_('TPL_BEEZ2_DECREASE_SIZE'); ?>';
                </script>

        </head>

        <body>
            
<div id="all">

        <div id="back">
            
                 <div id="header">
                     <!--
                                <div class="logoheader">


                                        <h1 id="logo">
                                        <?php if ($logo): ?>
                                        <img src="<?php echo $this->baseurl ?>/<?php echo $logo; ?>"  alt="<?php echo $templateparams->get('sitetitle');?>" />
                                        <?php endif;?>
                                        <?php if (!$logo ): ?>
                                        <?php echo $templateparams->get('sitetitle');?>
                                        <?php endif; ?>

                                        <span class="header1">
                                        <?php echo $templateparams->get('sitedescription');?>
                                        </span>
                                        </h1>


                                </div>
            -->
            <div style="background-color:#660308;text-align: center;">
                <img src="/vet/images/propertyimage/logo/logo.jpg" width="115" height="90" />
               <jdoc:include type="modules" name="tophead"   />
            </div>
            <!-- end logoheader -->
                                        <ul class="skiplinks">
                                                <li><a href="#main" class="u2"><?php echo JText::_('TPL_BEEZ2_SKIP_TO_CONTENT'); ?></a></li>
                                                <li><a href="#nav" class="u2"><?php echo JText::_('TPL_BEEZ2_JUMP_TO_NAV'); ?></a></li>
                                                <?php if($showRightColumn ):?>
                                                <li><a href="#additional" class="u2"><?php echo JText::_('TPL_BEEZ2_JUMP_TO_INFO'); ?></a></li>
                                                <?php endif; ?>
                                        </ul>
                                        <h2 class="unseen"><?php echo JText::_('TPL_BEEZ2_NAV_VIEW_SEARCH'); ?></h2>
                                        <h3 class="unseen"><?php echo JText::_('TPL_BEEZ2_NAVIGATION'); ?></h3>
                                        <jdoc:include type="modules" name="position-1" />

                                        <!-- end line -->


                        </div><!-- end header -->



                        <?php if ($this->countModules('header')): ?>
                                <jdoc:include type="modules" name="header"   />
                        <?php endif; ?>     
                        <div id="<?php echo $showRightColumn ? 'contentarea2' : 'contentarea'; ?>">
                                        <div id="breadcrumbs">
                                            
                                                        <jdoc:include type="modules" name="position-2" />
                                            
                                        </div>

                                        <?php if ($navposition=='left' AND $showleft) : ?>


                                                        <div class="left1 <?php if ($showRightColumn==NULL){ echo 'leftbigger';} ?>" id="nav">
                                                   <jdoc:include type="modules" name="position-7" style="beezDivision" headerLevel="3" />
                                                                <jdoc:include type="modules" name="position-4" style="beezHide" headerLevel="3" state="0 " />
                                                                <jdoc:include type="modules" name="position-5" style="beezTabs" headerLevel="2"  id="3" />


                                                        </div><!-- end navi -->
               <?php endif; ?>

                                        <div id="<?php echo $showRightColumn ? 'wrapper' : 'wrapper2'; ?>" <?php if (isset($showno)){echo 'class="shownocolumns"';}?>>

                                                <div id="main">

                                                <?php if ($this->countModules('position-12')): ?>
                                                        <div id="top"><jdoc:include type="modules" name="position-12"   />
                                                        </div>
                                                <?php endif; ?>

                                                <?php if ($this->getBuffer('message')) : ?>
                                                        <div class="error">
                                                                <h2>
                                                                        <?php echo JText::_('JNOTICE'); ?>
                                                                </h2>
                                                                <jdoc:include type="message" />
                                                        </div>
                                                <?php endif; ?>

                                                        <jdoc:include type="component" />
                                                       <!-- <jdoc:include type="modules" name="bcomp"   /> -->

                                                </div><!-- end main -->

                                        </div><!-- end wrapper -->

                                <?php if ($showRightColumn) : ?>
                                        <h2 class="unseen">
                                                <?php echo JText::_('TPL_BEEZ2_ADDITIONAL_INFORMATION'); ?>
                                        </h2>
                                        <div id="close">
                                                <a href="#" onclick="auf('right')">
                                                        <span id="bild">
                                                                <?php echo JText::_('TPL_BEEZ2_TEXTRIGHTCLOSE'); ?></span></a>
                                        </div>


                                        <div id="right">
                                                <a id="additional"></a>
                                                <jdoc:include type="modules" name="position-6" style="beezDivision" headerLevel="3"/>
                                                <jdoc:include type="modules" name="position-8" style="beezDivision" headerLevel="3"  />
                                                <jdoc:include type="modules" name="position-3" style="beezDivision" headerLevel="3"  />
                                        </div><!-- end right -->
                                        <?php endif; ?>

                        <?php if ($navposition=='center' AND $showleft) : ?>

                                        <div class="left <?php if ($showRightColumn==NULL){ echo 'leftbigger';} ?>" id="nav" >

                                                <jdoc:include type="modules" name="position-7"  style="beezDivision" headerLevel="3" />
                                                <jdoc:include type="modules" name="position-4" style="beezHide" headerLevel="3" state="0 " />
                                                <jdoc:include type="modules" name="position-5" style="beezTabs" headerLevel="2"  id="3" />


                                        </div><!-- end navi -->
                   <?php endif; ?>

                                <div class="wrap"></div>

                                </div> <!-- end contentarea -->

                        </div><!-- back -->

                </div><!-- all -->

                <div id="footer-outer">
                        <?php if ($showbottom) : ?>
                        <div id="footer-inner">

                                <div id="bottom">
                                        <div class="box box1"> <jdoc:include type="modules" name="position-9" style="beezDivision" headerlevel="3" /></div>
                                        <div class="box box2"> <jdoc:include type="modules" name="position-10" style="beezDivision" headerlevel="3" /></div>
                                        <div class="box box3"> <jdoc:include type="modules" name="position-11" style="beezDivision" headerlevel="3" /></div>
                                </div>


                                <jdoc:include type="modules" name="debug" />

                        </div>
                                <?php endif ; ?>

                        <div id="footer-sub">


                                <div id="footer">

                                        <jdoc:include type="modules" name="position-14" />
                                        <p>
                                            Copyright&copy; 2010 , Cambodia Property Today. All right reserved.
                                        </p>


                                </div><!-- end footer -->

                        </div>

                </div>

        </body>
</html>
