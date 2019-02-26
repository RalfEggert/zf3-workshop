<?php

namespace News\Form;

use Zend\Form\Element\Submit;
use Zend\Form\Element\Text;
use Zend\Form\Element\Textarea;
use Zend\Form\Form;

/**
 * Class NewsForm
 *
 * @package News\Form
 */
class NewsForm extends Form
{
    /**
     *
     */
    public function init()
    {
        $factory = $this->getFormFactory();

        /** @var Text $titleElement */
        $titleElement = $factory->createElement(['type' => Text::class]);
        $titleElement->setName('title');
        $titleElement->setLabel('Titel');
        $titleElement->setAttribute('class', 'form-element');

        /** @var Textarea $textElement */
        $textElement = $factory->createElement(['type' => Textarea::class]);
        $textElement->setName('text');
        $textElement->setLabel('Text');
        $textElement->setAttribute('class', 'form-element');

        /** @var Submit $submitElement */
        $submitElement = $factory->createElement(['type' => Submit::class]);
        $submitElement->setValue('Speichern');
        $submitElement->setAttribute('class', 'btn btn-success btn-lg');

        $this->add($titleElement);
        $this->add($textElement);
        $this->add($submitElement);
    }
}
