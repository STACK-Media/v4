<?php
namespace App\Models\ContentModels;

use App\Models\Model;

abstract class AbstractUser extends Model {

	abstract public function get_by_id($user_id);
	abstract public function get_by_slug($slug);
	abstract public function get_featured();
	abstract public function get_meta($user_id);
}