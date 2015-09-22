<?php 

namespace App\Models\ContentModels\Wordpress;

use DB;

use App\Models\ContentModels\AbstractArticle;

class ArticleModel extends AbstractArticle
{
    public function get_recent($limit=10,$offset=0,$date=FALSE)
    {
        // default date
        if ( ! $date)
            $date   = date('Y-m-d H:i:s');

        return DB::table('wp_posts')
            ->select(
                'wp_posts.id', 
                'wp_posts.post_title AS name',
                'wp_posts.post_name AS slug',
                'wp_posts.post_status', 
                'wp_posts.post_date', 
                'wp_posts.post_content', 
                'wp_posts.guid AS guid',
                'wp_posts.post_excerpt AS description',
                'wp_users.user_nicename AS author_user',
                'wp_users.display_name AS author_name',
                'wp_users.user_url AS author_url',
                'wp_users.user_email AS author_email',
                'wp_users.ID AS author_id'
            )
            ->join(
                'wp_users', 
                'wp_posts.post_author', '=', 'wp_users.ID'
            )
            ->where('wp_posts.post_date','<',$date)
            ->where('wp_posts.post_status','publish')
            ->orderBy('wp_posts.post_date','desc')
            ->skip($offset)
            ->take($limit)
            ->get();
    }

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
    		->orderBy('wp_posts.post_modified', 'desc')
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
            ->orderBy('wp_posts.post_modified', 'desc')
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

    public function get_by_category_id($id,$limit=5,$offset=0,$date=FALSE)
    {
        // set default date
        if ( ! $date)
            $date   = date('Y-m-d H:i:s');

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
            ->where('wp_posts.post_status','=','publish')
            ->where('wp_posts.post_type','=','post')
            ->where('wp_posts.post_date','<',$date)
            ->join(
                'wp_term_relationships',
                'wp_posts.ID','=','wp_term_relationships.object_id'
            )
            ->join('wp_term_taxonomy', function($join) use ($id)
            {
                $join->on('wp_term_relationships.term_taxonomy_id', '=', 'wp_term_taxonomy.term_taxonomy_id')
                    ->where('wp_term_taxonomy.term_id','=',$id)
                    ->orWhere('wp_term_taxonomy.parent','=',$id);
            })
            ->join(
                'wp_users', 
                'wp_posts.post_author', '=', 'wp_users.ID'
            )
            ->orderBy('wp_posts.id','desc')
            ->groupBy('wp_posts.id')
            ->skip($offset)
            ->take($limit)
            ->get();
    }

    public function get_by_vertical($vertical,$limit=FALSE,$offset=0,$date=FALSE)
    {
        // set default date
        if ( ! $date)
            $date   = date('Y-m-d H:i:s');

        $query      = DB::table('wp_posts')
            ->select(
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
            ->join(
                'wp_term_relationships',
                'wp_term_relationships.object_id',    '=', 'wp_posts.ID'
            )
            ->join('wp_term_taxonomy', function($join) use ($vertical)
            {
                $join->on('wp_term_relationships.term_taxonomy_id', '=', 'wp_term_taxonomy.term_taxonomy_id')
                    ->where('wp_term_taxonomy.term_id',             '=', $vertical);
            })
            ->join(
                'wp_users', 
                'wp_posts.post_author', '=', 'wp_users.ID'
            )
            ->orderBy('wp_posts.id','desc');

        if ($limit):

            $query->skip($offset)->take($limit);

        endif;

        $results    = $query->get();

        return $results;
    }

    /* ugliest query ever to grab articles by category and vertical */
    public function get_by_category_vertical($id,$vertical,$limit=5,$offset=0,$date=FALSE)
    {
        // set default date
        if ( ! $date)
            $date   = date('Y-m-d H:i:s');

        // grab all post IDs in this vertical
        $verticals      = $this->get_by_vertical($vertical);

        // create an array with just IDs
        $posts  = array();
        foreach ($verticals AS $key => $value):
            $posts[]    = $value->id;
        endforeach;

        return DB::table('wp_posts')
            ->select(
                'wp_posts.id AS id', 
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
            ->where('wp_posts.post_status','=','publish')
            ->where('wp_posts.post_type','=','post')
            ->where('wp_posts.post_date','<',$date)
            ->whereIn('wp_posts.ID',$posts)
            ->join(
                'wp_term_relationships',
                'wp_posts.ID','=','wp_term_relationships.object_id'
            )
            ->join('wp_term_taxonomy', function($join) use ($id)
            {
                $join->on('wp_term_relationships.term_taxonomy_id', '=', 'wp_term_taxonomy.term_taxonomy_id')
                    ->where('wp_term_taxonomy.term_id',             '=', $id);
            })
            ->join(
                'wp_users', 
                'wp_posts.post_author', '=', 'wp_users.ID'
            )
            ->orderBy('wp_posts.id','desc')
            ->groupBy('wp_posts.id')
            ->skip($offset)
            ->take($limit)
            ->get();
    }

    public function get_by_tag_id($id,$limit=5,$offset=0,$date=FALSE)
    {
        return $this->get_by_category_id($id,$limit,$offset,$date);
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

    
    function get_featured_image_by_post_id($id)
    {
        return DB::table('wp_posts')
            ->select(
                'wp_posts.guid AS imgsrc'
            )
            ->where('wp_posts.post_parent', $id)
            ->where('wp_posts.post_type','attachment')
            ->whereIn('wp_posts.post_status', array('inherit', 'publish'))
            ->orderBy('wp_posts.post_date','desc')
            ->take(1)->first();
    }

   
} 
