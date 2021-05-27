<?php
function motts_add_vc_params() {

	// vc_row Attributes
	$vc_row_attrs = array(
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Wrap with Section', 'themezinho' ),
			"param_name" 	=> 	"anchor_wrap_section",
			"description"	=>	__( "If you select <code>Yes</code>, it will wrap the row with container.", "themezinho" ),
			"group" 		=> 'Seodo Options',
			"value"			=>	array(
				"Yes"			=>		'yes',
				"No"			=>		'no',
			)
		),
		array(
			"type" 			=> 	"attach_image",
			"heading" 		=> 	__( 'Section Background Image', 'themezinho' ),
			"param_name" 	=> 	"section_background_image",
			"dependency" => array( 'element' => "anchor_wrap_section", 'value' => 'yes'),
			"group" 		=> "Seodo Options",
		),
		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Section Background Parallax', 'themezinho' ),
			"param_name" 	=> "section_ratio",
            "dependency" => array( 'element' => "anchor_wrap_section", 'value' => 'yes'),
			"value"         => "",
			"group" 		=> 'Seodo Options',
		),
		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Section Background Color', 'themezinho' ),
			"param_name" 	=> "section_background_color",
            "dependency" => array( 'element' => "anchor_wrap_section", 'value' => 'yes'),
			"value"         => "",
			"group" 		=> 'Seodo Options',
		),

		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Add Theme Default Padding', 'themezinho' ),
			"param_name" 	=> 	"motts_theme_padding",
			"group" 		=> 'Seodo Options',
            "dependency" => array( 'element' => "anchor_wrap_section", 'value' => 'yes'),
			"value"			=>	array(
				"Yes"			=>		'yes',
				"No"   	=>		'no',
			)
		),

		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Video Background', 'themezinho' ),
			"param_name" 	=> 	"has_video_background",
			"group" 		=> 'Seodo Options',
			"value"			=>	array(
				"No"			=>		'no',
				"YouTube"   	=>		'youtube',
//				"Hosted"		=>		'hosted',
			)
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'YouTube Link', 'themezinho' ),
			"param_name" 	=> 	"video_youtube_link",
			"dependency"    => array('element' => "has_video_background", 'value' => 'youtube'),
			"group" 		=> 'Seodo Options',
		),

		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Wrap with Container', 'themezinho' ),
			"param_name" 	=> 	"use_container",
			"description"	=>	__( "If you select <code>Yes</code>, it will wrap the row with container.", "themezinho" ),
			"group" 		=> 'Seodo Options',
			"value"			=>	array(
				"No"			=>		'no',
				"Yes"			=>		'yes',
			)
		),
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Center Content', 'themezinho' ),
			"param_name" 	=> 	"conter_content",
			"group" 		=> 'Seodo Options',
			"value"			=>	array(
				"No"			=>		'no',
				"Yes"			=>		'yes',
			)
		),

		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Is Custom Class Section', 'themezinho' ),
			"param_name" 	=> 	"use_predefined_class",
			"description"	=>	__( "If you select <code>Yes</code>, it overrides the element's default <code>class</code> field.</code>", "themezinho" ),
			"group" 		=> 'Seodo Options',
			"value"			=>	array(
				"No"			=>		'no',
				"Yes"			=>		'yes',
			)
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Add Custom Class', 'themezinho' ),
			"param_name" 	=> 	"predefined_class",
			"dependency" => array( 'element' => "use_predefined_class", 'value' => 'yes'),
			"description"	=>	__( "Please check documentation for more detail.", "themezinho" ),
			"group" 		=> 'Seodo Options',
		),

	);

	vc_add_params( 'vc_row', $vc_row_attrs );

	$vc_inner_rows_attrs = array(
        array(
            "type" 			=> 	"dropdown",
            "heading" 		=> 	__( 'Wrap with Container', 'themezinho' ),
            "param_name" 	=> 	"wrap_container",
            "description"	=>	__( "If you select <code>Yes</code>, it will wrap this element with container.", "themezinho" ),
            "group" 		=> 'Seodo Options',
            "value"			=>	array(
                "No"			=>		'no',
                "Yes"			=>		'yes',
            )
        ),
    );

    vc_add_params( 'vc_row_inner', $vc_inner_rows_attrs );
}

add_action( 'vc_before_init', 'motts_add_vc_params' );