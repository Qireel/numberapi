<?php 
	namespace NumberApi;
		
	abstract class StorageAdapter {
		/**
		 * @param int $value
		 *
		 * @return array|null
		 */
		abstract protected function save(/*int*/ $value);
		
		/**
		 * @param int $value
		 *
		 * @return array|null
		 */
		abstract protected function find (/*int*/ $id);
	}