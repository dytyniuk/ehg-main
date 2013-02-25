<!DOCTYPE HTML>
<?php /* @var $this Controller */ ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content=<?php echo Yii::app()->language; ?> />
   
    <link href="<?php echo Yii::app()->baseUrl;?>/jscripts/lightbox/css/lightbox.css" rel="stylesheet" />
	<link media="all" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" type="text/css" />
    <link media="all" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-responsive.min.css" type="text/css" />
    <link media="all" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin_css.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->baseUrl;?>/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->baseUrl;?>/jscripts/lightbox/js/lightbox.js"></script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div id="callMe" class="modal hide fade" role="dialog">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">x</button>
        <h3>Замовити дзвінок</h3>
    </div>
    <form action="#" method="post">
        <div class="modal-body">
            <label>Ім’я</label>
            <input type="text" name="name" placeholder="Ім’я" class="input-xlarge"/>
            <label>Телефон</label>
            <input type="text" name="phone" placeholder="0501234567" class="input-xlarge"/>
            <label>Тема дзвінка</label>
            <input type="text" name="subject" placeholder="Замовлення" class="input-xlarge"/>
        </div>
        <div class="modal-footer">
            <button type="reset" class="btn">Очистити</button>
            <button type="submit" class="btn btn-primary">Замовити</button>
        </div>
    </form>
</div>
<header>
    <div class="topbar">
        <div class="offset7 span5">
            <a href="https://www.facebook.com/pages/Event-Holding-Group/557530554258389" class="social facebook"></a>
            <a href="http://vk.com/ehgevent" class="social vk"></a>
            <a href="https://twitter.com/EventHoldingGrp" class="social twitter"></a>
            <div class='fix1'>
	            <form action="#" method="post" class="form-search pull-right">
	                <input type="text" class="input-small search-query" placeholder="Пошук">
	                <button type="submit" class="btn btn-warning btn-small">Пошук</button>
	            </form>
	        </div>
        </div>
    </div>
    <div class="container">
    	<div class="row-fluid">
            <div class="span3">
                <a href="<?php echo Yii::app()->baseUrl; ?>" class="logo"></a>
            </div>
            <div class="span6">
                <div class="row-fluid menu">
                	<?php 
                        $this->widget('ext.MyCMenu',array(
				       		'items'=>array(
							//array('label'=>'Home', 'url'=>array('/site/index'), 'linkOptions'=>array('class'=>'span3')),
							array('label'=>Yii::t('main-ui', 'Projects'), 'url'=>array('/'), 'linkOptions'=>array('class'=>'span3'), 'active' => strpos(Yii::app()->request->requestUri, '/projects') || preg_match('/(en|ru|uk)$/', Yii::app()->request->requestUri ) || preg_match('/site\/index$/', Yii::app()->request->requestUri ) || (Yii::app()->request->baseUrl.'/') == Yii::app()->request->url ),
							
							array('label'=>Yii::t('main-ui', 'Portfolio'), 'url'=>array('/portfolio'), 'linkOptions'=>array('class'=>'span3'), 'active' => strpos(Yii::app()->request->requestUri, '/portfolio') ),
							
							array('label'=>Yii::t('main-ui', 'Contacts'), 'url'=>array('/contacts'), 'linkOptions'=>array('class'=>'span3'), 'active' => strpos(Yii::app()->request->requestUri, '/contacts')),
                            array('label'=>Yii::t('main-ui', 'About'), 'url'=>array('/about'), 'linkOptions'=>array('class'=>'span3'), 'active' => strpos(Yii::app()->request->requestUri, '/about') ),
							//array('label'=>'Contact', 'url'=>array('/site/contact')),
							//array('label'=>'Login', 'url'=>array('/myUserModule/default/login'), 'visible'=>Yii::app()->user->isGuest),
							//array('label'=>'User', 'url'=>array('/myUserModule/user'), 'visible'=>!Yii::app()->user->isGuest),
							//array('label'=>'profile', 'url'=>array('/myUserModule/user/profile', 'id'=>Yii::app()->user->id), 'visible'=>!Yii::app()->user->isGuest),
							//array('label'=>'Edit Profile', 'url'=>array('/myUserModule/user/editProfile', ), 'visible'=>!Yii::app()->user->isGuest),
							//array('label'=>'Registration', 'url'=>array('/myUserModule/default/registration'), 'visible'=>Yii::app()->user->isGuest),
							//array('label'=>'Ask password recovery', 'url'=>array('/myUserModule/default/askPasswordRecovery'), 'visible'=>Yii::app()->user->isGuest),
							array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/myUserModule/default/logout'), 'visible'=>!Yii::app()->user->isGuest, 'linkOptions'=>array('class'=>'span3') )
						),
					)); ?>
                   
                </div>
            </div>
            <div class="span3">
                <div class="stripe visible-desktop">
                    <div class="stripe-caption">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/stripe-caption.png" alt="Event Holding Group" />
                    </div>
                </div>
                
                    <?php 
	        			$this->widget('application.modules.myCategoryModule.components.widgets.LanguageSelector');
	   				 ?>
                
            </div>
    	</div>
    </div>
