<!doctype html>
<?php

use Xana\GenHtml\Elements\Button;
use Xana\GenHtml\Elements\Div;
use Xana\GenHtml\Elements\Email;
use Xana\GenHtml\Elements\Form;
use Xana\GenHtml\Elements\Header;
use Xana\GenHtml\Elements\LineBreak;
use Xana\GenHtml\Elements\Link;
use Xana\GenHtml\Elements\ListItem;
use Xana\GenHtml\Elements\Meta;
use Xana\GenHtml\Elements\OrderedList;
use Xana\GenHtml\Elements\Paragraph;
use Xana\GenHtml\Elements\Password;
use Xana\GenHtml\Elements\Select;
use Xana\GenHtml\Elements\SelectOption;
use Xana\GenHtml\Elements\Span;
use Xana\GenHtml\Elements\Table;
use Xana\GenHtml\Elements\TableCell;
use Xana\GenHtml\Elements\TableHeader;
use Xana\GenHtml\Elements\TableRow;
use Xana\GenHtml\Elements\TextArea;
use Xana\GenHtml\Elements\UnorderedList;

require 'vendor/autoload.php';
?>
<html lang="en" >
	<head >
		<meta charset="utf-8" >
		<?= (new Meta('viewport', 'width=device-width, initial-scale=1'))->render() ?>
		<?= (new Meta('charset', 'utf-8'))->render() ?>
		<title >Bootstrap demo</title >
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
			  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" >

	</head >
	<body >

		<?php

		$paragraphWithInlineLink = new Paragraph('A paragraph, but you can click {here}');

		$paragraphWithInlineLink->addInlineElement('here', new link('//google.com', 'here'));

		$options = [
			[
				'text'     => 'one',
				'value'    => '1',
				'selected' => null,
			],
			[
				'text'  => 'two',
				'value' => '2',
			],
		];

		$select = new Select("country", false, ["required" => true]);
		$select = $select->addEmptyOption();

		foreach($options as $option){
			$select->addOption(new SelectOption($option['text'], $option['value'], $option['selected'] ?? null));
		}
		$defaultAttrs = [
			"required"    => true,
			'placeholder' => 'Enter your message here',
		];
		$form         = new Form("/login");
		$form         = $form->addElement(new Email("email", ["placeholder" => "Email Address"]))
							 ->addElement((new Password("password", ["placeholder" => "Password"]))->addClass('bg-info')
													   ->keepDefaultClasses())
							 ->addElement($select)
							 ->addElement(new TextArea('the-text', $defaultAttrs))
							 ->addElement(new Button("Login"));
		$table        = (new Table())->addClass('bg-info')
									 ->keepDefaultClasses();
		$table        = $table->addRow((new TableHeader())->addCell(new TableCell('Product Name'))
														  ->addCell(new TableCell('Price'))
														  ->addCell(new TableCell('Quantity')))
							  ->addRow((new TableRow())
													   ->addCell(new TableCell('T-Shirt'))
													   ->addCell(new TableCell('$19.99'))
													   ->addCell(new TableCell('1')))
							  ->addRow((new TableRow())->addCell(new TableCell('Pillow'))
													   ->addCell(new TableCell('$24.99'))
													   ->addCell(new TableCell('4')));
		$internalDiv  = (new Div(['class' => 'col-12']))->addElement(new Paragraph("This is some text"))
														->addElement($form)
														->addElement((new OrderedList())->addItem(new ListItem("US"))
																						->addItem(new ListItem("United States")))
														->addElement((new UnorderedList())->addItem(new ListItem("US"))
																						  ->addItem(new ListItem("United States")))
														->addElement(new Span('This text is a blod of red bold text.', ['style' => 'font-weight: bold;color:red']))
														->addElement($table);

		$view = (new Div(['class' => 'container']))->addElement($paragraphWithInlineLink)
												   ->addElement(new Header(2, 'This is a subheading'))
												   ->addElement(new Link('about-us.html', 'Read more about us'))
												   ->addElement(new LineBreak())
												   ->addElement(new Link('//external-site.com', 'External Site', '_blank'))
												   ->addElement($internalDiv);

		echo $view->render();
		?>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
				integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" ></script >

	</body >
</html >
