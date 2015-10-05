<?php 

namespace App\Models\ContentModels\Wordpress;

use DB;

use App\Models\ContentModels\AbstractTaxonomy;

class TaxonomyModel extends AbstractTaxonomy
{
    public function all($type=FALSE)
    {
        // if no type, then grab categories and tags
        if ($type)
            return $this->_all($type);


        return DB::table('wp_term_taxonomy')
            ->select(
                'wp_terms.term_id AS id', 
                'wp_terms.name',
                'wp_terms.slug', 
                'wp_term_taxonomy.taxonomy', 
                'wp_terms.term_id as description', //'wp_term_taxonomy.description',
                'parent_terms.term_id AS parent_id', 
                'parent_terms.name AS parent_name', 
                'parent_terms.slug AS parent_slug'
            )
            ->where('wp_term_taxonomy.taxonomy','post_tag')
            ->orWhere('wp_term_taxonomy.taxonomy','category')
            ->join(
                'wp_terms',
                'wp_term_taxonomy.term_id', '=', 'wp_terms.term_id'
            )
            ->leftJoin(
                'wp_terms AS parent_terms', 
                'wp_term_taxonomy.parent', '=', 'parent_terms.term_id'
            )
            ->orderBy('wp_terms.name','asc')
            ->get();
    }

    private function _all($type)
    {
         return DB::table('wp_term_taxonomy')
            ->select(
                'wp_terms.term_id AS id', 
                'wp_terms.name',
                'wp_terms.slug', 
                'wp_term_taxonomy.taxonomy', 
                'wp_terms.term_id as description', //'wp_term_taxonomy.description',
                'parent_terms.term_id AS parent_id', 
                'parent_terms.name AS parent_name', 
                'parent_terms.slug AS parent_slug'
            )
            ->where('wp_term_taxonomy.taxonomy',$type)
            ->join(
                'wp_terms',
                'wp_term_taxonomy.term_id', '=', 'wp_terms.term_id'
            )
            ->leftJoin(
                'wp_terms AS parent_terms', 
                'wp_term_taxonomy.parent', '=', 'parent_terms.term_id'
            )
            ->orderBy('wp_terms.name','asc')
            ->get();       
    }

	public function get_by_column($type, $column, $value)
	{
		return DB::table('wp_terms')
    		->select(
                DB::raw('"taxonomy" AS page_type'),
    			'wp_terms.term_id AS id', 
    			'wp_terms.name',
    			'wp_terms.slug', 
    			'wp_term_taxonomy.taxonomy', 
                //'wp_terms.term_id AS description',
                'wp_terms.term_id as description', //'wp_term_taxonomy.description',
    			'parent_terms.term_id AS parent_id', 
    			'parent_terms.name AS parent_name', 
    			'parent_terms.slug AS parent_slug'
    		)
    		->where('wp_terms.'.$column, $value)
    		->where('wp_term_taxonomy.taxonomy', $type)
    		->join(
    			'wp_term_taxonomy', 
    			'wp_terms.term_id', '=', 'wp_term_taxonomy.term_id'
    		)
    		->leftJoin(
    			'wp_terms AS parent_terms', 
    			'wp_term_taxonomy.parent', '=', 'parent_terms.term_id'
    		)
    		->take(1)->first();
	}

    public function get_by_article_id($post_id)
    {

        return DB::table('wp_term_relationships')
            ->select(
                'wp_term_taxonomy.term_id',
                'wp_term_taxonomy.taxonomy',
                'wp_term_taxonomy.term_taxonomy_id',
                'wp_terms.term_id as description', //'wp_term_taxonomy.description',
                'parent_terms.term_id AS parent_id',
                'parent_terms.name AS parent_name',
                'parent_terms.slug AS parent_slug',
                'wp_terms.name',
                'wp_terms.slug'
            )
            ->where('wp_term_relationships.object_id', $post_id)
            ->join(
                'wp_term_taxonomy', 
                'wp_term_relationships.term_taxonomy_id', '=', 'wp_term_taxonomy.term_taxonomy_id'
            )
            ->join(
                'wp_terms', 
                'wp_term_taxonomy.term_id', '=', 'wp_terms.term_id'
            )
            ->leftJoin(
                'wp_terms AS parent_terms', 
                'wp_term_taxonomy.parent', '=', 'parent_terms.term_id'
            )
            ->get();
        
    }

    public function get_term_tax_metadata($ttids = array())
    {

        if ( ! is_array($ttids)):

            $ttids = array($ttids);

        endif; 

        $meta = DB::table('wp_tax_custom')
            ->select(
                'wp_tax_custom.term_taxonomy_id',
                'wp_tax_custom.meta_key',
                'wp_tax_custom.meta_value'
            )
            ->whereIn('wp_tax_custom.term_taxonomy_id', $ttids)
            ->get();

        return $meta;

    }
   
} 
