<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

    <article class="hidden-phone">
    <div class="row-fluid">
        <div class="span3 left-arrow visible-desktop">
            1. <?php echo Yii::t('main-ui', 'HOLIDAY');?><br/>
            2. <?php echo Yii::t('main-ui', 'BUSINESS');?><br/>
            3. <?php echo Yii::t('main-ui', 'LOVE & WEDDING');?><br/>
            4. <?php echo Yii::t('main-ui', 'SPORTS');?><br/>
            5. <?php echo Yii::t('main-ui', 'PARTY CORP.');?><br/>
            6. <?php echo Yii::t('main-ui', 'NICE MICE');?><br/>
            7. <?php echo Yii::t('main-ui', 'THINK UP! CONCEPT');?><br/>
            8. <?php echo Yii::t('main-ui', 'KINDER');?><br/>
            9. <?php echo Yii::t('main-ui', 'PROMO & PRODUCERING');?><br/>
            10. <?php echo Yii::t('main-ui', 'PRODUCTION');?><br/>
            11. <?php echo Yii::t('main-ui', 'CATERING');?><br/>
        </div>
        <div class="span6">
            <div class="circle outer">
                <a href="#" class="icon business"><?php echo Yii::t('main-ui', 'BUSINESS');?></a>
                <a href="#" class="icon sports"><?php echo Yii::t('main-ui', 'SPORT');?></a>
                <a href="#" class="icon think"><?php echo Yii::t('main-ui', 'THINK UP!');?> <span><?php echo  Yii::t('main-ui', 'CONCEPT');?></span></a>
                <a href="#" class="icon love"><?php echo Yii::t('main-ui', 'LOVE & WEDDING');?></a>
                <a href="#" class="icon production"><?php echo Yii::t('main-ui', 'PRODUCTION');?></a>
                <a href="#" class="icon party"><?php echo Yii::t('main-ui', 'PARTY CORP.');?></a>
                <a href="http://holiday.ehgroup.com.ua/" class="icon holiday"><?php echo Yii::t('main-ui', 'HOLIDAY');?></a>
                <a href="#" class="icon nice-mice"><span><?php echo Yii::t('main-ui', 'NICE');?></span><?php echo Yii::t('main-ui', 'MICE');?></a>
                <a href="#" class="icon catering"><?php echo Yii::t('main-ui', 'CATERING');?></a>
                <a href="#" class="icon kinder"><?php echo Yii::t('main-ui', 'KINDER');?></a>
                <a href="#" class="icon promo"><?php echo Yii::t('main-ui', 'PROMO & PRODUCERING');?></a>
                <div class="circle inner">
                    <?php echo Yii::t('main-ui', 'What');?><span> <?php echo Yii::t('main-ui', 'do you need');?><br/><?php echo Yii::t('main-ui', 'to create');?><br/><?php echo Yii::t('main-ui', 'and');?><br/><?php echo Yii::t('main-ui', 'celebrate');?></span>
                    <span class="center">?</span>
                </div>
            </div>
        </div>
        <div class="span3 right-arrow visible-desktop">
            <div class="contacts">
                <h1>093 086 28 33</h1>
                <a href="#callMe" class="btn btn-warning" role="button" data-toggle="modal"><?php echo Yii::t('main-ui', 'Order call');?></a>
            </div>
            
        </div>
    </div>
    </article>
    <article class="visible-desktop">
    <div class="row-fluid">
        <div class="offset8 span4">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/moto.png" width="400" height="103" alt="Out of the Box!" class="moto" />
        </div>
    </div>
    </article>
    <article>
    <div class="row-fluid">
        <div class="span12 pagination-centered icons-wrapper">
            <a href="#" class="span1 round-icon icon-production"><span class="visible-phone">Production</span></a>
            <a href="#" class="span1 round-icon icon-thinkup"><span class="visible-phone">Think Up! Concept</span></a>
            <a href="#" class="span1 round-icon icon-wedding"><span class="visible-phone">Love & Wedding</span></a>
            <a href="#" class="span1 round-icon icon-partycorp"><span class="visible-phone">Party Corp.</span></a>
            <a href="#" class="span1 round-icon icon-kinder"><span class="visible-phone">Kinder</span></a>
            <a href="#" class="span1 round-icon icon-sports"><span class="visible-phone">Sports</span></a>
            <a href="#" class="span1 round-icon icon-business"><span class="visible-phone">Business</span></a>
            <a href="#" class="span1 round-icon icon-nice-mice"><span class="visible-phone">NiceMICE</span></a>
            <a href="http://holiday.ehgroup.com.ua/" class="span1 round-icon icon-holiday"><span class="visible-phone">Holiday</span></a>
            <a href="#" class="span1 round-icon icon-catering"><span class="visible-phone">Catering</span></a>
            <a href="#" class="span1 round-icon icon-promo"><span class="visible-phone">Promo & Producering</span></a>
        </div>
    </div>
    </article>
