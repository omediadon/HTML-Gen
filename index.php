<?php

use Xana\GenHtml\Elements\Button;
use Xana\GenHtml\Elements\Div;
use Xana\GenHtml\Elements\Email;
use Xana\GenHtml\Elements\Form;
use Xana\GenHtml\Elements\Header;
use Xana\GenHtml\Elements\Link;
use Xana\GenHtml\Elements\ListElement;
use Xana\GenHtml\Elements\Meta;
use Xana\GenHtml\Elements\OrderedList;
use Xana\GenHtml\Elements\Paragraph;
use Xana\GenHtml\Elements\Password;
use Xana\GenHtml\Elements\Select;
use Xana\GenHtml\Elements\Span;
use Xana\GenHtml\Elements\Table;
use Xana\GenHtml\Elements\TableCell;
use Xana\GenHtml\Elements\TableHeader;
use Xana\GenHtml\Elements\TableRow;
use Xana\GenHtml\Elements\TextArea;
use Xana\GenHtml\Elements\UnorderedList;
use Xana\GenHtml\HtmlGenerator;

require 'vendor/autoload.php';

$view = new HtmlGenerator(elements: [
										new Meta('charset', 'utf-8'),
										new Header(2, 'This is a subheading'),
										new Link('about-us.html', 'Read more about us'),
										new Link('//external-site.com', 'External Site', target: '_blank'),
										new Div(attributes: ["class" => "container"], elements: [
											new Paragraph("This is some text"),
											new Form(attributes: ["action" => "/login"], elements: [
												new Email("email", ["placeholder" => "Email Address"]),
												new Password("password", ["placeholder" => "Password"]),
												new Button("Login"),
											],),
											new TextArea('message', ['placeholder' => 'Enter your message here']),
											(new Select("country", ["required" => true]))->addEmptyOption()
																						 ->addOption("1", 'Hello'),
											new OrderedList([
																new ListElement("US"),
																new ListElement("United States")
															],),
											new UnorderedList([
																  new ListElement("United States"),
																  new ListElement("US")
															  ],),
											new Span('This text is bold.', ['style' => 'font-weight: bold;color:red']),
										],),
										new Table(['style' => 'border:1px solid #000;width: 600px'], [
											new TableHeader([
																new TableCell('Product Name', ['style' => 'border:1px solid #000']),
																new TableCell('Price', ['style' => 'border:1px solid #000']),
																new TableCell('Quantity', ['style' => 'border:1px solid #000']),
															]),
											new TableRow(cells: [
																	new TableCell('T-Shirt', ['style' => 'border:1px solid #000']),
																	new TableCell('$19.99', ['style' => 'border:1px solid #000']),
																	new TableCell('1', ['style' => 'border:1px solid #000']),
																])
										])
									],);
echo $view->render();
