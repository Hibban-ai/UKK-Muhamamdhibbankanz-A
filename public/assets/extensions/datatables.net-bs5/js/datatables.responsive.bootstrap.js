/*! Bootstrap integration for DataTables' Responsive
 * © SpryMedia Ltd - datatables.net/license
 */
!function(a){"function"==typeof define&&define.amd?define(["jquery","datatables.net-bs","datatables.net-responsive"],function(e){return a(e,window,document)}):"object"==typeof exports?module.exports=function(e,d){return e=e||window,(d=d||("undefined"!=typeof window?require("jquery"):require("jquery")(e))).fn.dataTable||require("datatables.net-bs")(e,d),d.fn.dataTable||require("datatables.net-responsive")(e,d),a(d,0,e.document)}:a(jQuery,window,document)}(function(i,e,d,a){"use strict";var n=i.fn.dataTable,t=n.Responsive.display,s=t.modal,l=i('<div class="modal fade dtr-bs-modal" role="dialog"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"/></div></div></div>');return t.modal=function(o){return function(e,d,a){var n,t;i.fn.modal?d||(o&&o.header&&(t=(n=l.find("div.modal-header")).find("button").detach(),n.empty().append('<h4 class="modal-title">'+o.header(e)+"</h4>").prepend(t)),l.find("div.modal-body").empty().append(a()),l.appendTo("body").modal()):s(e,d,a)}},n});
