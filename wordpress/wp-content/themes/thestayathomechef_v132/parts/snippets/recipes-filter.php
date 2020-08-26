<div class="recipes-filter">

	<div class="grid-container">

		<div class="grid-x grid-padding-x">

			<div class="small-12 large-3 cell">
				<div class="active-filters" data-order="" data-orderby="" data-meal_type="" data-sides="" data-cuisine=""></div>
				<div class="dropdown menu">
					<select class="meal_type" name="meal_type">
						<option value="">Category</option>
						<?php $categories = get_categories( array(
							'orderby' => 'name',
							'exclude' => array(94,1),
							'parent'  => 0
						) );

							foreach ( $categories as $category ) {
								printf( '<option data-type="meal_type" value="%1$s">%2$s</option>',
									$category->term_id,
									esc_html( $category->name )
								);
							} ?>
					</select>
				</div>
			</div>

			<div class="small-12 large-3 cell">
				<div class="dropdown menu">
					<select class="sides" name="sides">
						<option value="">Subcategory</option>
            <?php
              if ($_GET['meal_type'])  {

                $categories = get_categories( array(
                  'orderby' => 'name',
                  'parent'  => $_GET['meal_type']
                ) );

                foreach ( $categories as $category ) {
                  printf( '<option data-type="sides" value="%1$s">%2$s</option>',
                    $category->term_id,
                    esc_html( $category->name )
                  );
                }
              } ?>
					</select>
				</div>
			</div>

			<div class="small-12 large-3 cell">
				<div class="dropdown menu">
					<select class="cuisine" name="cuisine">
						<option value="">Cuisine</option>
						<?php $categories = get_categories( array(
							'orderby' => 'name',
							'parent'  => 94
						) );

							foreach ( $categories as $category ) {
								printf( '<option data-type="cuisine" value="%1$s">%2$s</option>',
									$category->term_id,
									esc_html( $category->name )
								);
							} ?>
					</select>
				</div>
			</div>

      <div class="small-12 large-3 cell">
				<div class="dropdown menu">
					<select class="sort" name="sort">
						<option value="">Sort</option>
						<option value="order=asc&orderby=title">A to Z</option>
						<option value="order=desc&orderby=title">Z to A</option>
						<option value="order=desc&orderby=date">Newest Recipes</option>
						<option value="order=asc&orderby=date">Oldest Recipes</option>
					</select>
				</div>
			</div>

		</div>

	</div>

</div>

<script>
	$ = jQuery.noConflict();
	$(window).on('load', function(){
		var path = window.location.search.substr(1),
			queryBits = path.split('&'),
			parameters = {}, i;

		for (i = 0 ; i < queryBits.length ; i++) {
			(function() {
				var keyval = queryBits[i].split('=');
				parameters[decodeURIComponent(keyval[0])] = decodeURIComponent(keyval[1]);
			}());
		}

		var mealType = parameters.meal_type;
		if(mealType) {
			var cat_name = $('option[value="'+mealType+'"]').text();
			$('.selectric-meal_type span.label').text(cat_name);
		}
		var cuisine = parameters.cuisine;
		if(cuisine) {
			var cat_name = $('option[value="'+cuisine+'"]').text();
			$('.selectric-cuisine span.label').text(cat_name);
		}
		var sides = parameters.sides;
		if(sides) {
			var cat_name = $('option[value="'+sides+'"]').text();
			$('.selectric-sides span.label').text(cat_name);
		}
		var orderby = parameters.orderby;
		var order = parameters.order;

		if(orderby == 'date' && order == 'desc') {
			$('.selectric-sort span.label').text('Newest Recipes');
		}
		if(orderby == 'date' && order == 'asc') {
			$('.selectric-sort span.label').text('Oldest Recipes');
		}
		if(orderby == 'title' && order == 'asc') {
			$('.selectric-sort span.label').text('A TO Z');
		}
		if(orderby == 'title' && order == 'desc') {
			$('.selectric-sort span.label').text('Z TO A');
		}
	});
</script>
