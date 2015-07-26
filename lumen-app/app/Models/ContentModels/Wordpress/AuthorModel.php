<?php 

namespace App\Models\ContentModels\Wordpress;

use DB;

use App\Models\ContentModels\AbstractAuthor;

class AuthorModel extends AbstractAuthor
{
	public function featured()
	{
		return DB::table('wp_users')
			->where('wp_usermeta.meta_key','FeaturedExpert')
			->join(
                'wp_usermeta', 
                'wp_users.id', '=', 'wp_usermeta.user_id'
            )
            ->get();
	}
}