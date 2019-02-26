<?php

namespace News\InputFilter;

use Zend\Filter\StringTrim;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\StringLength;

/**
 * Class NewsInputFilter
 *
 * @package News\InputFilter
 */
class NewsInputFilter extends InputFilter
{
    /**
     *
     */
    public function init()
    {
        $factory = $this->getFactory();

        /** @var Input $title */
        $title = $factory->createInput(['name' => 'title']);
        $title->setRequired(true);
        $title->getFilterChain()->attachByName(StringTrim::class);
        $title->getValidatorChain()->attachByName(StringLength::class, ['min' => 10]);

        /** @var Input $text */
        $text = $factory->createInput(['name' => 'text']);
        $text->setRequired(true);
        $text->getFilterChain()->attachByName(StringTrim::class);
        $text->getValidatorChain()->attachByName(StringLength::class, ['min' => 10]);

        $this->add($title);
        $this->add($text);
    }
}
