<?php

	namespace NumberApi;
	
	class Number {
		/**
		 *	@var int
		 */
		private $id;
		/**
		 *	@var int
		 */
		private $value;
		
		public function __construct(/*int*/ $id = null, /*int*/ $value = null){
			$this->id = $id;
			$this->value = $value;
		}
		
		/**
		 * @param array
		 *
		 * @return Number
		 */
		public static function fromState(array $state){
			return new self(
				$state['id'],
				$state['value']
			);
		}
		
		/**
		 * @return int
		 */
		public function getId() {
			return $this->id;
		}
		
		/**
		 * @return int
		 */
		public function getValue() {
			return $this->value;
		}
		
	}   