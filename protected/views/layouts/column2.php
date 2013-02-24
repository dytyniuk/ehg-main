<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
	<article>
	    <div class="container">
	        <div class="row-fluid">
				<?php echo $content; ?>
			</div>
		</div>
	</article>

<!--
<div class="fixed_left" s>
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div>
</div>
-->
<?php $this->endContent(); ?>