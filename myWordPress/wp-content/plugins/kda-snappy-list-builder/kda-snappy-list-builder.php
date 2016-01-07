<?php
	
	/*
		Plugin Name: KDA Snappy List Builder
		Plugin URI:  http://AkilDev.com/wp-plugins/kda-snappy-list-builder
		Description:  The ultimate email list building plugin for WordPress.  Capture new subscribers.  Reward subscribers with a custom download upon opt-in.  Build unlimited lists.  Import and export subscribers easily with .csv
		Version: 1.0
		Author:  Kitwana Akil
		Author URI:  http://akildev.com
		License:  GPL2
		License URI:  https://www.gnu.org/licenses/gpl-2.0.html
		Text Domain:  kda-snappy-list-builder
	*/

	
	/* !0.  TABLE OF CONTENTS */
	
	/*
		1. HOOKS
			1.1 - registers all our custom shortcodes
			1.2 - register custom admin column headers
			1.3 - register custom admin column data
		
		2. SHORTCODES
			2.1 - kda_slb_register_shortcodes()
			2.2 - kda_slb_form_shortcode()
			
		
		3. FILTERS
			3.1 - kda_slb_subscriber_column_headers()
			3.2 - kda_slb_subscriber_column_data()
			3.3 - kda_slb_list_column_headers()
			3.4 - kda_slb_list_column_data()
			
		
		4. EXTERNAL SCRIPTS
		
		5. ACTIONS
		
		6. HELPERS
		
		7. CUSTOM POST TYPES
		
		8. ADMIN PAGES
		
		9. SETTINGS
		
	*/
	
	
	
	/* !1.  HOOKS */
	
	//1.1
	//hint:  register all our custom shortcodes on init
	add_action(init, 'kda_slb_register_shortcodes');
	
	//1.2
	//hint:  register custom admin column headers
	add_filter( 'manage_edit-kda_slb_subscriber_columns', 'kda_slb_subscriber_column_headers');
	add_filter( 'manage_edit-kda_slb_list_columns', 'kda_slb_list_column_headers');
	add_action( 'admin_head-edit.php', 'kda_slb_register_custom_admin_titles' );
	
	
	//1.3
	//hint:  register custom admin column data
	add_filter('manage_kda_slb_subscriber_posts_custom_column', 'kda_slb_subscriber_column_data', 1, 2);
	add_filter('manage_kda_slb_list_posts_custom_column', 'kda_slb_list_column_data', 1, 2);
	
	
	/* !2.  SHORTCODES */
	
	
	//2.1
	function kda_slb_register_shortcodes() {
		
		add_shortcode('kda_slb_form', 'kda_slb_form_shortcode');
	}
	
	//2.2
	function kda_slb_form_shortcode( $args, $content="") {
		
		//get the list id
		$list_id = 0;
		if( isset($args['id']) ) $list_id = (int)$args['id'];
		
		
		// setup or output variable - the form html
		$output = '
		
			<div class="kda_slb">
				<form id="kda_slb_form" name="kda_slb_form" method="post"
				action="/wp-admin/admin-ajax.php?action=kda_slb_save_subscription" method="post">
				
					<input type="hidden" name="kda_slb_list" value="'.$list_id.'">
					
					<p class="kda_slb-input-container">
					
						<label>Your Name</label><br/>
						<input type="text" name="kda_slb_fname" placeholder="First Name" />
						<input type="text" name="kda_slb_lname" placeholder="Last Name" />
					</p>
					
					<p class="kda_slb-input-container">
					
						<label>Your Email</label><br/>
						<input type="email" name="kda_slb_email" placeholder="you@email.com" />
					</p>';
					
					//including content in our form html if content is passed into the function
					if(strlen($content)):
					
						$output .= 'div class="kda_slb-content">'. wpautop($content) .'</div>';
						
					endif;
					
					
					$output .= '<p class="kda_slb-input-container">
						
						<input type="submit" name="kda_slb_submit" value="Sign Me Up!" />
					</p>
					
					
				</form>
			</div>
		';
		
		// return our results/html
		return $output;
	}
	
	
	/* !3.  FILTERS */
	
	//3.1
	function kda_slb_subscriber_column_headers($columns) {
		
		// creating custom column header data
		$columns = array(
			'cb'=>'<input type="checkbox" />',
			'title'=>__('Subscriber Name'),
			'email'=>__('Email Address'),
		);
		
		//returning new columns
		return $columns;
	}

	
	//3.2
	function kda_slb_subscriber_column_data( $column, $post_id ) {
		
		//setup our return text
		$output = '';
		
		switch( $column ) {
			
			case 'name':
				//get the custom name data
				$fname = get_field('kda_slb_fname', $post_id);
				$lname = get_field('kda_slb_lname', $post_id);
				$output .= $fname .' '. $lname;
				break;
			case 'email':
				$email = get_field('kda_slb_email', $post_id);
				$output .= $email;
				break;
				
		}
		
		//echo the output
		echo $output;
	}
	
	
	//3.3
	function kda_slb_list_column_headers($columns) {
		
		// creating custom column header data
		$columns = array(
			'cb'=>'<input type="checkbox" />',
			'title'=>__('List Name'),
		);
		
		//returning new columns
		return $columns;
	}
	
	
	
	
	//3.4
	function kda_slb_list_column_data( $column, $post_id ) {
		
		//setup our return text
		$output = '';
		
		/*
switch( $column ) {
			
			case 'title':
				break;
				
		}
*/
		
		//echo the output
		echo $output;
	}
	
	
	
	// 3.6
	// hint: registers special custom admin title columns
	function kda_slb_register_custom_admin_titles() {
	    add_filter(
	        'the_title',
	        'kda_slb_custom_admin_titles',
	        100,
	        2
	    );
	}
 
	// 3.7
	// hint: handles custom admin title "title" column the way WP 4.3 likes...
	function kda_slb_custom_admin_titles( $title, $post_id ) {
	   
	    global $post;
	   
	    $output = $title;
	   
	    if( isset($post->post_type) ):
	                switch( $post->post_type ) {
	                        case 'kda_slb_subscriber':
	                                $fname = get_field('kda_slb_fname', $post_id );
	                                $lname = get_field('kda_slb_lname', $post_id );
	                                $output = $fname .' '. $lname;
	                                break;
	                }
	        endif;
	   
	    return $output;
	}
	
	
	
	/* !4.  EXTERNAL SCRIPTS */
	
	
	
	
	/* !5.  ACTIONS */
	
	//5.1
	//hint:  saves subscription data to an existing or new subscriber
	function kda_slb_save_subscription() {
		
		//setup default result data
		$result = array (
			
			'status'=> 0,
			'message' => 'Subscription was not saved.',
		);
		
		//array for storing errors
		$errors = array();
		
		try {
			
			//get list_id
			$list_id = (int)$_POST['kda_slb_list'];
			
			//prepare subscriber data
			$subscriber_data = array (
				
				'fname'=> esc_attr($_POST['kda_slb_fname']),
				'lname'=> esc_attr($_POST['kda_slb_lname']),
				'email'=> esc_attr($_POST['kda_slb_email']),
				
			);
			
			//attempt to create/save subscriber
			$subscriber_id = kda_slb_save_subscriber($subscriber_data);
			
			//If subscriber was saved successfully $subscriber_id will be greater than 0
			if($subscriber_id):
				
				//If subscriber already has this subscription
				if(slb_subscriber_has_subscription($subscriber_id, $list_id)):
				
				//get list object
				$list = get_post($list_id);
				
				//return detailed error
				$result['message'] .= esc_attr($subscriber_data['email'].' is already subscribed to '.$list->post_title .'.');
			
				else:
				
					//save new subscription
					$subscription_saved = slb_add_subscription($subscriber_id, $list_id);
					
					//If subscription was saved successfully
					if($subscription_saved):
					
					endif;
					
				endif;
				
			endif;
			
		} catch (Exception $e) {
			
			//a php error occurred
			$result['error'] = 'Caught exception: '. $e->getMessage();
			
		}
		
		//return result as json
		kda_slb_return_json($result);
		
	}
	
	
	//5.2
	//hint: creates a new subscriber or updates an existing one
	
	
	
	/* !6.  HELPERS */
	
	
	
	
	/* !7.  CUSTOM POST TYPES */
	
	
	
	
	/* !8.  ADMIN PAGES */
	
	
	
	
	
	/* !9.  SETTINGS */
	
		
	
?>