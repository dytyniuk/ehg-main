


<?php
	if(isset($_GET['category_id'])){
		if($_GET['category_id']==2){
?>
<div class="span4 visible-desktop">
    <div class="category-header">
        <?php echo Yii::t('main-ui', 'Port folio');?>
    </div>
</div>
<?php
			echo '<div class="span5 row-fluid">';
				$this->widget('zii.widgets.CListView', array(
					'dataProvider'=>$dataProvider,
					'itemView'=>'_portfolio_view',
					'pager' => 'MyPager',
					'pagerCssClass'        =>  'pagination pagination-centered'
				));
			echo '</div>';
		}elseif($_GET['category_id']==3){
?>
<div class="span4 visible-desktop">
    <div class="category-header">
        <?php echo Yii::t('main-ui', 'Part ners');?>
    </div>
</div>
<?php
			echo '<div class="span5 row-fluid"><div class="thumbnails">';
				$this->widget('zii.widgets.CListView', array(
					'dataProvider'=>$dataProvider,
					'itemView'=>'_partner_view',
					'pager' => 'MyPager',
					'pagerCssClass'        =>  'pagination pagination-centered'
				));
			echo '</div></div>';
		}else{
			$this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider,
				'itemView'=>'_view',
				'pager' => 'MyPager',
				'pagerCssClass'        =>  'pagination pagination-centered'
					
			));
		}
	} 
?>
<div class="span3 visible-desktop">
    <div class="contacts">
        <h1>093 086 28 33</h1>
                <h1>044 425 10 23</h1>
                <a href="#callMe" class="btn btn-warning" role="button" data-toggle="modal"><?php echo Yii::t('main-ui', 'Order call');?></a>
    </div>
</div>