<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

    <article class="hidden-phone">
    <div class="row-fluid">
        <div class="span3 left-arrow visible-desktop">
            1. <?php echo Yii::t('main-ui', 'BUSINESS');?><br/>
            2. <?php echo Yii::t('main-ui', 'THINK UP! CONCEPT');?><br/>
            3. <?php echo Yii::t('main-ui', 'LOVE & WEDDING');?><br/>
            4. <?php echo Yii::t('main-ui', 'PRODUCTION');?><br/>
            5. <?php echo Yii::t('main-ui', 'NICE MICE');?><br/>
            6. <?php echo Yii::t('main-ui', 'SPORTS');?><br/>
            7. <?php echo Yii::t('main-ui', 'CATERING');?><br/>
            8. <?php echo Yii::t('main-ui', 'KINDER');?><br/>
            9. <?php echo Yii::t('main-ui', 'PROMO & PRODUCERING');?><br/>
            10. <?php echo Yii::t('main-ui', 'PARTY CORP.');?><br/>
            11. <?php echo Yii::t('main-ui', 'HOLIDAY');?><br/>
        </div>
        <div class="span6">
            <div class="circle outer">
                <a href="#" class="icon business"><?php echo Yii::t('main-ui', 'BUSINESS');?></a>
                <a href="#" class="icon sports"><?php echo Yii::t('main-ui', 'SPORT');?></a>
                <a href="#" class="icon think"><?php echo Yii::t('main-ui', 'THINK UP!');?> <span><?php echo  Yii::t('main-ui', 'CONCEPT');?></span></a>
                <a href="#" class="icon love"><?php echo Yii::t('main-ui', 'LOVE & WEDDING');?></a>
                <a href="#" class="icon production"><?php echo Yii::t('main-ui', 'PRODUCTION');?></a>
                <a href="#" class="icon party"><?php echo Yii::t('main-ui', 'PARTY CORP.');?></a>
                <a href="#" class="icon holiday"><?php echo Yii::t('main-ui', 'HOLIDAY');?></a>
                <a href="#" class="icon nice-mice"><span><?php echo Yii::t('main-ui', 'NICE');?></span><?php echo Yii::t('main-ui', 'MICE');?></a>
                <a href="#" class="icon catering"><?php echo Yii::t('main-ui', 'CATERING');?></a>
                <a href="#" class="icon kinder"><?php echo Yii::t('main-ui', 'KINDER');?></a>
                <a href="#" class="icon promo"></a>
                <div class="circle inner">
                    <?php echo Yii::t('main-ui', 'What');?><span> <?php echo Yii::t('main-ui', 'do you need');?><br/><?php echo Yii::t('main-ui', 'to create');?><br/><?php echo Yii::t('main-ui', 'and');?><br/><?php echo Yii::t('main-ui', 'celebrate');?></span>
                    <span class="center">?</span>
                </div>
            </div>
        </div>
        <div class="span3 right-arrow visible-desktop">
            <div class="contacts">
                <h1>093 086 28 33</h1>
                <a href="#" class="btn btn-warning"><?php echo Yii::t('main-ui', 'Order call');?></a>
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
                    <a href="#" class="span1 round-icon icon-production"></a>
                    <a href="#" class="span1 round-icon icon-thinkup"></a>
                    <a href="#" class="span1 round-icon icon-wedding"></a>
                    <a href="#" class="span1 round-icon icon-partycorp"></a>
                    <a href="#" class="span1 round-icon icon-kinder"></a>
                    <a href="#" class="span1 round-icon icon-sports"></a>
                    <a href="#" class="span1 round-icon icon-business"></a>
                    <a href="#" class="span1 round-icon icon-nice-mice"></a>
                    <a href="#" class="span1 round-icon icon-holiday"></a>
                    <a href="#" class="span1 round-icon icon-catering"></a>
                    <a href="#" class="span1 round-icon icon-promo"></a>
        </div>
    </div>
    </article>
