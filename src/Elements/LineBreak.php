<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

class LineBreak extends HtmlElement{
	public function __construct(){
		parent::__construct("br");
		parent::noDefaults();
		parent::selfClosing();
	}

}
