<?php
/**
 * @copyright Copyright (c) 2015 Yiister
 * @license https://github.com/yiister/adminlte/blob/master/LICENSE
 * @link http://adminlte.yiister.ru
 */

namespace yiister\adminlte\widgets;

use rmrevin\yii\fontawesome\component\Icon;
use yii\bootstrap\Widget;
use yii\helpers\Html;

class Box extends Widget
{
    const TYPE_DANGER = 'danger';
    const TYPE_INFO = 'info';
    const TYPE_PRIMARY = 'primary';
    const TYPE_SUCCESS = 'success';
    const TYPE_WARNING = 'warning';

    /**
     * @var string tools buttons
     */
    protected $tools;

    /**
     * @var string header text
     */
    public $header;

    /**
     * @var string icon name
     */
    public $icon;

    /**
     * @var string box type
     * You can use one of this class constants
     */
    public $type = 'default';

    /**
     * @var bool is expandable
     */
    public $expandable = false;

    /**
     * @var bool is collapsable
     */
    public $collapsable = false;

    /**
     * @var bool is removable
     */
    public $removable = false;

    /**
     * @var bool is filled
     */
    public $filled = false;

    protected function initTools()
    {
        if ($this->expandable || $this->collapsable) {
            $this->tools .= Html::button(
                new Icon($this->expandable ? 'plus' : 'minus'),
                [
                    'class' => 'btn btn-box-tool',
                    'data-widget' => 'collapse',
                ]
            );
            if ($this->expandable) {
                Html::addCssClass($this->options, 'collapsed-box');
            }
        }
        if ($this->removable) {
            $this->tools .= Html::button(
                new Icon('times'),
                [
                    'class' => 'btn btn-box-tool',
                    'data-widget' => 'remove',
                ]
            );
        }
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->initTools();
        Html::addCssClass($this->options, 'box box-' . $this->type);
        if ($this->filled) {
            Html::addCssClass($this->options, 'box-solid');
        }
        echo Html::beginTag('div', $this->options);
        if (isset($this->header)) {
            echo Html::beginTag('div', ['class' => 'box-header']);
            echo Html::tag(
                'h3',
                (isset($this->icon) ? new Icon($this->icon) . '&nbsp;' : '') . $this->header,
                ['class' => 'box-title']
            );
            if (!empty($this->tools)) {
                echo Html::tag('div', $this->tools, ['class' => 'box-tools pull-right']);
            }
            echo Html::endTag('div');
        }
        echo Html::beginTag('div', ['class' => 'box-body']);
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        echo Html::endTag('div');
        echo Html::endTag('div');
        parent::run();
    }
}
