<?php
namespace BracketsChecker;

class Checker {
	/**
		Строка
	*/
	private $str;

	/**
		Количество скобок
	*/

	private $openingB;
	private $closingB;

	/**
		Шаблон для проверки
	*/

	private $pattern = "/[^\\n\\t\\r()]/";

	public function __construct($str) {
		$this->setParams($str);
	}
	
	/**
		Установить параметры
		@params string
		@result void
	*/

	public function setParams($str):void {
		$this->str = $str;
		$this->checkStr();
		$this->openingB = substr_count($this->str, "(");
		$this->closingB = substr_count($this->str, ")");
	}

	/**
		Проверяет количество скобок
		@param string
		@result boolean
	*/


	public function check() {
		return $this->openingB === $this->closingB;
	}


	/**
		Проверяет количество скобок и вернёт информацию
		@param string
		@result string

	*/

	public function checkWithInfo():string {
		if(!$this->check()) {
			$missingB = $this->openingB - $this->closingB > 0 ? $this->closingB." закрывающих" : $this->openingB." открывающих";
			return "Отсуствует ".$missingB." скобок";
		}

		return "Количество скобок одинаково";
	}



	/**
		Проверяет правильно ли задан строка
		@param string
		@result boolean
	*/

	private function checkStr():bool {
		preg_match($this->pattern, $this->str, $matches);
		if(count($matches) > 0) {
			throw new \InvalidArgumentException("Строка может содержать только скобки", 1);
		} 
		return true;
	}
}