</header>




	<?php echo $content; ?>

<footer>
    <div class="bottom-bar clearfix">
        <div class="container">
        	<div class="row-fluid">
                <div class="span2 brief">
                    <?php echo Yii::t('main-ui', 'Download our brief!'); ?><br/>
                    <a href="#" class="btn btn-warning"><?php echo Yii::t('main-ui', 'Download'); ?></a>
                </div>
                <div class="span3 news">
                    <h4><?php echo Yii::t('main-ui', 'Latest News'); ?></h4>
                    <ul>
                    <?php
                        $category = Category::model()->findByAttributes( array('special_tag'=>'NEWS'));
                        if(!empty($category)){
                            $news = $category->getLastMaterial(3);
                            foreach ($news as $key => $value) {
                                $value->setLocalProperties();
                                echo "<li class='inide_p_inline'>$value->short_description <a href='".Yii::app()->createUrl('/news/'.$value->id.'_'.str_replace(' ', '_', $value->title) )."'>".Yii::t('main-ui', 'Read here')."</a></li>";
                            }
                        }
                    ?>
                    
                        
                    </ul>
                </div>
                <div class="span2">
                    <h4><?php echo Yii::t('main-ui', 'Contacts'); ?></h4>
                    м. Київ<br/>
                    <span class="orange"><?php echo Yii::t('main-ui', 'вул. Верхній Вал, 30а'); ?></span><br/>
                    <br/>
                    +38 093 086 28 33<br/>
                    <br/>
                    info@ehgroup.com.ua<br/>
                    <br/>
                    <a href="https://www.facebook.com/pages/Event-Holding-Group/557530554258389" class="social facebook"></a>
                    <a href="http://vk.com/ehgevent" class="social vk"></a>
                    <a href="https://twitter.com/EventHoldingGrp" class="social twitter"></a>
                </div>
                <div class="span3 hidden-phone">
                    <form id="contact-form" action="<?php echo Yii::app()->createUrl('/contact'); ?>" method="post">
                    	<input name="ContactForm[name]" type="text"  placeholder="<?php echo Yii::t('main-ui', 'Name'); ?>"/>
                    	<input name="ContactForm[email]" type="email" placeholder="E-mail"/>
                        <input type="hidden" value="<?php echo Yii::app()->request->csrfToken; ?>" name="YII_CSRF_TOKEN">
                    	<input name="ContactForm[phone]" type="tel" placeholder="<?php echo Yii::t('main-ui', 'Phone'); ?>"/>
                        <textarea id="" name="ContactForm[body]" rows="3" cols="30" placeholder="<?php echo Yii::t('main-ui', 'Message'); ?>"></textarea>
                        <button type="submit" class="btn btn-warning btn-small"><?php echo Yii::t('main-ui', 'Send'); ?></button>
                        <button type="reset" class="btn btn-small"><?php echo Yii::t('main-ui', 'Clear'); ?></button>
                    </form>
                </div>
                <div class="span2">
                    &copy; 2013 Event Holding Group
                </div>
        	</div>
        </div>
    </div>


