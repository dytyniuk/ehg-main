<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_created')); ?>:</b>
	<?php echo CHtml::encode($data->date_created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('path_hdd_o')); ?>:</b>
	<?php echo CHtml::encode($data->path_hdd_o); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('path_hdd_s')); ?>:</b>
	<?php echo CHtml::encode($data->path_hdd_s); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('path_hdd_b')); ?>:</b>
	<?php echo CHtml::encode($data->path_hdd_b); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('url_o')); ?>:</b>
	<?php echo CHtml::encode($data->url_o); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url_s')); ?>:</b>
	<?php echo CHtml::encode($data->url_s); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url_b')); ?>:</b>
	<?php echo CHtml::encode($data->url_b); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('album_id')); ?>:</b>
	<?php echo CHtml::encode($data->album_id); ?>
	<br />

	*/ ?>

</div>