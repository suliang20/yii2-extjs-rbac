<?php

namespace wsl\rbac\models;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[DpAdminMenuUrlRelation]].
 *
 * @see DpAdminMenuUrlLink
 */
class DpAdminMenuUrlRelationQuery extends ActiveQuery
{
    /**
     * @var string 表名
     */
    public $tableName = '';

    public function init()
    {
        /**
         * @var $modelClass DpAdminMenuUrlRelation
         */
        $modelClass = $this->modelClass;
        $this->tableName = $modelClass::tableName();
        parent::init();
    }

    public function active()
    {
        $this->andWhere($this->tableName . '.status=1');
        return $this;
    }

    public function normal()
    {
        $this->andWhere($this->tableName . '.status=0 or ' . $this->tableName . '.status=1');
        return $this;
    }

    /**
     * 查找指定关联id
     *
     * @param int $linkId 关联id
     * @return $this
     */
    public function findByLinkId($linkId)
    {
        $this->andWhere([
            'link_id' => $linkId,
        ]);
        return $this;
    }

    /**
     * 查找指定菜单id
     *
     * @param int $menuId 菜单id
     * @return $this
     */
    public function findByMenuId($menuId)
    {
        $this->andWhere([
            'menu_id' => $menuId,
        ]);
        return $this;
    }

    /**
     * 查找指定URL id
     *
     * @param int $urlId URL id
     * @return $this
     */
    public function findByUrlId($urlId)
    {
        $this->andWhere([
            'url_id' => $urlId,
        ]);
        return $this;
    }

    /**
     * @inheritdoc
     * @return DpAdminMenuUrlRelation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DpAdminMenuUrlRelation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}