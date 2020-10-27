<?php

$className = 'content block';
if(!empty($block['className'])) {
	$className .= ' ' . $block['className'];
}
if(!empty($block['align'])) {
	$className .= ' align' . $block['align'];
}

$block_content = get_field('content');

if($block_content) :
?>

<div class="<?php echo esc_attr($className); ?>">

	<div class="container">

		<div class="row">

			<div class="col-12">

				<?php echo $block_content; ?>

			</div>		

		</div>

	</div>

</div>
<?php
endif;
?>