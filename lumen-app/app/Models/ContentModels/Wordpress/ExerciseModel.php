<?php 

namespace App\Models\ContentModels\Wordpress;

use DB;

use App\Models\ContentModels\AbstractExercise;

class ExerciseModel extends AbstractExercise
{

    function get($id)
    {
        return DB::table('wp_mag_exercises')
            ->select(
                'wp_mag_exercises.mag_content_id AS id', 
                'wp_mag_exercises.title', 
                'wp_mag_exercises.content',
                'wp_posts.post_name AS article_slug',
                'wp_posts.ID AS article_id'
            )
            ->join(
                'wp_mag_map_exercises',
                'wp_mag_exercises.wp_mag_exercise_id', '=', 'wp_mag_map_exercises.wp_mag_exercise_id'
            )
            ->join(
                'wp_posts', 
                'wp_mag_map_exercises.post_id', '=', 'wp_posts.ID'
            )
            ->where('wp_mag_exercises.mag_content_id', $id)
            ->take(1)->first();
    }

    function get_by_article($id)
    {
        return DB::table('wp_mag_map_exercises')
            ->select(
                'wp_mag_exercises.mag_content_id AS id', 
                'wp_mag_exercises.title', 
                'wp_mag_exercises.content'
            )
            ->join(
                'wp_mag_exercises',
                'wp_mag_exercises.wp_mag_exercise_id', '=', 'wp_mag_map_exercises.wp_mag_exercise_id'
            )
            ->where('wp_mag_map_exercises.post_id', $id)
            ->get();
    }


}