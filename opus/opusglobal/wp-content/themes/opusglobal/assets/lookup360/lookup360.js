(function (alacra, undefined) {

    YAHOO.widget.AutoComplete.prototype._onTextboxKeyPress =
    function (v, oSelf) {
        var nKeyCode = v.keyCode;
        switch (nKeyCode) {
            case 13:
                if (oSelf._oCurItem) {
                    if (oSelf.delimChar && (oSelf._nKeyCode != nKeyCode)) {
                        if (oSelf._bContainerOpen) {
                            YAHOO.util.Event.stopEvent(v);
                        }
                    }
                    oSelf._selectItem(oSelf._oCurItem);
                }
                else {
                    oSelf._selectItem(oSelf._elList.firstChild);
                    YAHOO.util.Event.stopEvent(v);
                }
                break;
            default:
                break;
        }
    };


    alacra.autocomplete = function(A, B, C, D, E, F, G) {
        //A : AutoComplete input field id
        //B : AutoComplete div id
        //C : function for formatting results
        //D : callback for a selected item from autocomplete list 
        //E : event id
        //F : function for url
        //G : field list
        // .... optional
        //H : header_row_html
        //I : buffer size in pixels around results container
        //J : result row height in pixels
        //K : max result rows to display
        //L : turn off auto-adjust height
        //M : max result rows to retrieve
        //N : result container left position (pixels)
        //O : result container top position (pixels)
        //P : disable auto select

        var H = "<span style='padding-left:10px;'>Ticker</span><span style='position:absolute; padding-left:55px;'>Name</span>";
        if (arguments.length >= 8) {
            H = arguments[7];
        }

        var resultContainerBufferSize = 10;
        if (arguments.length >= 9) {
            resultContainerBufferSize = arguments[8];
        }

        var resultRowHeight = 20;
        if (arguments.length >= 10) {
            resultRowHeight = arguments[9];
        }

        var maxResultRowsToShow = 14;
        if (arguments.length >= 11) {
            maxResultRowsToShow = arguments[10];
        }

        var autoHeightOff = false;
        if (arguments.length >= 12) {
            autoHeightOff = arguments[11];
        }

        var maxResultsToRetrieve = 20;
        if (arguments.length >= 13) {
            maxResultsToRetrieve = arguments[12];
        }

        var containerLeft = 470;
        if (arguments.length >= 14) {
            containerLeft = arguments[13];
        }

        var containerTop = 64;
        if (arguments.length >= 15) {
            containerTop = arguments[14];
        }

        var P = true;
        if (arguments.length >= 16) {
            P = arguments[15];
        }

        var oDS = new YAHOO.util.XHRDataSource( lookup360_endpoint.ajaxurl );
        oDS.responseSchema = {
            resultsList: "RESULTS",
            resultNode: "RESULT",
            fields: G
        };
        oDS.responseType = YAHOO.util.XHRDataSource.TYPE_XML;

        var oAC = new YAHOO.widget.AutoComplete(A, B, oDS);
        oAC.autoHighlight = P;
        oAC.queryDelay = 0;
        oAC.suppressInputUpdate = true;
        oAC.resultTypeList = false;
        oAC.maxResultsDisplayed = maxResultsToRetrieve;
        oAC.generateRequest = function(sQuery) {
            return "request=" + F(E) + "&token=" + sQuery + "&isoencoding=y";
        };
        oAC.formatResult = function(oResultData, sQuery) {
            return C(oResultData, sQuery)
        };
        if (H.length > 0) {
            oAC.setHeader(H);
        }
        oAC.itemSelectEvent.subscribe(function(sType, aArgs) {
            var oData = aArgs[2]; // object literal of selected item's result data
            if (E && E > 0)
                D(oData, E);
            else
                D(oData);
        });
        oAC.doBeforeExpandContainer = function(elTxtBox, elContainer, sQuery, aResults) {
            if (!autoHeightOff) {
                var newheight = resultContainerBufferSize;
                if (aResults.length <= maxResultRowsToShow) {
                    newheight += (aResults.length * resultRowHeight);
                } else {
                    newheight += (maxResultRowsToShow * resultRowHeight);
                }
                elContainer.style.height = newheight + "px";
                elContainer.style.left = containerLeft + "px";
                elContainer.style.top = containerTop + "px";
            }
            return true;
        }
        YAHOO.util.Event.on('keyword', 'paste', function (e) {
            // We're interested in the value of the input field after text is pasted into
            // it instead of the pasted text because the autocomplete proposals are based 
            // upon the field's whole value. The paste event happens before the input 
            // field has been updated so we need to wait until after this event has been 
            // handled to check the value of the input field.
            window.setTimeout(function () {
                if (oAC._sInitInputValue !== oAC.getInputEl().value) {
                    oAC.sendQuery(oAC.getInputEl().value);
                }
            }, 1);
        }, this);        
        return {
            oDS: oDS,
            oAC: oAC
        };
    };

} (window.alacra = window.alacra || {}));

