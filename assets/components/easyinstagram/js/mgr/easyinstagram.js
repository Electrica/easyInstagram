var easyInstagram = function (config) {
    config = config || {};
    easyInstagram.superclass.constructor.call(this, config);
};
Ext.extend(easyInstagram, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('easyinstagram', easyInstagram);

easyInstagram = new easyInstagram();