<?php
if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php')) {
    /** @noinspection PhpIncludeInspection */
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
} else {
    require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php';
}
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var easyInstagram $easyInstagram */
$easyInstagram = $modx->getService('easyInstagram', 'easyInstagram', MODX_CORE_PATH . 'components/easyinstagram/model/');
$modx->lexicon->load('easyinstagram:default');

// handle request
$corePath = $modx->getOption('easyinstagram_core_path', null, $modx->getOption('core_path') . 'components/easyinstagram/');
$path = $modx->getOption('processorsPath', $easyInstagram->config, $corePath . 'processors/');
$modx->getRequest();

/** @var modConnectorRequest $request */
$request = $modx->request;
$request->handleRequest([
    'processors_path' => $path,
    'location' => '',
]);