<?php

namespace NormanHuth\BBCode;

use Laravel\Nova\Fields\Textarea as Field;

class BBCode extends Field
{
    /**
     * The codes in key => value: code => title
     *
     * @var array
     */
    protected array $codes = [];

    /**
     * The button class attribute
     *
     * @var string
     */
    protected string $btnClass = 'shadow relative bg-primary-500 hover:bg-primary-400 active:bg-primary-600 text-white dark:text-gray-900 cursor-pointer rounded text-sm font-bold focus:outline-none focus:ring inline-flex items-center justify-center h-9 px-3 shadow relative bg-primary-500 hover:bg-primary-400 active:bg-primary-600 text-white dark:text-gray-900 mr-2';

    /**
     * Button inline style attribute
     *
     * @var string
     */
    protected string $btnStyle = '';


    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'bbcode';

    /**
     * @param array $codes
     * @return $this
     */
    public function codes(array $codes): static
    {
        $this->codes = $codes;

        return $this;
    }

    /**
     * Always show the content of textarea fields inside Nova.
     *
     * @return $this
     */
    public function alwaysShow(bool $alwaysShow = true): static
    {
        $this->alwaysShow = $alwaysShow;

        return $this;
    }

    /**
     * Change the button inline style attribute
     *
     * @param string $style
     * @return $this
     */
    public function btnStyle(string $style): static
    {
        $this->btnStyle = $style;

        return $this;
    }

    /**
     * Change the button class attribute
     *
     * @param string $class
     * @return $this
     */
    public function btnClass(string $class): static
    {
        $this->btnClass = $class;

        return $this;
    }

    /**
     * Prepare the element for JSON serialization.
     *
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return array_merge(parent::jsonSerialize(), [
            'rows'       => $this->rows,
            'shouldShow' => $this->shouldBeExpanded(),
            'codes'      => $this->codes,
            'btnStyle'   => $this->btnStyle,
            'btnClass'   => $this->btnClass,
        ]);
    }
}
