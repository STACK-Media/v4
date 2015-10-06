<?php 

namespace App\Models\ContentModels\Wordpress;

use DB;

use App\Models\ContentModels\AbstractUser;

class UserModel extends AbstractUser
{
	public function all($limit=10,$offset=0,$orderBy='user_nicename',$order='ASC')
	{
		return DB::table('wp_users')
			->orderBy($orderBy,$order)
			->skip($offset)
			->take($limit)
			->get();
	}

	public function get_by_id($user_id)
	{
		return DB::table('wp_users')
			->where('wp_users.id',$user_id)
			->get();
	}

	public function get_by_slug($slug)
	{
		return DB::table('wp_users')
			->select(
                'ID AS id',
                'user_nicename AS slug',
                'user_email AS email',
                'user_url AS url',
                'display_name AS name'
    		)
			->where('wp_users.user_nicename',$slug)
			->take(1)->first();
	}

	public function get_featured()
	{
		return DB::table('wp_users')
			->where('wp_usermeta.meta_key','FeaturedExpert')
			->where('wp_usermeta.meta_value','True')
			->join(
                'wp_usermeta', 
                'wp_users.id', '=', 'wp_usermeta.user_id'
            )
            ->take(1)->first();
	}

	public function get_meta($user_id)
	{
		return DB::table('wp_usermeta')
			->where('wp_usermeta.user_id',$user_id)
			->where('wp_usermeta.meta_key', 'NOT LIKE', 'wp%')
			->where('wp_usermeta.meta_key', 'NOT LIKE', 'closed%')
			->where('wp_usermeta.meta_key', 'NOT LIKE', 'metabox%')
			->where('wp_usermeta.meta_key', 'NOT LIKE', 'meta-box%')
			->where('wp_usermeta.meta_key', 'NOT LIKE', 'dismissed%')
			->get();
	}
}