function get_autocomplete_url(x) {
    return x;
}
function escapeHtml(str) {
    var div = document.createElement('div');
    div.appendChild(document.createTextNode(str));
    return div.innerHTML;
}
function ClearKeywordSearch() {
    var kw = document.getElementById('keyword');
    if (kw && kw.value == 'Enter an entity name or identifier (e.g LEI, GIIN, CIK)') {
        kw.value = '';
    }
}
function format_autocomplete_result(aResultItem, sQuery) {
    var alacraid = aResultItem.alacraid;
    var entityname = aResultItem.entityname;
    var cntry = aResultItem.country;
    var city = aResultItem.city;
    var matchedfield = aResultItem.matchedfield;
    var fullmatchedvalue = aResultItem.fullmatchedvalue;
    var name_display = "";
    var aMarkup;
/*
    if (entityname.length > 90) {
        entityname = entityname.substring(0, 86) + '... '
    }
*/
    if (entityname.length > 90) {
        name_display = "display:inline-block;";
    }
    
    if (fullmatchedvalue.length > 27) {
        fullmatchedvalue = fullmatchedvalue.substring(0, 24) + '...'
    }

    sIdLeader = '';
    sIdQuery = "&#160;";
    sIdRemainder = '';

    sField = matchedfield;

    if (matchedfield == 'name') {
        pos = entityname.toUpperCase().indexOf(sQuery.toUpperCase())
        pos1 = entityname.toUpperCase().indexOf(' ' + sQuery.toUpperCase())
        if ((pos >= 0) || (pos1 > 0)) {
            if (pos >= 0) {
                sNameLeader = entityname.substr(0, pos);
                sNameQuery = entityname.substr(pos, sQuery.length);
                sNameRemainder = entityname.substr(pos + sQuery.length);
            } else {
                sNameLeader = entityname.substr(0, pos1);
                sNameQuery = entityname.substr(pos1, sQuery.length + 1);
                sNameRemainder = entityname.substr(pos1 + sQuery.length + 1);
            }
        } else {
            sNameLeader = '';
            sNameQuery = '';
            sNameRemainder = entityname;
        }
        sField = '';
    } else {
        sNameLeader = entityname.substr(0, sQuery.length);
        sNameQuery = "";
        sNameRemainder = entityname.substr(sQuery.length);

        if (matchedfield.indexOf('name') >= 0 || matchedfield == 'alias') { // alias/former name
            pos = fullmatchedvalue.toUpperCase().indexOf(sQuery.toUpperCase())
            pos1 = fullmatchedvalue.toUpperCase().indexOf(' ' + sQuery.toUpperCase())
            if ((pos >= 0) || (pos1 > 0)) {
                if (pos >= 0) {
                    sIdLeader = fullmatchedvalue.substr(0, pos);
                    sIdQuery = fullmatchedvalue.substr(pos, sQuery.length);
                    sIdRemainder = fullmatchedvalue.substr(pos + sQuery.length);
                } else {
                    sIdLeader = fullmatchedvalue.substr(0, pos1);
                    sIdQuery = fullmatchedvalue.substr(pos1, sQuery.length + 1);
                    sIdRemainder = fullmatchedvalue.substr(pos1 + sQuery.length + 1);
                }
            } else {
                sIdLeader = '';
                sIdQuery = '';
                sIdRemainder = fullmatchedvalue;
            }
        } else { // identifiers
            var idindex = fullmatchedvalue.indexOf(sQuery.toUpperCase())
            if (idindex >= 0) {
                if (idindex > 0) sIdLeader = fullmatchedvalue.substr(0, idindex);
                else sIdLeader = '';
                sIdQuery = fullmatchedvalue.substr(idindex, sQuery.length); // the query in a fullmatchedvalue
                sIdRemainder = fullmatchedvalue.substr(idindex + sQuery.length); // the rest of the fullmatchedvalue
            } else {
                if (fullmatchedvalue.length != 0)
                    sIdRemainder = fullmatchedvalue;
            }
            if (matchedfield == 'BIC') {
                sIdLeader = new Array(sIdLeader.length + 1).join('X');
                sIdRemainder = new Array(sIdRemainder.length + 1).join('X');
            }
        }
    }

    aMarkup = ['<div id="ysearchresult">',
								'<span style="white-space:normal;width:430px;' + name_display + '">',
								sNameLeader,
								'<span style="color:#b5121a;font-weight:900">',
								sNameQuery,
								'</span>',
								sNameRemainder,
								'</span>',
								'<span style="color:#b5121a;font-weight:900;position:absolute;left:450px">',
								sField,
								'</span>',
								'<span style="position:absolute;left:510px;font-weight:900"> ',
								sIdLeader,
								'<span style="color:#b5121a;">',
								sIdQuery,
								'</span>',
								sIdRemainder,
								'</span>',
								'<span style="position:absolute;left:700px">',
								cntry,
								'</span>',
								'<span style="position:absolute;left:800px">',
								city,
								'</span>',
								'</div>'];
    var div = aMarkup.join("");
    return (div);
}

