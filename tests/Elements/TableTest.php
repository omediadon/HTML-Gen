<?php

namespace Xana\GenHtml\Tests\Elements;

use PHPUnit\Framework\TestCase;
use Xana\GenHtml\Elements\Table;
use Xana\GenHtml\Elements\TableCell;
use Xana\GenHtml\Elements\TableHeader;
use Xana\GenHtml\HtmlElement;

/**
 *
 * @covers \Xana\GenHtml\Elements\Table::__construct
 * @covers \Xana\GenHtml\HtmlElement::__construct
 * @covers \Xana\GenHtml\HtmlElement::render
 * @covers \Xana\GenHtml\HtmlElement::setClasses
 * @covers \Xana\GenHtml\AbstractElement::__construct
 */
class TableTest extends TestCase{
	public function test__construct(){
		$table = new Table();

		$this->assertEquals('<table class="table table-bordered table-hover"></table>', $table->render());
	}

	/**
	 * @covers \Xana\GenHtml\Elements\Table::addRow
	 * @covers \Xana\GenHtml\Elements\TableCell::__construct
	 * @covers \Xana\GenHtml\Elements\TableCell::asHeading
	 * @covers \Xana\GenHtml\Elements\TableHeader::__construct
	 * @covers \Xana\GenHtml\Elements\TableRow::__construct
	 * @covers \Xana\GenHtml\Elements\TableRow::addCell
	 * @covers \Xana\GenHtml\Elements\TableRow::render
	 * @covers \Xana\GenHtml\HtmlElement::escapeHtml
	 * @covers \Xana\GenHtml\HtmlElement::setText
	 */
	public function testAddRow(){
		$table = new Table();
		$table->addRow((new TableHeader())->addCell(new TableCell('cell')));

		$this->assertEquals('<table class="table table-bordered table-hover"><thead class="table-dark"><th >cell</th></thead></table>',
							$table->render());
	}
}
