<?php
/** @var xPDOTransport $transport */
/** @var array $options */
/** @var modX $modx */
if ($transport->xpdo) {
    $modx =& $transport->xpdo;

    $dev = MODX_BASE_PATH . 'Extras/easyInstagram/';
    /** @var xPDOCacheManager $cache */
    $cache = $modx->getCacheManager();
    if (file_exists($dev) && $cache) {
        if (!is_link($dev . 'assets/components/easyinstagram')) {
            $cache->deleteTree(
                $dev . 'assets/components/easyinstagram/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_ASSETS_PATH . 'components/easyinstagram/', $dev . 'assets/components/easyinstagram');
        }
        if (!is_link($dev . 'core/components/easyinstagram')) {
            $cache->deleteTree(
                $dev . 'core/components/easyinstagram/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_CORE_PATH . 'components/easyinstagram/', $dev . 'core/components/easyinstagram');
        }
    }
}

return true;