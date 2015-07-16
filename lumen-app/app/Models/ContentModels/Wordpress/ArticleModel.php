<?php 

namespace App\Models\ContentModels\Wordpress;

use DB;

use App\Models\ContentModels\AbstractArticle;

class ArticleModel extends AbstractArticle
{
	public function get_by_id($id, $statuses = array('publish'))
	{
		return DB::table('wp_posts')
    		->select(
    			DB::raw('"article" AS page_type'),
                'wp_posts.id', 
                'wp_posts.post_title AS name',
                'wp_posts.post_name AS slug',
                'wp_posts.post_status', 
    			'wp_posts.post_date', 
    			'wp_posts.post_content', 
    			'wp_users.user_nicename AS author_user',
    			'wp_users.display_name AS author_name',
    			'wp_users.ID AS author_id'
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
