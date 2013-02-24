<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	Yii::t('main-ui', 'Users')=>array('index'),
	$model->id,
);


?>

<h1>Profile #<?php echo $model->id; ?></h1>

<?php 
	$baseUrl = Yii::app()->baseUrl;
	$userpic = $model->getUserpic();
	//echo "<div class='profile_userpic_holder' style='width:{$userpic->width}px;height:{$userpic->height}px;'>";
	//	echo CHtml::image($baseUrl.$userpic->url_s, $userpic->alt, array( 'style'=>"left:-{$userpic->x1}px;top:-{$userpic->y1}px;"));
	//echo "</div>";
     
	

 ?>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span4" style="text-align:center;">
      	<?php echo CHtml::image($baseUrl.$userpic->url_s, $userpic->alt );?>
    </div>
    <div class="span8">
      
      <?php if(Yii::app()->user->hasFlash('notification')):?>
          <div class="info alert alert-success " >
              <?php echo Yii::app()->user->getFlash('notification'); ?>
          </div>
      <?php endif; ?>

    	<table>
        <?php
          if(!empty($model->country)){
        ?>
        <tr>
          <td>
            <?php echo CHtml::image(Yii::app()->baseUrl.'/flags-iso/flat/64/'.$model->country.'.png')?>
          </td>
            
          <td>
            <?php echo CHtml::encode($model->country); ?>
          </td>
          </tr>
        <tr>   

        <?php
          }
        ?>
    		<tr>
    			<td>
    				<?php echo '<strong>UserID : </strong>'; ?>
    			</td>
    				
    			<td>
    				<?php echo $model->id; ?>
    			</td>
      		</tr>
    		<tr>
    			<td>
    				<?php echo '<strong>Username : </strong>'; ?>
    			</td>
    				
    			<td>
    				<?php echo  CHtml::encode($model->username); ?>
    			</td>
      		</tr>
      		<tr>
    			<td>
    				<?php echo '<strong>Email :</strong>';  ?>
    			</td>
    			<td>
    				<?php echo  CHtml::encode($model->email);  ?>
    			</td>
      		</tr>
      	</table>
    </div>
  </div>
</div>

