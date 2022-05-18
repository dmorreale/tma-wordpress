<?php
	
	$userId = get_current_user_id();
	$globalId = 2276; //ID for the Global-Europe Group
	$haveGroup = false;

	$groups = new WP_Query(array(
		'posts_per_page' => -1,
		'post_type' => 'groups',
		'post_status' => 'publish'
	));

	while($groups->have_posts()){
		$groups->the_post();
		$postId = get_the_ID();
		$meta = get_user_meta($userId, 'learndash_group_users_'.$postId, true);
		if($meta){
			$haveGroup = true;
			break;
		}
	}

	wp_reset_query();

	if(!$haveGroup){
		$result = update_user_meta( $userId, 'learndash_group_users_2276', 2276 );
		$reload = 'no';

		while($reload = 'no'){
			$check = do_shortcode('[ld_course_list order="ASC" orderby="menu_order" mycourses="true"]');
			var_dump($check);
			if($check){
				$reload == 'yes';
				//header("Refresh:0");
				return $reload;
				break;
			}
		}
	}


?>