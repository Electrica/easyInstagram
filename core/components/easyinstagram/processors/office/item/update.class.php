<?php

class easyInstagramOfficeItemUpdateProcessor extends modObjectUpdateProcessor
{
    public $objectType = 'easyInstagramItem';
    public $classKey = 'easyInstagramItem';
    public $languageTopics = ['easyinstagram'];
    //public $permission = 'save';


    /**
     * We do a special check of permission
     * because our objects is not an instances of modAccessibleObject
     *
     * @return bool|string
     */
    public function beforeSave()
    {
        if (!$this->checkPermissions()) {
            return $this->modx->lexicon('access_denied');
        }

        return true;
    }


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $id = (int)$this->getProperty('id');
        $name = trim($this->getProperty('name'));
        if (empty($id)) {
            return $this->modx->lexicon('easyinstagram_item_err_ns');
        }

        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('easyinstagram_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, ['name' => $name, 'id:!=' => $id])) {
            $this->modx->error->addField('name', $this->modx->lexicon('easyinstagram_item_err_ae'));
        }

        return parent::beforeSet();
    }
}

return 'easyInstagramOfficeItemUpdateProcessor';
