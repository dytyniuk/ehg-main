<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

    <article class="hidden-phone">
    <div class="row-fluid">
        <div class="span3 left-arrow visible-desktop">
            <a href="http://holiday.ehgroup.com.ua/" class="icon2">1. <?php echo Yii::t('main-ui', 'HOLIDAY');?></a><br/>
            <a href="#" class="icon2">2. <?php echo Yii::t('main-ui', 'BUSINESS');?></a><br/>
            <a href="#" class="icon2">3. <?php echo Yii::t('main-ui', 'LOVE & WEDDING');?></a><br/>
            <a href="http://sports.ehgroup.com.ua/" class="icon2">4. <?php echo Yii::t('main-ui', 'SPORTS');?></a><br/>
            <a href="#" class="icon2">5. <?php echo Yii::t('main-ui', 'PARTY CORP.');?></a><br/>
            <a href="#" class="icon2">6. <?php echo Yii::t('main-ui', 'NICE MICE');?></a><br/>
            <a href="#" class="icon2">7. <?php echo Yii::t('main-ui', 'THINK UP! CONCEPT');?></a><br/>
            <a href="#" class="icon2">8. <?php echo Yii::t('main-ui', 'KINDER');?></a><br/>
            <a href="#" class="icon2">9. <?php echo Yii::t('main-ui', 'PROMO & PRODUCERING');?></a><br/>
            <a href="#" class="icon2">10. <?php echo Yii::t('main-ui', 'PRODUCTION');?></a><br/>
            <a href="#" class="icon2">11. <?php echo Yii::t('main-ui', 'CATERING');?></a><br/>
        </div>
        <div class="span6">
            <div class="circle outer">
                <a href="#" class="icon business"><?php echo Yii::t('main-ui', 'BUSINESS');?></a>
                <a href="http://sports.ehgroup.com.ua/" class="icon sports"><?php echo Yii::t('main-ui', 'SPORT');?></a>
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
                <h1>044 425 10 23</h1>
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
            <a href="#" class="span1 round-icon icon-production"><span class="my_vf "><?php echo Yii::t('main-ui', 'PRODUCTION');?></span></a>
            <a href="#" class="span1 round-icon icon-thinkup"><span class="my_vf "><?php echo Yii::t('main-ui', 'THINK UP! CONCEPT');?></span></a>
            <a href="#" class="span1 round-icon icon-wedding"><span class="my_vf "><?php echo Yii::t('main-ui', 'LOVE & WEDDING');?></span></a>
            <a href="#" class="span1 round-icon icon-partycorp"><span class="my_vf "><?php echo Yii::t('main-ui', 'PARTY CORP.');?></span></a>
            <a href="#" class="span1 round-icon icon-kinder"><span class="my_vf "><?php echo Yii::t('main-ui', 'KINDER');?></span></a>
            <a href="http://sports.ehgroup.com.ua/" class="span1 round-icon icon-sports"><span class="my_vf "><?php echo Yii::t('main-ui', 'SPORT');?></span></a>
            <a href="#" class="span1 round-icon icon-business"><span class="my_vf "><?php echo Yii::t('main-ui', 'BUSINESS');?></span></a>
            <a href="#" class="span1 round-icon icon-nice-mice"><span class="my_vf "><?php echo Yii::t('main-ui', 'NICE');?></br><?php echo Yii::t('main-ui', 'MICE');?></span></a>
            <a href="http://holiday.ehgroup.com.ua/" class="span1 round-icon icon-holiday"><span class="my_vf "><?php echo Yii::t('main-ui', 'HOLIDAY');?></span></a>
            <a href="#" class="span1 round-icon icon-catering"><span class="my_vf "><?php echo Yii::t('main-ui', 'CATERING');?></span></a>
            <a href="#" class="span1 round-icon icon-promo"><span class="my_vf "><?php echo Yii::t('main-ui', 'PROMO & PRODUCERING');?></span></a>
        </div>
    </div>
    </article>
