easyInstagram.page.Home = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'easyinstagram-panel-home',
            renderTo: 'easyinstagram-panel-home-div'
        }]
    });
    easyInstagram.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(easyInstagram.page.Home, MODx.Component);
Ext.reg('easyinstagram-page-home', easyInstagram.page.Home);