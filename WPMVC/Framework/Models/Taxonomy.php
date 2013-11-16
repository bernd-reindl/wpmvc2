<?php

namespace WPMVC\Framework\Models;

class Taxonomy extends \WPMVC\Framework\Model
{
	protected $primaryKey='term_taxonomy_id';
	protected $classes_inheriting_from_table 
		= array('\WPMVC\Framework\Models\Tag' => 'post_tag', 
			'\WPMVC\Framework\Models\Category' => 'category');
	protected $table_inheritance_attribute = 'taxonomy';

	public function __construct($attributes=array())
	{
		global $wpdb;
		$this->table = $wpdb->prefix.'term_taxonomy';
		return parent::__construct($attributes);
	}

	public function term()
	{
		return $this->belongsTo('\WPMVC\Framework\Models\Term', 'term_id');
	}

	public function get_name()
	{
		return $this->term->name;
	}

	public function get_slug()
	{
		return $this->term->slug;
	}
}