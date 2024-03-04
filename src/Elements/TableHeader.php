<?php

namespace Xana\GenHtml\Elements;

class TableHeader extends TableRow{

	/**
	 * @inheritDoc
	 */
	public function __construct(){
		parent::__construct('thead');
		$this->isHeader          = true;
		$this->defaultClasses    = 'table-dark';
	}

}
