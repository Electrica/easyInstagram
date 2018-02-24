<?php

class easyInstagramOfficeItemCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'easyInstagramItem';
    public $classKey = 'easyInstagramItem';
    public $languageTopics = ['easyinstagram'];
    //public $permission = 'create';


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $name = trim($this->getProperty('name'));
        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('easyinstagram_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, ['name' => $name])) {
            $this->modx->error->addField('name', $this->modx->lexicon('easyinstagram_item_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'easyInstagramOfficeItemCreateProcessor';