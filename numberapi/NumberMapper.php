<?php
	
	namespace NumberApi;
	
	class NumberMapper {
		/**
		 * @var StorageAdapter
		 */
		private $adapter;
		
		public function __construct(/*StorageAdapter*/ $storage)
		{
			$this->adapter = $storage;
		}
		
		/**
		 * @param int $value
		 *
		 * @return Number
		 */
		public function findById(/*int*/ $id)/*: Number*/
		{
			$result = $this->adapter->find($id);

			if ($result === null) {
				throw new \InvalidArgumentException("Number with id '#$id' is not found");
			}

			return $this->mapRowToNumber($result);
		}
		
		/**
		 * @param int $value
		 *
		 * @return Number
		 */
		private function mapRowToNumber(/*array*/ $row)/*: Number*/
		{
			return Number::fromState($row);
		}
		
		/**
		 * @param int $value
		 *
		 * @return Number
		 */
		public function generate() /*: Number */
		{
			$value = rand();
			$result = $this->adapter->save($value);
			
			return $this->mapRowToNumber($result);
		}
	}
	
	
	
	