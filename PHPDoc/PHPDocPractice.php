<?php
/**
 * This DocBlock belongs to file
 */

/**
 * Class PHPDocPractice
 *
 * This DocBlock belongs to class
 *
 * @author Aleksey Kasaev <aleksey.kasaev@gmail.com>
 */
class PHPDocPractice {

	/**
	 * @var string $name User name
	 * @var int $age User age
	 */
	protected $name;
	protected $age;

	/**
	 * $name property setter
	 *
	 * Sets $name property value
	 *
	 * @param string $name User name
	 * @return void
	 */
	public function setName(string $name) : void {
		$this->name = $name;
	}

	/**
	 * $age property setter
	 *
	 * Sets $age property value
	 *
	 * @param int $age User name
	 * @return void
	 */
	public function setAge(int $age) : void {
		$this->name = $age;
	}

	/**
	 * Returns user information
	 *
	 * @return array
	 */
	public function getUserInfo() : array {
		return get_object_vars($this);
	}

}