<?php

namespace victor\widgets;

use Yii;
use yii\base\Model;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;

class VictorTest extends Widget
{
    /**
     * @var Model the data model that this widget is associated with.
     */
    public $model;

    /**
     * @var string the model attribute that this widget is associated with.
     */
    public $attribute;

    /**
     * @var string the input name. This must be set if [[model]] and [[attribute]] are not set.
     */
    public $name;

    /**
     * @var string the input value.
     */
    public $value;

    /**
     * @var array the HTML attributes for the widget container tag.
     */
    public $options = [];

    /**
     * @var array the options for the underlying Bootstrap JS plugin.
     * Please refer to the corresponding Bootstrap plugin Web page for possible options.
     * For example, [this page](http://twitter.github.io/bootstrap/javascript.html#modals) shows
     * how to use the "Modal" plugin and the supported options (e.g. "remote").
     */
    public $clientOptions = [];

    /**
     * @var array the event handlers for the underlying Bootstrap JS plugin.
     * Please refer to the corresponding Bootstrap plugin Web page for possible events.
     * For example, [this page](http://twitter.github.io/bootstrap/javascript.html#modals) shows
     * how to use the "Modal" plugin and the supported events (e.g. "shown").
     */
    public $clientEvents = [];

    public $language;

    /**
     * JS function(start, end)
     *
     * @var string
     */
    public $callback;

    /**
     * Initializes the widget.
     * This method will register the bootstrap asset bundle. If you override this method,
     * make sure you call the parent implementation first.
     */
    public function init()
    {
        parent::init();
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->hasModel() ? Html::getInputId($this->model, $this->attribute) : $this->getId();
        }
    }

    /**
     * @return boolean whether this widget is associated with a data model.
     */
    protected function hasModel()
    {
        return $this->model instanceof Model && $this->attribute !== null;
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        $this->registerPlugin('victortest');

        if ($this->hasModel()) {
            echo Html::activeTextInput($this->model, $this->attribute, $this->options);
        } else {
            echo Html::textInput($this->name, $this->value, $this->options);
        }
    }

    /**
     * Registers a specific Bootstrap plugin and the related events
     * @param string $name the name of the Bootstrap plugin
     */
    protected function registerPlugin($name)
    {
        
    }
}
