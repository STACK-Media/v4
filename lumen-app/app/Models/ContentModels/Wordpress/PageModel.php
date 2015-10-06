<?php 

namespace App\Models\ContentModels\Wordpress;

use DB;

use App\Models\ContentModels\AbstractPage;

class PageModel extends AbstractPage
{
    public function get_by_slug($slug, $statuses = array('publish'))
    {
        return DB::table('wp_posts')
            ->select(
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
            ->where('wp_posts.post_type', 'page')
            ->join(
                'wp_users', 
                'wp_posts.post_author', '=', 'wp_users.ID'
            )
            ->orderBy('wp_posts.post_modified', 'desc')
            ->take(1)->first();
    }




} 
