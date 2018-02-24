<?php

/**
 * The home manager controller for easyInstagram.
 *
 */
class easyInstagramHomeManagerController extends modExtraManagerController
{
    /** @var easyInstagram $easyInstagram */
    public $easyInstagram;


    /**
     *
     */
    public function initialize()
    {
        $this->easyInstagram = $this->modx->getService('easyInstagram', 'easyInstagram', MODX_CORE_PATH . 'components/easyinstagram/model/');
        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return ['easyinstagram:default'];
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('easyinstagram');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->easyInstagram->config['cssUrl'] . 'mgr/main.css');
        $this->addJavascript($this->easyInstagram->config['jsUrl'] . 'mgr/easyinstagram.js');
        $this->addJavascript($this->easyInstagram->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addJavascript($this->easyInstagram->config['jsUrl'] . 'mgr/misc/combo.js');
        $this->addJavascript($this->easyInstagram->config['jsUrl'] . 'mgr/widgets/items.grid.js');
        $this->addJavascript($this->easyInstagram->config['jsUrl'] . 'mgr/widgets/items.windows.js');
        $this->addJavascript($this->easyInstagram->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->easyInstagram->config['jsUrl'] . 'mgr/sections/home.js');

        $this->addHtml('<script type="text/javascript">
        easyInstagram.config = ' . json_encode($this->easyInstagram->config) . ';
        easyInstagram.config.connector_url = "' . $this->easyInstagram->config['connectorUrl'] . '";
        Ext.onReady(function() {MODx.load({ xtype: "easyinstagram-page-home"});});
        </script>');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        $this->content .= '<div id="easyinstagram-panel-home-div"></div>';

        return '';
    }
}