<?php
namespace BracketsChecker;

class Checker {

	/**
		Шаблон для проверки
	*/

	private $pattern = "/[^\\n\\t\\r()]/";

	/**
		Проверяет количество скобок
		@param string
		@result boolean
	*/

	public function check(string $str):bool {
		if($this->checkParam($str)) {
			$pattern1 = "/[(]+/";
			$pattern2 = "/[)]+/";
			preg_match($pattern1, $str, $matches1);
			preg_match($pattern2, $str, $matches2);

			if(strlen($matches1[0]) === strlen($matches2[0])) {
				return true;
			}
			return false;
		}
	}

	/**
		Проверяет правильно ли задан строка
		@param string
		@result boolean
	*/

	private function checkParam(string $str):bool {
		preg_match($this->pattern, $str, $matches);
		if(count($matches) > 0) {
			throw new \InvalidArgumentException("Строка может содержать только скобки", 1);
		} 
		return true;
	}
}