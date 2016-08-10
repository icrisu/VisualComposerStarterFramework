'use strict';

console.log('frontend-admin');
window.InlineShortcodeView_barcode = window.InlineShortcodeView.extend({

	render: function() {
		window.InlineShortcodeView_barcode.__super__.render.call(this);
		//this.$el.append('<p>hello1</p>');
		//do some fancy JavaScript stuff 
		console.log('render');
		return this;
	},

	updated: function () {
		window.InlineShortcodeView_barcode.__super__.updated.call(this);
	},

	parentChanged: function () {
		window.InlineShortcodeView_barcode.__super__.parentChanged.call(this);
	}

});