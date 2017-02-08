<?php defined('BASEPATH') OR exit('No direct script access allowed');

/***
 *
 * Type_model.php
 *
 * author		: Lucky Mahrus
 * copyright	: Lucky Mahrus (c) 2017
 * license		: https://webdev-lucky.com
 * file			: application/models/Type_model.php
 * created		: 2017 February 7th / 20:00:00
 * last edit	: 2017 February 7th / 20:00:00
 * edited by	: Lucky Mahrus
 * version		: 1.0
 *
 */

class Type_model extends MY_Model
{
	protected $_table	= 'type';
 
	protected $primary_key	= 'id';

	public function __construct()
	{
		parent::__construct();
	}
	
}


/* End of file Type_model.php */
/* Location: application/models/Type_model.php */


