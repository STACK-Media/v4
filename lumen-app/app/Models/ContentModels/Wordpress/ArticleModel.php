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
                'wp_users.user_url AS author_url',
                'wp_users.user_email AS author_email',
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

    public function get_by_slug($slug, $statuses = array('publish'))
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
                'wp_users.user_url AS author_url',
                'wp_users.user_email AS author_email',
                'wp_users.ID AS author_id'
            )
            ->where('wp_posts.post_name', $slug)
            ->whereIn('wp_posts.post_status', $statuses)
            ->where('wp_posts.post_type', 'post')
            ->join(
                'wp_users', 
                'wp_posts.post_author', '=', 'wp_users.ID'
            )
            ->orderBy('post_modified', 'desc')
            ->take(1)->first();
    }

    public function get_meta($article_id)
    {

        return DB::table('wp_postmeta')
            ->select(
                'wp_postmeta.meta_key', 
                'wp_postmeta.meta_value'
            )
            ->where('wp_postmeta.post_id', $article_id)
            ->whereRaw('wp_postmeta.meta_key NOT LIKE "\_%"')
            ->orderBy('wp_postmeta.meta_key', 'desc')
            ->get();

    }

    public function trending()
    {
        return DB::table('wp_latest_items')
            ->select(
                'wp_latest_items.latest_image AS image',
                'wp_latest_items.latest_link AS link',
                'wp_latest_items.latest_title AS title',
                'wp_latest_items.latest_exert AS excert',
                'wp_latest_items.latest_author AS author',
                'wp_latest_items.latest_date AS date',
                'wp_latest_items.latest_has_video AS hasVideo',
                'wp_latest_items.latest_tag_array AS tagArray'
            )
            ->where('wp_latest_items.latest_site_id',1)
            ->where('wp_latest_items.record_type',2)
            ->orderBy('wp_latest_items.display_order','asc')
            ->take(9)
            ->get();
    }

    public function get_by_category_id($id,$limit=5,$offset=0)
    {
        return DB::table('wp_posts')
            ->select(
                DB::raw('"article" AS page_type'),
                'wp_posts.id', 
                'wp_posts.post_title AS name',
                'wp_posts.post_title',
                'wp_posts.post_name AS slug',
                'wp_posts.post_name',
                'wp_posts.post_status', 
                'wp_posts.post_date', 
                'wp_posts.post_content', 
                'wp_posts.post_excerpt',
                'wp_users.user_nicename AS author_user',
                'wp_users.display_name AS author_name',
                'wp_users.user_url AS author_url',
                'wp_users.user_email AS author_email',
                'wp_users.ID AS author_id'
            )
            ->where('wp_posts.post_status','publish')
            ->where('wp_posts.post_type','post')
            ->where('wp_terms.term_id',$id)
            ->join(
                'wp_term_relationships',
                'wp_posts.ID','=','wp_term_relationships.object_id'
            )
            ->join(
                'wp_term_taxonomy',
                'wp_term_relationships.term_taxonomy_id','=','wp_term_taxonomy.term_taxonomy_id'
            )
            ->join(
                'wp_terms',
                'wp_term_taxonomy.term_id','=','wp_terms.term_id'
            )
            ->join(
                'wp_users', 
                'wp_posts.post_author', '=', 'wp_users.ID'
            )
            ->orderBy('wp_posts.post_date','desc')
            ->skip($offset)
            ->take($limit)
            ->get();
    }

    public function get_by_user_id($id,$limit=10,$offset=0)
    {
        return DB::table('wp_posts')
            ->select(
                DB::raw('"article" AS page_type'),
                'wp_posts.id', 
                'wp_posts.post_title AS name',
                'wp_posts.post_title',
                'wp_posts.post_name AS slug',
                'wp_posts.post_name',
                'wp_posts.post_status', 
                'wp_posts.post_date', 
                'wp_posts.post_content', 
                'wp_posts.post_excerpt',
                'wp_users.user_nicename AS author_user',
                'wp_users.display_name AS author_name',
                'wp_users.user_url AS author_url',
                'wp_users.user_email AS author_email',
                'wp_users.ID AS author_id'
            )
            ->where('wp_posts.post_status','publish')
            ->where('wp_posts.post_type','post')
            ->where('wp_users.ID',$id)
            ->join(
                'wp_users',
                'wp_posts.post_author','=','wp_users.ID'
            )
            ->orderBy('wp_posts.post_date','desc')
            ->skip($offset)
            ->take($limit)
            ->get();
    }
   
} 
