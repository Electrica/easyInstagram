Ext.onReady(function () {
    easyInstagram.config.connector_url = OfficeConfig.actionUrl;

    var grid = new easyInstagram.panel.Home();
    grid.render('office-easyinstagram-wrapper');

    var preloader = document.getElementById('office-preloader');
    if (preloader) {
        preloader.parentNode.removeChild(preloader);
    }
});