/*
Uniform v1.7.5
Copyright © 2009 Josh Pyles / Pixelmatrix Design LLC
http://pixelmatrixdesign.com
License:
MIT License - http://www.opensource.org/licenses/mit-license.php
Enjoy!
*/
(function(c){c.uniform={options:{selectClass:"selector",radioClass:"radio",checkboxClass:"checker",fileClass:"uploader",filenameClass:"filename",fileBtnClass:"action",fileDefaultText:"No file selected",fileBtnText:"Choose File",checkedClass:"checked",focusClass:"focus",disabledClass:"disabled",buttonClass:"button",activeClass:"active",hoverClass:"hover",useID:true,idPrefix:"uniform",resetSelector:false,autoHide:true},elements:[]};c.support.selectOpacity=c.browser.msie&&c.browser.version<7?false:true;
c.fn.uniform=function(b){function j(a){var d=c(a),e=c("<div>"),f=c("<span>");e.addClass(b.buttonClass);b.useID&&d.attr("id")!=""&&e.attr("id",b.idPrefix+"-"+d.attr("id"));var g;if(d.is("a")||d.is("button"))g=d.text();else if(d.is(":submit")||d.is(":reset")||d.is("input[type=button]"))g=d.attr("value");g=g==""?d.is(":reset")?"Reset":"Submit":g;f.html(g);d.css("opacity",0);d.wrap(e);d.wrap(f);e=d.closest("div");f=d.closest("span");d.is(":disabled")&&e.addClass(b.disabledClass);e.bind({"mouseenter.uniform":function(){e.addClass(b.hoverClass)},
"mouseleave.uniform":function(){e.removeClass(b.hoverClass);e.removeClass(b.activeClass)},"mousedown.uniform touchbegin.uniform":function(){e.addClass(b.activeClass)},"mouseup.uniform touchend.uniform":function(){e.removeClass(b.activeClass)},"click.uniform touchend.uniform":function(h){if(c(h.target).is("span")||c(h.target).is("div"))if(a[0].dispatchEvent){h=document.createEvent("MouseEvents");h.initEvent("click",true,true);a[0].dispatchEvent(h)}else a[0].click()}});a.bind({"focus.uniform":function(){e.addClass(b.focusClass)},
"blur.uniform":function(){e.removeClass(b.focusClass)}});c.uniform.noSelect(e);i(a)}function k(a){var d=c(a),e=c("<div />"),f=c("<span />");!d.css("display")=="none"&&b.autoHide&&e.hide();e.addClass(b.selectClass);b.useID&&a.attr("id")!=""&&e.attr("id",b.idPrefix+"-"+a.attr("id"));d=a.find(":selected:first");if(d.length==0)d=a.find("option:first");f.html(d.html());a.css("opacity",0);a.wrap(e);a.before(f);e=a.parent("div");f=a.siblings("span");a.bind({"change.uniform":function(){f.text(a.find(":selected").html());
e.removeClass(b.activeClass)},"focus.uniform":function(){e.addClass(b.focusClass)},"blur.uniform":function(){e.removeClass(b.focusClass);e.removeClass(b.activeClass)},"mousedown.uniform touchbegin.uniform":function(){e.addClass(b.activeClass)},"mouseup.uniform touchend.uniform":function(){e.removeClass(b.activeClass)},"click.uniform touchend.uniform":function(){e.removeClass(b.activeClass)},"mouseenter.uniform":function(){e.addClass(b.hoverClass)},"mouseleave.uniform":function(){e.removeClass(b.hoverClass);
e.removeClass(b.activeClass)},"keyup.uniform":function(){f.text(a.find(":selected").html())}});c(a).attr("disabled")&&e.addClass(b.disabledClass);c.uniform.noSelect(f);i(a)}function i(a){a=c(a).get();a.length>1?c.each(a,function(d,e){c.uniform.elements.push(e)}):c.uniform.elements.push(a)}b=c.extend(c.uniform.options,b);var l=this;b.resetSelector!=false&&c(b.resetSelector).mouseup(function(){setTimeout(function(){c.uniform.update(l)},10)});c.uniform.restore=function(a){if(a==undefined)a=c(c.uniform.elements);
c(a).each(function(){if(c(this).is(":checkbox"))c(this).unwrap().unwrap();else if(c(this).is("select")){c(this).siblings("span").remove();c(this).unwrap()}else if(c(this).is(":radio"))c(this).unwrap().unwrap();else if(c(this).is(":file")){c(this).siblings("span").remove();c(this).unwrap()}else c(this).is("button, :submit, :reset, a, input[type='button']")&&c(this).unwrap().unwrap();c(this).unbind(".uniform");c(this).css("opacity","1");var d=c.inArray(c(a),c.uniform.elements);c.uniform.elements.splice(d,
1)})};c.uniform.noSelect=function(a){function d(){return false}c(a).each(function(){this.onselectstart=this.ondragstart=d;c(this).mousedown(d).css({MozUserSelect:"none"})})};c.uniform.update=function(a){if(a==undefined)a=c(c.uniform.elements);a=c(a);a.each(function(){var d=c(this);if(d.is("select")){var e=d.siblings("span"),f=d.parent("div");f.removeClass(b.hoverClass+" "+b.focusClass+" "+b.activeClass);e.html(d.find(":selected").html());d.is(":disabled")?f.addClass(b.disabledClass):f.removeClass(b.disabledClass)}else if(d.is(":checkbox")){e=
d.closest("span");f=d.closest("div");f.removeClass(b.hoverClass+" "+b.focusClass+" "+b.activeClass);e.removeClass(b.checkedClass);d.is(":checked")&&e.addClass(b.checkedClass);d.is(":disabled")?f.addClass(b.disabledClass):f.removeClass(b.disabledClass)}else if(d.is(":radio")){e=d.closest("span");f=d.closest("div");f.removeClass(b.hoverClass+" "+b.focusClass+" "+b.activeClass);e.removeClass(b.checkedClass);d.is(":checked")&&e.addClass(b.checkedClass);d.is(":disabled")?f.addClass(b.disabledClass):f.removeClass(b.disabledClass)}else if(d.is(":file")){f=
d.parent("div");e=d.siblings(b.filenameClass);btnTag=d.siblings(b.fileBtnClass);f.removeClass(b.hoverClass+" "+b.focusClass+" "+b.activeClass);e.text(d.val());d.is(":disabled")?f.addClass(b.disabledClass):f.removeClass(b.disabledClass)}else if(d.is(":submit")||d.is(":reset")||d.is("button")||d.is("a")||a.is("input[type=button]")){f=d.closest("div");f.removeClass(b.hoverClass+" "+b.focusClass+" "+b.activeClass);d.is(":disabled")?f.addClass(b.disabledClass):f.removeClass(b.disabledClass)}})};return this.each(function(){if(c.support.selectOpacity){var a=
c(this);if(a.is("select")){if(a.attr("multiple")!=true)if(a.attr("size")==undefined||a.attr("size")<=1)k(a)}else if(a.is(":checkbox"))doCheckbox(a);else if(a.is(":radio"))doRadio(a);else if(a.is(":file"))doFile(a);else if(a.is(":text, :password, input[type='email']")){$el=c(a);$el.addClass($el.attr("type"));i(a)}else if(a.is("textarea")){c(a).addClass("uniform");i(a)}else if(a.is("a")||a.is(":submit")||a.is(":reset")||a.is("button")||a.is("input[type=button]"))j(a)}})}})(jQuery);