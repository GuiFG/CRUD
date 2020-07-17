<?php
function input($id, $name, $type, $nameLabel, $placeholder, $icon="") {
	$element = "<div class=\"input-group mb-3\">
					<div class=\"input-group-prepend\">
						<label for=$id class=\"input-group-text\">$nameLabel</label>  
					</div>
					<input id='$id' type='$type' class=\"form-control\" name='$name' autocomplete=\"off\" placeholder='$placeholder'/>
				</div> ";
	echo $element;
}

function inputSearch($id, $name, $type, $placeholder) {
	$element = "<div class=\"col\">
					<input id='$id' type='$type' class=\"form-control\"  name='$name' value =\"\" placeholder='$placeholder'/> 
				</div>";

	echo $element;
}

function thead() {
	$texts = func_get_args();
	$total = func_num_args();
	for ($i = 0; $i < $total; $i++)
		echo "<th scope='col'>".$texts[$i]."</th>";
}

?>

