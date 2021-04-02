/*
	==========================================
	 Custom Post Type
   @link http://codex.wordpress.org/Function_Reference/register_post_type
	==========================================
*/
function ctc118_custom_post_type (){
	
	$labels = array(
		'name' => '部落格',     // -> a name shows on the menu dashboard
		'singular_name' => '+文章',
		'add_new' => '新增文章',    // -> a name shows on the menu dashboard and the button on the top
		'all_items' => '檢視所有文章',      // -> a name shows on the menu dashboard
		'add_new_item' => '新增文章',     // -> the title name shows on the page of adding an new item  
		'edit_item' => '編輯文章',      // -> the title name shows on the page of edit an new item
		'new_item' => 'New Item',
		'view_item' => 'View Item',
		'search_item' => '搜尋文章',
		'not_found' => '沒有符合的文章',
		'not_found_in_trash' => '在回收桶中沒有找到符合的文章',
		'parent_item_colon' => 'Parent Item'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
			'revisions',
		),
		'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 5,
		'exclude_from_search' => false,
		'menu_icon'   => 'dashicons-edit'
	);
	register_post_type('blog',$args);   //'blog' -> here put a name for the slug
}
add_action('init','ctc118_custom_post_type');
