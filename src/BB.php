<?php

namespace NormanHuth\BBCode;

use Laravel\Nova\Fields\Text as Field;
use Laravel\Nova\Http\Requests\NovaRequest;

class BB extends Field
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
     * Get the component name for the field.
     *
     * @return string
     */
    public function component(): string
    {
        if (isset(static::$customComponents[get_class($this)])) {
            return static::$customComponents[get_class($this)];
        }

        if (request()->input('editing')) {
            return 'bb';
        }

        return 'text-field';
    }

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
        $request = app(NovaRequest::class);

        if ($request->isCreateOrAttachRequest()
            || $request->isUpdateOrUpdateAttachedRequest()
            || $request->isActionRequest() === true
        ) {
            return array_merge(parent::jsonSerialize(), [
                'suggestions' => $this->resolveSuggestions($request),
                'codes'       => $this->codes,
                'btnStyle'    => $this->btnStyle,
                'btnClass'    => $this->btnClass,
            ]);
        }

        return array_merge(parent::jsonSerialize(), [
            'codes'    => $this->codes,
            'btnStyle' => $this->btnStyle,
            'btnClass' => $this->btnClass,
        ]);
    }
}
