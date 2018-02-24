easyInstagram.panel.Home = function (config) {
    config = config || {};
    Ext.apply(config, {
        baseCls: 'modx-formpanel',
        layout: 'anchor',
        /*
         stateful: true,
         stateId: 'easyinstagram-panel-home',
         stateEvents: ['tabchange'],
         getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
         */
        hideMode: 'offsets',
        items: [{
            html: '<h2>' + _('easyinstagram') + '</h2>',
            cls: '',
            style: {margin: '15px 0'}
        }, {
            xtype: 'modx-tabs',
            defaults: {border: false, autoHeight: true},
            border: true,
            hideMode: 'offsets',
            items: [{
                title: _('easyinstagram_items'),
                layout: 'anchor',
                items: [{
                    html: _('easyinstagram_intro_msg'),
                    cls: 'panel-desc',
                }, {
                    xtype: 'easyinstagram-grid-items',
                    cls: 'main-wrapper',
                }]
            }]
        }]
    });
    easyInstagram.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(easyInstagram.panel.Home, MODx.Panel);
Ext.reg('easyinstagram-panel-home', easyInstagram.panel.Home);
