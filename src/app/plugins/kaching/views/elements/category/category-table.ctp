<?php
function addChildNode($t, $category, $indexes) {

	if (isset($category['children'])) {
		
		foreach($category['children'] as $i => $child):
		
			array_push($indexes, $i);
			echo $t->element("category/category-row", array("plugin"=>"kaching", "category"=>$child, "indexes"=>$indexes));
			
			addChildNode($t, $child, $indexes);
			array_pop($indexes);
	
		endforeach;
	}
}
?>

<table id='categoryTable' class='simple'>
	<thead>
		<tr><th>Name</th><th>Page</th><th>Active</th><th>&nbsp;</th></tr>
	</thead>

	<?php foreach($categories as $index => $category): ?>
	
		<?php $indexes = array(); ?>
		<?php array_push($indexes, $index); ?>
		
		<?php echo $this->element("category/category-row", array("category"=>$category, "indexes"=>$indexes))?>

		<?php addChildNode($this, $category, $indexes); ?>
				
	<?php endforeach; ?>	
</table>