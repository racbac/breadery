<?php 
if ( 'html5' == $format ) {
	$form = '<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
        <label class="sr-only" for="s">' . _x( 'Search for:', 'label' ) . '</label>
        <div class="input-group">
            <input type="search" class="search-field form-control" placeholder="' . esc_attr_x( 'Search &hellip;', 'placeholder' ) . '" value="' . get_search_query() . '" name="s" id="s" />
            <div class="input-group-append"><input type="submit" class="search-submit btn" value="' . esc_attr_x( 'Search', 'submit button' ) . '" /></div>
        </div>
	</form>';
} else {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . esc_url( home_url( '/' ) ) . '">
        <div>
            <label class="screen-reader-text" for="s">' . _x( 'Search for:', 'label' ) . '</label>
            <div class="input-group">
                <input type="text" class="form-control" value="' . get_search_query() . '" name="s" id="s" />
                <div class="input-group-append"><input type="submit" class="btn" id="searchsubmit" value="' . esc_attr_x( 'Search', 'submit button' ) . '" /></div>
            </div>
        </div>
    </form>';
}

echo $form;
?>