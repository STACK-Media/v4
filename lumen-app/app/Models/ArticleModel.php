<?php namespace App\Models;

use DB;

class ArticleModel extends Model
{
	static function get_by_id($id, $statuses = array('publish'))
	{
		return DB::table('wp_posts')
    		->select(
    			'wp_posts.id', 
    			'wp_posts.post_status', 
    			'wp_posts.post_date', 
    			'wp_posts.post_content', 
    			'wp_posts.post_title',
    			'wp_posts.post_name',
    			'wp_users.user_nicename',
    			'wp_users.display_name',
    			'wp_users.ID as userid'
    		)
    		->where(function($query) use ($id, $statuses) {
    			$query->where(function($query) use ($id, $statuses){
    				$query
	    				->where('wp_posts.id', $id)
	    				->where('wp_posts.post_status', 'publish');
    			})->orWhere(function($query) use($id, $statuses){
    				$query
	    				->where('wp_posts.post_parent', $id)
	    				->whereIn('wp_posts.post_status', $statuses);
    			});
    		})
    		->where('wp_posts.post_type', 'post')
    		->join(
    			'wp_users', 
    			'wp_posts.post_author', '=', 'wp_users.ID'
    		)
    		->orderBy('post_modified', 'desc')
    		->take(1)->first();
	}
   
} 
