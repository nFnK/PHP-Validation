<?php

include './autoload.php';

use HybridLogic\Validation\Validator;
use HybridLogic\Validation\Rule;

/**
 * Rule Test: NumMin
 *
 * @package default
 * @author Luke Lanchester
 **/
class NumMinTest extends PHPUnit_Framework_TestCase {


	/**
	 * @var Validator instance
	 **/
	protected $validator;


	/**
	 * Setup
	 *
	 * @return void
	 **/
	public function setUp() {
		$this->validator = new Validator;
		$this->validator->add_rule('field', new Rule\NumMin(5));
	} // end func: setUp



	/**
	 * Tests
	 *
	 * @return void
	 * @dataProvider provider
	 **/
	public function test($input, $expected) {
		$result = $this->validator->is_valid($input);
		$this->assertEquals($expected, $result);
	} // end func: test



	/**
	 * Provider
	 *
	 * @return void
	 **/
	public function provider() {
		return array(
			array(array(), false),
			array(array('field' => null), false),
			array(array('field' => ''), false),

			array(array('field' => '-100'), false),
			array(array('field' => '0'), false),
			array(array('field' => '1'), false),
			array(array('field' => '4'), false),

			array(array('field' => '5'), true),
			array(array('field' => '6'), true),
			array(array('field' => '50'), true),
		);
	} // end func: provider



} // end class: NumMinTest