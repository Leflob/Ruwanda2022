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
var __importDefault=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};define(["require","exports","./Enum/Severity","jquery","./Modal","TYPO3/CMS/Core/SecurityUtility","bootstrap"],(function(t,e,n,o,i,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.GridEditor=void 0,o=__importDefault(o),r=__importDefault(r);class a{constructor(t=null){this.colCount=1,this.rowCount=1,this.readOnly=!1,this.nameLabel="name",this.columnLabel="column label",this.defaultCell={spanned:0,rowspan:1,colspan:1,name:"",colpos:"",column:void 0},this.selectorEditor=".t3js-grideditor",this.selectorAddColumn=".t3js-grideditor-addcolumn",this.selectorRemoveColumn=".t3js-grideditor-removecolumn",this.selectorAddRowTop=".t3js-grideditor-addrow-top",this.selectorRemoveRowTop=".t3js-grideditor-removerow-top",this.selectorAddRowBottom=".t3js-grideditor-addrow-bottom",this.selectorRemoveRowBottom=".t3js-grideditor-removerow-bottom",this.selectorLinkEditor=".t3js-grideditor-link-editor",this.selectorLinkExpandRight=".t3js-grideditor-link-expand-right",this.selectorLinkShrinkLeft=".t3js-grideditor-link-shrink-left",this.selectorLinkExpandDown=".t3js-grideditor-link-expand-down",this.selectorLinkShrinkUp=".t3js-grideditor-link-shrink-up",this.selectorConfigPreview=".t3js-grideditor-preview-config",this.selectorPreviewArea=".t3js-tsconfig-preview-area",this.selectorCodeMirror=".t3js-grideditor-preview-config .CodeMirror",this.modalButtonClickHandler=t=>{const e=t.target;"cancel"===e.name?i.currentModal.trigger("modal-dismiss"):"ok"===e.name&&(this.setName(i.currentModal.find(".t3js-grideditor-field-name").val(),i.currentModal.data("col"),i.currentModal.data("row")),this.setColumn(i.currentModal.find(".t3js-grideditor-field-colpos").val(),i.currentModal.data("col"),i.currentModal.data("row")),this.drawTable(),this.writeConfig(this.export2LayoutRecord()),i.currentModal.trigger("modal-dismiss"))},this.addColumnHandler=t=>{t.preventDefault(),this.addColumn(),this.drawTable(),this.writeConfig(this.export2LayoutRecord())},this.removeColumnHandler=t=>{t.preventDefault(),this.removeColumn(),this.drawTable(),this.writeConfig(this.export2LayoutRecord())},this.addRowTopHandler=t=>{t.preventDefault(),this.addRowTop(),this.drawTable(),this.writeConfig(this.export2LayoutRecord())},this.addRowBottomHandler=t=>{t.preventDefault(),this.addRowBottom(),this.drawTable(),this.writeConfig(this.export2LayoutRecord())},this.removeRowTopHandler=t=>{t.preventDefault(),this.removeRowTop(),this.drawTable(),this.writeConfig(this.export2LayoutRecord())},this.removeRowBottomHandler=t=>{t.preventDefault(),this.removeRowBottom(),this.drawTable(),this.writeConfig(this.export2LayoutRecord())},this.linkEditorHandler=t=>{t.preventDefault();const e=o.default(t.target);this.showOptions(e.data("col"),e.data("row"))},this.linkExpandRightHandler=t=>{t.preventDefault();const e=o.default(t.target);this.addColspan(e.data("col"),e.data("row")),this.drawTable(),this.writeConfig(this.export2LayoutRecord())},this.linkShrinkLeftHandler=t=>{t.preventDefault();const e=o.default(t.target);this.removeColspan(e.data("col"),e.data("row")),this.drawTable(),this.writeConfig(this.export2LayoutRecord())},this.linkExpandDownHandler=t=>{t.preventDefault();const e=o.default(t.target);this.addRowspan(e.data("col"),e.data("row")),this.drawTable(),this.writeConfig(this.export2LayoutRecord())},this.linkShrinkUpHandler=t=>{t.preventDefault();const e=o.default(t.target);this.removeRowspan(e.data("col"),e.data("row")),this.drawTable(),this.writeConfig(this.export2LayoutRecord())};const e=o.default(this.selectorEditor);this.colCount=e.data("colcount"),this.rowCount=e.data("rowcount"),this.readOnly=e.data("readonly"),this.field=o.default('input[name="'+e.data("field")+'"]'),this.data=e.data("data"),this.nameLabel=null!==t?t.nameLabel:"Name",this.columnLabel=null!==t?t.columnLabel:"Column",this.targetElement=o.default(this.selectorEditor),this.initializeEvents(),this.addVisibilityObserver(e.get(0)),this.drawTable(),this.writeConfig(this.export2LayoutRecord())}static stripMarkup(t){return(new r.default).stripHtml(t)}initializeEvents(){this.readOnly||(o.default(document).on("click",this.selectorAddColumn,this.addColumnHandler),o.default(document).on("click",this.selectorRemoveColumn,this.removeColumnHandler),o.default(document).on("click",this.selectorAddRowTop,this.addRowTopHandler),o.default(document).on("click",this.selectorAddRowBottom,this.addRowBottomHandler),o.default(document).on("click",this.selectorRemoveRowTop,this.removeRowTopHandler),o.default(document).on("click",this.selectorRemoveRowBottom,this.removeRowBottomHandler),o.default(document).on("click",this.selectorLinkEditor,this.linkEditorHandler),o.default(document).on("click",this.selectorLinkExpandRight,this.linkExpandRightHandler),o.default(document).on("click",this.selectorLinkShrinkLeft,this.linkShrinkLeftHandler),o.default(document).on("click",this.selectorLinkExpandDown,this.linkExpandDownHandler),o.default(document).on("click",this.selectorLinkShrinkUp,this.linkShrinkUpHandler))}getNewCell(){return o.default.extend({},this.defaultCell)}writeConfig(t){this.field.val(t);const e=t.split("\n");let n="";for(const t of e)t&&(n+="\t\t\t"+t+"\n");let i="mod.web_layout.BackendLayouts {\n  exampleKey {\n    title = Example\n    icon = EXT:example_extension/Resources/Public/Images/BackendLayouts/default.gif\n    config {\n"+n.replace(new RegExp("\t","g"),"  ")+"    }\n  }\n}\n";o.default(this.selectorConfigPreview).find(this.selectorPreviewArea).empty().append(i);const r=document.querySelector(this.selectorCodeMirror);r&&r.CodeMirror.setValue(i)}addRowTop(){const t=[];for(let e=0;e<this.colCount;e++){const n=this.getNewCell();n.name=e+"x"+this.data.length,t[e]=n}this.data.unshift(t),this.rowCount++}addRowBottom(){const t=[];for(let e=0;e<this.colCount;e++){const n=this.getNewCell();n.name=e+"x"+this.data.length,t[e]=n}this.data.push(t),this.rowCount++}removeRowTop(){if(this.rowCount<=1)return!1;const t=[];for(let e=1;e<this.rowCount;e++)t.push(this.data[e]);for(let t=0;t<this.colCount;t++)1===this.data[0][t].spanned&&this.findUpperCellWidthRowspanAndDecreaseByOne(t,0);return this.data=t,this.rowCount--,!0}removeRowBottom(){if(this.rowCount<=1)return!1;const t=[];for(let e=0;e<this.rowCount-1;e++)t.push(this.data[e]);for(let t=0;t<this.colCount;t++)1===this.data[this.rowCount-1][t].spanned&&this.findUpperCellWidthRowspanAndDecreaseByOne(t,this.rowCount-1);return this.data=t,this.rowCount--,!0}findUpperCellWidthRowspanAndDecreaseByOne(t,e){const n=this.getCell(t,e-1);return!!n&&(1===n.spanned?this.findUpperCellWidthRowspanAndDecreaseByOne(t,e-1):n.rowspan>1&&this.removeRowspan(t,e-1),!0)}removeColumn(){if(this.colCount<=1)return!1;const t=[];for(let e=0;e<this.rowCount;e++){const n=[];for(let t=0;t<this.colCount-1;t++)n.push(this.data[e][t]);1===this.data[e][this.colCount-1].spanned&&this.findLeftCellWidthColspanAndDecreaseByOne(this.colCount-1,e),t.push(n)}return this.data=t,this.colCount--,!0}findLeftCellWidthColspanAndDecreaseByOne(t,e){const n=this.getCell(t-1,e);return!!n&&(1===n.spanned?this.findLeftCellWidthColspanAndDecreaseByOne(t-1,e):n.colspan>1&&this.removeColspan(t-1,e),!0)}addColumn(){for(let t=0;t<this.rowCount;t++){const e=this.getNewCell();e.name=this.colCount+"x"+t,this.data[t].push(e)}this.colCount++}drawTable(){const t=o.default("<colgroup>");for(let e=0;e<this.colCount;e++){const e=100/this.colCount;t.append(o.default("<col>").css({width:parseInt(e.toString(),10)+"%"}))}const e=o.default('<table id="base" class="table editor">');e.append(t);for(let t=0;t<this.rowCount;t++){if(0===this.data[t].length)continue;const n=o.default("<tr>");for(let e=0;e<this.colCount;e++){const i=this.data[t][e];if(1===i.spanned)continue;const r=100/this.rowCount,l=100/this.colCount,s=o.default("<td>").css({height:parseInt(r.toString(),10)*i.rowspan+"%",width:parseInt(l.toString(),10)*i.colspan+"%"});if(!this.readOnly){const n=o.default('<div class="cell_container">');s.append(n);const i=o.default('<a href="#" data-col="'+e+'" data-row="'+t+'">');n.append(i.clone().attr("class","t3js-grideditor-link-editor link link_editor").attr("title",TYPO3.lang.grid_editCell)),this.cellCanSpanRight(e,t)&&n.append(i.clone().attr("class","t3js-grideditor-link-expand-right link link_expand_right").attr("title",TYPO3.lang.grid_mergeCell)),this.cellCanShrinkLeft(e,t)&&n.append(i.clone().attr("class","t3js-grideditor-link-shrink-left link link_shrink_left").attr("title",TYPO3.lang.grid_splitCell)),this.cellCanSpanDown(e,t)&&n.append(i.clone().attr("class","t3js-grideditor-link-expand-down link link_expand_down").attr("title",TYPO3.lang.grid_mergeCell)),this.cellCanShrinkUp(e,t)&&n.append(i.clone().attr("class","t3js-grideditor-link-shrink-up link link_shrink_up").attr("title",TYPO3.lang.grid_splitCell))}s.append(o.default('<div class="cell_data">').html(TYPO3.lang.grid_name+": "+(i.name?a.stripMarkup(i.name):TYPO3.lang.grid_notSet)+"<br />"+TYPO3.lang.grid_column+": "+(void 0===i.column||isNaN(i.column)?TYPO3.lang.grid_notSet:parseInt(i.column,10)))),i.colspan>1&&s.attr("colspan",i.colspan),i.rowspan>1&&s.attr("rowspan",i.rowspan),n.append(s)}e.append(n)}o.default(this.targetElement).empty().append(e)}setName(t,e,n){const o=this.getCell(e,n);return!!o&&(o.name=a.stripMarkup(t),!0)}setColumn(t,e,n){const o=this.getCell(e,n);return!!o&&(o.column=parseInt(t.toString(),10),!0)}showOptions(t,e){const r=this.getCell(t,e);if(!r)return!1;let l;l=0===r.column?0:r.column?parseInt(r.column.toString(),10):"";const s=o.default("<div>"),d=o.default('<div class="form-group">'),c=o.default("<label>"),h=o.default("<input>");s.append([d.clone().append([c.clone().text(TYPO3.lang.grid_nameHelp),h.clone().attr("type","text").attr("class","t3js-grideditor-field-name form-control").attr("name","name").val(a.stripMarkup(r.name)||"")]),d.clone().append([c.clone().text(TYPO3.lang.grid_columnHelp),h.clone().attr("type","text").attr("class","t3js-grideditor-field-colpos form-control").attr("name","column").val(l)])]);const u=i.show(TYPO3.lang.grid_windowTitle,s,n.SeverityEnum.notice,[{active:!0,btnClass:"btn-default",name:"cancel",text:o.default(this).data("button-close-text")||TYPO3.lang["button.cancel"]||"Cancel"},{btnClass:"btn-primary",name:"ok",text:o.default(this).data("button-ok-text")||TYPO3.lang["button.ok"]||"OK"}]);return u.data("col",t),u.data("row",e),u.on("button.clicked",this.modalButtonClickHandler),!0}getCell(t,e){return!(t>this.colCount-1)&&(!(e>this.rowCount-1)&&(this.data.length>e-1&&this.data[e].length>t-1?this.data[e][t]:null))}cellCanSpanRight(t,e){if(t===this.colCount-1)return!1;const n=this.getCell(t,e);let o;if(n.rowspan>1){for(let i=e;i<e+n.rowspan;i++)if(o=this.getCell(t+n.colspan,i),!o||1===o.spanned||o.colspan>1||o.rowspan>1)return!1}else if(o=this.getCell(t+n.colspan,e),!o||1===n.spanned||1===o.spanned||o.colspan>1||o.rowspan>1)return!1;return!0}cellCanSpanDown(t,e){if(e===this.rowCount-1)return!1;const n=this.getCell(t,e);let o;if(n.colspan>1){for(let i=t;i<t+n.colspan;i++)if(o=this.getCell(i,e+n.rowspan),!o||1===o.spanned||o.colspan>1||o.rowspan>1)return!1}else if(o=this.getCell(t,e+n.rowspan),!o||1===n.spanned||1===o.spanned||o.colspan>1||o.rowspan>1)return!1;return!0}cellCanShrinkLeft(t,e){return this.data[e][t].colspan>1}cellCanShrinkUp(t,e){return this.data[e][t].rowspan>1}addColspan(t,e){const n=this.getCell(t,e);if(!n||!this.cellCanSpanRight(t,e))return!1;for(let o=e;o<e+n.rowspan;o++)this.data[o][t+n.colspan].spanned=1;return n.colspan+=1,!0}addRowspan(t,e){const n=this.getCell(t,e);if(!n||!this.cellCanSpanDown(t,e))return!1;for(let o=t;o<t+n.colspan;o++)this.data[e+n.rowspan][o].spanned=1;return n.rowspan+=1,!0}removeColspan(t,e){const n=this.getCell(t,e);if(!n||!this.cellCanShrinkLeft(t,e))return!1;n.colspan-=1;for(let o=e;o<e+n.rowspan;o++)this.data[o][t+n.colspan].spanned=0;return!0}removeRowspan(t,e){const n=this.getCell(t,e);if(!n||!this.cellCanShrinkUp(t,e))return!1;n.rowspan-=1;for(let o=t;o<t+n.colspan;o++)this.data[e+n.rowspan][o].spanned=0;return!0}export2LayoutRecord(){let t="backend_layout {\n\tcolCount = "+this.colCount+"\n\trowCount = "+this.rowCount+"\n\trows {\n";for(let e=0;e<this.rowCount;e++){t+="\t\t"+(e+1)+" {\n",t+="\t\t\tcolumns {\n";let n=0;for(let o=0;o<this.colCount;o++){const i=this.getCell(o,e);if(i&&!i.spanned){const r=a.stripMarkup(i.name)||"";n++,t+="\t\t\t\t"+n+" {\n",t+="\t\t\t\t\tname = "+(r||o+"x"+e)+"\n",i.colspan>1&&(t+="\t\t\t\t\tcolspan = "+i.colspan+"\n"),i.rowspan>1&&(t+="\t\t\t\t\trowspan = "+i.rowspan+"\n"),"number"==typeof i.column&&(t+="\t\t\t\t\tcolPos = "+i.column+"\n"),t+="\t\t\t\t}\n"}}t+="\t\t\t}\n",t+="\t\t}\n"}return t+="\t}\n}\n",t}addVisibilityObserver(t){null===t.offsetParent&&new IntersectionObserver((t,e)=>{t.forEach(t=>{const e=document.querySelector(this.selectorCodeMirror);t.intersectionRatio>0&&e&&e.CodeMirror.refresh()})}).observe(t)}}e.GridEditor=a}));