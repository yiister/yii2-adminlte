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
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        Html::addCssClass($this->options, 'box box-' . $this->type);
        echo Html::beginTag('div', $this->options);
        if (isset($this->header)) {
            echo Html::tag(
                'div',
                Html::tag(
                    'h3',
                    (isset($this->icon) ? new Icon($this->icon) . '&nbsp;' : '') . $this->header,
                    ['class' => 'box-title']
                ),
                ['class' => 'box-header']
            );
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
