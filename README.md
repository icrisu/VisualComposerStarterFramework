# VisualComposerStarterFramework
Small Starter Framework for Visual Composer 

### About
This is a "getting started" boilerplate/framework for building Visual Composer addons. 
[Visual Composer URL](https://vc.wpbakery.com/)

I've made this because their documentation it's kinda poor and I've spent like 8 hours figuring out on how to easily create and group multiple Addons/Extensions and on how the front-end editor works vs the backend editor. 

Also please note that they are using Backbone views to update/render contend within the front-end editor, and pay attention, those views are auto-generated based on your shortcode, so basically the view you need to override is named something like: "InlineShortcodeView_shortcode_name" ( check that out within the assets folder)
