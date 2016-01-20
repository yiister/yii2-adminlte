<?php
/**
 * @copyright Copyright (c) 2015 Yiister
 * @license https://github.com/yiister/adminlte/blob/master/LICENSE
 * @link http://adminlte.yiister.ru
 */

namespace yiister\adminlte\widgets\grid;

use yii\helpers\Html;

class GridView extends \yii\grid\GridView
{
    /**
     * @inheritdoc
     */
    public $dataColumnClass = 'yiister\adminlte\widgets\grid\DataColumn';

    /**
     * @inheritdoc
     */
    public $tableOptions = ['class' => 'table dataTable'];

    /**
     * @var bool is bordered
     */
    public $bordered = true;

    /**
     * @var bool is condensed
     */
    public $condensed = false;

    /**
     * @var bool is striped
     */
    public $striped = true;

    /**
     * @var bool is row have hover effect
     */
    public $hover = false;

    /**
     * @inheritdoc
     */
    public function init()
    {
        if ($this->bordered) {
            Html::addCssClass($this->tableOptions, 'table-bordered');
        }
        if ($this->condensed) {
            Html::addCssClass($this->tableOptions, 'table-condensed');
        }
        if ($this->striped) {
            Html::addCssClass($this->tableOptions, 'table-striped');
        }
        if ($this->hover) {
            Html::addCssClass($this->tableOptions, 'table-hover');
        }
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        GridViewAsset::register($this->getView());
        parent::run();
    }

    /**
     * @inheritdoc
     */
    public function renderPager()
    {
        return Html::tag('div', parent::renderPager(), ['class' => 'dataTables_paginate paging_simple_numbers']);
    }
}
