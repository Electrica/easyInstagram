<?php

class easyInstagramItemRemoveProcessor extends modObjectProcessor
{
    public $objectType = 'easyInstagramItem';
    public $classKey = 'easyInstagramItem';
    public $languageTopics = ['easyinstagram'];
    //public $permission = 'remove';


    /**
     * @return array|string
     */
    public function process()
    {
        if (!$this->checkPermissions()) {
            return $this->failure($this->modx->lexicon('access_denied'));
        }

        $ids = $this->modx->fromJSON($this->getProperty('ids'));
        if (empty($ids)) {
            return $this->failure($this->modx->lexicon('easyinstagram_item_err_ns'));
        }

        foreach ($ids as $id) {
            /** @var easyInstagramItem $object */
            if (!$object = $this->modx->getObject($this->classKey, $id)) {
                return $this->failure($this->modx->lexicon('easyinstagram_item_err_nf'));
            }

            $object->remove();
        }

        return $this->success();
    }

}

return 'easyInstagramItemRemoveProcessor';