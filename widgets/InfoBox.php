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

class InfoBox extends Widget
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
    public $text;

    /**
     * @var string value number
     */
    public $number;

    /**
     * @var bool is filled box
     */
    public $filled = false;

    /**
     * @var int progress in percents
     */
    public $progress;

    /**
     * @var string progress description
     */
    public $progressDescription;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        Html::addCssClass($this->options, 'info-box');
        if ($this->filled && !empty($this->color)) {
            Html::addCssClass($this->options, $this->color);
        }
        if ($this->progress !== null) {
            if ($this->progress > 100) {
                $this->progress = 100;
            } elseif ($this->progress < 0) {
                $this->progress = 0;
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        echo Html::beginTag('div', $this->options);
        if (!empty($this->icon)) {
            echo Html::tag(
                'span',
                new Icon($this->icon),
                [
                    'class' => 'info-box-icon ' . (!$this->filled && !empty($this->color) ? $this->color : ''),
                ]
            );
        }
        echo Html::beginTag('div', ['class' => 'info-box-content']);
        echo Html::tag('span', $this->text, ['class' => 'info-box-text']);
        echo Html::tag('span', $this->number, ['class' => 'info-box-number']);
        if ($this->progress !== null) {
            echo Html::tag(
                'div',
                Html::tag('div', '', ['class' => 'progress-bar', 'style' => 'width: ' . (int) $this->progress . '%']),
                ['class' => 'progress']
            );
        }
        echo Html::tag('span', $this->progressDescription, ['class' => 'progress-description']);
        echo Html::endTag('div');
        echo Html::endTag('div');
    }
}
