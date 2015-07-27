<?php 

namespace App\Models\ContentModels\Wordpress;

use DB;

use App\Models\ContentModels\AbstractUser;

class UserModel extends AbstractUser
{
	public function get_by_id($user_id)
	{
		return DB::table('wp_users')
			->where('wp_users.id',$user_id)
			->get();
	}

	public function get_by_slug($slug)
	{
		return DB::table('wp_users')
			->where('wp_users.user_nicename',$slug)
			->get();
	}

	public function get_featured()
	{
		return DB::table('wp_users')
			->where('wp_usermeta.meta_key','FeaturedExpert')
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
			->get();
	}
}