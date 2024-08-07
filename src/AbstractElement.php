<?php

namespace Xana\GenHtml;
  
use Xana\GenHtml\Visitor\HtmlRenderer;
use Xana\GenHtml\Visitor\ElementVisitor;
  
  

abstract class AbstractElement implements ElementInterface {
    private string $tagName;
    private array $attributes = [];
    private array $classes = [];
    private string $text = '';

    public function __construct(string $tagName, array $attributes = []) {
        $this->tagName = $tagName;
        $this->attributes = $attributes;
    }

    public function render(): string {
        $visitor = new HtmlRenderer();
        return $this->accept($visitor);
    }

    public function accept(ElementVisitor $visitor): string {
        return $visitor->visit($this);
    }
  public function setAttribute(string $name, string $value): self {
      $this->attributes[$name] = $value;
      return $this;
  }

  public function addClass(string $class): self {
      $this->classes[] = $class;
      return $this;
  }

  // Protected getters for use in child classes
  protected function getTagName(): string {
      return $this->tagName;
  }

  protected function getAttributes(): array {
      $attrs = $this->attributes;
      if (!empty($this->classes)) {
          $attrs['class'] = implode(' ', array_unique($this->classes));
      }
      return $attrs;
  }

  protected function getText(): string {
      return $this->text;
  }

  protected function setText(string $text): self {
        $this->text = $text;
        return $this;
    }
}