<?php if(!Yii::app()->user->isGuest) : ?>
    <div id="admin_tools">

    	<p><?php echo CHtml::link( Yii::t('main-ui', 'Category') , Yii::app()->createUrl('/myCategoryModule/category/admin' ), array('class'=>'btn btn-large')); ?></p>
    	<p><?php echo CHtml::link( Yii::t('main-ui', 'Users') , Yii::app()->createUrl('/myUserModule/user/admin' ), array('class'=>'btn btn-large')); ?></p>
    	<p><?php echo CHtml::link( Yii::t('main-ui', 'Create Users') , Yii::app()->createUrl('/myUserModule/user/create'), array('class'=>'btn btn-small btn-warning')); ?></p>

    	<p><?php echo CHtml::link( Yii::t('main-ui', 'Portfolio materials') , Yii::app()->createUrl('/myCategoryModule/category/update', array('id'=>'2') ), array('class'=>'btn btn-large')); ?></p>
    	<p><?php echo CHtml::link( Yii::t('main-ui', 'Manage Portfolio materials') , Yii::app()->createUrl('/myCategoryModule/material/admin', array('category_id'=>'2') ), array('class'=>'btn btn-small btn-warning')); ?></p>
    	<p><?php echo CHtml::link( Yii::t('main-ui', 'Create Portfolio materials') , Yii::app()->createUrl('/myCategoryModule/material/create', array('category_id'=>'2') ), array('class'=>'btn btn-small btn-warning')); ?></p>

    	<p><?php echo CHtml::link( Yii::t('main-ui', 'News materials') , Yii::app()->createUrl('/myCategoryModule/category/update', array('id'=>'1') ), array('class'=>'btn btn-large')); ?></p>
    	<p><?php echo CHtml::link( Yii::t('main-ui', 'Manage News materials') , Yii::app()->createUrl('/myCategoryModule/material/admin', array('category_id'=>'1') ), array('class'=>'btn btn-small btn-warning')); ?></p>
    	<p><?php echo CHtml::link( Yii::t('main-ui', 'Create News materials') , Yii::app()->createUrl('/myCategoryModule/material/create', array('category_id'=>'1') ), array('class'=>'btn btn-small btn-warning')); ?></p>

    	<p><?php echo CHtml::link( Yii::t('main-ui', 'Partner materials') , Yii::app()->createUrl('/myCategoryModule/category/update', array('id'=>'3') ), array('class'=>'btn btn-large')); ?></p>
    	<p><?php echo CHtml::link( Yii::t('main-ui', 'Manage Partner materials') , Yii::app()->createUrl('/myCategoryModule/material/admin', array('category_id'=>'3') ), array('class'=>'btn btn-small btn-warning')); ?></p>
    	<p><?php echo CHtml::link( Yii::t('main-ui', 'Create Partner materials') , Yii::app()->createUrl('/myCategoryModule/material/create', array('category_id'=>'3') ), array('class'=>'btn btn-small btn-warning')); ?></p>

    	<p><?php echo CHtml::link( Yii::t('main-ui', 'About materials') , Yii::app()->createUrl('/myCategoryModule/category/update', array('id'=>'4') ), array('class'=>'btn btn-large')); ?></p>
    	<p><?php echo CHtml::link( Yii::t('main-ui', 'Manage About materials') , Yii::app()->createUrl('/myCategoryModule/material/admin', array('category_id'=>'4') ), array('class'=>'btn btn-small btn-warning')); ?></p>
    	

    </div>
<?php endif; ?>


</body>
</html>
