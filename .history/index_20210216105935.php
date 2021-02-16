<?php get_header(); ?>

<?php

// get all the local field groups 
$field_groups = acf_get_local_field_groups();

// loop over each of the gield gruops 
foreach( $field_groups as $field_group ) {

	// get the field group key 
	$key = $field_group['key'];

	// if this field group has fields 
	if( acf_have_local_fields( $key ) ) {
	
      	// append the fields 
		$field_group['fields'] = acf_get_local_fields( $key );

	}

	// save the acf-json file to the acf-json dir by default 
	acf_write_json_field_group( $field_group );

}

?>


<?php get_footer(); ?>