function linkNavigateTo(url, local) {
    var event;
    if (document.createEvent) {
        event = document.createEvent("MouseEvents");
        event.initEvent("click", true, true);
    }

    var target = local == true ? "" : "target='_blank'";
    var anchor = $("<a " + target + " style='display:none;' class='_internal'>link</a>")
							.attr("href", url)
							.appendTo(document.body)
							.bind("click", function () {
							    anchor.remove();
							    return true;
							});

    var xAnchor = $("._internal").get(0);
    if (typeof event != "undefined")
        xAnchor.dispatchEvent(event);
    else if (xAnchor.click)
        xAnchor.click();
}

function select_autocomplete_result(o) {
    var url = "http://resolve.alacra.com/html-report/" + o.alacraid;
    var style = "directories=no,menubar=no,toolbar=yes,resizable=yes,scrollbars=yes,status=no,width=1000,height=700";
    var winName = "viewReport" + Math.floor(Math.random() * 100000);
    var hWnd = window.open(url, winName, style);
    if (hWnd != null) {
        if (hWnd.opener == null) {
            hWnd.opener = self;
            window.name = winName;
            hWnd.location.href = url;
        }
    }
    
    //linkNavigateTo(url, false);
}

/*
jQuery(document).keypress(function (e) {
    if (e.which == 13) {
        //alert('Please select a company from the drop down list below!');
        $("#ysearchresult").trigger("click");
        return false;
    }
});
*/

jQuery(function() {
var aa = new alacra.autocomplete('entity-keyword', 'entity-results', format_autocomplete_result, select_autocomplete_result, 'Lookup360', get_autocomplete_url, ["alacraid", "entityname", "country", "city", "matchedfield", "fullmatchedvalue"], '', 10, 20, 20, true, 20, 10, 64, false);
});

