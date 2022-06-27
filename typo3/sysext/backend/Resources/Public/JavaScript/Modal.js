/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */
var __importDefault=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};define(["require","exports","jquery","lit","./Enum/Severity","TYPO3/CMS/Core/Ajax/AjaxRequest","TYPO3/CMS/Core/SecurityUtility","./Icons","./Severity","bootstrap"],(function(t,e,a,n,s,l,i,o,d){"use strict";var r,c,u,f;a=__importDefault(a),function(t){t.modal=".t3js-modal",t.content=".t3js-modal-content",t.title=".t3js-modal-title",t.close=".t3js-modal-close",t.body=".t3js-modal-body",t.footer=".t3js-modal-footer",t.iframe=".t3js-modal-iframe",t.iconPlaceholder=".t3js-modal-icon-placeholder"}(r||(r={})),function(t){t.small="small",t.default="default",t.medium="medium",t.large="large",t.full="full"}(c||(c={})),function(t){t.default="default",t.light="light",t.dark="dark"}(u||(u={})),function(t){t.default="default",t.ajax="ajax",t.iframe="iframe"}(f||(f={}));class m{constructor(t){this.sizes=c,this.styles=u,this.types=f,this.currentModal=null,this.instances=[],this.$template=a.default('\n    <div class="t3js-modal modal fade">\n        <div class="modal-dialog">\n            <div class="t3js-modal-content modal-content">\n                <div class="modal-header">\n                    <h4 class="t3js-modal-title modal-title"></h4>\n                    <button class="t3js-modal-close close">\n                        <span aria-hidden="true">\n                            <span class="t3js-modal-icon-placeholder" data-icon="actions-close"></span>\n                        </span>\n                        <span class="sr-only"></span>\n                    </button>\n                </div>\n                <div class="t3js-modal-body modal-body"></div>\n                <div class="t3js-modal-footer modal-footer"></div>\n            </div>\n        </div>\n    </div>'),this.defaultConfiguration={type:f.default,title:"Information",content:"No content provided, please check your <code>Modal</code> configuration.",severity:s.SeverityEnum.notice,buttons:[],style:u.default,size:c.default,additionalCssClasses:[],callback:a.default.noop(),ajaxCallback:a.default.noop(),ajaxTarget:null},this.securityUtility=t,a.default(document).on("modal-dismiss",this.dismiss),this.initializeMarkupTrigger(document)}static resolveEventNameTargetElement(t){const e=t.target,a=t.currentTarget;return e.dataset&&e.dataset.eventName?e:a.dataset&&a.dataset.eventName?a:null}static createModalResponseEventFromElement(t,e){return t&&t.dataset.eventName?new CustomEvent(t.dataset.eventName,{bubbles:!0,detail:{result:e,payload:t.dataset.eventPayload||null}}):null}dismiss(){this.currentModal&&this.currentModal.modal("hide")}confirm(t,e,n=s.SeverityEnum.warning,l=[],i){return 0===l.length&&l.push({text:a.default(this).data("button-close-text")||TYPO3.lang["button.cancel"]||"Cancel",active:!0,btnClass:"btn-default",name:"cancel"},{text:a.default(this).data("button-ok-text")||TYPO3.lang["button.ok"]||"OK",btnClass:"btn-"+d.getCssClass(n),name:"ok"}),this.advanced({title:t,content:e,severity:n,buttons:l,additionalCssClasses:i,callback:t=>{t.on("button.clicked",t=>{"cancel"===t.target.getAttribute("name")?a.default(t.currentTarget).trigger("confirm.button.cancel"):"ok"===t.target.getAttribute("name")&&a.default(t.currentTarget).trigger("confirm.button.ok")})}})}loadUrl(t,e=s.SeverityEnum.info,a,n,l,i){return this.advanced({type:f.ajax,title:t,severity:e,buttons:a,ajaxCallback:l,ajaxTarget:i,content:n})}show(t,e,a=s.SeverityEnum.info,n,l){return this.advanced({type:f.default,title:t,content:e,severity:a,buttons:n,additionalCssClasses:l})}advanced(t){return t.type="string"==typeof t.type&&t.type in f?t.type:this.defaultConfiguration.type,t.title="string"==typeof t.title?t.title:this.defaultConfiguration.title,t.content="string"==typeof t.content||"object"==typeof t.content?t.content:this.defaultConfiguration.content,t.severity=void 0!==t.severity?t.severity:this.defaultConfiguration.severity,t.buttons=t.buttons||this.defaultConfiguration.buttons,t.size="string"==typeof t.size&&t.size in c?t.size:this.defaultConfiguration.size,t.style="string"==typeof t.style&&t.style in u?t.style:this.defaultConfiguration.style,t.additionalCssClasses=t.additionalCssClasses||this.defaultConfiguration.additionalCssClasses,t.callback="function"==typeof t.callback?t.callback:this.defaultConfiguration.callback,t.ajaxCallback="function"==typeof t.ajaxCallback?t.ajaxCallback:this.defaultConfiguration.ajaxCallback,t.ajaxTarget="string"==typeof t.ajaxTarget?t.ajaxTarget:this.defaultConfiguration.ajaxTarget,this.generate(t)}setButtons(t){const e=this.currentModal.find(r.footer);if(t.length>0){e.empty();for(let n=0;n<t.length;n++){const s=t[n],l=a.default("<button />",{class:"btn"});l.html("<span>"+this.securityUtility.encodeHtml(s.text,!1)+"</span>"),s.active&&l.addClass("t3js-active"),""!==s.btnClass&&l.addClass(s.btnClass),""!==s.name&&l.attr("name",s.name),s.action?l.on("click",()=>{e.find("button").not(l).addClass("disabled"),s.action.execute(l.get(0)).then(()=>{this.currentModal.modal("hide")})}):s.trigger&&l.on("click",s.trigger),s.dataAttributes&&Object.keys(s.dataAttributes).length>0&&Object.keys(s.dataAttributes).map(t=>{l.attr("data-"+t,s.dataAttributes[t])}),s.icon&&l.prepend('<span class="t3js-modal-icon-placeholder" data-icon="'+s.icon+'"></span>'),e.append(l)}e.show(),e.find("button").on("click",t=>{a.default(t.currentTarget).trigger("button.clicked")})}else e.hide();return this.currentModal}initializeMarkupTrigger(t){a.default(t).on("click",".t3js-modal-trigger",t=>{t.preventDefault();const e=a.default(t.currentTarget),n=e.data("bs-content")||"Are you sure?",l=void 0!==s.SeverityEnum[e.data("severity")]?s.SeverityEnum[e.data("severity")]:s.SeverityEnum.info;let i=e.data("url")||null;if(null!==i){const t=i.includes("?")?"&":"?";i=i+t+a.default.param({data:e.data()})}this.advanced({type:null!==i?f.ajax:f.default,title:e.data("title")||"Alert",content:null!==i?i:n,severity:l,buttons:[{text:e.data("button-close-text")||TYPO3.lang["button.close"]||"Close",active:!0,btnClass:"btn-default",trigger:()=>{this.currentModal.trigger("modal-dismiss");const e=m.resolveEventNameTargetElement(t),a=m.createModalResponseEventFromElement(e,!1);null!==a&&e.dispatchEvent(a)}},{text:e.data("button-ok-text")||TYPO3.lang["button.ok"]||"OK",btnClass:"btn-"+d.getCssClass(l),trigger:()=>{this.currentModal.trigger("modal-dismiss");const a=m.resolveEventNameTargetElement(t),n=m.createModalResponseEventFromElement(a,!0);null!==n&&a.dispatchEvent(n);let s=e.attr("data-uri")||e.data("href")||e.attr("href");s&&"#"!==s&&(t.target.ownerDocument.location.href=s)}}]})})}generate(t){const e=this.$template.clone();if(t.additionalCssClasses.length>0)for(let a of t.additionalCssClasses)e.addClass(a);if(e.addClass("modal-type-"+t.type),e.addClass("modal-severity-"+d.getCssClass(t.severity)),e.addClass("modal-style-"+t.style),e.addClass("modal-size-"+t.size),e.attr("tabindex","-1"),e.find(r.title).text(t.title),e.find(r.close).on("click",()=>{e.modal("hide")}),"ajax"===t.type){const a=t.ajaxTarget?t.ajaxTarget:r.body,s=e.find(a);o.getIcon("spinner-circle",o.sizes.default,null,null,o.markupIdentifiers.inline).then(e=>{s.html('<div class="modal-loading">'+e+"</div>"),new l(t.content).get().finally(async()=>{this.currentModal.parent().length||this.currentModal.appendTo("body")}).then(async e=>{const n=await e.raw().text();this.currentModal.find(a).empty().append(n),t.ajaxCallback&&t.ajaxCallback(),this.currentModal.trigger("modal-loaded")}).catch(async e=>{const s=await e.raw().text(),l=this.currentModal.find(a).empty();s?l.append(s):n.render(n.html`<p><strong>Oops, received a ${e.response.status} response from </strong> <span class="text-break">${t.content}</span>.</p>`,l[0])})})}else"iframe"===t.type?(e.find(r.body).append(a.default("<iframe />",{src:t.content,name:"modal_frame",class:"modal-iframe t3js-modal-iframe"})),e.find(r.iframe).on("load",()=>{e.find(r.title).text(e.find(r.iframe).get(0).contentDocument.title)})):("string"==typeof t.content&&(t.content=a.default("<p />").html(this.securityUtility.encodeHtml(t.content))),e.find(r.body).append(t.content));return e.on("shown.bs.modal",t=>{const e=a.default(t.currentTarget),n=e.prev(".modal-backdrop"),s=1e3+10*this.instances.length,l=s-10;e.css("z-index",s),n.css("z-index",l),e.find(r.footer).find(".t3js-active").first().focus(),e.find(r.iconPlaceholder).each((t,e)=>{o.getIcon(a.default(e).data("icon"),o.sizes.small,null,null,o.markupIdentifiers.inline).then(t=>{this.currentModal.find(r.iconPlaceholder+"[data-icon="+a.default(t).data("identifier")+"]").replaceWith(t)})})}),e.on("hide.bs.modal",()=>{if(this.instances.length>0){const t=this.instances.length-1;this.instances.splice(t,1),this.currentModal=this.instances[t-1]}}),e.on("hidden.bs.modal",t=>{e.trigger("modal-destroyed"),a.default(t.currentTarget).remove(),this.instances.length>0&&a.default("body").addClass("modal-open")}),e.on("show.bs.modal",e=>{this.currentModal=a.default(e.currentTarget),this.setButtons(t.buttons),this.instances.push(this.currentModal)}),e.on("modal-dismiss",t=>{a.default(t.currentTarget).modal("hide")}),t.callback&&t.callback(e),e.modal("show"),e}}let g=null;try{parent&&parent.window.TYPO3&&parent.window.TYPO3.Modal?(parent.window.TYPO3.Modal.initializeMarkupTrigger(document),g=parent.window.TYPO3.Modal):top&&top.TYPO3.Modal&&(top.TYPO3.Modal.initializeMarkupTrigger(document),g=top.TYPO3.Modal)}catch(t){}return g||(g=new m(new i),TYPO3.Modal=g),g}));