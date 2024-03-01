<?php

namespace Xana\GenHtml\Elements;

class TableHeader extends TableRow{

	public function __construct(array $cells = []){
		parent::__construct('thead');
		$this->cells    = $cells;
		$this->isHeader = true;
	}

}
