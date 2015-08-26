<?php 

namespace App\Models\ContentModels\Wordpress;

use DB;

use App\Models\ContentModels\AbstractMagazine;

class MagazineModel extends AbstractMagazine
{
	public function get($slug=FALSE)
	{
        // if no slug, get the current one 
        if ( ! $slug)
            return $this->current();

        return DB::table('magazine.magazines')
            ->select('*')
            ->where('magazines.slug',$slug)
            ->take(1)->first();
	}

    public function all()
    {
        return DB::table('magazine.magazines')
            ->select('*')
            ->where('magazines.active',1)
            ->get();
    }

    public function current()
    {
        return DB::table('magazine.magazines')
            ->select('*')
            ->where('magazines.active',1)
            ->orderBy('magazines.created_at','DESC')
            ->take(1)->first();
    }

    public function articles($id)
    {
        return DB::table('magazine.magazines_articles')
            ->select('*')
            ->where('magazines_articles.magazine_id',$id)
            ->get();
    }

}