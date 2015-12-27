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

class SmallBox extends Widget
{
    /**
     * @var string small box background color
     */
    public $color;

    /**
     * @var string font awesome icon name
     */
    public $icon;

    /**
     * @var string header text
     */
    public $header;

    /**
     * @var string link label
     */
    public $linkLabel = 'More info <i class="fa fa-arrow-circle-right"></i>';

    /**
     * @var string|array link route
     */
    public $linkRoute = '#';

    /**
     * @var string short description
     */
    public $text;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        Html::addCssClass($this->options, 'small-box');
        if (!empty($this->color)) {
            Html::addCssClass($this->options, $this->color);
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        echo Html::beginTag('div', $this->options);
        echo Html::tag(
            'div',
            Html::tag('h3', $this->header) . Html::tag('p', $this->text),
            ['class' => 'inner']
        );
        if (!empty($this->icon)) {
            echo Html::tag('div', new Icon($this->icon), ['class' => 'icon']);
        }
        if (!empty($this->linkLabel)) {
            echo Html::a($this->linkLabel, $this->linkRoute, ['class' => 'small-box-footer']);
        }
        echo Html::endTag('div');
        parent::run();
    }
}
