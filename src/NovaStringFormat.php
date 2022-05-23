<?php

namespace Hakerkiler\NovaStringFormat;

use Laravel\Nova\Fields\Field;

class NovaStringFormat extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-string-format';

    public function __construct($name, $attribute = null, callable $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);
        $this->withMeta([
            'stringLimit' => 0,
            'useCopy' => false,
            'externalLink' => false,
        ]);
    }

    public function stringLimit($limit = 20)
    {
        return $this->withMeta(['stringLimit' => $limit]);
    }

    public function useCopy()
    {
        return $this->withMeta(['useCopy' => true]);
    }

    public function externalLink($externalPath, $useString = false)
    {
        return $this->withMeta([
            'externalLink' => true,
            'externalPath' => $externalPath,
            'useString' => $useString,
        ]);
    }
}
