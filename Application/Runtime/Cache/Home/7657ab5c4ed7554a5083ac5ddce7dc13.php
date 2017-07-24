<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html dir="ltr" mozdisallowselectionprint moznomarginboxes>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>在线浏览</title>
    <link rel="stylesheet" type="text/css" href="/Public/Pdfconfig/viewer.css" />
    <script type="text/javascript" src="/Public/Pdfconfig/compatibility.js"></script>
    
    <script type="text/javascript" src="/Public/Pdfconfig/l10n.js"></script>
    <script type="text/javascript" src="/Public/Js/pdf.js"></script>
    <script type="text/javascript" src="/Public/Js/pdf.worker.js"></script>
    <script type="text/javascript" src="/Public/Pdfconfig/debugger.js"></script>
  </head>
  <!--防止复制文字-->
  <script language="Javascript">
      document.oncontextmenu=new Function("event.returnValue=false");
      document.onselectstart=new Function("event.returnValue=false");
  </script>

  <body tabindex="1" class="loadingInProgress" style="background:url('/Public/Images/look_bg.jpg');">
    <div id="outerContainer">
	<div style="text-align:center;clear:both">
    </div>
      <div id="sidebarContainer">
        <div id="toolbarSidebar">
          <div class="splitToolbarButton toggled">
            <button id="viewThumbnail" class="toolbarButton group toggled" title="显示页面" tabindex="2" data-l10n-id="thumbs">
              <span data-l10n-id="thumbs_label">显示页面</span>
            </button>
            <button id="viewOutline" class="toolbarButton group" title="Show Document Outline" tabindex="3" data-l10n-id="outline" style="display: none">
              <span data-l10n-id="outline_label"></span>
            </button>
            <button id="viewAttachments" class="toolbarButton group" title="打开附件" tabindex="4" data-l10n-id="attachments">
              <span data-l10n-id="attachments_label">打开附件</span>
            </button>
          </div>
        </div>
        <div id="sidebarContent">
          <div id="thumbnailView">
          </div>
          <div id="outlineView" class="hidden">
          </div>
          <div id="attachmentsView" class="hidden">
          </div>
        </div>
      </div>

      <div id="mainContainer">
        <div class="findbar hidden doorHanger hiddenSmallView" id="findbar">
          <label for="findInput" class="toolbarLabel" data-l10n-id="find_label">搜索</label>
          <input id="findInput" class="toolbarField" tabindex="91">
          <div class="splitToolbarButton">
            <button class="toolbarButton findPrevious" title="上一页" id="findPrevious" tabindex="92" data-l10n-id="find_previous">
              <span data-l10n-id="find_previous_label">上一页</span>
            </button>
            <div class="splitToolbarButtonSeparator"></div>
            <button class="toolbarButton findNext" title="下一页" id="findNext" tabindex="93" data-l10n-id="find_next">
              <span data-l10n-id="find_next_label">下一页</span>
            </button>
          </div>
          <input type="checkbox" id="findHighlightAll" class="toolbarField">
          <label for="findHighlightAll" class="toolbarLabel" tabindex="94" data-l10n-id="find_highlight">高亮所有</label>
          <input type="checkbox" id="findMatchCase" class="toolbarField">
          <label for="findMatchCase" class="toolbarLabel" tabindex="95" data-l10n-id="find_match_case_label">匹配选项</label>
          <span id="findMsg" class="toolbarLabel"></span>
        </div>

        <div id="secondaryToolbar" class="secondaryToolbar hidden doorHangerRight">
          <div id="secondaryToolbarButtonContainer">
            <button id="secondaryPresentationMode" class="secondaryToolbarButton presentationMode visibleLargeView" title="显示模式" tabindex="51" data-l10n-id="presentation_mode">
              <span data-l10n-id="presentation_mode_label">显示模式</span>
            </button>

            <button id="secondaryOpenFile" class="secondaryToolbarButton openFile visibleLargeView" title="打开" tabindex="52" data-l10n-id="open_file">
              <span data-l10n-id="open_file_label">打开</span>
            </button>
            <div class="horizontalToolbarSeparator visibleLargeView"></div>

            <button id="firstPage" class="secondaryToolbarButton firstPage" title="跳转至首页" tabindex="56" data-l10n-id="first_page">
              <span data-l10n-id="first_page_label">跳转至首页</span>
            </button>
            <button id="lastPage" class="secondaryToolbarButton lastPage" title="跳转至尾页" tabindex="57" data-l10n-id="last_page">
              <span data-l10n-id="last_page_label">跳转至尾页</span>
            </button>

            <div class="horizontalToolbarSeparator"></div>

            <button id="pageRotateCw" class="secondaryToolbarButton rotateCw" title="顺时针旋转" tabindex="58" data-l10n-id="page_rotate_cw">
              <span data-l10n-id="page_rotate_cw_label">顺时针旋转</span>
            </button>
            <button id="pageRotateCcw" class="secondaryToolbarButton rotateCcw" title="逆时针旋转" tabindex="59" data-l10n-id="page_rotate_ccw">
              <span data-l10n-id="page_rotate_ccw_label">逆时针旋转</span>
            </button>

            <div class="horizontalToolbarSeparator"></div>

            <button id="toggleHandTool" class="secondaryToolbarButton handTool" title="小手拖动" tabindex="60" data-l10n-id="hand_tool_enable">
              <span data-l10n-id="hand_tool_enable_label">小手拖动</span>
            </button>

            <div class="horizontalToolbarSeparator"></div>

            <button id="documentProperties" class="secondaryToolbarButton documentProperties" title="文件信息" tabindex="61" data-l10n-id="document_properties">
              <span data-l10n-id="document_properties_label">文件信息</span>
            </button>
          </div>
        </div>

        <div class="toolbar">
          <div id="toolbarContainer">
            <div id="toolbarViewer">
              <div id="toolbarViewerLeft">
                <button id="sidebarToggle" class="toolbarButton" title="显示列表" tabindex="11" data-l10n-id="toggle_sidebar">
                  <span data-l10n-id="toggle_sidebar_label">显示列表</span>
                </button>
                <div class="toolbarButtonSpacer"></div>
                <button id="viewFind" class="toolbarButton group hiddenSmallView" title="检索" tabindex="12" data-l10n-id="findbar">
                  <span data-l10n-id="findbar_label">检索</span>
                </button>
                <div class="splitToolbarButton">
                  <button class="toolbarButton pageUp" title="上一页" id="previous" tabindex="13" data-l10n-id="previous">
                    <span data-l10n-id="previous_label">上一页</span>
                  </button>
                  <div class="splitToolbarButtonSeparator"></div>
                  <button class="toolbarButton pageDown" title="下一页" id="next" tabindex="14" data-l10n-id="next">
                    <span data-l10n-id="next_label">下一页</span>
                  </button>
                </div>
                <label id="pageNumberLabel" class="toolbarLabel" for="pageNumber" data-l10n-id="page_label">页数： </label>
                <input type="number" id="pageNumber" class="toolbarField pageNumber" value="1" size="4" min="1" tabindex="15">
                <span id="numPages" class="toolbarLabel"></span>
              </div>
              <div id="toolbarViewerRight">
                <button id="presentationMode" class="toolbarButton presentationMode hiddenLargeView" title="当前比例" tabindex="31" data-l10n-id="presentation_mode">
                  <span data-l10n-id="presentation_mode_label">全屏显示</span>
                </button>

                <button id="openFile" class="toolbarButton openFile hiddenLargeView" title="打开" tabindex="32" data-l10n-id="open_file">
                  <span data-l10n-id="open_file_label">打开</span>
                </button>

                <button id="print" class="toolbarButton print hiddenMediumView" title="Print" tabindex="33" data-l10n-id="print" style="display: none">
                  <span data-l10n-id="print_label">打印</span>
                </button>
                <button id="download" class="toolbarButton download hiddenMediumView" title="Download" tabindex="34" data-l10n-id="download" style="display: none">
                  <span data-l10n-id="download_label">下载</span>
                </button>
                <div class="verticalToolbarSeparator hiddenSmallView"></div>
                <button id="secondaryToolbarToggle" class="toolbarButton" title="工具" tabindex="36" data-l10n-id="tools">
                  <span data-l10n-id="tools_label">工具</span>
                </button>
              </div>
              <div class="outerCenter">
                <div class="innerCenter" id="toolbarViewerMiddle">
                  <div class="splitToolbarButton">
                    <button id="zoomOut" class="toolbarButton zoomOut" title="缩小" tabindex="21" data-l10n-id="zoom_out">
                      <span data-l10n-id="zoom_out_label">缩小</span>
                    </button>
                    <div class="splitToolbarButtonSeparator"></div>
                    <button id="zoomIn" class="toolbarButton zoomIn" title="放大" tabindex="22" data-l10n-id="zoom_in">
                      <span data-l10n-id="zoom_in_label">放大</span>
                    </button>
                  </div>
                  <span id="scaleSelectContainer" class="dropdownToolbarButton">
                     <select id="scaleSelect" title="缩放" tabindex="23" data-l10n-id="zoom">
                      <option id="pageAutoOption" title="" value="auto" selected="selected" data-l10n-id="page_scale_auto">自动排版</option>
                      <option id="pageActualOption" title="" value="page-actual" data-l10n-id="page_scale_actual">实际大小</option>
                      <option id="pageFitOption" title="" value="page-fit" data-l10n-id="page_scale_fit">适应页面</option>
                      <option id="pageWidthOption" title="" value="page-width" data-l10n-id="page_scale_width">最大宽度</option>
                      <option id="customScaleOption" title="" value="custom"></option>
                      <option title="" value="0.5" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 50 }'>50%</option>
                      <option title="" value="0.75" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 75 }'>75%</option>
                      <option title="" value="1" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 100 }'>100%</option>
                      <option title="" value="1.25" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 125 }'>125%</option>
                      <option title="" value="1.5" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 150 }'>150%</option>
                      <option title="" value="2" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 200 }'>200%</option>
                      <option title="" value="3" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 300 }'>300%</option>
                      <option title="" value="4" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 400 }'>400%</option>
                    </select>
                  </span>
                </div>
              </div>
            </div>
            <div id="loadingBar">
              <div class="progress">
                <div class="glimmer">
                </div>
              </div>
            </div>
          </div>
        </div>

        <menu type="context" id="viewerContextMenu">
          <menuitem id="contextFirstPage" label="First Page"
                    data-l10n-id="first_page"></menuitem>
          <menuitem id="contextLastPage" label="Last Page"
                    data-l10n-id="last_page"></menuitem>
          <menuitem id="contextPageRotateCw" label="Rotate Clockwise"
                    data-l10n-id="page_rotate_cw"></menuitem>
          <menuitem id="contextPageRotateCcw" label="Rotate Counter-Clockwise"
                    data-l10n-id="page_rotate_ccw"></menuitem>
        </menu>

        <div id="viewerContainer" tabindex="0">
          <div id="viewer" class="pdfViewer"></div>
        </div>

        <div id="errorWrapper" hidden='true'>
          <div id="errorMessageLeft">
            <span id="errorMessage"></span>
            <button id="errorShowMore" data-l10n-id="error_more_info">
              更多信息
            </button>
            <button id="errorShowLess" data-l10n-id="error_less_info" hidden='true'>
              错误信息
            </button>
          </div>
          <div id="errorMessageRight">
            <button id="errorClose" data-l10n-id="error_close">
              关闭
            </button>
          </div>
          <div class="clearBoth"></div>
          <textarea id="errorMoreInfo" hidden='true' readonly="readonly"></textarea>
        </div>
      </div>

      <div id="overlayContainer" class="hidden">
        <div id="passwordOverlay" class="container hidden">
          <div class="dialog">
            <div class="row">
              <p id="passwordText" data-l10n-id="password_label">打开密码:</p>
            </div>
            <div class="row">
              <input type="password" id="password" class="toolbarField" />
            </div>
            <div class="buttonRow">
              <button id="passwordCancel" class="overlayButton"><span data-l10n-id="password_cancel">Cancel</span></button>
              <button id="passwordSubmit" class="overlayButton"><span data-l10n-id="password_ok">OK</span></button>
            </div>
          </div>
        </div>
        <div id="documentPropertiesOverlay" class="container hidden">
          <div class="dialog">
            <div class="row">
              <span data-l10n-id="document_properties_file_name">文件名称:</span> <p id="fileNameField">-</p>
            </div>
            <div class="row">
              <span data-l10n-id="document_properties_file_size">文件大小:</span> <p id="fileSizeField">-</p>
            </div>
            <div class="separator"></div>
            <div class="row">
              <span data-l10n-id="document_properties_title">标题:</span> <p id="titleField">-</p>
            </div>
            <div class="row">
              <span data-l10n-id="document_properties_author">作者:</span> <p id="authorField">-</p>
            </div>
            <div class="row">
              <span data-l10n-id="document_properties_subject">主题:</span> <p id="subjectField">-</p>
            </div>
            <div class="row">
              <span data-l10n-id="document_properties_keywords">关键字:</span> <p id="keywordsField">-</p>
            </div>
            <div class="row">
              <span data-l10n-id="document_properties_creation_date">创建日期:</span> <p id="creationDateField">-</p>
            </div>
            <div class="row">
              <span data-l10n-id="document_properties_modification_date">修改日期:</span> <p id="modificationDateField">-</p>
            </div>
            <div class="row">
              <span data-l10n-id="document_properties_creator">创建者:</span> <p id="creatorField">-</p>
            </div>
            <div class="separator"></div>
            <div class="row">
              <span data-l10n-id="document_properties_producer">PDF 支持软件:</span> <p id="producerField">-</p>
            </div>
            <div class="row">
              <span data-l10n-id="document_properties_version">PDF 版本:</span> <p id="versionField">-</p>
            </div>
            <div class="row">
              <span data-l10n-id="document_properties_page_count">总页数:</span> <p id="pageCountField">-</p>
            </div>
            <div class="buttonRow">
              <button id="documentPropertiesClose" class="overlayButton"><span data-l10n-id="document_properties_close">关闭</span></button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="printContainer"></div>
    <div id="mozPrintCallback-shim" hidden>
  <style>
@media print {
  #printContainer div {
    page-break-after: always;
    page-break-inside: avoid;
  }
}
  </style>
  <style scoped>
#mozPrintCallback-shim {
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  z-index: 9999999;

  display: block;
  text-align: center;
  background-color: rgba(0, 0, 0, 0.5);
}
#mozPrintCallback-shim[hidden] {
  display: none;
}
@media print {
  #mozPrintCallback-shim {
    display: none;
  }
}

#mozPrintCallback-shim .mozPrintCallback-dialog-box {
  display: inline-block;
  margin: -50px auto 0;
  position: relative;
  top: 45%;
  left: 0;
  min-width: 220px;
  max-width: 400px;

  padding: 9px;

  border: 1px solid hsla(0, 0%, 0%, .5);
  border-radius: 2px;
  box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3);

  background-color: #474747;

  color: hsl(0, 0%, 85%);
  font-size: 16px;
  line-height: 20px;
}
#mozPrintCallback-shim .progress-row {
  clear: both;
  padding: 1em 0;
}
#mozPrintCallback-shim progress {
  width: 100%;
}
#mozPrintCallback-shim .relative-progress {
  clear: both;
  float: right;
}
#mozPrintCallback-shim .progress-actions {
  clear: both;
}
  </style>
  <div class="mozPrintCallback-dialog-box">
    准备打印文档......
    <div class="progress-row">
      <progress value="0" max="100"></progress>
      <span class="relative-progress">0%</span>
    </div>
    <div class="progress-actions">
      <input type="button" value="Cancel" class="mozPrintCallback-cancel">
    </div>
  </div>
</div>
  </body>

<script>
    'use strict';

    var DEFAULT_URL = '<?php echo ($path); ?>';
    var DEFAULT_SCALE_DELTA = 1.1;
    var MIN_SCALE = 0.25;
    var MAX_SCALE = 10.0;
    var VIEW_HISTORY_MEMORY = 20;
    var SCALE_SELECT_CONTAINER_PADDING = 8;
    var SCALE_SELECT_PADDING = 22;
    var PAGE_NUMBER_LOADING_INDICATOR = 'visiblePageIsLoading';
    var DISABLE_AUTO_FETCH_LOADING_BAR_TIMEOUT = 5000;

    PDFJS.imageResourcesPath = '/Public/Pdfconfig/images/';
    PDFJS.workerSrc = '/Public/Js/pdf.worker.js';
    PDFJS.cMapUrl = '/Public/Pdfconfig/cmaps/';
    PDFJS.cMapPacked = true;

    var mozL10n = document.mozL10n || document.webL10n;


    var CSS_UNITS = 96.0 / 72.0;
    var DEFAULT_SCALE = 'auto';
    var UNKNOWN_SCALE = 0;
    var MAX_AUTO_SCALE = 1.25;
    var SCROLLBAR_PADDING = 40;
    var VERTICAL_PADDING = 5;
    var CustomStyle = (function CustomStyleClosure() {
        var prefixes = ['ms', 'Moz', 'Webkit', 'O'];
        var _cache = {};
        function CustomStyle() {}
        CustomStyle.getProp = function get(propName, element) {
            if (arguments.length === 1 && typeof _cache[propName] === 'string') {
                return _cache[propName];
            }

            element = element || document.documentElement;
            var style = element.style, prefixed, uPropName;

            if (typeof style[propName] === 'string') {
                return (_cache[propName] = propName);
            }

            uPropName = propName.charAt(0).toUpperCase() + propName.slice(1);

            for (var i = 0, l = prefixes.length; i < l; i++) {
                prefixed = prefixes[i] + uPropName;
                if (typeof style[prefixed] === 'string') {
                    return (_cache[propName] = prefixed);
                }
            }

            return (_cache[propName] = 'undefined');
        };

        CustomStyle.setProp = function set(propName, element, str) {
            var prop = this.getProp(propName);
            if (prop !== 'undefined') {
                element.style[prop] = str;
            }
        };

        return CustomStyle;
    })();

    function getFileName(url) {
        var anchor = url.indexOf('#');
        var query = url.indexOf('?');
        var end = Math.min(
            anchor > 0 ? anchor : url.length,
            query > 0 ? query : url.length);
        return url.substring(url.lastIndexOf('/', end) + 1, end);
    }

    function getOutputScale(ctx) {
        var devicePixelRatio = window.devicePixelRatio || 1;
        var backingStoreRatio = ctx.webkitBackingStorePixelRatio ||
            ctx.mozBackingStorePixelRatio ||
            ctx.msBackingStorePixelRatio ||
            ctx.oBackingStorePixelRatio ||
            ctx.backingStorePixelRatio || 1;
        var pixelRatio = devicePixelRatio / backingStoreRatio;
        return {
            sx: pixelRatio,
            sy: pixelRatio,
            scaled: pixelRatio !== 1
        };
    }

    function scrollIntoView(element, spot) {
        var parent = element.offsetParent;
        var offsetY = element.offsetTop + element.clientTop;
        var offsetX = element.offsetLeft + element.clientLeft;
        if (!parent) {
            console.error('offsetParent is not set -- cannot scroll');
            return;
        }
        while (parent.clientHeight === parent.scrollHeight) {
            if (parent.dataset._scaleY) {
                offsetY /= parent.dataset._scaleY;
                offsetX /= parent.dataset._scaleX;
            }
            offsetY += parent.offsetTop;
            offsetX += parent.offsetLeft;
            parent = parent.offsetParent;
            if (!parent) {
                return;
            }
        }
        if (spot) {
            if (spot.top !== undefined) {
                offsetY += spot.top;
            }
            if (spot.left !== undefined) {
                offsetX += spot.left;
                parent.scrollLeft = offsetX;
            }
        }
        parent.scrollTop = offsetY;
    }
    function watchScroll(viewAreaElement, callback) {
        var debounceScroll = function debounceScroll(evt) {
            if (rAF) {
                return;
            }
            rAF = window.requestAnimationFrame(function viewAreaElementScrolled() {
                rAF = null;

                var currentY = viewAreaElement.scrollTop;
                var lastY = state.lastY;
                if (currentY !== lastY) {
                    state.down = currentY > lastY;
                }
                state.lastY = currentY;
                callback(state);
            });
        };

        var state = {
            down: true,
            lastY: viewAreaElement.scrollTop,
            _eventHandler: debounceScroll
        };

        var rAF = null;
        viewAreaElement.addEventListener('scroll', debounceScroll, true);
        return state;
    }

    function binarySearchFirstItem(items, condition) {
        var minIndex = 0;
        var maxIndex = items.length - 1;

        if (items.length === 0 || !condition(items[maxIndex])) {
            return items.length;
        }
        if (condition(items[minIndex])) {
            return minIndex;
        }

        while (minIndex < maxIndex) {
            var currentIndex = (minIndex + maxIndex) >> 1;
            var currentItem = items[currentIndex];
            if (condition(currentItem)) {
                maxIndex = currentIndex;
            } else {
                minIndex = currentIndex + 1;
            }
        }
        return minIndex;
    }

    function getVisibleElements(scrollEl, views, sortByVisibility) {
        var top = scrollEl.scrollTop, bottom = top + scrollEl.clientHeight;
        var left = scrollEl.scrollLeft, right = left + scrollEl.clientWidth;

        function isElementBottomBelowViewTop(view) {
            var element = view.div;
            var elementBottom =
                element.offsetTop + element.clientTop + element.clientHeight;
            return elementBottom > top;
        }

        var visible = [], view, element;
        var currentHeight, viewHeight, hiddenHeight, percentHeight;
        var currentWidth, viewWidth;
        var firstVisibleElementInd = (views.length === 0) ? 0 :
            binarySearchFirstItem(views, isElementBottomBelowViewTop);

        for (var i = firstVisibleElementInd, ii = views.length; i < ii; i++) {
            view = views[i];
            element = view.div;
            currentHeight = element.offsetTop + element.clientTop;
            viewHeight = element.clientHeight;

            if (currentHeight > bottom) {
                break;
            }

            currentWidth = element.offsetLeft + element.clientLeft;
            viewWidth = element.clientWidth;
            if (currentWidth + viewWidth < left || currentWidth > right) {
                continue;
            }
            hiddenHeight = Math.max(0, top - currentHeight) +
                Math.max(0, currentHeight + viewHeight - bottom);
            percentHeight = ((viewHeight - hiddenHeight) * 100 / viewHeight) | 0;

            visible.push({
                id: view.id,
                x: currentWidth,
                y: currentHeight,
                view: view,
                percent: percentHeight
            });
        }

        var first = visible[0];
        var last = visible[visible.length - 1];

        if (sortByVisibility) {
            visible.sort(function(a, b) {
                var pc = a.percent - b.percent;
                if (Math.abs(pc) > 0.001) {
                    return -pc;
                }
                return a.id - b.id;
            });
        }
        return {first: first, last: last, views: visible};
    }

    function noContextMenuHandler(e) {
        e.preventDefault();
    }

    function getPDFFileNameFromURL(url) {
        var reURI = /^(?:([^:]+:)?\/\/[^\/]+)?([^?#]*)(\?[^#]*)?(#.*)?$/;
        var reFilename = /[^\/?#=]+\.pdf\b(?!.*\.pdf\b)/i;
        var splitURI = reURI.exec(url);
        var suggestedFilename = reFilename.exec(splitURI[1]) ||
            reFilename.exec(splitURI[2]) ||
            reFilename.exec(splitURI[3]);
        if (suggestedFilename) {
            suggestedFilename = suggestedFilename[0];
            if (suggestedFilename.indexOf('%') !== -1) {
                try {
                    suggestedFilename =
                        reFilename.exec(decodeURIComponent(suggestedFilename))[0];
                } catch(e) {
                }
            }
        }
        return suggestedFilename || 'document.pdf';
    }

    var ProgressBar = (function ProgressBarClosure() {

        function clamp(v, min, max) {
            return Math.min(Math.max(v, min), max);
        }

        function ProgressBar(id, opts) {
            this.visible = true;
            this.div = document.querySelector(id + ' .progress');
            this.bar = this.div.parentNode;
            this.height = opts.height || 100;
            this.width = opts.width || 100;
            this.units = opts.units || '%';
            this.div.style.height = this.height + this.units;
            this.percent = 0;
        }

        ProgressBar.prototype = {

            updateBar: function ProgressBar_updateBar() {
                if (this._indeterminate) {
                    this.div.classList.add('indeterminate');
                    this.div.style.width = this.width + this.units;
                    return;
                }

                this.div.classList.remove('indeterminate');
                var progressSize = this.width * this._percent / 100;
                this.div.style.width = progressSize + this.units;
            },

            get percent() {
                return this._percent;
            },

            set percent(val) {
                this._indeterminate = isNaN(val);
                this._percent = clamp(val, 0, 100);
                this.updateBar();
            },

            setWidth: function ProgressBar_setWidth(viewer) {
                if (viewer) {
                    var container = viewer.parentNode;
                    var scrollbarWidth = container.offsetWidth - viewer.offsetWidth;
                    if (scrollbarWidth > 0) {
                        this.bar.setAttribute('style', 'width: calc(100% - ' +
                            scrollbarWidth + 'px);');
                    }
                }
            },

            hide: function ProgressBar_hide() {
                if (!this.visible) {
                    return;
                }
                this.visible = false;
                this.bar.classList.add('hidden');
                document.body.classList.remove('loadingInProgress');
            },

            show: function ProgressBar_show() {
                if (this.visible) {
                    return;
                }
                this.visible = true;
                document.body.classList.add('loadingInProgress');
                this.bar.classList.remove('hidden');
            }
        };

        return ProgressBar;
    })();



    var DEFAULT_PREFERENCES = {
        showPreviousViewOnLoad: true,
        defaultZoomValue: '',
        sidebarViewOnLoad: 0,
        enableHandToolOnLoad: false,
        enableWebGL: false,
        pdfBugEnabled: false,
        disableRange: false,
        disableStream: false,
        disableAutoFetch: false,
        disableFontFace: false,
        disableTextLayer: false,
        useOnlyCssZoom: false
    };


    var SidebarView = {
        NONE: 0,
        THUMBS: 1,
        OUTLINE: 2,
        ATTACHMENTS: 3
    };

    var Preferences = {
        prefs: Object.create(DEFAULT_PREFERENCES),
        isInitializedPromiseResolved: false,
        initializedPromise: null,
        initialize: function preferencesInitialize() {
            return this.initializedPromise =
                this._readFromStorage(DEFAULT_PREFERENCES).then(function(prefObj) {
                    this.isInitializedPromiseResolved = true;
                    if (prefObj) {
                        this.prefs = prefObj;
                    }
                }.bind(this));
        },
        _writeToStorage: function preferences_writeToStorage(prefObj) {
            return Promise.resolve();
        },
        _readFromStorage: function preferences_readFromStorage(prefObj) {
            return Promise.resolve();
        },
        reset: function preferencesReset() {
            return this.initializedPromise.then(function() {
                this.prefs = Object.create(DEFAULT_PREFERENCES);
                return this._writeToStorage(DEFAULT_PREFERENCES);
            }.bind(this));
        },
        reload: function preferencesReload() {
            return this.initializedPromise.then(function () {
                this._readFromStorage(DEFAULT_PREFERENCES).then(function(prefObj) {
                    if (prefObj) {
                        this.prefs = prefObj;
                    }
                }.bind(this));
            }.bind(this));
        },
        set: function preferencesSet(name, value) {
            return this.initializedPromise.then(function () {
                if (DEFAULT_PREFERENCES[name] === undefined) {
                    throw new Error('preferencesSet: \'' + name + '\' is undefined.');
                } else if (value === undefined) {
                    throw new Error('preferencesSet: no value is specified.');
                }
                var valueType = typeof value;
                var defaultType = typeof DEFAULT_PREFERENCES[name];

                if (valueType !== defaultType) {
                    if (valueType === 'number' && defaultType === 'string') {
                        value = value.toString();
                    } else {
                        throw new Error('Preferences_set: \'' + value + '\' is a \"' +
                            valueType + '\", expected \"' + defaultType + '\".');
                    }
                } else {
                    if (valueType === 'number' && (value | 0) !== value) {
                        throw new Error('Preferences_set: \'' + value +
                            '\' must be an \"integer\".');
                    }
                }
                this.prefs[name] = value;
                return this._writeToStorage(this.prefs);
            }.bind(this));
        },

        get: function preferencesGet(name) {
            return this.initializedPromise.then(function () {
                var defaultValue = DEFAULT_PREFERENCES[name];

                if (defaultValue === undefined) {
                    throw new Error('preferencesGet: \'' + name + '\' is undefined.');
                } else {
                    var prefValue = this.prefs[name];

                    if (prefValue !== undefined) {
                        return prefValue;
                    }
                }
                return defaultValue;
            }.bind(this));
        }
    };



    Preferences._writeToStorage = function (prefObj) {
        return new Promise(function (resolve) {
            localStorage.setItem('pdfjs.preferences', JSON.stringify(prefObj));
            resolve();
        });
    };

    Preferences._readFromStorage = function (prefObj) {
        return new Promise(function (resolve) {
            var readPrefs = JSON.parse(localStorage.getItem('pdfjs.preferences'));
            resolve(readPrefs);
        });
    };


    (function mozPrintCallbackPolyfillClosure() {
        if ('mozPrintCallback' in document.createElement('canvas')) {
            return;
        }
        HTMLCanvasElement.prototype.mozPrintCallback = undefined;

        var canvases;
        var index;

        var print = window.print;
        window.print = function print() {
            if (canvases) {
                console.warn('Ignored window.print() because of a pending print job.');
                return;
            }
            try {
                dispatchEvent('beforeprint');
            } finally {
                canvases = document.querySelectorAll('canvas');
                index = -1;
                next();
            }
        };

        function dispatchEvent(eventType) {
            var event = document.createEvent('CustomEvent');
            event.initCustomEvent(eventType, false, false, 'custom');
            window.dispatchEvent(event);
        }

        function next() {
            if (!canvases) {
                return;
            }

            renderProgress();
            if (++index < canvases.length) {
                var canvas = canvases[index];
                if (typeof canvas.mozPrintCallback === 'function') {
                    canvas.mozPrintCallback({
                        context: canvas.getContext('2d'),
                        abort: abort,
                        done: next
                    });
                } else {
                    next();
                }
            } else {
                renderProgress();
                print.call(window);
                setTimeout(abort, 20);
            }
        }

        function abort() {
            if (canvases) {
                canvases = null;
                renderProgress();
                dispatchEvent('afterprint');
            }
        }

        function renderProgress() {
            var progressContainer = document.getElementById('mozPrintCallback-shim');
            if (canvases) {
                var progress = Math.round(100 * index / canvases.length);
                var progressBar = progressContainer.querySelector('progress');
                var progressPerc = progressContainer.querySelector('.relative-progress');
                progressBar.value = progress;
                progressPerc.textContent = progress + '%';
                progressContainer.removeAttribute('hidden');
                progressContainer.onclick = abort;
            } else {
                progressContainer.setAttribute('hidden', '');
            }
        }

        var hasAttachEvent = !!document.attachEvent;

        window.addEventListener('keydown', function(event) {
            if (event.keyCode === 80/*P*/ && (event.ctrlKey || event.metaKey) &&
                !event.altKey && (!event.shiftKey || window.chrome || window.opera)) {
                window.print();
                if (hasAttachEvent) {
                    return;
                }
                event.preventDefault();
                if (event.stopImmediatePropagation) {
                    event.stopImmediatePropagation();
                } else {
                    event.stopPropagation();
                }
                return;
            }
            if (event.keyCode === 27 && canvases) {
                abort();
            }
        }, true);
        if (hasAttachEvent) {
            document.attachEvent('onkeydown', function(event) {
                event = event || window.event;
                if (event.keyCode === 80 && event.ctrlKey) {
                    event.keyCode = 0;
                    return false;
                }
            });
        }

        if ('onbeforeprint' in window) {
            var stopPropagationIfNeeded = function(event) {
                if (event.detail !== 'custom' && event.stopImmediatePropagation) {
                    event.stopImmediatePropagation();
                }
            };
            window.addEventListener('beforeprint', stopPropagationIfNeeded, false);
            window.addEventListener('afterprint', stopPropagationIfNeeded, false);
        }
    })();



    var DownloadManager = (function DownloadManagerClosure() {

        function download(blobUrl, filename) {
            var a = document.createElement('a');
            if (a.click) {
                a.href = blobUrl;
                a.target = '_parent';
                if ('download' in a) {
                    a.download = filename;
                }
                (document.body || document.documentElement).appendChild(a);
                a.click();
                a.parentNode.removeChild(a);
            } else {
                if (window.top === window &&
                    blobUrl.split('#')[0] === window.location.href.split('#')[0]) {
                    var padCharacter = blobUrl.indexOf('?') === -1 ? '?' : '&';
                    blobUrl = blobUrl.replace(/#|$/, padCharacter + '$&');
                }
                window.open(blobUrl, '_parent');
            }
        }

        function DownloadManager() {}

        DownloadManager.prototype = {
            downloadUrl: function DownloadManager_downloadUrl(url, filename) {
                if (!PDFJS.isValidUrl(url, true)) {
                    return;
                }

                download(url + '#pdfjs.action=download', filename);
            },

            downloadData: function DownloadManager_downloadData(data, filename,
                                                                contentType) {
                if (navigator.msSaveBlob) {
                    return navigator.msSaveBlob(new Blob([data], { type: contentType }),
                        filename);
                }

                var blobUrl = PDFJS.createObjectURL(data, contentType);
                download(blobUrl, filename);
            },

            download: function DownloadManager_download(blob, url, filename) {
                if (!URL) {
                    this.downloadUrl(url, filename);
                    return;
                }

                if (navigator.msSaveBlob) {
                    if (!navigator.msSaveBlob(blob, filename)) {
                        this.downloadUrl(url, filename);
                    }
                    return;
                }

                var blobUrl = URL.createObjectURL(blob);
                download(blobUrl, filename);
            }
        };

        return DownloadManager;
    })();
    var ViewHistory = (function ViewHistoryClosure() {
        function ViewHistory(fingerprint) {
            this.fingerprint = fingerprint;
            this.isInitializedPromiseResolved = false;
            this.initializedPromise =
                this._readFromStorage().then(function (databaseStr) {
                    this.isInitializedPromiseResolved = true;

                    var database = JSON.parse(databaseStr || '{}');
                    if (!('files' in database)) {
                        database.files = [];
                    }
                    if (database.files.length >= VIEW_HISTORY_MEMORY) {
                        database.files.shift();
                    }
                    var index;
                    for (var i = 0, length = database.files.length; i < length; i++) {
                        var branch = database.files[i];
                        if (branch.fingerprint === this.fingerprint) {
                            index = i;
                            break;
                        }
                    }
                    if (typeof index !== 'number') {
                        index = database.files.push({fingerprint: this.fingerprint}) - 1;
                    }
                    this.file = database.files[index];
                    this.database = database;
                }.bind(this));
        }
        ViewHistory.prototype = {
            _writeToStorage: function ViewHistory_writeToStorage() {
                return new Promise(function (resolve) {
                    var databaseStr = JSON.stringify(this.database);
                    localStorage.setItem('database', databaseStr);
                    resolve();
                }.bind(this));
            },

            _readFromStorage: function ViewHistory_readFromStorage() {
                return new Promise(function (resolve) {
                    resolve(localStorage.getItem('database'));
                });
            },

            set: function ViewHistory_set(name, val) {
                if (!this.isInitializedPromiseResolved) {
                    return;
                }
                this.file[name] = val;
                return this._writeToStorage();
            },

            setMultiple: function ViewHistory_setMultiple(properties) {
                if (!this.isInitializedPromiseResolved) {
                    return;
                }
                for (var name in properties) {
                    this.file[name] = properties[name];
                }
                return this._writeToStorage();
            },

            get: function ViewHistory_get(name, defaultValue) {
                if (!this.isInitializedPromiseResolved) {
                    return defaultValue;
                }
                return this.file[name] || defaultValue;
            }
        };

        return ViewHistory;
    })();

    var PDFFindBar = (function PDFFindBarClosure() {
        function PDFFindBar(options) {
            this.opened = false;
            this.bar = options.bar || null;
            this.toggleButton = options.toggleButton || null;
            this.findField = options.findField || null;
            this.highlightAll = options.highlightAllCheckbox || null;
            this.caseSensitive = options.caseSensitiveCheckbox || null;
            this.findMsg = options.findMsg || null;
            this.findStatusIcon = options.findStatusIcon || null;
            this.findPreviousButton = options.findPreviousButton || null;
            this.findNextButton = options.findNextButton || null;
            this.findController = options.findController || null;

            if (this.findController === null) {
                throw new Error('PDFFindBar cannot be used without a ' +
                    'PDFFindController instance.');
            }

            var self = this;
            this.toggleButton.addEventListener('click', function() {
                self.toggle();
            });

            this.findField.addEventListener('input', function() {
                self.dispatchEvent('');
            });

            this.bar.addEventListener('keydown', function(evt) {
                switch (evt.keyCode) {
                    case 13:
                        if (evt.target === self.findField) {
                            self.dispatchEvent('again', evt.shiftKey);
                        }
                        break;
                    case 27:
                        self.close();
                        break;
                }
            });

            this.findPreviousButton.addEventListener('click', function() {
                self.dispatchEvent('again', true);
            });

            this.findNextButton.addEventListener('click', function() {
                self.dispatchEvent('again', false);
            });

            this.highlightAll.addEventListener('click', function() {
                self.dispatchEvent('highlightallchange');
            });

            this.caseSensitive.addEventListener('click', function() {
                self.dispatchEvent('casesensitivitychange');
            });
        }

        PDFFindBar.prototype = {
            dispatchEvent: function PDFFindBar_dispatchEvent(type, findPrev) {
                var event = document.createEvent('CustomEvent');
                event.initCustomEvent('find' + type, true, true, {
                    query: this.findField.value,
                    caseSensitive: this.caseSensitive.checked,
                    highlightAll: this.highlightAll.checked,
                    findPrevious: findPrev
                });
                return window.dispatchEvent(event);
            },

            updateUIState: function PDFFindBar_updateUIState(state, previous) {
                var notFound = false;
                var findMsg = '';
                var status = '';

                switch (state) {
                    case FindStates.FIND_FOUND:
                        break;

                    case FindStates.FIND_PENDING:
                        status = 'pending';
                        break;

                    case FindStates.FIND_NOTFOUND:
                        findMsg = mozL10n.get('find_not_found', null, 'Phrase not found');
                        notFound = true;
                        break;

                    case FindStates.FIND_WRAPPED:
                        if (previous) {
                            findMsg = mozL10n.get('find_reached_top', null,
                                'Reached top of document, continued from bottom');
                        } else {
                            findMsg = mozL10n.get('find_reached_bottom', null,
                                'Reached end of document, continued from top');
                        }
                        break;
                }

                if (notFound) {
                    this.findField.classList.add('notFound');
                } else {
                    this.findField.classList.remove('notFound');
                }

                this.findField.setAttribute('data-status', status);
                this.findMsg.textContent = findMsg;
            },

            open: function PDFFindBar_open() {
                if (!this.opened) {
                    this.opened = true;
                    this.toggleButton.classList.add('toggled');
                    this.bar.classList.remove('hidden');
                }
                this.findField.select();
                this.findField.focus();
            },

            close: function PDFFindBar_close() {
                if (!this.opened) {
                    return;
                }
                this.opened = false;
                this.toggleButton.classList.remove('toggled');
                this.bar.classList.add('hidden');
                this.findController.active = false;
            },

            toggle: function PDFFindBar_toggle() {
                if (this.opened) {
                    this.close();
                } else {
                    this.open();
                }
            }
        };
        return PDFFindBar;
    })();


    var FindStates = {
        FIND_FOUND: 0,
        FIND_NOTFOUND: 1,
        FIND_WRAPPED: 2,
        FIND_PENDING: 3
    };

    var FIND_SCROLL_OFFSET_TOP = -50;
    var FIND_SCROLL_OFFSET_LEFT = -400;
    var PDFFindController = (function PDFFindControllerClosure() {
        function PDFFindController(options) {
            this.startedTextExtraction = false;
            this.extractTextPromises = [];
            this.pendingFindMatches = {};
            this.active = false;
            this.pageContents = [];
            this.pageMatches = [];
            this.selected = {
                pageIdx: -1,
                matchIdx: -1
            };
            this.offset = {
                pageIdx: null,
                matchIdx: null
            };
            this.pagesToSearch = null;
            this.resumePageIdx = null;
            this.state = null;
            this.dirtyMatch = false;
            this.findTimeout = null;
            this.pdfViewer = options.pdfViewer || null;
            this.integratedFind = options.integratedFind || false;
            this.charactersToNormalize = {
                '\u2018': '\'',
                '\u2019': '\'',
                '\u201A': '\'',
                '\u201B': '\'',
                '\u201C': '"',
                '\u201D': '"',
                '\u201E': '"',
                '\u201F': '"',
                '\u00BC': '1/4',
                '\u00BD': '1/2',
                '\u00BE': '3/4',
                '\u00A0': ' '
            };
            this.findBar = options.findBar || null;
            var replace = Object.keys(this.charactersToNormalize).join('');
            this.normalizationRegex = new RegExp('[' + replace + ']', 'g');

            var events = [
                'find',
                'findagain',
                'findhighlightallchange',
                'findcasesensitivitychange'
            ];

            this.firstPagePromise = new Promise(function (resolve) {
                this.resolveFirstPage = resolve;
            }.bind(this));
            this.handleEvent = this.handleEvent.bind(this);

            for (var i = 0, len = events.length; i < len; i++) {
                window.addEventListener(events[i], this.handleEvent);
            }
        }

        PDFFindController.prototype = {
            setFindBar: function PDFFindController_setFindBar(findBar) {
                this.findBar = findBar;
            },

            reset: function PDFFindController_reset() {
                this.startedTextExtraction = false;
                this.extractTextPromises = [];
                this.active = false;
            },

            normalize: function PDFFindController_normalize(text) {
                var self = this;
                return text.replace(this.normalizationRegex, function (ch) {
                    return self.charactersToNormalize[ch];
                });
            },

            calcFindMatch: function PDFFindController_calcFindMatch(pageIndex) {
                var pageContent = this.normalize(this.pageContents[pageIndex]);
                var query = this.normalize(this.state.query);
                var caseSensitive = this.state.caseSensitive;
                var queryLen = query.length;

                if (queryLen === 0) {
                    return;
                }

                if (!caseSensitive) {
                    pageContent = pageContent.toLowerCase();
                    query = query.toLowerCase();
                }

                var matches = [];
                var matchIdx = -queryLen;
                while (true) {
                    matchIdx = pageContent.indexOf(query, matchIdx + queryLen);
                    if (matchIdx === -1) {
                        break;
                    }
                    matches.push(matchIdx);
                }
                this.pageMatches[pageIndex] = matches;
                this.updatePage(pageIndex);
                if (this.resumePageIdx === pageIndex) {
                    this.resumePageIdx = null;
                    this.nextPageMatch();
                }
            },

            extractText: function PDFFindController_extractText() {
                if (this.startedTextExtraction) {
                    return;
                }
                this.startedTextExtraction = true;

                this.pageContents = [];
                var extractTextPromisesResolves = [];
                var numPages = this.pdfViewer.pagesCount;
                for (var i = 0; i < numPages; i++) {
                    this.extractTextPromises.push(new Promise(function (resolve) {
                        extractTextPromisesResolves.push(resolve);
                    }));
                }

                var self = this;
                function extractPageText(pageIndex) {
                    self.pdfViewer.getPageTextContent(pageIndex).then(
                        function textContentResolved(textContent) {
                            var textItems = textContent.items;
                            var str = [];

                            for (var i = 0, len = textItems.length; i < len; i++) {
                                str.push(textItems[i].str);
                            }
                            self.pageContents.push(str.join(''));

                            extractTextPromisesResolves[pageIndex](pageIndex);
                            if ((pageIndex + 1) < self.pdfViewer.pagesCount) {
                                extractPageText(pageIndex + 1);
                            }
                        }
                    );
                }
                extractPageText(0);
            },

            handleEvent: function PDFFindController_handleEvent(e) {
                if (this.state === null || e.type !== 'findagain') {
                    this.dirtyMatch = true;
                }
                this.state = e.detail;
                this.updateUIState(FindStates.FIND_PENDING);

                this.firstPagePromise.then(function() {
                    this.extractText();

                    clearTimeout(this.findTimeout);
                    if (e.type === 'find') {
                        this.findTimeout = setTimeout(this.nextMatch.bind(this), 250);
                    } else {
                        this.nextMatch();
                    }
                }.bind(this));
            },

            updatePage: function PDFFindController_updatePage(index) {
                if (this.selected.pageIdx === index) {
                    this.pdfViewer.scrollPageIntoView(index + 1);
                }

                var page = this.pdfViewer.getPageView(index);
                if (page.textLayer) {
                    page.textLayer.updateMatches();
                }
            },

            nextMatch: function PDFFindController_nextMatch() {
                var previous = this.state.findPrevious;
                var currentPageIndex = this.pdfViewer.currentPageNumber - 1;
                var numPages = this.pdfViewer.pagesCount;

                this.active = true;

                if (this.dirtyMatch) {
                    this.dirtyMatch = false;
                    this.selected.pageIdx = this.selected.matchIdx = -1;
                    this.offset.pageIdx = currentPageIndex;
                    this.offset.matchIdx = null;
                    this.hadMatch = false;
                    this.resumePageIdx = null;
                    this.pageMatches = [];
                    var self = this;

                    for (var i = 0; i < numPages; i++) {
                        this.updatePage(i);
                        if (!(i in this.pendingFindMatches)) {
                            this.pendingFindMatches[i] = true;
                            this.extractTextPromises[i].then(function(pageIdx) {
                                delete self.pendingFindMatches[pageIdx];
                                self.calcFindMatch(pageIdx);
                            });
                        }
                    }
                }
                if (this.state.query === '') {
                    this.updateUIState(FindStates.FIND_FOUND);
                    return;
                }

                if (this.resumePageIdx) {
                    return;
                }

                var offset = this.offset;
                this.pagesToSearch = numPages;
                if (offset.matchIdx !== null) {
                    var numPageMatches = this.pageMatches[offset.pageIdx].length;
                    if ((!previous && offset.matchIdx + 1 < numPageMatches) ||
                        (previous && offset.matchIdx > 0)) {
                        this.hadMatch = true;
                        offset.matchIdx = (previous ? offset.matchIdx - 1 :
                            offset.matchIdx + 1);
                        this.updateMatch(true);
                        return;
                    }
                    this.advanceOffsetPage(previous);
                }
                this.nextPageMatch();
            },

            matchesReady: function PDFFindController_matchesReady(matches) {
                var offset = this.offset;
                var numMatches = matches.length;
                var previous = this.state.findPrevious;

                if (numMatches) {
                    this.hadMatch = true;
                    offset.matchIdx = (previous ? numMatches - 1 : 0);
                    this.updateMatch(true);
                    return true;
                } else {
                    this.advanceOffsetPage(previous);
                    if (offset.wrapped) {
                        offset.matchIdx = null;
                        if (this.pagesToSearch < 0) {
                            this.updateMatch(false);
                            return true;
                        }
                    }
                    return false;
                }
            },

            updateMatchPosition: function PDFFindController_updateMatchPosition(
                pageIndex, index, elements, beginIdx, endIdx) {
                if (this.selected.matchIdx === index &&
                    this.selected.pageIdx === pageIndex) {
                    scrollIntoView(elements[beginIdx], {
                        top: FIND_SCROLL_OFFSET_TOP,
                        left: FIND_SCROLL_OFFSET_LEFT
                    });
                }
            },

            nextPageMatch: function PDFFindController_nextPageMatch() {
                if (this.resumePageIdx !== null) {
                    console.error('There can only be one pending page.');
                }
                do {
                    var pageIdx = this.offset.pageIdx;
                    var matches = this.pageMatches[pageIdx];
                    if (!matches) {
                        this.resumePageIdx = pageIdx;
                        break;
                    }
                } while (!this.matchesReady(matches));
            },

            advanceOffsetPage: function PDFFindController_advanceOffsetPage(previous) {
                var offset = this.offset;
                var numPages = this.extractTextPromises.length;
                offset.pageIdx = (previous ? offset.pageIdx - 1 : offset.pageIdx + 1);
                offset.matchIdx = null;

                this.pagesToSearch--;

                if (offset.pageIdx >= numPages || offset.pageIdx < 0) {
                    offset.pageIdx = (previous ? numPages - 1 : 0);
                    offset.wrapped = true;
                }
            },

            updateMatch: function PDFFindController_updateMatch(found) {
                var state = FindStates.FIND_NOTFOUND;
                var wrapped = this.offset.wrapped;
                this.offset.wrapped = false;

                if (found) {
                    var previousPage = this.selected.pageIdx;
                    this.selected.pageIdx = this.offset.pageIdx;
                    this.selected.matchIdx = this.offset.matchIdx;
                    state = (wrapped ? FindStates.FIND_WRAPPED : FindStates.FIND_FOUND);
                    if (previousPage !== -1 && previousPage !== this.selected.pageIdx) {
                        this.updatePage(previousPage);
                    }
                }

                this.updateUIState(state, this.state.findPrevious);
                if (this.selected.pageIdx !== -1) {
                    this.updatePage(this.selected.pageIdx);
                }
            },

            updateUIState: function PDFFindController_updateUIState(state, previous) {
                if (this.integratedFind) {
                    FirefoxCom.request('updateFindControlState',
                        { result: state, findPrevious: previous });
                    return;
                }
                if (this.findBar === null) {
                    throw new Error('PDFFindController is not initialized with a ' +
                        'PDFFindBar instance.');
                }
                this.findBar.updateUIState(state, previous);
            }
        };
        return PDFFindController;
    })();


    var PDFHistory = {
        initialized: false,
        initialDestination: null,
        initialize: function pdfHistoryInitialize(fingerprint, linkService) {
            this.initialized = true;
            this.reInitialized = false;
            this.allowHashChange = true;
            this.historyUnlocked = true;

            this.previousHash = window.location.hash.substring(1);
            this.currentBookmark = '';
            this.currentPage = 0;
            this.updatePreviousBookmark = false;
            this.previousBookmark = '';
            this.previousPage = 0;
            this.nextHashParam = '';

            this.fingerprint = fingerprint;
            this.linkService = linkService;
            this.currentUid = this.uid = 0;
            this.current = {};

            var state = window.history.state;
            if (this._isStateObjectDefined(state)) {
                if (state.target.dest) {
                    this.initialDestination = state.target.dest;
                } else {
                    linkService.setHash(state.target.hash);
                }
                this.currentUid = state.uid;
                this.uid = state.uid + 1;
                this.current = state.target;
            } else {

                if (state && state.fingerprint &&
                    this.fingerprint !== state.fingerprint) {
                    this.reInitialized = true;
                }
                this._pushOrReplaceState({ fingerprint: this.fingerprint }, true);
            }

            var self = this;
            window.addEventListener('popstate', function pdfHistoryPopstate(evt) {
                evt.preventDefault();
                evt.stopPropagation();

                if (!self.historyUnlocked) {
                    return;
                }
                if (evt.state) {
                    self._goTo(evt.state);
                } else {
                    self.previousHash = window.location.hash.substring(1);
                    if (self.uid === 0) {
                        var previousParams = (self.previousHash && self.currentBookmark &&
                            self.previousHash !== self.currentBookmark) ?
                            { hash: self.currentBookmark, page: self.currentPage } :
                            { page: 1 };
                        self.historyUnlocked = false;
                        self.allowHashChange = false;
                        window.history.back();
                        self._pushToHistory(previousParams, false, true);
                        window.history.forward();
                        self.historyUnlocked = true;
                    }
                    self._pushToHistory({ hash: self.previousHash }, false, true);
                    self._updatePreviousBookmark();
                }
            }, false);

            function pdfHistoryBeforeUnload() {
                var previousParams = self._getPreviousParams(null, true);
                if (previousParams) {
                    var replacePrevious = (!self.current.dest &&
                        self.current.hash !== self.previousHash);
                    self._pushToHistory(previousParams, false, replacePrevious);
                    self._updatePreviousBookmark();
                }
                window.removeEventListener('beforeunload', pdfHistoryBeforeUnload, false);
            }
            window.addEventListener('beforeunload', pdfHistoryBeforeUnload, false);

            window.addEventListener('pageshow', function pdfHistoryPageShow(evt) {
                window.addEventListener('beforeunload', pdfHistoryBeforeUnload, false);
            }, false);
        },

        _isStateObjectDefined: function pdfHistory_isStateObjectDefined(state) {
            return (state && state.uid >= 0 &&
                state.fingerprint && this.fingerprint === state.fingerprint &&
                state.target && state.target.hash) ? true : false;
        },

        _pushOrReplaceState: function pdfHistory_pushOrReplaceState(stateObj,
                                                                    replace) {
            if (replace) {
                window.history.replaceState(stateObj, '', document.URL);
            } else {
                window.history.pushState(stateObj, '', document.URL);
            }
        },

        get isHashChangeUnlocked() {
            if (!this.initialized) {
                return true;
            }
            var temp = this.allowHashChange;
            this.allowHashChange = true;
            return temp;
        },

        _updatePreviousBookmark: function pdfHistory_updatePreviousBookmark() {
            if (this.updatePreviousBookmark &&
                this.currentBookmark && this.currentPage) {
                this.previousBookmark = this.currentBookmark;
                this.previousPage = this.currentPage;
                this.updatePreviousBookmark = false;
            }
        },

        updateCurrentBookmark: function pdfHistoryUpdateCurrentBookmark(bookmark,
                                                                        pageNum) {
            if (this.initialized) {
                this.currentBookmark = bookmark.substring(1);
                this.currentPage = pageNum | 0;
                this._updatePreviousBookmark();
            }
        },

        updateNextHashParam: function pdfHistoryUpdateNextHashParam(param) {
            if (this.initialized) {
                this.nextHashParam = param;
            }
        },

        push: function pdfHistoryPush(params, isInitialBookmark) {
            if (!(this.initialized && this.historyUnlocked)) {
                return;
            }
            if (params.dest && !params.hash) {
                params.hash = (this.current.hash && this.current.dest &&
                    this.current.dest === params.dest) ?
                    this.current.hash :
                    this.linkService.getDestinationHash(params.dest).split('#')[1];
            }
            if (params.page) {
                params.page |= 0;
            }
            if (isInitialBookmark) {
                var target = window.history.state.target;
                if (!target) {
                    this._pushToHistory(params, false);
                    this.previousHash = window.location.hash.substring(1);
                }
                this.updatePreviousBookmark = this.nextHashParam ? false : true;
                if (target) {
                    this._updatePreviousBookmark();
                }
                return;
            }
            if (this.nextHashParam) {
                if (this.nextHashParam === params.hash) {
                    this.nextHashParam = null;
                    this.updatePreviousBookmark = true;
                    return;
                } else {
                    this.nextHashParam = null;
                }
            }

            if (params.hash) {
                if (this.current.hash) {
                    if (this.current.hash !== params.hash) {
                        this._pushToHistory(params, true);
                    } else {
                        if (!this.current.page && params.page) {
                            this._pushToHistory(params, false, true);
                        }
                        this.updatePreviousBookmark = true;
                    }
                } else {
                    this._pushToHistory(params, true);
                }
            } else if (this.current.page && params.page &&
                this.current.page !== params.page) {
                this._pushToHistory(params, true);
            }
        },

        _getPreviousParams: function pdfHistory_getPreviousParams(onlyCheckPage,
                                                                  beforeUnload) {
            if (!(this.currentBookmark && this.currentPage)) {
                return null;
            } else if (this.updatePreviousBookmark) {
                this.updatePreviousBookmark = false;
            }
            if (this.uid > 0 && !(this.previousBookmark && this.previousPage)) {
                return null;
            }
            if ((!this.current.dest && !onlyCheckPage) || beforeUnload) {
                if (this.previousBookmark === this.currentBookmark) {
                    return null;
                }
            } else if (this.current.page || onlyCheckPage) {
                if (this.previousPage === this.currentPage) {
                    return null;
                }
            } else {
                return null;
            }
            var params = { hash: this.currentBookmark, page: this.currentPage };
            if (PresentationMode.active) {
                params.hash = null;
            }
            return params;
        },

        _stateObj: function pdfHistory_stateObj(params) {
            return { fingerprint: this.fingerprint, uid: this.uid, target: params };
        },

        _pushToHistory: function pdfHistory_pushToHistory(params,
                                                          addPrevious, overwrite) {
            if (!this.initialized) {
                return;
            }
            if (!params.hash && params.page) {
                params.hash = ('page=' + params.page);
            }
            if (addPrevious && !overwrite) {
                var previousParams = this._getPreviousParams();
                if (previousParams) {
                    var replacePrevious = (!this.current.dest &&
                        this.current.hash !== this.previousHash);
                    this._pushToHistory(previousParams, false, replacePrevious);
                }
            }
            this._pushOrReplaceState(this._stateObj(params),
                (overwrite || this.uid === 0));
            this.currentUid = this.uid++;
            this.current = params;
            this.updatePreviousBookmark = true;
        },

        _goTo: function pdfHistory_goTo(state) {
            if (!(this.initialized && this.historyUnlocked &&
                    this._isStateObjectDefined(state))) {
                return;
            }
            if (!this.reInitialized && state.uid < this.currentUid) {
                var previousParams = this._getPreviousParams(true);
                if (previousParams) {
                    this._pushToHistory(this.current, false);
                    this._pushToHistory(previousParams, false);
                    this.currentUid = state.uid;
                    window.history.back();
                    return;
                }
            }
            this.historyUnlocked = false;

            if (state.target.dest) {
                this.linkService.navigateTo(state.target.dest);
            } else {
                this.linkService.setHash(state.target.hash);
            }
            this.currentUid = state.uid;
            if (state.uid > this.uid) {
                this.uid = state.uid;
            }
            this.current = state.target;
            this.updatePreviousBookmark = true;

            var currentHash = window.location.hash.substring(1);
            if (this.previousHash !== currentHash) {
                this.allowHashChange = false;
            }
            this.previousHash = currentHash;

            this.historyUnlocked = true;
        },

        back: function pdfHistoryBack() {
            this.go(-1);
        },

        forward: function pdfHistoryForward() {
            this.go(1);
        },

        go: function pdfHistoryGo(direction) {
            if (this.initialized && this.historyUnlocked) {
                var state = window.history.state;
                if (direction === -1 && state && state.uid > 0) {
                    window.history.back();
                } else if (direction === 1 && state && state.uid < (this.uid - 1)) {
                    window.history.forward();
                }
            }
        }
    };


    var SecondaryToolbar = {
        opened: false,
        previousContainerHeight: null,
        newContainerHeight: null,

        initialize: function secondaryToolbarInitialize(options) {
            this.toolbar = options.toolbar;
            this.presentationMode = options.presentationMode;
            this.documentProperties = options.documentProperties;
            this.buttonContainer = this.toolbar.firstElementChild;
            this.toggleButton = options.toggleButton;
            this.presentationModeButton = options.presentationModeButton;
            this.openFile = options.openFile;
            this.print = options.print;
            this.download = options.download;
            this.viewBookmark = options.viewBookmark;
            this.firstPage = options.firstPage;
            this.lastPage = options.lastPage;
            this.pageRotateCw = options.pageRotateCw;
            this.pageRotateCcw = options.pageRotateCcw;
            this.documentPropertiesButton = options.documentPropertiesButton;
            var elements = [
                { element: this.toggleButton, handler: this.toggle },
                { element: this.presentationModeButton,
                    handler: this.presentationModeClick },
                { element: this.openFile, handler: this.openFileClick },
                { element: this.print, handler: this.printClick },
                { element: this.download, handler: this.downloadClick },
                { element: this.viewBookmark, handler: this.viewBookmarkClick },
                { element: this.firstPage, handler: this.firstPageClick },
                { element: this.lastPage, handler: this.lastPageClick },
                { element: this.pageRotateCw, handler: this.pageRotateCwClick },
                { element: this.pageRotateCcw, handler: this.pageRotateCcwClick },
                { element: this.documentPropertiesButton,
                    handler: this.documentPropertiesClick }
            ];

            for (var item in elements) {
                var element = elements[item].element;
                if (element) {
                    element.addEventListener('click', elements[item].handler.bind(this));
                }
            }
        },
        presentationModeClick: function secondaryToolbarPresentationModeClick(evt) {
            this.presentationMode.request();
            this.close();
        },

        openFileClick: function secondaryToolbarOpenFileClick(evt) {
            document.getElementById('fileInput').click();
            this.close();
        },

        printClick: function secondaryToolbarPrintClick(evt) {
            window.print();
            this.close();
        },

        downloadClick: function secondaryToolbarDownloadClick(evt) {
            PDFViewerApplication.download();
            this.close();
        },

        viewBookmarkClick: function secondaryToolbarViewBookmarkClick(evt) {
            this.close();
        },

        firstPageClick: function secondaryToolbarFirstPageClick(evt) {
            PDFViewerApplication.page = 1;
            this.close();
        },

        lastPageClick: function secondaryToolbarLastPageClick(evt) {
            if (PDFViewerApplication.pdfDocument) {
                PDFViewerApplication.page = PDFViewerApplication.pagesCount;
            }
            this.close();
        },

        pageRotateCwClick: function secondaryToolbarPageRotateCwClick(evt) {
            PDFViewerApplication.rotatePages(90);
        },

        pageRotateCcwClick: function secondaryToolbarPageRotateCcwClick(evt) {
            PDFViewerApplication.rotatePages(-90);
        },

        documentPropertiesClick: function secondaryToolbarDocumentPropsClick(evt) {
            this.documentProperties.open();
            this.close();
        },
        setMaxHeight: function secondaryToolbarSetMaxHeight(container) {
            if (!container || !this.buttonContainer) {
                return;
            }
            this.newContainerHeight = container.clientHeight;
            if (this.previousContainerHeight === this.newContainerHeight) {
                return;
            }
            this.buttonContainer.setAttribute('style',
                'max-height: ' + (this.newContainerHeight - SCROLLBAR_PADDING) + 'px;');
            this.previousContainerHeight = this.newContainerHeight;
        },

        open: function secondaryToolbarOpen() {
            if (this.opened) {
                return;
            }
            this.opened = true;
            this.toggleButton.classList.add('toggled');
            this.toolbar.classList.remove('hidden');
        },

        close: function secondaryToolbarClose(target) {
            if (!this.opened) {
                return;
            } else if (target && !this.toolbar.contains(target)) {
                return;
            }
            this.opened = false;
            this.toolbar.classList.add('hidden');
            this.toggleButton.classList.remove('toggled');
        },

        toggle: function secondaryToolbarToggle() {
            if (this.opened) {
                this.close();
            } else {
                this.open();
            }
        }
    };


    var DELAY_BEFORE_HIDING_CONTROLS = 3000;
    var SELECTOR = 'presentationControls';
    var DELAY_BEFORE_RESETTING_SWITCH_IN_PROGRESS = 1000;

    var PresentationMode = {
        active: false,
        args: null,
        contextMenuOpen: false,
        prevCoords: { x: null, y: null },

        initialize: function presentationModeInitialize(options) {
            this.container = options.container;
            this.secondaryToolbar = options.secondaryToolbar;

            this.viewer = this.container.firstElementChild;

            this.firstPage = options.firstPage;
            this.lastPage = options.lastPage;
            this.pageRotateCw = options.pageRotateCw;
            this.pageRotateCcw = options.pageRotateCcw;

            this.firstPage.addEventListener('click', function() {
                this.contextMenuOpen = false;
                this.secondaryToolbar.firstPageClick();
            }.bind(this));
            this.lastPage.addEventListener('click', function() {
                this.contextMenuOpen = false;
                this.secondaryToolbar.lastPageClick();
            }.bind(this));

            this.pageRotateCw.addEventListener('click', function() {
                this.contextMenuOpen = false;
                this.secondaryToolbar.pageRotateCwClick();
            }.bind(this));
            this.pageRotateCcw.addEventListener('click', function() {
                this.contextMenuOpen = false;
                this.secondaryToolbar.pageRotateCcwClick();
            }.bind(this));
        },

        get isFullscreen() {
            return (document.fullscreenElement ||
                document.mozFullScreen ||
                document.webkitIsFullScreen ||
                document.msFullscreenElement);
        },
        _setSwitchInProgress: function presentationMode_setSwitchInProgress() {
            if (this.switchInProgress) {
                clearTimeout(this.switchInProgress);
            }
            this.switchInProgress = setTimeout(function switchInProgressTimeout() {
                delete this.switchInProgress;
                this._notifyStateChange();
            }.bind(this), DELAY_BEFORE_RESETTING_SWITCH_IN_PROGRESS);
        },

        _resetSwitchInProgress: function presentationMode_resetSwitchInProgress() {
            if (this.switchInProgress) {
                clearTimeout(this.switchInProgress);
                delete this.switchInProgress;
            }
        },

        request: function presentationModeRequest() {
            if (!PDFViewerApplication.supportsFullscreen || this.isFullscreen ||
                !this.viewer.hasChildNodes()) {
                return false;
            }
            this._setSwitchInProgress();
            this._notifyStateChange();

            if (this.container.requestFullscreen) {
                this.container.requestFullscreen();
            } else if (this.container.mozRequestFullScreen) {
                this.container.mozRequestFullScreen();
            } else if (this.container.webkitRequestFullscreen) {
                this.container.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
            } else if (this.container.msRequestFullscreen) {
                this.container.msRequestFullscreen();
            } else {
                return false;
            }

            this.args = {
                page: PDFViewerApplication.page,
                previousScale: PDFViewerApplication.currentScaleValue
            };

            return true;
        },

        _notifyStateChange: function presentationModeNotifyStateChange() {
            var event = document.createEvent('CustomEvent');
            event.initCustomEvent('presentationmodechanged', true, true, {
                active: PresentationMode.active,
                switchInProgress: !!PresentationMode.switchInProgress
            });
            window.dispatchEvent(event);
        },

        enter: function presentationModeEnter() {
            this.active = true;
            this._resetSwitchInProgress();
            this._notifyStateChange();
            setTimeout(function enterPresentationModeTimeout() {
                PDFViewerApplication.page = this.args.page;
                PDFViewerApplication.setScale('page-fit', true);
            }.bind(this), 0);

            window.addEventListener('mousemove', this.mouseMove, false);
            window.addEventListener('mousedown', this.mouseDown, false);
            window.addEventListener('contextmenu', this.contextMenu, false);

            this.showControls();
            HandTool.enterPresentationMode();
            this.contextMenuOpen = false;
            this.container.setAttribute('contextmenu', 'viewerContextMenu');

            window.getSelection().removeAllRanges();
        },

        exit: function presentationModeExit() {
            var page = PDFViewerApplication.page;
            setTimeout(function exitPresentationModeTimeout() {
                this.active = false;
                this._notifyStateChange();

                PDFViewerApplication.setScale(this.args.previousScale, true);
                PDFViewerApplication.page = page;
                this.args = null;
            }.bind(this), 0);

            window.removeEventListener('mousemove', this.mouseMove, false);
            window.removeEventListener('mousedown', this.mouseDown, false);
            window.removeEventListener('contextmenu', this.contextMenu, false);

            this.hideControls();
            PDFViewerApplication.clearMouseScrollState();
            HandTool.exitPresentationMode();
            this.container.removeAttribute('contextmenu');
            this.contextMenuOpen = false;
            scrollIntoView(document.getElementById('thumbnailContainer' + page));
        },

        showControls: function presentationModeShowControls() {
            if (this.controlsTimeout) {
                clearTimeout(this.controlsTimeout);
            } else {
                this.container.classList.add(SELECTOR);
            }
            this.controlsTimeout = setTimeout(function hideControlsTimeout() {
                this.container.classList.remove(SELECTOR);
                delete this.controlsTimeout;
            }.bind(this), DELAY_BEFORE_HIDING_CONTROLS);
        },

        hideControls: function presentationModeHideControls() {
            if (!this.controlsTimeout) {
                return;
            }
            this.container.classList.remove(SELECTOR);
            clearTimeout(this.controlsTimeout);
            delete this.controlsTimeout;
        },

        mouseMove: function presentationModeMouseMove(evt) {
            var currCoords = { x: evt.clientX, y: evt.clientY };
            var prevCoords = PresentationMode.prevCoords;
            PresentationMode.prevCoords = currCoords;

            if (currCoords.x === prevCoords.x && currCoords.y === prevCoords.y) {
                return;
            }
            PresentationMode.showControls();
        },

        mouseDown: function presentationModeMouseDown(evt) {
            var self = PresentationMode;
            if (self.contextMenuOpen) {
                self.contextMenuOpen = false;
                evt.preventDefault();
                return;
            }

            if (evt.button === 0) {
                var isInternalLink = (evt.target.href &&
                    evt.target.classList.contains('internalLink'));
                if (!isInternalLink) {
                    evt.preventDefault();
                    PDFViewerApplication.page += (evt.shiftKey ? -1 : 1);
                }
            }
        },
        contextMenu: function presentationModeContextMenu(evt) {
            PresentationMode.contextMenuOpen = true;
        }
    };

    (function presentationModeClosure() {
        function presentationModeChange(e) {
            if (PresentationMode.isFullscreen) {
                PresentationMode.enter();
            } else {
                PresentationMode.exit();
            }
        }

        window.addEventListener('fullscreenchange', presentationModeChange, false);
        window.addEventListener('mozfullscreenchange', presentationModeChange, false);
        window.addEventListener('webkitfullscreenchange', presentationModeChange,
            false);
        window.addEventListener('MSFullscreenChange', presentationModeChange, false);
    })();


    'use strict';

    var GrabToPan = (function GrabToPanClosure() {

        function GrabToPan(options) {
            this.element = options.element;
            this.document = options.element.ownerDocument;
            if (typeof options.ignoreTarget === 'function') {
                this.ignoreTarget = options.ignoreTarget;
            }
            this.onActiveChanged = options.onActiveChanged;
            this.activate = this.activate.bind(this);
            this.deactivate = this.deactivate.bind(this);
            this.toggle = this.toggle.bind(this);
            this._onmousedown = this._onmousedown.bind(this);
            this._onmousemove = this._onmousemove.bind(this);
            this._endPan = this._endPan.bind(this);
            var overlay = this.overlay = document.createElement('div');
            overlay.className = 'grab-to-pan-grabbing';
        }
        GrabToPan.prototype = {
            CSS_CLASS_GRAB: 'grab-to-pan-grab',
            activate: function GrabToPan_activate() {
                if (!this.active) {
                    this.active = true;
                    this.element.addEventListener('mousedown', this._onmousedown, true);
                    this.element.classList.add(this.CSS_CLASS_GRAB);
                    if (this.onActiveChanged) {
                        this.onActiveChanged(true);
                    }
                }
            },
            deactivate: function GrabToPan_deactivate() {
                if (this.active) {
                    this.active = false;
                    this.element.removeEventListener('mousedown', this._onmousedown, true);
                    this._endPan();
                    this.element.classList.remove(this.CSS_CLASS_GRAB);
                    if (this.onActiveChanged) {
                        this.onActiveChanged(false);
                    }
                }
            },

            toggle: function GrabToPan_toggle() {
                if (this.active) {
                    this.deactivate();
                } else {
                    this.activate();
                }
            },
            ignoreTarget: function GrabToPan_ignoreTarget(node) {
                return node[matchesSelector](
                    'a[href], a[href] *, input, textarea, button, button *, select, option'
                );
            },
            _onmousedown: function GrabToPan__onmousedown(event) {
                if (event.button !== 0 || this.ignoreTarget(event.target)) {
                    return;
                }
                if (event.originalTarget) {
                    try {
                        event.originalTarget.tagName;
                    } catch (e) {
                        return;
                    }
                }

                this.scrollLeftStart = this.element.scrollLeft;
                this.scrollTopStart = this.element.scrollTop;
                this.clientXStart = event.clientX;
                this.clientYStart = event.clientY;
                this.document.addEventListener('mousemove', this._onmousemove, true);
                this.document.addEventListener('mouseup', this._endPan, true);
                this.element.addEventListener('scroll', this._endPan, true);
                event.preventDefault();
                event.stopPropagation();
                this.document.documentElement.classList.add(this.CSS_CLASS_GRABBING);

                var focusedElement = document.activeElement;
                if (focusedElement && !focusedElement.contains(event.target)) {
                    focusedElement.blur();
                }
            },
            _onmousemove: function GrabToPan__onmousemove(event) {
                this.element.removeEventListener('scroll', this._endPan, true);
                if (isLeftMouseReleased(event)) {
                    this._endPan();
                    return;
                }
                var xDiff = event.clientX - this.clientXStart;
                var yDiff = event.clientY - this.clientYStart;
                this.element.scrollTop = this.scrollTopStart - yDiff;
                this.element.scrollLeft = this.scrollLeftStart - xDiff;
                if (!this.overlay.parentNode) {
                    document.body.appendChild(this.overlay);
                }
            },
            _endPan: function GrabToPan__endPan() {
                this.element.removeEventListener('scroll', this._endPan, true);
                this.document.removeEventListener('mousemove', this._onmousemove, true);
                this.document.removeEventListener('mouseup', this._endPan, true);
                if (this.overlay.parentNode) {
                    this.overlay.parentNode.removeChild(this.overlay);
                }
            }
        };
        var matchesSelector;
        ['webkitM', 'mozM', 'msM', 'oM', 'm'].some(function(prefix) {
            var name = prefix + 'atches';
            if (name in document.documentElement) {
                matchesSelector = name;
            }
            name += 'Selector';
            if (name in document.documentElement) {
                matchesSelector = name;
            }
            return matchesSelector;
        });
        var isNotIEorIsIE10plus = !document.documentMode || document.documentMode > 9;
        var chrome = window.chrome;
        var isChrome15OrOpera15plus = chrome && (chrome.webstore || chrome.app);
        var isSafari6plus = /Apple/.test(navigator.vendor) &&
            /Version\/([6-9]\d*|[1-5]\d+)/.test(navigator.userAgent);

        function isLeftMouseReleased(event) {
            if ('buttons' in event && isNotIEorIsIE10plus) {
                return !(event.buttons | 1);
            }
            if (isChrome15OrOpera15plus || isSafari6plus) {
                return event.which === 0;
            }
        }

        return GrabToPan;
    })();

    var HandTool = {
        initialize: function handToolInitialize(options) {
            var toggleHandTool = options.toggleHandTool;
            this.handTool = new GrabToPan({
                element: options.container,
                onActiveChanged: function(isActive) {
                    if (!toggleHandTool) {
                        return;
                    }
                    if (isActive) {
                        toggleHandTool.title =
                            mozL10n.get('hand_tool_disable.title', null, 'Disable hand tool');
                        toggleHandTool.firstElementChild.textContent =
                            mozL10n.get('hand_tool_disable_label', null, 'Disable hand tool');
                    } else {
                        toggleHandTool.title =
                            mozL10n.get('hand_tool_enable.title', null, 'Enable hand tool');
                        toggleHandTool.firstElementChild.textContent =
                            mozL10n.get('hand_tool_enable_label', null, 'Enable hand tool');
                    }
                }
            });
            if (toggleHandTool) {
                toggleHandTool.addEventListener('click', this.toggle.bind(this), false);

                window.addEventListener('localized', function (evt) {
                    Preferences.get('enableHandToolOnLoad').then(function resolved(value) {
                        if (value) {
                            this.handTool.activate();
                        }
                    }.bind(this), function rejected(reason) {});
                }.bind(this));
            }
        },

        toggle: function handToolToggle() {
            this.handTool.toggle();
            SecondaryToolbar.close();
        },

        enterPresentationMode: function handToolEnterPresentationMode() {
            if (this.handTool.active) {
                this.wasActive = true;
                this.handTool.deactivate();
            }
        },

        exitPresentationMode: function handToolExitPresentationMode() {
            if (this.wasActive) {
                this.wasActive = null;
                this.handTool.activate();
            }
        }
    };


    var OverlayManager = {
        overlays: {},
        active: null,
        register: function overlayManagerRegister(name,
                                                  callerCloseMethod, canForceClose) {
            return new Promise(function (resolve) {
                var element, container;
                if (!name || !(element = document.getElementById(name)) ||
                    !(container = element.parentNode)) {
                    throw new Error('Not enough parameters.');
                } else if (this.overlays[name]) {
                    throw new Error('The overlay is already registered.');
                }
                this.overlays[name] = { element: element,
                    container: container,
                    callerCloseMethod: (callerCloseMethod || null),
                    canForceClose: (canForceClose || false) };
                resolve();
            }.bind(this));
        },

        unregister: function overlayManagerUnregister(name) {
            return new Promise(function (resolve) {
                if (!this.overlays[name]) {
                    throw new Error('The overlay does not exist.');
                } else if (this.active === name) {
                    throw new Error('The overlay cannot be removed while it is active.');
                }
                delete this.overlays[name];

                resolve();
            }.bind(this));
        },

        open: function overlayManagerOpen(name) {
            return new Promise(function (resolve) {
                if (!this.overlays[name]) {
                    throw new Error('The overlay does not exist.');
                } else if (this.active) {
                    if (this.overlays[name].canForceClose) {
                        this._closeThroughCaller();
                    } else if (this.active === name) {
                        throw new Error('The overlay is already active.');
                    } else {
                        throw new Error('Another overlay is currently active.');
                    }
                }
                this.active = name;
                this.overlays[this.active].element.classList.remove('hidden');
                this.overlays[this.active].container.classList.remove('hidden');

                window.addEventListener('keydown', this._keyDown);
                resolve();
            }.bind(this));
        },
        close: function overlayManagerClose(name) {
            return new Promise(function (resolve) {
                if (!this.overlays[name]) {
                    throw new Error('The overlay does not exist.');
                } else if (!this.active) {
                    throw new Error('The overlay is currently not active.');
                } else if (this.active !== name) {
                    throw new Error('Another overlay is currently active.');
                }
                this.overlays[this.active].container.classList.add('hidden');
                this.overlays[this.active].element.classList.add('hidden');
                this.active = null;

                window.removeEventListener('keydown', this._keyDown);
                resolve();
            }.bind(this));
        },

        _keyDown: function overlayManager_keyDown(evt) {
            var self = OverlayManager;
            if (self.active && evt.keyCode === 27) { // Esc key.
                self._closeThroughCaller();
                evt.preventDefault();
            }
        },

        _closeThroughCaller: function overlayManager_closeThroughCaller() {
            if (this.overlays[this.active].callerCloseMethod) {
                this.overlays[this.active].callerCloseMethod();
            }
            if (this.active) {
                this.close(this.active);
            }
        }
    };


    var PasswordPrompt = {
        overlayName: null,
        updatePassword: null,
        reason: null,
        passwordField: null,
        passwordText: null,
        passwordSubmit: null,
        passwordCancel: null,

        initialize: function secondaryToolbarInitialize(options) {
            this.overlayName = options.overlayName;
            this.passwordField = options.passwordField;
            this.passwordText = options.passwordText;
            this.passwordSubmit = options.passwordSubmit;
            this.passwordCancel = options.passwordCancel;
            this.passwordSubmit.addEventListener('click',
                this.verifyPassword.bind(this));

            this.passwordCancel.addEventListener('click', this.close.bind(this));

            this.passwordField.addEventListener('keydown', function (e) {
                if (e.keyCode === 13) {
                    this.verifyPassword();
                }
            }.bind(this));

            OverlayManager.register(this.overlayName, this.close.bind(this), true);
        },

        open: function passwordPromptOpen() {
            OverlayManager.open(this.overlayName).then(function () {
                this.passwordField.focus();

                var promptString = mozL10n.get('password_label', null,
                    'Enter the password to open this PDF file.');

                if (this.reason === PDFJS.PasswordResponses.INCORRECT_PASSWORD) {
                    promptString = mozL10n.get('password_invalid', null,
                        'Invalid password. Please try again.');
                }

                this.passwordText.textContent = promptString;
            }.bind(this));
        },

        close: function passwordPromptClose() {
            OverlayManager.close(this.overlayName).then(function () {
                this.passwordField.value = '';
            }.bind(this));
        },

        verifyPassword: function passwordPromptVerifyPassword() {
            var password = this.passwordField.value;
            if (password && password.length > 0) {
                this.close();
                return this.updatePassword(password);
            }
        }
    };


    var DocumentProperties = {
        overlayName: null,
        rawFileSize: 0,
        fileNameField: null,
        fileSizeField: null,
        titleField: null,
        authorField: null,
        subjectField: null,
        keywordsField: null,
        creationDateField: null,
        modificationDateField: null,
        creatorField: null,
        producerField: null,
        versionField: null,
        pageCountField: null,
        url: null,
        pdfDocument: null,

        initialize: function documentPropertiesInitialize(options) {
            this.overlayName = options.overlayName;
            this.fileNameField = options.fileNameField;
            this.fileSizeField = options.fileSizeField;
            this.titleField = options.titleField;
            this.authorField = options.authorField;
            this.subjectField = options.subjectField;
            this.keywordsField = options.keywordsField;
            this.creationDateField = options.creationDateField;
            this.modificationDateField = options.modificationDateField;
            this.creatorField = options.creatorField;
            this.producerField = options.producerField;
            this.versionField = options.versionField;
            this.pageCountField = options.pageCountField;
            if (options.closeButton) {
                options.closeButton.addEventListener('click', this.close.bind(this));
            }

            this.dataAvailablePromise = new Promise(function (resolve) {
                this.resolveDataAvailable = resolve;
            }.bind(this));

            OverlayManager.register(this.overlayName, this.close.bind(this));
        },

        getProperties: function documentPropertiesGetProperties() {
            if (!OverlayManager.active) {
                return;
            }
            this.pdfDocument.getDownloadInfo().then(function(data) {
                if (data.length === this.rawFileSize) {
                    return;
                }
                this.setFileSize(data.length);
                this.updateUI(this.fileSizeField, this.parseFileSize());
            }.bind(this));
            this.pdfDocument.getMetadata().then(function(data) {
                var fields = [
                    { field: this.fileNameField,
                        content: getPDFFileNameFromURL(this.url) },
                    { field: this.fileSizeField, content: this.parseFileSize() },
                    { field: this.titleField, content: data.info.Title },
                    { field: this.authorField, content: data.info.Author },
                    { field: this.subjectField, content: data.info.Subject },
                    { field: this.keywordsField, content: data.info.Keywords },
                    { field: this.creationDateField,
                        content: this.parseDate(data.info.CreationDate) },
                    { field: this.modificationDateField,
                        content: this.parseDate(data.info.ModDate) },
                    { field: this.creatorField, content: data.info.Creator },
                    { field: this.producerField, content: data.info.Producer },
                    { field: this.versionField, content: data.info.PDFFormatVersion },
                    { field: this.pageCountField, content: this.pdfDocument.numPages }
                ];
                for (var item in fields) {
                    var element = fields[item];
                    this.updateUI(element.field, element.content);
                }
            }.bind(this));
        },

        updateUI: function documentPropertiesUpdateUI(field, content) {
            if (field && content !== undefined && content !== '') {
                field.textContent = content;
            }
        },

        setFileSize: function documentPropertiesSetFileSize(fileSize) {
            if (fileSize > 0) {
                this.rawFileSize = fileSize;
            }
        },

        parseFileSize: function documentPropertiesParseFileSize() {
            var fileSize = this.rawFileSize, kb = fileSize / 1024;
            if (!kb) {
                return;
            } else if (kb < 1024) {
                return mozL10n.get('document_properties_kb', {
                    size_kb: (+kb.toPrecision(3)).toLocaleString(),
                    size_b: fileSize.toLocaleString()
                }, '{{size_kb}} KB ({{size_b}} bytes)');
            } else {
                return mozL10n.get('document_properties_mb', {
                    size_mb: (+(kb / 1024).toPrecision(3)).toLocaleString(),
                    size_b: fileSize.toLocaleString()
                }, '{{size_mb}} MB ({{size_b}} bytes)');
            }
        },

        open: function documentPropertiesOpen() {
            Promise.all([OverlayManager.open(this.overlayName),
                this.dataAvailablePromise]).then(function () {
                this.getProperties();
            }.bind(this));
        },

        close: function documentPropertiesClose() {
            OverlayManager.close(this.overlayName);
        },

        parseDate: function documentPropertiesParseDate(inputDate) {
            var dateToParse = inputDate;
            if (dateToParse === undefined) {
                return '';
            }
            if (dateToParse.substring(0,2) === 'D:') {
                dateToParse = dateToParse.substring(2);
            }
            var year = parseInt(dateToParse.substring(0,4), 10);
            var month = parseInt(dateToParse.substring(4,6), 10) - 1;
            var day = parseInt(dateToParse.substring(6,8), 10);
            var hours = parseInt(dateToParse.substring(8,10), 10);
            var minutes = parseInt(dateToParse.substring(10,12), 10);
            var seconds = parseInt(dateToParse.substring(12,14), 10);
            var utRel = dateToParse.substring(14,15);
            var offsetHours = parseInt(dateToParse.substring(15,17), 10);
            var offsetMinutes = parseInt(dateToParse.substring(18,20), 10);
            if (utRel === '-') {
                hours += offsetHours;
                minutes += offsetMinutes;
            } else if (utRel === '+') {
                hours -= offsetHours;
                minutes -= offsetMinutes;
            }
            var date = new Date(Date.UTC(year, month, day, hours, minutes, seconds));
            var dateString = date.toLocaleDateString();
            var timeString = date.toLocaleTimeString();
            return mozL10n.get('document_properties_date_string',
                {date: dateString, time: timeString},
                '{{date}}, {{time}}');
        }
    };


    var PresentationModeState = {
        UNKNOWN: 0,
        NORMAL: 1,
        CHANGING: 2,
        FULLSCREEN: 3,
    };

    var IGNORE_CURRENT_POSITION_ON_ZOOM = false;
    var DEFAULT_CACHE_SIZE = 10;


    var CLEANUP_TIMEOUT = 30000;

    var RenderingStates = {
        INITIAL: 0,
        RUNNING: 1,
        PAUSED: 2,
        FINISHED: 3
    };

    var PDFRenderingQueue = (function PDFRenderingQueueClosure() {
        function PDFRenderingQueue() {
            this.pdfViewer = null;
            this.pdfThumbnailViewer = null;
            this.onIdle = null;

            this.highestPriorityPage = null;
            this.idleTimeout = null;
            this.printing = false;
            this.isThumbnailViewEnabled = false;
        }

        PDFRenderingQueue.prototype =  {
            setViewer: function PDFRenderingQueue_setViewer(pdfViewer) {
                this.pdfViewer = pdfViewer;
            },
            setThumbnailViewer:
                function PDFRenderingQueue_setThumbnailViewer(pdfThumbnailViewer) {
                    this.pdfThumbnailViewer = pdfThumbnailViewer;
                },
            isHighestPriority: function PDFRenderingQueue_isHighestPriority(view) {
                return this.highestPriorityPage === view.renderingId;
            },

            renderHighestPriority: function
                PDFRenderingQueue_renderHighestPriority(currentlyVisiblePages) {
                if (this.idleTimeout) {
                    clearTimeout(this.idleTimeout);
                    this.idleTimeout = null;
                }
                if (this.pdfViewer.forceRendering(currentlyVisiblePages)) {
                    return;
                }
                if (this.pdfThumbnailViewer && this.isThumbnailViewEnabled) {
                    if (this.pdfThumbnailViewer.forceRendering()) {
                        return;
                    }
                }

                if (this.printing) {
                    return;
                }

                if (this.onIdle) {
                    this.idleTimeout = setTimeout(this.onIdle.bind(this), CLEANUP_TIMEOUT);
                }
            },

            getHighestPriority: function
                PDFRenderingQueue_getHighestPriority(visible, views, scrolledDown) {
                var visibleViews = visible.views;

                var numVisible = visibleViews.length;
                if (numVisible === 0) {
                    return false;
                }
                for (var i = 0; i < numVisible; ++i) {
                    var view = visibleViews[i].view;
                    if (!this.isViewFinished(view)) {
                        return view;
                    }
                }

                if (scrolledDown) {
                    var nextPageIndex = visible.last.id;
                    if (views[nextPageIndex] &&
                        !this.isViewFinished(views[nextPageIndex])) {
                        return views[nextPageIndex];
                    }
                } else {
                    var previousPageIndex = visible.first.id - 2;
                    if (views[previousPageIndex] &&
                        !this.isViewFinished(views[previousPageIndex])) {
                        return views[previousPageIndex];
                    }
                }
                return null;
            },

            isViewFinished: function PDFRenderingQueue_isViewFinished(view) {
                return view.renderingState === RenderingStates.FINISHED;
            },

            renderView: function PDFRenderingQueue_renderView(view) {
                var state = view.renderingState;
                switch (state) {
                    case RenderingStates.FINISHED:
                        return false;
                    case RenderingStates.PAUSED:
                        this.highestPriorityPage = view.renderingId;
                        view.resume();
                        break;
                    case RenderingStates.RUNNING:
                        this.highestPriorityPage = view.renderingId;
                        break;
                    case RenderingStates.INITIAL:
                        this.highestPriorityPage = view.renderingId;
                        var continueRendering = function () {
                            this.renderHighestPriority();
                        }.bind(this);
                        view.draw().then(continueRendering, continueRendering);
                        break;
                }
                return true;
            },
        };

        return PDFRenderingQueue;
    })();


    var TEXT_LAYER_RENDER_DELAY = 200;

    var PDFPageView = (function PDFPageViewClosure() {

        function PDFPageView(options) {
            var container = options.container;
            var id = options.id;
            var scale = options.scale;
            var defaultViewport = options.defaultViewport;
            var renderingQueue = options.renderingQueue;
            var textLayerFactory = options.textLayerFactory;
            var annotationsLayerFactory = options.annotationsLayerFactory;

            this.id = id;
            this.renderingId = 'page' + id;

            this.rotation = 0;
            this.scale = scale || 1.0;
            this.viewport = defaultViewport;
            this.pdfPageRotate = defaultViewport.rotation;
            this.hasRestrictedScaling = false;

            this.renderingQueue = renderingQueue;
            this.textLayerFactory = textLayerFactory;
            this.annotationsLayerFactory = annotationsLayerFactory;

            this.renderingState = RenderingStates.INITIAL;
            this.resume = null;

            this.onBeforeDraw = null;
            this.onAfterDraw = null;

            this.textLayer = null;

            this.zoomLayer = null;

            this.annotationLayer = null;

            var div = document.createElement('div');
            div.id = 'pageContainer' + this.id;
            div.className = 'page';
            div.style.width = Math.floor(this.viewport.width) + 'px';
            div.style.height = Math.floor(this.viewport.height) + 'px';
            this.div = div;

            container.appendChild(div);
        }

        PDFPageView.prototype = {
            setPdfPage: function PDFPageView_setPdfPage(pdfPage) {
                this.pdfPage = pdfPage;
                this.pdfPageRotate = pdfPage.rotate;
                var totalRotation = (this.rotation + this.pdfPageRotate) % 360;
                this.viewport = pdfPage.getViewport(this.scale * CSS_UNITS,
                    totalRotation);
                this.stats = pdfPage.stats;
                this.reset();
            },

            destroy: function PDFPageView_destroy() {
                this.zoomLayer = null;
                this.reset();
                if (this.pdfPage) {
                    this.pdfPage.destroy();
                }
            },

            reset: function PDFPageView_reset(keepAnnotations) {
                if (this.renderTask) {
                    this.renderTask.cancel();
                }
                this.resume = null;
                this.renderingState = RenderingStates.INITIAL;

                var div = this.div;
                div.style.width = Math.floor(this.viewport.width) + 'px';
                div.style.height = Math.floor(this.viewport.height) + 'px';

                var childNodes = div.childNodes;
                var currentZoomLayer = this.zoomLayer || null;
                var currentAnnotationNode = (keepAnnotations && this.annotationLayer &&
                    this.annotationLayer.div) || null;
                for (var i = childNodes.length - 1; i >= 0; i--) {
                    var node = childNodes[i];
                    if (currentZoomLayer === node || currentAnnotationNode === node) {
                        continue;
                    }
                    div.removeChild(node);
                }
                div.removeAttribute('data-loaded');

                if (keepAnnotations) {
                    if (this.annotationLayer) {
                        this.annotationLayer.hide();
                    }
                } else {
                    this.annotationLayer = null;
                }

                if (this.canvas) {
                    this.canvas.width = 0;
                    this.canvas.height = 0;
                    delete this.canvas;
                }

                this.loadingIconDiv = document.createElement('div');
                this.loadingIconDiv.className = 'loadingIcon';
                div.appendChild(this.loadingIconDiv);
            },

            update: function PDFPageView_update(scale, rotation) {
                this.scale = scale || this.scale;

                if (typeof rotation !== 'undefined') {
                    this.rotation = rotation;
                }

                var totalRotation = (this.rotation + this.pdfPageRotate) % 360;
                this.viewport = this.viewport.clone({
                    scale: this.scale * CSS_UNITS,
                    rotation: totalRotation
                });

                var isScalingRestricted = false;
                if (this.canvas && PDFJS.maxCanvasPixels > 0) {
                    var ctx = this.canvas.getContext('2d');
                    var outputScale = getOutputScale(ctx);
                    var pixelsInViewport = this.viewport.width * this.viewport.height;
                    var maxScale = Math.sqrt(PDFJS.maxCanvasPixels / pixelsInViewport);
                    if (((Math.floor(this.viewport.width) * outputScale.sx) | 0) *
                        ((Math.floor(this.viewport.height) * outputScale.sy) | 0) >
                        PDFJS.maxCanvasPixels) {
                        isScalingRestricted = true;
                    }
                }

                if (this.canvas &&
                    (PDFJS.useOnlyCssZoom ||
                        (this.hasRestrictedScaling && isScalingRestricted))) {
                    this.cssTransform(this.canvas, true);
                    return;
                } else if (this.canvas && !this.zoomLayer) {
                    this.zoomLayer = this.canvas.parentNode;
                    this.zoomLayer.style.position = 'absolute';
                }
                if (this.zoomLayer) {
                    this.cssTransform(this.zoomLayer.firstChild);
                }
                this.reset(true);
            },
            updatePosition: function PDFPageView_updatePosition() {
                if (this.textLayer) {
                    this.textLayer.render(TEXT_LAYER_RENDER_DELAY);
                }
            },

            cssTransform: function PDFPageView_transform(canvas, redrawAnnotations) {
                var width = this.viewport.width;
                var height = this.viewport.height;
                var div = this.div;
                canvas.style.width = canvas.parentNode.style.width = div.style.width =
                    Math.floor(width) + 'px';
                canvas.style.height = canvas.parentNode.style.height = div.style.height =
                    Math.floor(height) + 'px';
                var relativeRotation = this.viewport.rotation - canvas._viewport.rotation;
                var absRotation = Math.abs(relativeRotation);
                var scaleX = 1, scaleY = 1;
                if (absRotation === 90 || absRotation === 270) {
                    scaleX = height / width;
                    scaleY = width / height;
                }
                var cssTransform = 'rotate(' + relativeRotation + 'deg) ' +
                    'scale(' + scaleX + ',' + scaleY + ')';
                CustomStyle.setProp('transform', canvas, cssTransform);

                if (this.textLayer) {
                    var textLayerViewport = this.textLayer.viewport;
                    var textRelativeRotation = this.viewport.rotation -
                        textLayerViewport.rotation;
                    var textAbsRotation = Math.abs(textRelativeRotation);
                    var scale = width / textLayerViewport.width;
                    if (textAbsRotation === 90 || textAbsRotation === 270) {
                        scale = width / textLayerViewport.height;
                    }
                    var textLayerDiv = this.textLayer.textLayerDiv;
                    var transX, transY;
                    switch (textAbsRotation) {
                        case 0:
                            transX = transY = 0;
                            break;
                        case 90:
                            transX = 0;
                            transY = '-' + textLayerDiv.style.height;
                            break;
                        case 180:
                            transX = '-' + textLayerDiv.style.width;
                            transY = '-' + textLayerDiv.style.height;
                            break;
                        case 270:
                            transX = '-' + textLayerDiv.style.width;
                            transY = 0;
                            break;
                        default:
                            console.error('Bad rotation value.');
                            break;
                    }
                    CustomStyle.setProp('transform', textLayerDiv,
                        'rotate(' + textAbsRotation + 'deg) ' +
                        'scale(' + scale + ', ' + scale + ') ' +
                        'translate(' + transX + ', ' + transY + ')');
                    CustomStyle.setProp('transformOrigin', textLayerDiv, '0% 0%');
                }

                if (redrawAnnotations && this.annotationLayer) {
                    this.annotationLayer.setupAnnotations(this.viewport);
                }
            },

            get width() {
                return this.viewport.width;
            },

            get height() {
                return this.viewport.height;
            },

            getPagePoint: function PDFPageView_getPagePoint(x, y) {
                return this.viewport.convertToPdfPoint(x, y);
            },

            draw: function PDFPageView_draw() {
                if (this.renderingState !== RenderingStates.INITIAL) {
                    console.error('Must be in new state before drawing');
                }

                this.renderingState = RenderingStates.RUNNING;

                var pdfPage = this.pdfPage;
                var viewport = this.viewport;
                var div = this.div;
                var canvasWrapper = document.createElement('div');
                canvasWrapper.style.width = div.style.width;
                canvasWrapper.style.height = div.style.height;
                canvasWrapper.classList.add('canvasWrapper');

                var canvas = document.createElement('canvas');
                canvas.id = 'page' + this.id;
                canvasWrapper.appendChild(canvas);
                if (this.annotationLayer) {
                    div.insertBefore(canvasWrapper, this.annotationLayer.div);
                } else {
                    div.appendChild(canvasWrapper);
                }
                this.canvas = canvas;
                var ctx = canvas.getContext('2d');
                var outputScale = getOutputScale(ctx);
                if (PDFJS.useOnlyCssZoom) {
                    var actualSizeViewport = viewport.clone({ scale: CSS_UNITS });
                    outputScale.sx *= actualSizeViewport.width / viewport.width;
                    outputScale.sy *= actualSizeViewport.height / viewport.height;
                    outputScale.scaled = true;
                }

                if (PDFJS.maxCanvasPixels > 0) {
                    var pixelsInViewport = viewport.width * viewport.height;
                    var maxScale = Math.sqrt(PDFJS.maxCanvasPixels / pixelsInViewport);
                    if (outputScale.sx > maxScale || outputScale.sy > maxScale) {
                        outputScale.sx = maxScale;
                        outputScale.sy = maxScale;
                        outputScale.scaled = true;
                        this.hasRestrictedScaling = true;
                    } else {
                        this.hasRestrictedScaling = false;
                    }
                }

                canvas.width = (Math.floor(viewport.width) * outputScale.sx) | 0;
                canvas.height = (Math.floor(viewport.height) * outputScale.sy) | 0;
                canvas.style.width = Math.floor(viewport.width) + 'px';
                canvas.style.height = Math.floor(viewport.height) + 'px';
                canvas._viewport = viewport;

                var textLayerDiv = null;
                var textLayer = null;
                if (this.textLayerFactory) {
                    textLayerDiv = document.createElement('div');
                    textLayerDiv.className = 'textLayer';
                    textLayerDiv.style.width = canvas.style.width;
                    textLayerDiv.style.height = canvas.style.height;
                    if (this.annotationLayer) {
                        div.insertBefore(textLayerDiv, this.annotationLayer.div);
                    } else {
                        div.appendChild(textLayerDiv);
                    }

                    textLayer = this.textLayerFactory.createTextLayerBuilder(textLayerDiv,
                        this.id - 1,
                        this.viewport);
                }
                this.textLayer = textLayer;
                ctx._scaleX = outputScale.sx;
                ctx._scaleY = outputScale.sy;
                if (outputScale.scaled) {
                    ctx.scale(outputScale.sx, outputScale.sy);
                }

                var resolveRenderPromise, rejectRenderPromise;
                var promise = new Promise(function (resolve, reject) {
                    resolveRenderPromise = resolve;
                    rejectRenderPromise = reject;
                });
                var self = this;
                function pageViewDrawCallback(error) {
                    if (renderTask === self.renderTask) {
                        self.renderTask = null;
                    }

                    if (error === 'cancelled') {
                        rejectRenderPromise(error);
                        return;
                    }

                    self.renderingState = RenderingStates.FINISHED;

                    if (self.loadingIconDiv) {
                        div.removeChild(self.loadingIconDiv);
                        delete self.loadingIconDiv;
                    }

                    if (self.zoomLayer) {
                        div.removeChild(self.zoomLayer);
                        self.zoomLayer = null;
                    }

                    self.error = error;
                    self.stats = pdfPage.stats;
                    if (self.onAfterDraw) {
                        self.onAfterDraw();
                    }
                    var event = document.createEvent('CustomEvent');
                    event.initCustomEvent('pagerendered', true, true, {
                        pageNumber: self.id
                    });
                    div.dispatchEvent(event);
                    var deprecatedEvent = document.createEvent('CustomEvent');
                    deprecatedEvent.initCustomEvent('pagerender', true, true, {
                        pageNumber: pdfPage.pageNumber
                    });
                    div.dispatchEvent(deprecatedEvent);

                    if (!error) {
                        resolveRenderPromise(undefined);
                    } else {
                        rejectRenderPromise(error);
                    }
                }

                var renderContinueCallback = null;
                if (this.renderingQueue) {
                    renderContinueCallback = function renderContinueCallback(cont) {
                        if (!self.renderingQueue.isHighestPriority(self)) {
                            self.renderingState = RenderingStates.PAUSED;
                            self.resume = function resumeCallback() {
                                self.renderingState = RenderingStates.RUNNING;
                                cont();
                            };
                            return;
                        }
                        cont();
                    };
                }

                var renderContext = {
                    canvasContext: ctx,
                    viewport: this.viewport,
                    continueCallback: renderContinueCallback
                };
                var renderTask = this.renderTask = this.pdfPage.render(renderContext);

                this.renderTask.promise.then(
                    function pdfPageRenderCallback() {
                        pageViewDrawCallback(null);
                        if (textLayer) {
                            self.pdfPage.getTextContent().then(
                                function textContentResolved(textContent) {
                                    textLayer.setTextContent(textContent);
                                    textLayer.render(TEXT_LAYER_RENDER_DELAY);
                                }
                            );
                        }
                    },
                    function pdfPageRenderError(error) {
                        pageViewDrawCallback(error);
                    }
                );

                if (this.annotationsLayerFactory) {
                    if (!this.annotationLayer) {
                        this.annotationLayer = this.annotationsLayerFactory.
                        createAnnotationsLayerBuilder(div, this.pdfPage);
                    }
                    this.annotationLayer.setupAnnotations(this.viewport);
                }
                div.setAttribute('data-loaded', true);

                if (self.onBeforeDraw) {
                    self.onBeforeDraw();
                }
                return promise;
            },

            beforePrint: function PDFPageView_beforePrint() {
                var pdfPage = this.pdfPage;
                var viewport = pdfPage.getViewport(1);
                var PRINT_OUTPUT_SCALE = 2;
                var canvas = document.createElement('canvas');
                canvas.width = Math.floor(viewport.width) * PRINT_OUTPUT_SCALE;
                canvas.height = Math.floor(viewport.height) * PRINT_OUTPUT_SCALE;
                canvas.style.width = (PRINT_OUTPUT_SCALE * viewport.width) + 'pt';
                canvas.style.height = (PRINT_OUTPUT_SCALE * viewport.height) + 'pt';
                var cssScale = 'scale(' + (1 / PRINT_OUTPUT_SCALE) + ', ' +
                    (1 / PRINT_OUTPUT_SCALE) + ')';
                CustomStyle.setProp('transform' , canvas, cssScale);
                CustomStyle.setProp('transformOrigin' , canvas, '0% 0%');

                var printContainer = document.getElementById('printContainer');
                var canvasWrapper = document.createElement('div');
                canvasWrapper.style.width = viewport.width + 'pt';
                canvasWrapper.style.height = viewport.height + 'pt';
                canvasWrapper.appendChild(canvas);
                printContainer.appendChild(canvasWrapper);

                canvas.mozPrintCallback = function(obj) {
                    var ctx = obj.context;

                    ctx.save();
                    ctx.fillStyle = 'rgb(255, 255, 255)';
                    ctx.fillRect(0, 0, canvas.width, canvas.height);
                    ctx.restore();
                    ctx.scale(PRINT_OUTPUT_SCALE, PRINT_OUTPUT_SCALE);

                    var renderContext = {
                        canvasContext: ctx,
                        viewport: viewport,
                        intent: 'print'
                    };

                    pdfPage.render(renderContext).promise.then(function() {
                        obj.done();
                    }, function(error) {
                        console.error(error);
                        if ('abort' in obj) {
                            obj.abort();
                        } else {
                            obj.done();
                        }
                    });
                };
            },
        };

        return PDFPageView;
    })();


    var MAX_TEXT_DIVS_TO_RENDER = 100000;

    var NonWhitespaceRegexp = /\S/;

    function isAllWhitespace(str) {
        return !NonWhitespaceRegexp.test(str);
    }

    var TextLayerBuilder = (function TextLayerBuilderClosure() {
        function TextLayerBuilder(options) {
            this.textLayerDiv = options.textLayerDiv;
            this.renderingDone = false;
            this.divContentDone = false;
            this.pageIdx = options.pageIndex;
            this.pageNumber = this.pageIdx + 1;
            this.matches = [];
            this.viewport = options.viewport;
            this.textDivs = [];
            this.findController = options.findController || null;
        }

        TextLayerBuilder.prototype = {
            _finishRendering: function TextLayerBuilder_finishRendering() {
                this.renderingDone = true;

                var event = document.createEvent('CustomEvent');
                event.initCustomEvent('textlayerrendered', true, true, {
                    pageNumber: this.pageNumber
                });
                this.textLayerDiv.dispatchEvent(event);
            },

            renderLayer: function TextLayerBuilder_renderLayer() {
                var textLayerFrag = document.createDocumentFragment();
                var textDivs = this.textDivs;
                var textDivsLength = textDivs.length;
                var canvas = document.createElement('canvas');
                var ctx = canvas.getContext('2d');
                if (textDivsLength > MAX_TEXT_DIVS_TO_RENDER) {
                    this._finishRendering();
                    return;
                }

                var lastFontSize;
                var lastFontFamily;
                for (var i = 0; i < textDivsLength; i++) {
                    var textDiv = textDivs[i];
                    if (textDiv.dataset.isWhitespace !== undefined) {
                        continue;
                    }

                    var fontSize = textDiv.style.fontSize;
                    var fontFamily = textDiv.style.fontFamily;
                    if (fontSize !== lastFontSize || fontFamily !== lastFontFamily) {
                        ctx.font = fontSize + ' ' + fontFamily;
                        lastFontSize = fontSize;
                        lastFontFamily = fontFamily;
                    }

                    var width = ctx.measureText(textDiv.textContent).width;
                    if (width > 0) {
                        textLayerFrag.appendChild(textDiv);
                        var transform;
                        if (textDiv.dataset.canvasWidth !== undefined) {
                            var textScale = textDiv.dataset.canvasWidth / width;
                            transform = 'scaleX(' + textScale + ')';
                        } else {
                            transform = '';
                        }
                        var rotation = textDiv.dataset.angle;
                        if (rotation) {
                            transform = 'rotate(' + rotation + 'deg) ' + transform;
                        }
                        if (transform) {
                            CustomStyle.setProp('transform' , textDiv, transform);
                        }
                    }
                }

                this.textLayerDiv.appendChild(textLayerFrag);
                this._finishRendering();
                this.updateMatches();
            },
            render: function TextLayerBuilder_render(timeout) {
                if (!this.divContentDone || this.renderingDone) {
                    return;
                }

                if (this.renderTimer) {
                    clearTimeout(this.renderTimer);
                    this.renderTimer = null;
                }

                if (!timeout) {
                    this.renderLayer();
                } else {
                    var self = this;
                    this.renderTimer = setTimeout(function() {
                        self.renderLayer();
                        self.renderTimer = null;
                    }, timeout);
                }
            },

            appendText: function TextLayerBuilder_appendText(geom, styles) {
                var style = styles[geom.fontName];
                var textDiv = document.createElement('div');
                this.textDivs.push(textDiv);
                if (isAllWhitespace(geom.str)) {
                    textDiv.dataset.isWhitespace = true;
                    return;
                }
                var tx = PDFJS.Util.transform(this.viewport.transform, geom.transform);
                var angle = Math.atan2(tx[1], tx[0]);
                if (style.vertical) {
                    angle += Math.PI / 2;
                }
                var fontHeight = Math.sqrt((tx[2] * tx[2]) + (tx[3] * tx[3]));
                var fontAscent = fontHeight;
                if (style.ascent) {
                    fontAscent = style.ascent * fontAscent;
                } else if (style.descent) {
                    fontAscent = (1 + style.descent) * fontAscent;
                }

                var left;
                var top;
                if (angle === 0) {
                    left = tx[4];
                    top = tx[5] - fontAscent;
                } else {
                    left = tx[4] + (fontAscent * Math.sin(angle));
                    top = tx[5] - (fontAscent * Math.cos(angle));
                }
                textDiv.style.left = left + 'px';
                textDiv.style.top = top + 'px';
                textDiv.style.fontSize = fontHeight + 'px';
                textDiv.style.fontFamily = style.fontFamily;
                textDiv.textContent = geom.str;
                if (PDFJS.pdfBug) {
                    textDiv.dataset.fontName = geom.fontName;
                }
                if (angle !== 0) {
                    textDiv.dataset.angle = angle * (180 / Math.PI);
                }
                if (textDiv.textContent.length > 1) {
                    if (style.vertical) {
                        textDiv.dataset.canvasWidth = geom.height * this.viewport.scale;
                    } else {
                        textDiv.dataset.canvasWidth = geom.width * this.viewport.scale;
                    }
                }
            },

            setTextContent: function TextLayerBuilder_setTextContent(textContent) {
                this.textContent = textContent;
                var textItems = textContent.items;
                for (var i = 0, len = textItems.length; i < len; i++) {
                    this.appendText(textItems[i], textContent.styles);
                }
                this.divContentDone = true;
            },

            convertMatches: function TextLayerBuilder_convertMatches(matches) {
                var i = 0;
                var iIndex = 0;
                var bidiTexts = this.textContent.items;
                var end = bidiTexts.length - 1;
                var queryLen = (this.findController === null ?
                    0 : this.findController.state.query.length);
                var ret = [];

                for (var m = 0, len = matches.length; m < len; m++) {
                    var matchIdx = matches[m];

                    while (i !== end && matchIdx >= (iIndex + bidiTexts[i].str.length)) {
                        iIndex += bidiTexts[i].str.length;
                        i++;
                    }

                    if (i === bidiTexts.length) {
                        console.error('Could not find a matching mapping');
                    }

                    var match = {
                        begin: {
                            divIdx: i,
                            offset: matchIdx - iIndex
                        }
                    };
                    matchIdx += queryLen;
                    while (i !== end && matchIdx > (iIndex + bidiTexts[i].str.length)) {
                        iIndex += bidiTexts[i].str.length;
                        i++;
                    }

                    match.end = {
                        divIdx: i,
                        offset: matchIdx - iIndex
                    };
                    ret.push(match);
                }

                return ret;
            },

            renderMatches: function TextLayerBuilder_renderMatches(matches) {
                if (matches.length === 0) {
                    return;
                }

                var bidiTexts = this.textContent.items;
                var textDivs = this.textDivs;
                var prevEnd = null;
                var pageIdx = this.pageIdx;
                var isSelectedPage = (this.findController === null ?
                    false : (pageIdx === this.findController.selected.pageIdx));
                var selectedMatchIdx = (this.findController === null ?
                    -1 : this.findController.selected.matchIdx);
                var highlightAll = (this.findController === null ?
                    false : this.findController.state.highlightAll);
                var infinity = {
                    divIdx: -1,
                    offset: undefined
                };

                function beginText(begin, className) {
                    var divIdx = begin.divIdx;
                    textDivs[divIdx].textContent = '';
                    appendTextToDiv(divIdx, 0, begin.offset, className);
                }

                function appendTextToDiv(divIdx, fromOffset, toOffset, className) {
                    var div = textDivs[divIdx];
                    var content = bidiTexts[divIdx].str.substring(fromOffset, toOffset);
                    var node = document.createTextNode(content);
                    if (className) {
                        var span = document.createElement('span');
                        span.className = className;
                        span.appendChild(node);
                        div.appendChild(span);
                        return;
                    }
                    div.appendChild(node);
                }

                var i0 = selectedMatchIdx, i1 = i0 + 1;
                if (highlightAll) {
                    i0 = 0;
                    i1 = matches.length;
                } else if (!isSelectedPage) {
                    return;
                }

                for (var i = i0; i < i1; i++) {
                    var match = matches[i];
                    var begin = match.begin;
                    var end = match.end;
                    var isSelected = (isSelectedPage && i === selectedMatchIdx);
                    var highlightSuffix = (isSelected ? ' selected' : '');

                    if (this.findController) {
                        this.findController.updateMatchPosition(pageIdx, i, textDivs,
                            begin.divIdx, end.divIdx);
                    }

                    if (!prevEnd || begin.divIdx !== prevEnd.divIdx) {
                        if (prevEnd !== null) {
                            appendTextToDiv(prevEnd.divIdx, prevEnd.offset, infinity.offset);
                        }
                        beginText(begin);
                    } else {
                        appendTextToDiv(prevEnd.divIdx, prevEnd.offset, begin.offset);
                    }

                    if (begin.divIdx === end.divIdx) {
                        appendTextToDiv(begin.divIdx, begin.offset, end.offset,
                            'highlight' + highlightSuffix);
                    } else {
                        appendTextToDiv(begin.divIdx, begin.offset, infinity.offset,
                            'highlight begin' + highlightSuffix);
                        for (var n0 = begin.divIdx + 1, n1 = end.divIdx; n0 < n1; n0++) {
                            textDivs[n0].className = 'highlight middle' + highlightSuffix;
                        }
                        beginText(end, 'highlight end' + highlightSuffix);
                    }
                    prevEnd = end;
                }

                if (prevEnd) {
                    appendTextToDiv(prevEnd.divIdx, prevEnd.offset, infinity.offset);
                }
            },

            updateMatches: function TextLayerBuilder_updateMatches() {
                if (!this.renderingDone) {
                    return;
                }
                var matches = this.matches;
                var textDivs = this.textDivs;
                var bidiTexts = this.textContent.items;
                var clearedUntilDivIdx = -1;
                for (var i = 0, len = matches.length; i < len; i++) {
                    var match = matches[i];
                    var begin = Math.max(clearedUntilDivIdx, match.begin.divIdx);
                    for (var n = begin, end = match.end.divIdx; n <= end; n++) {
                        var div = textDivs[n];
                        div.textContent = bidiTexts[n].str;
                        div.className = '';
                    }
                    clearedUntilDivIdx = match.end.divIdx + 1;
                }

                if (this.findController === null || !this.findController.active) {
                    return;
                }
                this.matches = this.convertMatches(this.findController === null ?
                    [] : (this.findController.pageMatches[this.pageIdx] || []));
                this.renderMatches(this.matches);
            }
        };
        return TextLayerBuilder;
    })();

    function DefaultTextLayerFactory() {}
    DefaultTextLayerFactory.prototype = {
        createTextLayerBuilder: function (textLayerDiv, pageIndex, viewport) {
            return new TextLayerBuilder({
                textLayerDiv: textLayerDiv,
                pageIndex: pageIndex,
                viewport: viewport
            });
        }
    };

    var AnnotationsLayerBuilder = (function AnnotationsLayerBuilderClosure() {
        function AnnotationsLayerBuilder(options) {
            this.pageDiv = options.pageDiv;
            this.pdfPage = options.pdfPage;
            this.linkService = options.linkService;

            this.div = null;
        }
        AnnotationsLayerBuilder.prototype = {
            setupAnnotations:
                function AnnotationsLayerBuilder_setupAnnotations(viewport) {
                    function bindLink(link, dest) {
                        link.href = linkService.getDestinationHash(dest);
                        link.onclick = function annotationsLayerBuilderLinksOnclick() {
                            if (dest) {
                                linkService.navigateTo(dest);
                            }
                            return false;
                        };
                        if (dest) {
                            link.className = 'internalLink';
                        }
                    }

                    function bindNamedAction(link, action) {
                        link.href = linkService.getAnchorUrl('');
                        link.onclick = function annotationsLayerBuilderNamedActionOnClick() {
                            linkService.executeNamedAction(action);
                            return false;
                        };
                        link.className = 'internalLink';
                    }

                    var linkService = this.linkService;
                    var pdfPage = this.pdfPage;
                    var self = this;

                    pdfPage.getAnnotations().then(function (annotationsData) {
                        viewport = viewport.clone({ dontFlip: true });
                        var transform = viewport.transform;
                        var transformStr = 'matrix(' + transform.join(',') + ')';
                        var data, element, i, ii;

                        if (self.div) {
                            for (i = 0, ii = annotationsData.length; i < ii; i++) {
                                data = annotationsData[i];
                                element = self.div.querySelector(
                                    '[data-annotation-id="' + data.id + '"]');
                                if (element) {
                                    CustomStyle.setProp('transform', element, transformStr);
                                }
                            }
                            self.div.removeAttribute('hidden');
                        } else {
                            for (i = 0, ii = annotationsData.length; i < ii; i++) {
                                data = annotationsData[i];
                                if (!data || !data.hasHtml) {
                                    continue;
                                }

                                element = PDFJS.AnnotationUtils.getHtmlElement(data,
                                    pdfPage.commonObjs);
                                element.setAttribute('data-annotation-id', data.id);
                                if (typeof mozL10n !== 'undefined') {
                                    mozL10n.translate(element);
                                }

                                var rect = data.rect;
                                var view = pdfPage.view;
                                rect = PDFJS.Util.normalizeRect([
                                    rect[0],
                                    view[3] - rect[1] + view[1],
                                    rect[2],
                                    view[3] - rect[3] + view[1]
                                ]);
                                element.style.left = rect[0] + 'px';
                                element.style.top = rect[1] + 'px';
                                element.style.position = 'absolute';

                                CustomStyle.setProp('transform', element, transformStr);
                                var transformOriginStr = -rect[0] + 'px ' + -rect[1] + 'px';
                                CustomStyle.setProp('transformOrigin', element, transformOriginStr);

                                if (data.subtype === 'Link' && !data.url) {
                                    var link = element.getElementsByTagName('a')[0];
                                    if (link) {
                                        if (data.action) {
                                            bindNamedAction(link, data.action);
                                        } else {
                                            bindLink(link, ('dest' in data) ? data.dest : null);
                                        }
                                    }
                                }

                                if (!self.div) {
                                    var annotationLayerDiv = document.createElement('div');
                                    annotationLayerDiv.className = 'annotationLayer';
                                    self.pageDiv.appendChild(annotationLayerDiv);
                                    self.div = annotationLayerDiv;
                                }

                                self.div.appendChild(element);
                            }
                        }
                    });
                },

            hide: function () {
                if (!this.div) {
                    return;
                }
                this.div.setAttribute('hidden', 'true');
            }
        };
        return AnnotationsLayerBuilder;
    })();

    function DefaultAnnotationsLayerFactory() {}
    DefaultAnnotationsLayerFactory.prototype = {
        createAnnotationsLayerBuilder: function (pageDiv, pdfPage) {
            return new AnnotationsLayerBuilder({
                pageDiv: pageDiv,
                pdfPage: pdfPage
            });
        }
    };

    var PDFViewer = (function pdfViewer() {
        function PDFPageViewBuffer(size) {
            var data = [];
            this.push = function cachePush(view) {
                var i = data.indexOf(view);
                if (i >= 0) {
                    data.splice(i, 1);
                }
                data.push(view);
                if (data.length > size) {
                    data.shift().destroy();
                }
            };
            this.resize = function (newSize) {
                size = newSize;
                while (data.length > size) {
                    data.shift().destroy();
                }
            };
        }

        function PDFViewer(options) {
            this.container = options.container;
            this.viewer = options.viewer || options.container.firstElementChild;
            this.linkService = options.linkService || new SimpleLinkService(this);
            this.removePageBorders = options.removePageBorders || false;

            this.defaultRenderingQueue = !options.renderingQueue;
            if (this.defaultRenderingQueue) {
                this.renderingQueue = new PDFRenderingQueue();
                this.renderingQueue.setViewer(this);
            } else {
                this.renderingQueue = options.renderingQueue;
            }

            this.scroll = watchScroll(this.container, this._scrollUpdate.bind(this));
            this.updateInProgress = false;
            this.presentationModeState = PresentationModeState.UNKNOWN;
            this._resetView();

            if (this.removePageBorders) {
                this.viewer.classList.add('removePageBorders');
            }
        }

        PDFViewer.prototype ={
            get pagesCount() {
                return this.pages.length;
            },

            getPageView: function (index) {
                return this.pages[index];
            },

            get currentPageNumber() {
                return this._currentPageNumber;
            },

            set currentPageNumber(val) {
                if (!this.pdfDocument) {
                    this._currentPageNumber = val;
                    return;
                }

                var event = document.createEvent('UIEvents');
                event.initUIEvent('pagechange', true, true, window, 0);
                event.updateInProgress = this.updateInProgress;

                if (!(0 < val && val <= this.pagesCount)) {
                    event.pageNumber = this._currentPageNumber;
                    event.previousPageNumber = val;
                    this.container.dispatchEvent(event);
                    return;
                }

                event.previousPageNumber = this._currentPageNumber;
                this._currentPageNumber = val;
                event.pageNumber = val;
                this.container.dispatchEvent(event);
            },

            get currentScale() {
                return this._currentScale;
            },

            set currentScale(val) {
                if (isNaN(val))  {
                    throw new Error('Invalid numeric scale');
                }
                if (!this.pdfDocument) {
                    this._currentScale = val;
                    this._currentScaleValue = val.toString();
                    return;
                }
                this._setScale(val, false);
            },

            get currentScaleValue() {
                return this._currentScaleValue;
            },

            set currentScaleValue(val) {
                if (!this.pdfDocument) {
                    this._currentScale = isNaN(val) ? UNKNOWN_SCALE : val;
                    this._currentScaleValue = val;
                    return;
                }
                this._setScale(val, false);
            },

            get pagesRotation() {
                return this._pagesRotation;
            },

            set pagesRotation(rotation) {
                this._pagesRotation = rotation;

                for (var i = 0, l = this.pages.length; i < l; i++) {
                    var page = this.pages[i];
                    page.update(page.scale, rotation);
                }

                this._setScale(this._currentScaleValue, true);
            },

            setDocument: function (pdfDocument) {
                if (this.pdfDocument) {
                    this._resetView();
                }

                this.pdfDocument = pdfDocument;
                if (!pdfDocument) {
                    return;
                }

                var pagesCount = pdfDocument.numPages;
                var pagesRefMap = this.pagesRefMap = {};
                var self = this;

                var resolvePagesPromise;
                var pagesPromise = new Promise(function (resolve) {
                    resolvePagesPromise = resolve;
                });
                this.pagesPromise = pagesPromise;
                pagesPromise.then(function () {
                    var event = document.createEvent('CustomEvent');
                    event.initCustomEvent('pagesloaded', true, true, {
                        pagesCount: pagesCount
                    });
                    self.container.dispatchEvent(event);
                });

                var isOnePageRenderedResolved = false;
                var resolveOnePageRendered = null;
                var onePageRendered = new Promise(function (resolve) {
                    resolveOnePageRendered = resolve;
                });
                this.onePageRendered = onePageRendered;

                var bindOnAfterAndBeforeDraw = function (pageView) {
                    pageView.onBeforeDraw = function pdfViewLoadOnBeforeDraw() {
                        self._buffer.push(this);
                    };

                    pageView.onAfterDraw = function pdfViewLoadOnAfterDraw() {
                        if (!isOnePageRenderedResolved) {
                            isOnePageRenderedResolved = true;
                            resolveOnePageRendered();
                        }
                    };
                };

                var firstPagePromise = pdfDocument.getPage(1);
                this.firstPagePromise = firstPagePromise;

                return firstPagePromise.then(function(pdfPage) {
                    var scale = this._currentScale || 1.0;
                    var viewport = pdfPage.getViewport(scale * CSS_UNITS);
                    for (var pageNum = 1; pageNum <= pagesCount; ++pageNum) {
                        var textLayerFactory = null;
                        if (!PDFJS.disableTextLayer) {
                            textLayerFactory = this;
                        }
                        var pageView = new PDFPageView({
                            container: this.viewer,
                            id: pageNum,
                            scale: scale,
                            defaultViewport: viewport.clone(),
                            renderingQueue: this.renderingQueue,
                            textLayerFactory: textLayerFactory,
                            annotationsLayerFactory: this
                        });
                        bindOnAfterAndBeforeDraw(pageView);
                        this.pages.push(pageView);
                    }

                    onePageRendered.then(function () {
                        if (!PDFJS.disableAutoFetch) {
                            var getPagesLeft = pagesCount;
                            for (var pageNum = 1; pageNum <= pagesCount; ++pageNum) {
                                pdfDocument.getPage(pageNum).then(function (pageNum, pdfPage) {
                                    var pageView = self.pages[pageNum - 1];
                                    if (!pageView.pdfPage) {
                                        pageView.setPdfPage(pdfPage);
                                    }
                                    var refStr = pdfPage.ref.num + ' ' + pdfPage.ref.gen + ' R';
                                    pagesRefMap[refStr] = pageNum;
                                    getPagesLeft--;
                                    if (!getPagesLeft) {
                                        resolvePagesPromise();
                                    }
                                }.bind(null, pageNum));
                            }
                        } else {
                            resolvePagesPromise();
                        }
                    });

                    var event = document.createEvent('CustomEvent');
                    event.initCustomEvent('pagesinit', true, true, null);
                    self.container.dispatchEvent(event);

                    if (this.defaultRenderingQueue) {
                        this.update();
                    }

                    if (this.findController) {
                        this.findController.resolveFirstPage();
                    }
                }.bind(this));
            },

            _resetView: function () {
                this.pages = [];
                this._currentPageNumber = 1;
                this._currentScale = UNKNOWN_SCALE;
                this._currentScaleValue = null;
                this._buffer = new PDFPageViewBuffer(DEFAULT_CACHE_SIZE);
                this.location = null;
                this._pagesRotation = 0;
                this._pagesRequests = [];

                var container = this.viewer;
                while (container.hasChildNodes()) {
                    container.removeChild(container.lastChild);
                }
            },

            _scrollUpdate: function () {
                if (this.pagesCount === 0) {
                    return;
                }
                this.update();
                for (var i = 0, ii = this.pages.length; i < ii; i++) {
                    this.pages[i].updatePosition();
                }
            },

            _setScaleDispatchEvent: function pdfViewer_setScaleDispatchEvent(
                newScale, newValue, preset) {
                var event = document.createEvent('UIEvents');
                event.initUIEvent('scalechange', true, true, window, 0);
                event.scale = newScale;
                if (preset) {
                    event.presetValue = newValue;
                }
                this.container.dispatchEvent(event);
            },

            _setScaleUpdatePages: function pdfViewer_setScaleUpdatePages(
                newScale, newValue, noScroll, preset) {
                this._currentScaleValue = newValue;
                if (newScale === this._currentScale) {
                    if (preset) {
                        this._setScaleDispatchEvent(newScale, newValue, true);
                    }
                    return;
                }

                for (var i = 0, ii = this.pages.length; i < ii; i++) {
                    this.pages[i].update(newScale);
                }
                this._currentScale = newScale;

                if (!noScroll) {
                    var page = this._currentPageNumber, dest;
                    var inPresentationMode =
                        this.presentationModeState === PresentationModeState.CHANGING ||
                        this.presentationModeState === PresentationModeState.FULLSCREEN;
                    if (this.location && !inPresentationMode &&
                        !IGNORE_CURRENT_POSITION_ON_ZOOM) {
                        page = this.location.pageNumber;
                        dest = [null, { name: 'XYZ' }, this.location.left,
                            this.location.top, null];
                    }
                    this.scrollPageIntoView(page, dest);
                }

                this._setScaleDispatchEvent(newScale, newValue, preset);
            },

            _setScale: function pdfViewer_setScale(value, noScroll) {
                if (value === 'custom') {
                    return;
                }
                var scale = parseFloat(value);

                if (scale > 0) {
                    this._setScaleUpdatePages(scale, value, noScroll, false);
                } else {
                    var currentPage = this.pages[this._currentPageNumber - 1];
                    if (!currentPage) {
                        return;
                    }
                    var inPresentationMode =
                        this.presentationModeState === PresentationModeState.FULLSCREEN;
                    var hPadding = (inPresentationMode || this.removePageBorders) ?
                        0 : SCROLLBAR_PADDING;
                    var vPadding = (inPresentationMode || this.removePageBorders) ?
                        0 : VERTICAL_PADDING;
                    var pageWidthScale = (this.container.clientWidth - hPadding) /
                        currentPage.width * currentPage.scale;
                    var pageHeightScale = (this.container.clientHeight - vPadding) /
                        currentPage.height * currentPage.scale;
                    switch (value) {
                        case 'page-actual':
                            scale = 1;
                            break;
                        case 'page-width':
                            scale = pageWidthScale;
                            break;
                        case 'page-height':
                            scale = pageHeightScale;
                            break;
                        case 'page-fit':
                            scale = Math.min(pageWidthScale, pageHeightScale);
                            break;
                        case 'auto':
                            var isLandscape = (currentPage.width > currentPage.height);
                            var horizontalScale = isLandscape ?
                                Math.min(pageHeightScale, pageWidthScale) : pageWidthScale;
                            scale = Math.min(MAX_AUTO_SCALE, horizontalScale);
                            break;
                        default:
                            console.error('pdfViewSetScale: \'' + value +
                                '\' is an unknown zoom value.');
                            return;
                    }
                    this._setScaleUpdatePages(scale, value, noScroll, true);
                }
            },

            scrollPageIntoView: function PDFViewer_scrollPageIntoView(pageNumber,
                                                                      dest) {
                var pageView = this.pages[pageNumber - 1];

                if (this.presentationModeState ===
                    PresentationModeState.FULLSCREEN) {
                    if (this.linkService.page !== pageView.id) {
                        this.linkService.page = pageView.id;
                        return;
                    }
                    dest = null;
                    this._setScale(this.currentScaleValue, true);
                }
                if (!dest) {
                    scrollIntoView(pageView.div);
                    return;
                }

                var x = 0, y = 0;
                var width = 0, height = 0, widthScale, heightScale;
                var changeOrientation = (pageView.rotation % 180 === 0 ? false : true);
                var pageWidth = (changeOrientation ? pageView.height : pageView.width) /
                    pageView.scale / CSS_UNITS;
                var pageHeight = (changeOrientation ? pageView.width : pageView.height) /
                    pageView.scale / CSS_UNITS;
                var scale = 0;
                switch (dest[1].name) {
                    case 'XYZ':
                        x = dest[2];
                        y = dest[3];
                        scale = dest[4];
                        x = x !== null ? x : 0;
                        y = y !== null ? y : pageHeight;
                        break;
                    case 'Fit':
                    case 'FitB':
                        scale = 'page-fit';
                        break;
                    case 'FitH':
                    case 'FitBH':
                        y = dest[2];
                        scale = 'page-width';
                        break;
                    case 'FitV':
                    case 'FitBV':
                        x = dest[2];
                        width = pageWidth;
                        height = pageHeight;
                        scale = 'page-height';
                        break;
                    case 'FitR':
                        x = dest[2];
                        y = dest[3];
                        width = dest[4] - x;
                        height = dest[5] - y;
                        var viewerContainer = this.container;
                        var hPadding = this.removePageBorders ? 0 : SCROLLBAR_PADDING;
                        var vPadding = this.removePageBorders ? 0 : VERTICAL_PADDING;

                        widthScale = (viewerContainer.clientWidth - hPadding) /
                            width / CSS_UNITS;
                        heightScale = (viewerContainer.clientHeight - vPadding) /
                            height / CSS_UNITS;
                        scale = Math.min(Math.abs(widthScale), Math.abs(heightScale));
                        break;
                    default:
                        return;
                }

                if (scale && scale !== this.currentScale) {
                    this.currentScaleValue = scale;
                } else if (this.currentScale === UNKNOWN_SCALE) {
                    this.currentScaleValue = DEFAULT_SCALE;
                }

                if (scale === 'page-fit' && !dest[4]) {
                    scrollIntoView(pageView.div);
                    return;
                }

                var boundingRect = [
                    pageView.viewport.convertToViewportPoint(x, y),
                    pageView.viewport.convertToViewportPoint(x + width, y + height)
                ];
                var left = Math.min(boundingRect[0][0], boundingRect[1][0]);
                var top = Math.min(boundingRect[0][1], boundingRect[1][1]);

                scrollIntoView(pageView.div, { left: left, top: top });
            },

            _updateLocation: function (firstPage) {
                var currentScale = this._currentScale;
                var currentScaleValue = this._currentScaleValue;
                var normalizedScaleValue =
                    parseFloat(currentScaleValue) === currentScale ?
                        Math.round(currentScale * 10000) / 100 : currentScaleValue;

                var pageNumber = firstPage.id;
                var pdfOpenParams = '#page=' + pageNumber;
                pdfOpenParams += '&zoom=' + normalizedScaleValue;
                var currentPageView = this.pages[pageNumber - 1];
                var container = this.container;
                var topLeft = currentPageView.getPagePoint(
                    (container.scrollLeft - firstPage.x),
                    (container.scrollTop - firstPage.y));
                var intLeft = Math.round(topLeft[0]);
                var intTop = Math.round(topLeft[1]);
                pdfOpenParams += ',' + intLeft + ',' + intTop;

                this.location = {
                    pageNumber: pageNumber,
                    scale: normalizedScaleValue,
                    top: intTop,
                    left: intLeft,
                    pdfOpenParams: pdfOpenParams
                };
            },

            update: function () {
                var visible = this._getVisiblePages();
                var visiblePages = visible.views;
                if (visiblePages.length === 0) {
                    return;
                }

                this.updateInProgress = true;

                var suggestedCacheSize = Math.max(DEFAULT_CACHE_SIZE,
                    2 * visiblePages.length + 1);
                this._buffer.resize(suggestedCacheSize);

                this.renderingQueue.renderHighestPriority(visible);

                var currentId = this.currentPageNumber;
                var firstPage = visible.first;

                for (var i = 0, ii = visiblePages.length, stillFullyVisible = false;
                     i < ii; ++i) {
                    var page = visiblePages[i];

                    if (page.percent < 100) {
                        break;
                    }
                    if (page.id === currentId) {
                        stillFullyVisible = true;
                        break;
                    }
                }

                if (!stillFullyVisible) {
                    currentId = visiblePages[0].id;
                }

                if (this.presentationModeState !== PresentationModeState.FULLSCREEN) {
                    this.currentPageNumber = currentId;
                }

                this._updateLocation(firstPage);

                this.updateInProgress = false;

                var event = document.createEvent('UIEvents');
                event.initUIEvent('updateviewarea', true, true, window, 0);
                this.container.dispatchEvent(event);
            },

            containsElement: function (element) {
                return this.container.contains(element);
            },

            focus: function () {
                this.container.focus();
            },

            blur: function () {
                this.container.blur();
            },

            get isHorizontalScrollbarEnabled() {
                return (this.presentationModeState === PresentationModeState.FULLSCREEN ?
                    false : (this.container.scrollWidth > this.container.clientWidth));
            },

            _getVisiblePages: function () {
                if (this.presentationModeState !== PresentationModeState.FULLSCREEN) {
                    return getVisibleElements(this.container, this.pages, true);
                } else {
                    var visible = [];
                    var currentPage = this.pages[this._currentPageNumber - 1];
                    visible.push({ id: currentPage.id, view: currentPage });
                    return { first: currentPage, last: currentPage, views: visible };
                }
            },

            cleanup: function () {
                for (var i = 0, ii = this.pages.length; i < ii; i++) {
                    if (this.pages[i] &&
                        this.pages[i].renderingState !== RenderingStates.FINISHED) {
                        this.pages[i].reset();
                    }
                }
            },
            _ensurePdfPageLoaded: function (pageView) {
                if (pageView.pdfPage) {
                    return Promise.resolve(pageView.pdfPage);
                }
                var pageNumber = pageView.id;
                if (this._pagesRequests[pageNumber]) {
                    return this._pagesRequests[pageNumber];
                }
                var promise = this.pdfDocument.getPage(pageNumber).then(
                    function (pdfPage) {
                        pageView.setPdfPage(pdfPage);
                        this._pagesRequests[pageNumber] = null;
                        return pdfPage;
                    }.bind(this));
                this._pagesRequests[pageNumber] = promise;
                return promise;
            },

            forceRendering: function (currentlyVisiblePages) {
                var visiblePages = currentlyVisiblePages || this._getVisiblePages();
                var pageView = this.renderingQueue.getHighestPriority(visiblePages,
                    this.pages,
                    this.scroll.down);
                if (pageView) {
                    this._ensurePdfPageLoaded(pageView).then(function () {
                        this.renderingQueue.renderView(pageView);
                    }.bind(this));
                    return true;
                }
                return false;
            },

            getPageTextContent: function (pageIndex) {
                return this.pdfDocument.getPage(pageIndex + 1).then(function (page) {
                    return page.getTextContent();
                });
            },

            createTextLayerBuilder: function (textLayerDiv, pageIndex, viewport) {
                var isViewerInPresentationMode =
                    this.presentationModeState === PresentationModeState.FULLSCREEN;
                return new TextLayerBuilder({
                    textLayerDiv: textLayerDiv,
                    pageIndex: pageIndex,
                    viewport: viewport,
                    findController: isViewerInPresentationMode ? null : this.findController
                });
            },

            createAnnotationsLayerBuilder: function (pageDiv, pdfPage) {
                return new AnnotationsLayerBuilder({
                    pageDiv: pageDiv,
                    pdfPage: pdfPage,
                    linkService: this.linkService
                });
            },

            setFindController: function (findController) {
                this.findController = findController;
            },
        };

        return PDFViewer;
    })();

    var SimpleLinkService = (function SimpleLinkServiceClosure() {
        function SimpleLinkService(pdfViewer) {
            this.pdfViewer = pdfViewer;
        }
        SimpleLinkService.prototype = {

            get page() {
                return this.pdfViewer.currentPageNumber;
            },

            set page(value) {
                this.pdfViewer.currentPageNumber = value;
            },

            navigateTo: function (dest) {},

            getDestinationHash: function (dest) {
                return '#';
            },

            getAnchorUrl: function (hash) {
                return '#';
            },

            setHash: function (hash) {},

            executeNamedAction: function (action) {},
        };
        return SimpleLinkService;
    })();

    var THUMBNAIL_SCROLL_MARGIN = -19;
    var THUMBNAIL_WIDTH = 98;
    var THUMBNAIL_CANVAS_BORDER_WIDTH = 1;
    var PDFThumbnailView = (function PDFThumbnailViewClosure() {
        function getTempCanvas(width, height) {
            var tempCanvas = PDFThumbnailView.tempImageCache;
            if (!tempCanvas) {
                tempCanvas = document.createElement('canvas');
                PDFThumbnailView.tempImageCache = tempCanvas;
            }
            tempCanvas.width = width;
            tempCanvas.height = height;
            var ctx = tempCanvas.getContext('2d');
            ctx.save();
            ctx.fillStyle = 'rgb(255, 255, 255)';
            ctx.fillRect(0, 0, width, height);
            ctx.restore();
            return tempCanvas;
        }
        function PDFThumbnailView(options) {
            var container = options.container;
            var id = options.id;
            var defaultViewport = options.defaultViewport;
            var linkService = options.linkService;
            var renderingQueue = options.renderingQueue;

            this.id = id;
            this.renderingId = 'thumbnail' + id;

            this.pdfPage = null;
            this.rotation = 0;
            this.viewport = defaultViewport;
            this.pdfPageRotate = defaultViewport.rotation;

            this.linkService = linkService;
            this.renderingQueue = renderingQueue;

            this.hasImage = false;
            this.resume = null;
            this.renderingState = RenderingStates.INITIAL;

            this.pageWidth = this.viewport.width;
            this.pageHeight = this.viewport.height;
            this.pageRatio = this.pageWidth / this.pageHeight;

            this.canvasWidth = THUMBNAIL_WIDTH;
            this.canvasHeight = (this.canvasWidth / this.pageRatio) | 0;
            this.scale = this.canvasWidth / this.pageWidth;

            var anchor = document.createElement('a');
            anchor.href = linkService.getAnchorUrl('#page=' + id);
            anchor.title = mozL10n.get('thumb_page_title', {page: id}, 'Page {{page}}');
            anchor.onclick = function stopNavigation() {
                linkService.page = id;
                return false;
            };

            var div = document.createElement('div');
            div.id = 'thumbnailContainer' + id;
            div.className = 'thumbnail';
            this.div = div;

            if (id === 1) {
                div.classList.add('selected');
            }

            var ring = document.createElement('div');
            ring.className = 'thumbnailSelectionRing';
            var borderAdjustment = 2 * THUMBNAIL_CANVAS_BORDER_WIDTH;
            ring.style.width = this.canvasWidth + borderAdjustment + 'px';
            ring.style.height = this.canvasHeight + borderAdjustment + 'px';
            this.ring = ring;

            div.appendChild(ring);
            anchor.appendChild(div);
            container.appendChild(anchor);
        }

        PDFThumbnailView.prototype = {
            setPdfPage: function PDFThumbnailView_setPdfPage(pdfPage) {
                this.pdfPage = pdfPage;
                this.pdfPageRotate = pdfPage.rotate;
                var totalRotation = (this.rotation + this.pdfPageRotate) % 360;
                this.viewport = pdfPage.getViewport(1, totalRotation);
                this.reset();
            },

            reset: function PDFThumbnailView_reset() {
                if (this.renderTask) {
                    this.renderTask.cancel();
                }
                this.hasImage = false;
                this.resume = null;
                this.renderingState = RenderingStates.INITIAL;

                this.pageWidth = this.viewport.width;
                this.pageHeight = this.viewport.height;
                this.pageRatio = this.pageWidth / this.pageHeight;

                this.canvasHeight = (this.canvasWidth / this.pageRatio) | 0;
                this.scale = (this.canvasWidth / this.pageWidth);

                this.div.removeAttribute('data-loaded');
                var ring = this.ring;
                var childNodes = ring.childNodes;
                for (var i = childNodes.length - 1; i >= 0; i--) {
                    ring.removeChild(childNodes[i]);
                }
                var borderAdjustment = 2 * THUMBNAIL_CANVAS_BORDER_WIDTH;
                ring.style.width = this.canvasWidth + borderAdjustment + 'px';
                ring.style.height = this.canvasHeight + borderAdjustment + 'px';

                if (this.canvas) {
                    this.canvas.width = 0;
                    this.canvas.height = 0;
                    delete this.canvas;
                }
            },

            update: function PDFThumbnailView_update(rotation) {
                if (typeof rotation !== 'undefined') {
                    this.rotation = rotation;
                }
                var totalRotation = (this.rotation + this.pdfPageRotate) % 360;
                this.viewport = this.viewport.clone({
                    scale: 1,
                    rotation: totalRotation
                });
                this.reset();
            },
            _getPageDrawContext: function PDFThumbnailView_getPageDrawContext() {
                var canvas = document.createElement('canvas');
                canvas.id = this.renderingId;

                canvas.width = this.canvasWidth;
                canvas.height = this.canvasHeight;
                canvas.className = 'thumbnailImage';
                canvas.setAttribute('aria-label', mozL10n.get('thumb_page_canvas',
                    {page: this.id}, 'Thumbnail of Page {{page}}'));

                this.canvas = canvas;
                this.div.setAttribute('data-loaded', true);
                this.ring.appendChild(canvas);

                return canvas.getContext('2d');
            },

            draw: function PDFThumbnailView_draw() {
                if (this.renderingState !== RenderingStates.INITIAL) {
                    console.error('Must be in new state before drawing');
                }
                if (this.hasImage) {
                    return Promise.resolve(undefined);
                }
                this.hasImage = true;
                this.renderingState = RenderingStates.RUNNING;

                var resolveRenderPromise, rejectRenderPromise;
                var promise = new Promise(function (resolve, reject) {
                    resolveRenderPromise = resolve;
                    rejectRenderPromise = reject;
                });

                var self = this;
                function thumbnailDrawCallback(error) {
                    if (renderTask === self.renderTask) {
                        self.renderTask = null;
                    }
                    if (error === 'cancelled') {
                        rejectRenderPromise(error);
                        return;
                    }
                    self.renderingState = RenderingStates.FINISHED;

                    if (!error) {
                        resolveRenderPromise(undefined);
                    } else {
                        rejectRenderPromise(error);
                    }
                }

                var ctx = this._getPageDrawContext();
                var drawViewport = this.viewport.clone({ scale: this.scale });
                var renderContinueCallback = function renderContinueCallback(cont) {
                    if (!self.renderingQueue.isHighestPriority(self)) {
                        self.renderingState = RenderingStates.PAUSED;
                        self.resume = function resumeCallback() {
                            self.renderingState = RenderingStates.RUNNING;
                            cont();
                        };
                        return;
                    }
                    cont();
                };

                var renderContext = {
                    canvasContext: ctx,
                    viewport: drawViewport,
                    continueCallback: renderContinueCallback
                };
                var renderTask = this.renderTask = this.pdfPage.render(renderContext);

                renderTask.promise.then(
                    function pdfPageRenderCallback() {
                        thumbnailDrawCallback(null);
                    },
                    function pdfPageRenderError(error) {
                        thumbnailDrawCallback(error);
                    }
                );
                return promise;
            },

            setImage: function PDFThumbnailView_setImage(pageView) {
                var img = pageView.canvas;
                if (this.hasImage || !img) {
                    return;
                }
                if (!this.pdfPage) {
                    this.setPdfPage(pageView.pdfPage);
                }
                this.hasImage = true;
                this.renderingState = RenderingStates.FINISHED;

                var ctx = this._getPageDrawContext();
                var canvas = ctx.canvas;

                if (img.width <= 2 * canvas.width) {
                    ctx.drawImage(img, 0, 0, img.width, img.height,
                        0, 0, canvas.width, canvas.height);
                    return;
                }
                var MAX_NUM_SCALING_STEPS = 3;
                var reducedWidth = canvas.width << MAX_NUM_SCALING_STEPS;
                var reducedHeight = canvas.height << MAX_NUM_SCALING_STEPS;
                var reducedImage = getTempCanvas(reducedWidth, reducedHeight);
                var reducedImageCtx = reducedImage.getContext('2d');

                while (reducedWidth > img.width || reducedHeight > img.height) {
                    reducedWidth >>= 1;
                    reducedHeight >>= 1;
                }
                reducedImageCtx.drawImage(img, 0, 0, img.width, img.height,
                    0, 0, reducedWidth, reducedHeight);
                while (reducedWidth > 2 * canvas.width) {
                    reducedImageCtx.drawImage(reducedImage,
                        0, 0, reducedWidth, reducedHeight,
                        0, 0, reducedWidth >> 1, reducedHeight >> 1);
                    reducedWidth >>= 1;
                    reducedHeight >>= 1;
                }
                ctx.drawImage(reducedImage, 0, 0, reducedWidth, reducedHeight,
                    0, 0, canvas.width, canvas.height);
            }
        };

        return PDFThumbnailView;
    })();

    PDFThumbnailView.tempImageCache = null;
    var PDFThumbnailViewer = (function PDFThumbnailViewerClosure() {
        function PDFThumbnailViewer(options) {
            this.container = options.container;
            this.renderingQueue = options.renderingQueue;
            this.linkService = options.linkService;

            this.scroll = watchScroll(this.container, this._scrollUpdated.bind(this));
            this._resetView();
        }

        PDFThumbnailViewer.prototype = {
            _scrollUpdated: function PDFThumbnailViewer_scrollUpdated() {
                this.renderingQueue.renderHighestPriority();
            },

            getThumbnail: function PDFThumbnailViewer_getThumbnail(index) {
                return this.thumbnails[index];
            },
            _getVisibleThumbs: function PDFThumbnailViewer_getVisibleThumbs() {
                return getVisibleElements(this.container, this.thumbnails);
            },

            scrollThumbnailIntoView:
                function PDFThumbnailViewer_scrollThumbnailIntoView(page) {
                    var selected = document.querySelector('.thumbnail.selected');
                    if (selected) {
                        selected.classList.remove('selected');
                    }
                    var thumbnail = document.getElementById('thumbnailContainer' + page);
                    if (thumbnail) {
                        thumbnail.classList.add('selected');
                    }
                    var visibleThumbs = this._getVisibleThumbs();
                    var numVisibleThumbs = visibleThumbs.views.length;
                    if (numVisibleThumbs > 0) {
                        var first = visibleThumbs.first.id;
                        var last = (numVisibleThumbs > 1 ? visibleThumbs.last.id : first);
                        if (page <= first || page >= last) {
                            scrollIntoView(thumbnail, { top: THUMBNAIL_SCROLL_MARGIN });
                        }
                    }
                },

            get pagesRotation() {
                return this._pagesRotation;
            },

            set pagesRotation(rotation) {
                this._pagesRotation = rotation;
                for (var i = 0, l = this.thumbnails.length; i < l; i++) {
                    var thumb = this.thumbnails[i];
                    thumb.update(rotation);
                }
            },

            cleanup: function PDFThumbnailViewer_cleanup() {
                var tempCanvas = PDFThumbnailView.tempImageCache;
                if (tempCanvas) {
                    tempCanvas.width = 0;
                    tempCanvas.height = 0;
                }
                PDFThumbnailView.tempImageCache = null;
            },

            _resetView: function PDFThumbnailViewer_resetView() {
                this.thumbnails = [];
                this._pagesRotation = 0;
                this._pagesRequests = [];
            },

            setDocument: function PDFThumbnailViewer_setDocument(pdfDocument) {
                if (this.pdfDocument) {
                    var thumbsView = this.container;
                    while (thumbsView.hasChildNodes()) {
                        thumbsView.removeChild(thumbsView.lastChild);
                    }
                    this._resetView();
                }

                this.pdfDocument = pdfDocument;
                if (!pdfDocument) {
                    return Promise.resolve();
                }

                return pdfDocument.getPage(1).then(function (firstPage) {
                    var pagesCount = pdfDocument.numPages;
                    var viewport = firstPage.getViewport(1.0);
                    for (var pageNum = 1; pageNum <= pagesCount; ++pageNum) {
                        var thumbnail = new PDFThumbnailView({
                            container: this.container,
                            id: pageNum,
                            defaultViewport: viewport.clone(),
                            linkService: this.linkService,
                            renderingQueue: this.renderingQueue
                        });
                        this.thumbnails.push(thumbnail);
                    }
                }.bind(this));
            },

            _ensurePdfPageLoaded:
                function PDFThumbnailViewer_ensurePdfPageLoaded(thumbView) {
                    if (thumbView.pdfPage) {
                        return Promise.resolve(thumbView.pdfPage);
                    }
                    var pageNumber = thumbView.id;
                    if (this._pagesRequests[pageNumber]) {
                        return this._pagesRequests[pageNumber];
                    }
                    var promise = this.pdfDocument.getPage(pageNumber).then(
                        function (pdfPage) {
                            thumbView.setPdfPage(pdfPage);
                            this._pagesRequests[pageNumber] = null;
                            return pdfPage;
                        }.bind(this));
                    this._pagesRequests[pageNumber] = promise;
                    return promise;
                },

            ensureThumbnailVisible:
                function PDFThumbnailViewer_ensureThumbnailVisible(page) {
                    scrollIntoView(document.getElementById('thumbnailContainer' + page));
                },

            forceRendering: function () {
                var visibleThumbs = this._getVisibleThumbs();
                var thumbView = this.renderingQueue.getHighestPriority(visibleThumbs,
                    this.thumbnails,
                    this.scroll.down);
                if (thumbView) {
                    this._ensurePdfPageLoaded(thumbView).then(function () {
                        this.renderingQueue.renderView(thumbView);
                    }.bind(this));
                    return true;
                }
                return false;
            }
        };

        return PDFThumbnailViewer;
    })();

    var PDFOutlineView = (function PDFOutlineViewClosure() {
        function PDFOutlineView(options) {
            this.container = options.container;
            this.outline = options.outline;
            this.linkService = options.linkService;
        }

        PDFOutlineView.prototype = {
            reset: function PDFOutlineView_reset() {
                var container = this.container;
                while (container.firstChild) {
                    container.removeChild(container.firstChild);
                }
            },

            _bindLink: function PDFOutlineView_bindLink(element, item) {
                var linkService = this.linkService;
                element.href = linkService.getDestinationHash(item.dest);
                element.onclick = function goToDestination(e) {
                    linkService.navigateTo(item.dest);
                    return false;
                };
            },

            render: function PDFOutlineView_render() {
                var outline = this.outline;

                this.reset();

                if (!outline) {
                    return;
                }

                var queue = [{ parent: this.container, items: this.outline }];
                while (queue.length > 0) {
                    var levelData = queue.shift();
                    for (var i = 0, len = levelData.items.length; i < len; i++) {
                        var item = levelData.items[i];
                        var div = document.createElement('div');
                        div.className = 'outlineItem';
                        var element = document.createElement('a');
                        this._bindLink(element, item);
                        element.textContent = item.title;
                        div.appendChild(element);

                        if (item.items.length > 0) {
                            var itemsDiv = document.createElement('div');
                            itemsDiv.className = 'outlineItems';
                            div.appendChild(itemsDiv);
                            queue.push({ parent: itemsDiv, items: item.items });
                        }

                        levelData.parent.appendChild(div);
                    }
                }
            }
        };

        return PDFOutlineView;
    })();

    var PDFAttachmentView = (function PDFAttachmentViewClosure() {

        function PDFAttachmentView(options) {
            this.container = options.container;
            this.attachments = options.attachments;
            this.downloadManager = options.downloadManager;
        }

        PDFAttachmentView.prototype = {
            reset: function PDFAttachmentView_reset() {
                var container = this.container;
                while (container.firstChild) {
                    container.removeChild(container.firstChild);
                }
            },


            _bindLink: function PDFAttachmentView_bindLink(button, content, filename) {
                button.onclick = function downloadFile(e) {
                    this.downloadManager.downloadData(content, filename, '');
                    return false;
                }.bind(this);
            },

            render: function PDFAttachmentView_render() {
                var attachments = this.attachments;

                this.reset();

                if (!attachments) {
                    return;
                }

                var names = Object.keys(attachments).sort(function(a, b) {
                    return a.toLowerCase().localeCompare(b.toLowerCase());
                });
                for (var i = 0, len = names.length; i < len; i++) {
                    var item = attachments[names[i]];
                    var filename = getFileName(item.filename);
                    var div = document.createElement('div');
                    div.className = 'attachmentsItem';
                    var button = document.createElement('button');
                    this._bindLink(button, item.content, filename);
                    button.textContent = filename;
                    div.appendChild(button);
                    this.container.appendChild(div);
                }
            }
        };

        return PDFAttachmentView;
    })();


    var PDFViewerApplication = {
        initialBookmark: document.location.hash.substring(1),
        initialized: false,
        fellback: false,
        pdfDocument: null,
        sidebarOpen: false,
        printing: false,
        pdfViewer: null,
        pdfThumbnailViewer: null,
        pdfRenderingQueue: null,
        pageRotation: 0,
        updateScaleControls: true,
        isInitialViewSet: false,
        animationStartedPromise: null,
        mouseScrollTimeStamp: 0,
        mouseScrollDelta: 0,
        preferenceSidebarViewOnLoad: SidebarView.NONE,
        preferencePdfBugEnabled: false,
        preferenceShowPreviousViewOnLoad: true,
        isViewerEmbedded: (window.parent !== window),
        url: '',
        initialize: function pdfViewInitialize() {
            var pdfRenderingQueue = new PDFRenderingQueue();
            pdfRenderingQueue.onIdle = this.cleanup.bind(this);
            this.pdfRenderingQueue = pdfRenderingQueue;

            var container = document.getElementById('viewerContainer');
            var viewer = document.getElementById('viewer');
            this.pdfViewer = new PDFViewer({
                container: container,
                viewer: viewer,
                renderingQueue: pdfRenderingQueue,
                linkService: this
            });
            pdfRenderingQueue.setViewer(this.pdfViewer);

            var thumbnailContainer = document.getElementById('thumbnailView');
            this.pdfThumbnailViewer = new PDFThumbnailViewer({
                container: thumbnailContainer,
                renderingQueue: pdfRenderingQueue,
                linkService: this
            });
            pdfRenderingQueue.setThumbnailViewer(this.pdfThumbnailViewer);

            Preferences.initialize();

            this.findController = new PDFFindController({
                pdfViewer: this.pdfViewer,
                integratedFind: this.supportsIntegratedFind
            });
            this.pdfViewer.setFindController(this.findController);

            this.findBar = new PDFFindBar({
                bar: document.getElementById('findbar'),
                toggleButton: document.getElementById('viewFind'),
                findField: document.getElementById('findInput'),
                highlightAllCheckbox: document.getElementById('findHighlightAll'),
                caseSensitiveCheckbox: document.getElementById('findMatchCase'),
                findMsg: document.getElementById('findMsg'),
                findStatusIcon: document.getElementById('findStatusIcon'),
                findPreviousButton: document.getElementById('findPrevious'),
                findNextButton: document.getElementById('findNext'),
                findController: this.findController
            });

            this.findController.setFindBar(this.findBar);

            HandTool.initialize({
                container: container,
                toggleHandTool: document.getElementById('toggleHandTool')
            });

            SecondaryToolbar.initialize({
                toolbar: document.getElementById('secondaryToolbar'),
                presentationMode: PresentationMode,
                toggleButton: document.getElementById('secondaryToolbarToggle'),
                presentationModeButton:
                    document.getElementById('secondaryPresentationMode'),
                openFile: document.getElementById('secondaryOpenFile'),
                print: document.getElementById('secondaryPrint'),
                download: document.getElementById('secondaryDownload'),
                viewBookmark: document.getElementById('secondaryViewBookmark'),
                firstPage: document.getElementById('firstPage'),
                lastPage: document.getElementById('lastPage'),
                pageRotateCw: document.getElementById('pageRotateCw'),
                pageRotateCcw: document.getElementById('pageRotateCcw'),
                documentProperties: DocumentProperties,
                documentPropertiesButton: document.getElementById('documentProperties')
            });

            PresentationMode.initialize({
                container: container,
                secondaryToolbar: SecondaryToolbar,
                firstPage: document.getElementById('contextFirstPage'),
                lastPage: document.getElementById('contextLastPage'),
                pageRotateCw: document.getElementById('contextPageRotateCw'),
                pageRotateCcw: document.getElementById('contextPageRotateCcw')
            });

            PasswordPrompt.initialize({
                overlayName: 'passwordOverlay',
                passwordField: document.getElementById('password'),
                passwordText: document.getElementById('passwordText'),
                passwordSubmit: document.getElementById('passwordSubmit'),
                passwordCancel: document.getElementById('passwordCancel')
            });

            DocumentProperties.initialize({
                overlayName: 'documentPropertiesOverlay',
                closeButton: document.getElementById('documentPropertiesClose'),
                fileNameField: document.getElementById('fileNameField'),
                fileSizeField: document.getElementById('fileSizeField'),
                titleField: document.getElementById('titleField'),
                authorField: document.getElementById('authorField'),
                subjectField: document.getElementById('subjectField'),
                keywordsField: document.getElementById('keywordsField'),
                creationDateField: document.getElementById('creationDateField'),
                modificationDateField: document.getElementById('modificationDateField'),
                creatorField: document.getElementById('creatorField'),
                producerField: document.getElementById('producerField'),
                versionField: document.getElementById('versionField'),
                pageCountField: document.getElementById('pageCountField')
            });

            var self = this;
            var initializedPromise = Promise.all([
                Preferences.get('enableWebGL').then(function resolved(value) {
                    PDFJS.disableWebGL = !value;
                }),
                Preferences.get('sidebarViewOnLoad').then(function resolved(value) {
                    self.preferenceSidebarViewOnLoad = value;
                }),
                Preferences.get('pdfBugEnabled').then(function resolved(value) {
                    self.preferencePdfBugEnabled = value;
                }),
                Preferences.get('showPreviousViewOnLoad').then(function resolved(value) {
                    self.preferenceShowPreviousViewOnLoad = value;
                    if (!value && window.history.state) {
                        window.history.replaceState(null, '');
                    }
                }),
                Preferences.get('disableTextLayer').then(function resolved(value) {
                    if (PDFJS.disableTextLayer === true) {
                        return;
                    }
                    PDFJS.disableTextLayer = value;
                }),
                Preferences.get('disableRange').then(function resolved(value) {
                    if (PDFJS.disableRange === true) {
                        return;
                    }
                    PDFJS.disableRange = value;
                }),
                Preferences.get('disableAutoFetch').then(function resolved(value) {
                    PDFJS.disableAutoFetch = value;
                }),
                Preferences.get('disableFontFace').then(function resolved(value) {
                    if (PDFJS.disableFontFace === true) {
                        return;
                    }
                    PDFJS.disableFontFace = value;
                }),
                Preferences.get('useOnlyCssZoom').then(function resolved(value) {
                    PDFJS.useOnlyCssZoom = value;
                })
            ]).catch(function (reason) { });

            return initializedPromise.then(function () {
                PDFViewerApplication.initialized = true;
            });
        },

        zoomIn: function pdfViewZoomIn(ticks) {
            var newScale = this.pdfViewer.currentScale;
            do {
                newScale = (newScale * DEFAULT_SCALE_DELTA).toFixed(2);
                newScale = Math.ceil(newScale * 10) / 10;
                newScale = Math.min(MAX_SCALE, newScale);
            } while (--ticks && newScale < MAX_SCALE);
            this.setScale(newScale, true);
        },

        zoomOut: function pdfViewZoomOut(ticks) {
            var newScale = this.pdfViewer.currentScale;
            do {
                newScale = (newScale / DEFAULT_SCALE_DELTA).toFixed(2);
                newScale = Math.floor(newScale * 10) / 10;
                newScale = Math.max(MIN_SCALE, newScale);
            } while (--ticks && newScale > MIN_SCALE);
            this.setScale(newScale, true);
        },

        get currentScaleValue() {
            return this.pdfViewer.currentScaleValue;
        },

        get pagesCount() {
            return this.pdfDocument.numPages;
        },

        set page(val) {
            this.pdfViewer.currentPageNumber = val;
        },

        get page() {
            return this.pdfViewer.currentPageNumber;
        },

        get supportsPrinting() {
            var canvas = document.createElement('canvas');
            var value = 'mozPrintCallback' in canvas;

            return PDFJS.shadow(this, 'supportsPrinting', value);
        },

        get supportsFullscreen() {
            var doc = document.documentElement;
            var support = doc.requestFullscreen || doc.mozRequestFullScreen ||
                doc.webkitRequestFullScreen || doc.msRequestFullscreen;

            if (document.fullscreenEnabled === false ||
                document.mozFullScreenEnabled === false ||
                document.webkitFullscreenEnabled === false ||
                document.msFullscreenEnabled === false) {
                support = false;
            }
            if (support && PDFJS.disableFullscreen === true) {
                support = false;
            }

            return PDFJS.shadow(this, 'supportsFullscreen', support);
        },

        get supportsIntegratedFind() {
            var support = false;

            return PDFJS.shadow(this, 'supportsIntegratedFind', support);
        },

        get supportsDocumentFonts() {
            var support = true;

            return PDFJS.shadow(this, 'supportsDocumentFonts', support);
        },

        get supportsDocumentColors() {
            var support = true;

            return PDFJS.shadow(this, 'supportsDocumentColors', support);
        },

        get loadingBar() {
            var bar = new ProgressBar('#loadingBar', {});

            return PDFJS.shadow(this, 'loadingBar', bar);
        },


        setTitleUsingUrl: function pdfViewSetTitleUsingUrl(url) {
            this.url = url;
            try {
                this.setTitle(decodeURIComponent(getFileName(url)) || url);
            } catch (e) {
                this.setTitle(url);
            }
        },

        setTitle: function pdfViewSetTitle(title) {
            if (this.isViewerEmbedded) {
                return;
            }
            document.title = title;
        },

        close: function pdfViewClose() {
            var errorWrapper = document.getElementById('errorWrapper');
            errorWrapper.setAttribute('hidden', 'true');

            if (!this.pdfDocument) {
                return;
            }

            this.pdfDocument.destroy();
            this.pdfDocument = null;

            this.pdfThumbnailViewer.setDocument(null);
            this.pdfViewer.setDocument(null);

            if (typeof PDFBug !== 'undefined') {
                PDFBug.cleanup();
            }
        },

        open: function pdfViewOpen(file, scale, password,
                                   pdfDataRangeTransport, args) {
            if (this.pdfDocument) {
                Preferences.reload();
            }
            this.close();

            var parameters = {password: password};
            if (typeof file === 'string') {
                this.setTitleUsingUrl(file);
                parameters.url = file;
            } else if (file && 'byteLength' in file) {
                parameters.data = file;
            } else if (file.url && file.originalUrl) {
                this.setTitleUsingUrl(file.originalUrl);
                parameters.url = file.url;
            }
            if (args) {
                for (var prop in args) {
                    parameters[prop] = args[prop];
                }
            }

            var self = this;
            self.loading = true;
            self.downloadComplete = false;

            var passwordNeeded = function passwordNeeded(updatePassword, reason) {
                PasswordPrompt.updatePassword = updatePassword;
                PasswordPrompt.reason = reason;
                PasswordPrompt.open();
            };

            function getDocumentProgress(progressData) {
                self.progress(progressData.loaded / progressData.total);
            }

            PDFJS.getDocument(parameters, pdfDataRangeTransport, passwordNeeded,
                getDocumentProgress).then(
                function getDocumentCallback(pdfDocument) {
                    self.load(pdfDocument, scale);
                    self.loading = false;
                },
                function getDocumentError(exception) {
                    var message = exception && exception.message;
                    var loadingErrorMessage = mozL10n.get('loading_error', null,
                        'An error occurred while loading the PDF.');
                    if (exception instanceof PDFJS.InvalidPDFException) {
                        loadingErrorMessage = mozL10n.get('invalid_file_error', null,
                            'Invalid or corrupted PDF file.');
                    } else if (exception instanceof PDFJS.MissingPDFException) {
                        loadingErrorMessage = mozL10n.get('missing_file_error', null,
                            'Missing PDF file.');
                    } else if (exception instanceof PDFJS.UnexpectedResponseException) {
                        loadingErrorMessage = mozL10n.get('unexpected_response_error', null,
                            'Unexpected server response.');
                    }

                    var moreInfo = {
                        message: message
                    };
                    self.error(loadingErrorMessage, moreInfo);
                    self.loading = false;
                }
            );

            if (args && args.length) {
                DocumentProperties.setFileSize(args.length);
            }
        },

        download: function pdfViewDownload() {
            function downloadByUrl() {
                downloadManager.downloadUrl(url, filename);
            }

            var url = this.url.split('#')[0];
            var filename = getPDFFileNameFromURL(url);
            var downloadManager = new DownloadManager();
            downloadManager.onerror = function (err) {
                PDFViewerApplication.error('PDF failed to download.');
            };

            if (!this.pdfDocument) {
                downloadByUrl();
                return;
            }

            if (!this.downloadComplete) {
                downloadByUrl();
                return;
            }

            this.pdfDocument.getData().then(
                function getDataSuccess(data) {
                    var blob = PDFJS.createBlob(data, 'application/pdf');
                    downloadManager.download(blob, url, filename);
                },
                downloadByUrl
            ).then(null, downloadByUrl);
        },

        fallback: function pdfViewFallback(featureId) {
            return;
        },

        navigateTo: function pdfViewNavigateTo(dest) {
            var destString = '';
            var self = this;

            var goToDestination = function(destRef) {
                self.pendingRefStr = null;
                var pageNumber = destRef instanceof Object ?
                    self.pagesRefMap[destRef.num + ' ' + destRef.gen + ' R'] :
                    (destRef + 1);
                if (pageNumber) {
                    if (pageNumber > self.pagesCount) {
                        pageNumber = self.pagesCount;
                    }
                    self.pdfViewer.scrollPageIntoView(pageNumber, dest);

                    PDFHistory.push({ dest: dest, hash: destString, page: pageNumber });
                } else {
                    self.pdfDocument.getPageIndex(destRef).then(function (pageIndex) {
                        var pageNum = pageIndex + 1;
                        self.pagesRefMap[destRef.num + ' ' + destRef.gen + ' R'] = pageNum;
                        goToDestination(destRef);
                    });
                }
            };

            var destinationPromise;
            if (typeof dest === 'string') {
                destString = dest;
                destinationPromise = this.pdfDocument.getDestination(dest);
            } else {
                destinationPromise = Promise.resolve(dest);
            }
            destinationPromise.then(function(destination) {
                dest = destination;
                if (!(destination instanceof Array)) {
                    return;
                }
                goToDestination(destination[0]);
            });
        },

        executeNamedAction: function pdfViewExecuteNamedAction(action) {

            switch (action) {
                case 'GoToPage':
                    document.getElementById('pageNumber').focus();
                    break;

                case 'GoBack':
                    PDFHistory.back();
                    break;

                case 'GoForward':
                    PDFHistory.forward();
                    break;

                case 'Find':
                    if (!this.supportsIntegratedFind) {
                        this.findBar.toggle();
                    }
                    break;

                case 'NextPage':
                    this.page++;
                    break;

                case 'PrevPage':
                    this.page--;
                    break;

                case 'LastPage':
                    this.page = this.pagesCount;
                    break;

                case 'FirstPage':
                    this.page = 1;
                    break;

                default:
                    break;
            }
        },

        getDestinationHash: function pdfViewGetDestinationHash(dest) {
            if (typeof dest === 'string') {
                return this.getAnchorUrl('#' + escape(dest));
            }
            if (dest instanceof Array) {
                var destRef = dest[0];
                var pageNumber = destRef instanceof Object ?
                    this.pagesRefMap[destRef.num + ' ' + destRef.gen + ' R'] :
                    (destRef + 1);
                if (pageNumber) {
                    var pdfOpenParams = this.getAnchorUrl('#page=' + pageNumber);
                    var destKind = dest[1];
                    if (typeof destKind === 'object' && 'name' in destKind &&
                        destKind.name === 'XYZ') {
                        var scale = (dest[4] || this.currentScaleValue);
                        var scaleNumber = parseFloat(scale);
                        if (scaleNumber) {
                            scale = scaleNumber * 100;
                        }
                        pdfOpenParams += '&zoom=' + scale;
                        if (dest[2] || dest[3]) {
                            pdfOpenParams += ',' + (dest[2] || 0) + ',' + (dest[3] || 0);
                        }
                    }
                    return pdfOpenParams;
                }
            }
            return '';
        },

        getAnchorUrl: function getAnchorUrl(anchor) {
            return anchor;
        },

        error: function pdfViewError(message, moreInfo) {
            var moreInfoText = mozL10n.get('error_version_info',
                {version: PDFJS.version || '?', build: PDFJS.build || '?'},
                'PDF.js v{{version}} (build: {{build}})') + '\n';
            if (moreInfo) {
                moreInfoText +=
                    mozL10n.get('error_message', {message: moreInfo.message},
                        'Message: {{message}}');
                if (moreInfo.stack) {
                    moreInfoText += '\n' +
                        mozL10n.get('error_stack', {stack: moreInfo.stack},
                            'Stack: {{stack}}');
                } else {
                    if (moreInfo.filename) {
                        moreInfoText += '\n' +
                            mozL10n.get('error_file', {file: moreInfo.filename},
                                'File: {{file}}');
                    }
                    if (moreInfo.lineNumber) {
                        moreInfoText += '\n' +
                            mozL10n.get('error_line', {line: moreInfo.lineNumber},
                                'Line: {{line}}');
                    }
                }
            }

            var errorWrapper = document.getElementById('errorWrapper');
            errorWrapper.removeAttribute('hidden');

            var errorMessage = document.getElementById('errorMessage');
            errorMessage.textContent = message;

            var closeButton = document.getElementById('errorClose');
            closeButton.onclick = function() {
                errorWrapper.setAttribute('hidden', 'true');
            };

            var errorMoreInfo = document.getElementById('errorMoreInfo');
            var moreInfoButton = document.getElementById('errorShowMore');
            var lessInfoButton = document.getElementById('errorShowLess');
            moreInfoButton.onclick = function() {
                errorMoreInfo.removeAttribute('hidden');
                moreInfoButton.setAttribute('hidden', 'true');
                lessInfoButton.removeAttribute('hidden');
                errorMoreInfo.style.height = errorMoreInfo.scrollHeight + 'px';
            };
            lessInfoButton.onclick = function() {
                errorMoreInfo.setAttribute('hidden', 'true');
                moreInfoButton.removeAttribute('hidden');
                lessInfoButton.setAttribute('hidden', 'true');
            };
            moreInfoButton.oncontextmenu = noContextMenuHandler;
            lessInfoButton.oncontextmenu = noContextMenuHandler;
            closeButton.oncontextmenu = noContextMenuHandler;
            moreInfoButton.removeAttribute('hidden');
            lessInfoButton.setAttribute('hidden', 'true');
            errorMoreInfo.value = moreInfoText;
        },

        progress: function pdfViewProgress(level) {
            var percent = Math.round(level * 100);
            if (percent > this.loadingBar.percent || isNaN(percent)) {
                this.loadingBar.percent = percent;
                if (PDFJS.disableAutoFetch && percent) {
                    if (this.disableAutoFetchLoadingBarTimeout) {
                        clearTimeout(this.disableAutoFetchLoadingBarTimeout);
                        this.disableAutoFetchLoadingBarTimeout = null;
                    }
                    this.loadingBar.show();
                    this.disableAutoFetchLoadingBarTimeout = setTimeout(function () {
                        this.loadingBar.hide();
                        this.disableAutoFetchLoadingBarTimeout = null;
                    }.bind(this), DISABLE_AUTO_FETCH_LOADING_BAR_TIMEOUT);
                }
            }
        },

        load: function pdfViewLoad(pdfDocument, scale) {
            var self = this;
            scale = scale || UNKNOWN_SCALE;

            this.findController.reset();

            this.pdfDocument = pdfDocument;

            DocumentProperties.url = this.url;
            DocumentProperties.pdfDocument = pdfDocument;
            DocumentProperties.resolveDataAvailable();

            var downloadedPromise = pdfDocument.getDownloadInfo().then(function() {
                self.downloadComplete = true;
                self.loadingBar.hide();
            });

            var pagesCount = pdfDocument.numPages;
            document.getElementById('numPages').textContent =
                mozL10n.get('page_of', {pageCount: pagesCount}, 'of {{pageCount}}');
            document.getElementById('pageNumber').max = pagesCount;

            var id = this.documentFingerprint = pdfDocument.fingerprint;
            var store = this.store = new ViewHistory(id);

            var pdfViewer = this.pdfViewer;
            pdfViewer.currentScale = scale;
            pdfViewer.setDocument(pdfDocument);
            var firstPagePromise = pdfViewer.firstPagePromise;
            var pagesPromise = pdfViewer.pagesPromise;
            var onePageRendered = pdfViewer.onePageRendered;

            this.pageRotation = 0;
            this.isInitialViewSet = false;
            this.pagesRefMap = pdfViewer.pagesRefMap;

            this.pdfThumbnailViewer.setDocument(pdfDocument);

            firstPagePromise.then(function(pdfPage) {
                downloadedPromise.then(function () {
                    var event = document.createEvent('CustomEvent');
                    event.initCustomEvent('documentload', true, true, {});
                    window.dispatchEvent(event);
                });

                self.loadingBar.setWidth(document.getElementById('viewer'));

                if (!PDFJS.disableHistory && !self.isViewerEmbedded) {
                    PDFHistory.initialize(self.documentFingerprint, self);
                }
            });
            var defaultZoomValue;
            var defaultZoomValuePromise =
                Preferences.get('defaultZoomValue').then(function (prefValue) {
                    defaultZoomValue = prefValue;
                });

            var storePromise = store.initializedPromise;
            Promise.all([firstPagePromise, storePromise, defaultZoomValuePromise]).then(
                function resolved() {
                    var storedHash = null;
                    if (PDFViewerApplication.preferenceShowPreviousViewOnLoad &&
                        store.get('exists', false)) {
                        var pageNum = store.get('page', '1');
                        var zoom = defaultZoomValue ||
                            store.get('zoom', self.pdfViewer.currentScale);
                        var left = store.get('scrollLeft', '0');
                        var top = store.get('scrollTop', '0');

                        storedHash = 'page=' + pageNum + '&zoom=' + zoom + ',' +
                            left + ',' + top;
                    } else if (defaultZoomValue) {
                        storedHash = 'page=1&zoom=' + defaultZoomValue;
                    }
                    self.setInitialView(storedHash, scale);
                    if (!self.isViewerEmbedded) {
                        self.pdfViewer.focus();
                    }
                }, function rejected(reason) {
                    console.error(reason);

                    firstPagePromise.then(function () {
                        self.setInitialView(null, scale);
                    });
                });

            pagesPromise.then(function() {
                if (self.supportsPrinting) {
                    pdfDocument.getJavaScript().then(function(javaScript) {
                        if (javaScript.length) {
                            console.warn('Warning: JavaScript is not supported');
                            self.fallback(PDFJS.UNSUPPORTED_FEATURES.javaScript);
                        }
                        var regex = /\bprint\s*\(/g;
                        for (var i = 0, ii = javaScript.length; i < ii; i++) {
                            var js = javaScript[i];
                            if (js && regex.test(js)) {
                                setTimeout(function() {
                                    window.print();
                                });
                                return;
                            }
                        }
                    });
                }
            });

            var promises = [pagesPromise, this.animationStartedPromise];
            Promise.all(promises).then(function() {
                pdfDocument.getOutline().then(function(outline) {
                    var container = document.getElementById('outlineView');
                    self.outline = new PDFOutlineView({
                        container: container,
                        outline: outline,
                        linkService: self
                    });
                    self.outline.render();
                    document.getElementById('viewOutline').disabled = !outline;

                    if (!outline && !container.classList.contains('hidden')) {
                        self.switchSidebarView('thumbs');
                    }
                    if (outline &&
                        self.preferenceSidebarViewOnLoad === SidebarView.OUTLINE) {
                        self.switchSidebarView('outline', true);
                    }
                });
                pdfDocument.getAttachments().then(function(attachments) {
                    var container = document.getElementById('attachmentsView');
                    self.attachments = new PDFAttachmentView({
                        container: container,
                        attachments: attachments,
                        downloadManager: new DownloadManager()
                    });
                    self.attachments.render();
                    document.getElementById('viewAttachments').disabled = !attachments;

                    if (!attachments && !container.classList.contains('hidden')) {
                        self.switchSidebarView('thumbs');
                    }
                    if (attachments &&
                        self.preferenceSidebarViewOnLoad === SidebarView.ATTACHMENTS) {
                        self.switchSidebarView('attachments', true);
                    }
                });
            });

            if (self.preferenceSidebarViewOnLoad === SidebarView.THUMBS) {
                Promise.all([firstPagePromise, onePageRendered]).then(function () {
                    self.switchSidebarView('thumbs', true);
                });
            }

            pdfDocument.getMetadata().then(function(data) {
                var info = data.info, metadata = data.metadata;
                self.documentInfo = info;
                self.metadata = metadata;
                console.log('PDF ' + pdfDocument.fingerprint + ' [' +
                    info.PDFFormatVersion + ' ' + (info.Producer || '-').trim() +
                    ' / ' + (info.Creator || '-').trim() + ']' +
                    ' (PDF.js: ' + (PDFJS.version || '-') +
                    (!PDFJS.disableWebGL ? ' [WebGL]' : '') + ')');

                var pdfTitle;
                if (metadata && metadata.has('dc:title')) {
                    var title = metadata.get('dc:title');
                    if (title !== 'Untitled') {
                        pdfTitle = title;
                    }
                }

                if (!pdfTitle && info && info['Title']) {
                    pdfTitle = info['Title'];
                }

                if (pdfTitle) {
                    self.setTitle(pdfTitle + ' - ' + document.title);
                }

                if (info.IsAcroFormPresent) {
                    console.warn('Warning: AcroForm/XFA is not supported');
                    self.fallback(PDFJS.UNSUPPORTED_FEATURES.forms);
                }

            });
        },

        setInitialView: function pdfViewSetInitialView(storedHash, scale) {
            this.isInitialViewSet = true;
            document.getElementById('pageNumber').value =
                this.pdfViewer.currentPageNumber = 1;

            if (PDFHistory.initialDestination) {
                this.navigateTo(PDFHistory.initialDestination);
                PDFHistory.initialDestination = null;
            } else if (this.initialBookmark) {
                this.setHash(this.initialBookmark);
                PDFHistory.push({ hash: this.initialBookmark }, !!this.initialBookmark);
                this.initialBookmark = null;
            } else if (storedHash) {
                this.setHash(storedHash);
            } else if (scale) {
                this.setScale(scale, true);
                this.page = 1;
            }

            if (this.pdfViewer.currentScale === UNKNOWN_SCALE) {
                this.setScale(DEFAULT_SCALE, true);
            }
        },

        cleanup: function pdfViewCleanup() {
            this.pdfViewer.cleanup();
            this.pdfThumbnailViewer.cleanup();
            this.pdfDocument.cleanup();
        },

        forceRendering: function pdfViewForceRendering() {
            this.pdfRenderingQueue.printing = this.printing;
            this.pdfRenderingQueue.isThumbnailViewEnabled = this.sidebarOpen;
            this.pdfRenderingQueue.renderHighestPriority();
        },

        setHash: function pdfViewSetHash(hash) {
            if (!this.isInitialViewSet) {
                this.initialBookmark = hash;
                return;
            }
            if (!hash) {
                return;
            }

            if (hash.indexOf('=') >= 0) {
                var params = this.parseQueryString(hash);
                if ('nameddest' in params) {
                    PDFHistory.updateNextHashParam(params.nameddest);
                    this.navigateTo(params.nameddest);
                    return;
                }
                var pageNumber, dest;
                if ('page' in params) {
                    pageNumber = (params.page | 0) || 1;
                }
                if ('zoom' in params) {
                    var zoomArgs = params.zoom.split(',');
                    var zoomArg = zoomArgs[0];
                    var zoomArgNumber = parseFloat(zoomArg);

                    if (zoomArg.indexOf('Fit') === -1) {
                        dest = [null, { name: 'XYZ' },
                            zoomArgs.length > 1 ? (zoomArgs[1] | 0) : null,
                            zoomArgs.length > 2 ? (zoomArgs[2] | 0) : null,
                            (zoomArgNumber ? zoomArgNumber / 100 : zoomArg)];
                    } else {
                        if (zoomArg === 'Fit' || zoomArg === 'FitB') {
                            dest = [null, { name: zoomArg }];
                        } else if ((zoomArg === 'FitH' || zoomArg === 'FitBH') ||
                            (zoomArg === 'FitV' || zoomArg === 'FitBV')) {
                            dest = [null, { name: zoomArg },
                                zoomArgs.length > 1 ? (zoomArgs[1] | 0) : null];
                        } else if (zoomArg === 'FitR') {
                            if (zoomArgs.length !== 5) {
                                console.error('pdfViewSetHash: ' +
                                    'Not enough parameters for \'FitR\'.');
                            } else {
                                dest = [null, { name: zoomArg },
                                    (zoomArgs[1] | 0), (zoomArgs[2] | 0),
                                    (zoomArgs[3] | 0), (zoomArgs[4] | 0)];
                            }
                        } else {
                            console.error('pdfViewSetHash: \'' + zoomArg +
                                '\' is not a valid zoom value.');
                        }
                    }
                }
                if (dest) {
                    this.pdfViewer.scrollPageIntoView(pageNumber || this.page, dest);
                } else if (pageNumber) {
                    this.page = pageNumber;
                }
                if ('pagemode' in params) {
                    if (params.pagemode === 'thumbs' || params.pagemode === 'bookmarks' ||
                        params.pagemode === 'attachments') {
                        this.switchSidebarView((params.pagemode === 'bookmarks' ?
                            'outline' : params.pagemode), true);
                    } else if (params.pagemode === 'none' && this.sidebarOpen) {
                        document.getElementById('sidebarToggle').click();
                    }
                }
            } else if (/^\d+$/.test(hash)) {
                this.page = hash;
            } else {
                PDFHistory.updateNextHashParam(unescape(hash));
                this.navigateTo(unescape(hash));
            }
        },

        refreshThumbnailViewer: function pdfViewRefreshThumbnailViewer() {
            var pdfViewer = this.pdfViewer;
            var thumbnailViewer = this.pdfThumbnailViewer;
            var pagesCount = pdfViewer.pagesCount;
            for (var pageIndex = 0; pageIndex < pagesCount; pageIndex++) {
                var pageView = pdfViewer.getPageView(pageIndex);
                if (pageView && pageView.renderingState === RenderingStates.FINISHED) {
                    var thumbnailView = thumbnailViewer.getThumbnail(pageIndex);
                    thumbnailView.setImage(pageView);
                }
            }

            thumbnailViewer.scrollThumbnailIntoView(this.page);
        },

        switchSidebarView: function pdfViewSwitchSidebarView(view, openSidebar) {
            if (openSidebar && !this.sidebarOpen) {
                document.getElementById('sidebarToggle').click();
            }
            var thumbsView = document.getElementById('thumbnailView');
            var outlineView = document.getElementById('outlineView');
            var attachmentsView = document.getElementById('attachmentsView');

            var thumbsButton = document.getElementById('viewThumbnail');
            var outlineButton = document.getElementById('viewOutline');
            var attachmentsButton = document.getElementById('viewAttachments');

            switch (view) {
                case 'thumbs':
                    var wasAnotherViewVisible = thumbsView.classList.contains('hidden');

                    thumbsButton.classList.add('toggled');
                    outlineButton.classList.remove('toggled');
                    attachmentsButton.classList.remove('toggled');
                    thumbsView.classList.remove('hidden');
                    outlineView.classList.add('hidden');
                    attachmentsView.classList.add('hidden');

                    this.forceRendering();

                    if (wasAnotherViewVisible) {
                        this.pdfThumbnailViewer.ensureThumbnailVisible(this.page);
                    }
                    break;

                case 'outline':
                    thumbsButton.classList.remove('toggled');
                    outlineButton.classList.add('toggled');
                    attachmentsButton.classList.remove('toggled');
                    thumbsView.classList.add('hidden');
                    outlineView.classList.remove('hidden');
                    attachmentsView.classList.add('hidden');

                    if (outlineButton.getAttribute('disabled')) {
                        return;
                    }
                    break;

                case 'attachments':
                    thumbsButton.classList.remove('toggled');
                    outlineButton.classList.remove('toggled');
                    attachmentsButton.classList.add('toggled');
                    thumbsView.classList.add('hidden');
                    outlineView.classList.add('hidden');
                    attachmentsView.classList.remove('hidden');

                    if (attachmentsButton.getAttribute('disabled')) {
                        return;
                    }
                    break;
            }
        },

        parseQueryString: function pdfViewParseQueryString(query) {
            var parts = query.split('&');
            var params = {};
            for (var i = 0, ii = parts.length; i < ii; ++i) {
                var param = parts[i].split('=');
                var key = param[0].toLowerCase();
                var value = param.length > 1 ? param[1] : null;
                params[decodeURIComponent(key)] = decodeURIComponent(value);
            }
            return params;
        },

        beforePrint: function pdfViewSetupBeforePrint() {
            if (!this.supportsPrinting) {
                var printMessage = mozL10n.get('printing_not_supported', null,
                    'Warning: Printing is not fully supported by this browser.');
                this.error(printMessage);
                return;
            }

            var alertNotReady = false;
            var i, ii;
            if (!this.pagesCount) {
                alertNotReady = true;
            } else {
                for (i = 0, ii = this.pagesCount; i < ii; ++i) {
                    if (!this.pdfViewer.getPageView(i).pdfPage) {
                        alertNotReady = true;
                        break;
                    }
                }
            }
            if (alertNotReady) {
                var notReadyMessage = mozL10n.get('printing_not_ready', null,
                    'Warning: The PDF is not fully loaded for printing.');
                window.alert(notReadyMessage);
                return;
            }

            this.printing = true;
            this.forceRendering();

            var body = document.querySelector('body');
            body.setAttribute('data-mozPrintCallback', true);
            for (i = 0, ii = this.pagesCount; i < ii; ++i) {
                this.pdfViewer.getPageView(i).beforePrint();
            }

        },

        afterPrint: function pdfViewSetupAfterPrint() {
            var div = document.getElementById('printContainer');
            while (div.hasChildNodes()) {
                div.removeChild(div.lastChild);
            }

            this.printing = false;
            this.forceRendering();
        },

        setScale: function (value, resetAutoSettings) {
            this.updateScaleControls = !!resetAutoSettings;
            this.pdfViewer.currentScaleValue = value;
            this.updateScaleControls = true;
        },

        rotatePages: function pdfViewRotatePages(delta) {
            var pageNumber = this.page;
            this.pageRotation = (this.pageRotation + 360 + delta) % 360;
            this.pdfViewer.pagesRotation = this.pageRotation;
            this.pdfThumbnailViewer.pagesRotation = this.pageRotation;

            this.forceRendering();

            this.pdfViewer.scrollPageIntoView(pageNumber);
        },

        mouseScroll: function pdfViewMouseScroll(mouseScrollDelta) {
            var MOUSE_SCROLL_COOLDOWN_TIME = 50;
            var currentTime = (new Date()).getTime();
            var storedTime = this.mouseScrollTimeStamp;

            if (currentTime > storedTime &&
                currentTime - storedTime < MOUSE_SCROLL_COOLDOWN_TIME) {
                return;
            }
            if ((this.mouseScrollDelta > 0 && mouseScrollDelta < 0) ||
                (this.mouseScrollDelta < 0 && mouseScrollDelta > 0)) {
                this.clearMouseScrollState();
            }

            this.mouseScrollDelta += mouseScrollDelta;

            var PAGE_FLIP_THRESHOLD = 120;
            if (Math.abs(this.mouseScrollDelta) >= PAGE_FLIP_THRESHOLD) {

                var PageFlipDirection = {
                    UP: -1,
                    DOWN: 1
                };
                var pageFlipDirection = (this.mouseScrollDelta > 0) ?
                    PageFlipDirection.UP :
                    PageFlipDirection.DOWN;
                this.clearMouseScrollState();
                var currentPage = this.page;
                if ((currentPage === 1 && pageFlipDirection === PageFlipDirection.UP) ||
                    (currentPage === this.pagesCount &&
                        pageFlipDirection === PageFlipDirection.DOWN)) {
                    return;
                }

                this.page += pageFlipDirection;
                this.mouseScrollTimeStamp = currentTime;
            }
        },
        clearMouseScrollState: function pdfViewClearMouseScrollState() {
            this.mouseScrollTimeStamp = 0;
            this.mouseScrollDelta = 0;
        }
    };
    window.PDFView = PDFViewerApplication;


    function webViewerLoad(evt) {
        PDFViewerApplication.initialize().then(webViewerInitialized);
    }

    function webViewerInitialized() {
        var queryString = document.location.search.substring(1);
        var params = PDFViewerApplication.parseQueryString(queryString);
        var file = 'file' in params ? params.file : DEFAULT_URL;

        var fileInput = document.createElement('input');
        fileInput.id = 'fileInput';
        fileInput.className = 'fileInput';
        fileInput.setAttribute('type', 'file');
        fileInput.oncontextmenu = noContextMenuHandler;
        document.body.appendChild(fileInput);

        if (!window.File || !window.FileReader || !window.FileList || !window.Blob) {
            document.getElementById('openFile').setAttribute('hidden', 'true');
            document.getElementById('secondaryOpenFile').setAttribute('hidden', 'true');
        } else {
            document.getElementById('fileInput').value = null;
        }

        var locale = PDFJS.locale || navigator.language;

        if (PDFViewerApplication.preferencePdfBugEnabled) {
            var hash = document.location.hash.substring(1);
            var hashParams = PDFViewerApplication.parseQueryString(hash);

            if ('disableworker' in hashParams) {
                PDFJS.disableWorker = (hashParams['disableworker'] === 'true');
            }
            if ('disablerange' in hashParams) {
                PDFJS.disableRange = (hashParams['disablerange'] === 'true');
            }
            if ('disablestream' in hashParams) {
                PDFJS.disableStream = (hashParams['disablestream'] === 'true');
            }
            if ('disableautofetch' in hashParams) {
                PDFJS.disableAutoFetch = (hashParams['disableautofetch'] === 'true');
            }
            if ('disablefontface' in hashParams) {
                PDFJS.disableFontFace = (hashParams['disablefontface'] === 'true');
            }
            if ('disablehistory' in hashParams) {
                PDFJS.disableHistory = (hashParams['disablehistory'] === 'true');
            }
            if ('webgl' in hashParams) {
                PDFJS.disableWebGL = (hashParams['webgl'] !== 'true');
            }
            if ('useonlycsszoom' in hashParams) {
                PDFJS.useOnlyCssZoom = (hashParams['useonlycsszoom'] === 'true');
            }
            if ('verbosity' in hashParams) {
                PDFJS.verbosity = hashParams['verbosity'] | 0;
            }
            if ('ignorecurrentpositiononzoom' in hashParams) {
                IGNORE_CURRENT_POSITION_ON_ZOOM =
                    (hashParams['ignorecurrentpositiononzoom'] === 'true');
            }
            if ('locale' in hashParams) {
                locale = hashParams['locale'];
            }
            if ('textlayer' in hashParams) {
                switch (hashParams['textlayer']) {
                    case 'off':
                        PDFJS.disableTextLayer = true;
                        break;
                    case 'visible':
                    case 'shadow':
                    case 'hover':
                        var viewer = document.getElementById('viewer');
                        viewer.classList.add('textLayer-' + hashParams['textlayer']);
                        break;
                }
            }
            if ('pdfbug' in hashParams) {
                PDFJS.pdfBug = true;
                var pdfBug = hashParams['pdfbug'];
                var enabled = pdfBug.split(',');
                PDFBug.enable(enabled);
                PDFBug.init();
            }
        }

        mozL10n.setLanguage(locale);

        if (!PDFViewerApplication.supportsPrinting) {
            document.getElementById('print').classList.add('hidden');
            document.getElementById('secondaryPrint').classList.add('hidden');
        }

        if (!PDFViewerApplication.supportsFullscreen) {
            document.getElementById('presentationMode').classList.add('hidden');
            document.getElementById('secondaryPresentationMode').
            classList.add('hidden');
        }

        if (PDFViewerApplication.supportsIntegratedFind) {
            document.getElementById('viewFind').classList.add('hidden');
        }
        PDFJS.UnsupportedManager.listen(
            PDFViewerApplication.fallback.bind(PDFViewerApplication));
        document.getElementById('scaleSelect').oncontextmenu = noContextMenuHandler;
        var mainContainer = document.getElementById('mainContainer');
        var outerContainer = document.getElementById('outerContainer');
        mainContainer.addEventListener('transitionend', function(e) {
            if (e.target === mainContainer) {
                var event = document.createEvent('UIEvents');
                event.initUIEvent('resize', false, false, window, 0);
                window.dispatchEvent(event);
                outerContainer.classList.remove('sidebarMoving');
            }
        }, true);
        document.getElementById('sidebarToggle').addEventListener('click',
            function() {
                this.classList.toggle('toggled');
                outerContainer.classList.add('sidebarMoving');
                outerContainer.classList.toggle('sidebarOpen');
                PDFViewerApplication.sidebarOpen =
                    outerContainer.classList.contains('sidebarOpen');
                if (PDFViewerApplication.sidebarOpen) {
                    PDFViewerApplication.refreshThumbnailViewer();
                }
                PDFViewerApplication.forceRendering();
            });

        document.getElementById('viewThumbnail').addEventListener('click',
            function() {
                PDFViewerApplication.switchSidebarView('thumbs');
            });

        document.getElementById('viewOutline').addEventListener('click',
            function() {
                PDFViewerApplication.switchSidebarView('outline');
            });

        document.getElementById('viewAttachments').addEventListener('click',
            function() {
                PDFViewerApplication.switchSidebarView('attachments');
            });

        document.getElementById('previous').addEventListener('click',
            function() {
                PDFViewerApplication.page--;
            });

        document.getElementById('next').addEventListener('click',
            function() {
                PDFViewerApplication.page++;
            });

        document.getElementById('zoomIn').addEventListener('click',
            function() {
                PDFViewerApplication.zoomIn();
            });

        document.getElementById('zoomOut').addEventListener('click',
            function() {
                PDFViewerApplication.zoomOut();
            });

        document.getElementById('pageNumber').addEventListener('click', function() {
            this.select();
        });

        document.getElementById('pageNumber').addEventListener('change', function() {
            PDFViewerApplication.page = (this.value | 0);

            if (this.value !== (this.value | 0).toString()) {
                this.value = PDFViewerApplication.page;
            }
        });

        document.getElementById('scaleSelect').addEventListener('change',
            function() {
                PDFViewerApplication.setScale(this.value, false);
            });

        document.getElementById('presentationMode').addEventListener('click',
            SecondaryToolbar.presentationModeClick.bind(SecondaryToolbar));

        document.getElementById('openFile').addEventListener('click',
            SecondaryToolbar.openFileClick.bind(SecondaryToolbar));

        document.getElementById('print').addEventListener('click',
            SecondaryToolbar.printClick.bind(SecondaryToolbar));

        document.getElementById('download').addEventListener('click',
            SecondaryToolbar.downloadClick.bind(SecondaryToolbar));


        if (file && file.lastIndexOf('file:', 0) === 0) {
            PDFViewerApplication.setTitleUsingUrl(file);
            var xhr = new XMLHttpRequest();
            xhr.onload = function() {
                PDFViewerApplication.open(new Uint8Array(xhr.response), 0);
            };
            try {
                xhr.open('GET', file);
                xhr.responseType = 'arraybuffer';
                xhr.send();
            } catch (e) {
                PDFViewerApplication.error(mozL10n.get('loading_error', null,
                    'An error occurred while loading the PDF.'), e);
            }
            return;
        }

        if (file) {
            PDFViewerApplication.open(file, 0);
        }
    }

    document.addEventListener('DOMContentLoaded', webViewerLoad, true);

    document.addEventListener('pagerendered', function (e) {
        var pageNumber = e.detail.pageNumber;
        var pageIndex = pageNumber - 1;
        var pageView = PDFViewerApplication.pdfViewer.getPageView(pageIndex);

        if (PDFViewerApplication.sidebarOpen) {
            var thumbnailView = PDFViewerApplication.pdfThumbnailViewer.
            getThumbnail(pageIndex);
            thumbnailView.setImage(pageView);
        }

        if (PDFJS.pdfBug && Stats.enabled && pageView.stats) {
            Stats.add(pageNumber, pageView.stats);
        }

        if (pageView.error) {
            PDFViewerApplication.error(mozL10n.get('rendering_error', null,
                'An error occurred while rendering the page.'), pageView.error);
        }

        if (pageNumber === PDFViewerApplication.page) {
            var pageNumberInput = document.getElementById('pageNumber');
            pageNumberInput.classList.remove(PAGE_NUMBER_LOADING_INDICATOR);
        }
    }, true);

    document.addEventListener('textlayerrendered', function (e) {
        var pageIndex = e.detail.pageNumber - 1;
        var pageView = PDFViewerApplication.pdfViewer.getPageView(pageIndex);

    }, true);

    window.addEventListener('presentationmodechanged', function (e) {
        var active = e.detail.active;
        var switchInProgress = e.detail.switchInProgress;
        PDFViewerApplication.pdfViewer.presentationModeState =
            switchInProgress ? PresentationModeState.CHANGING :
                active ? PresentationModeState.FULLSCREEN : PresentationModeState.NORMAL;
    });

    function updateViewarea() {
        if (!PDFViewerApplication.initialized) {
            return;
        }
        PDFViewerApplication.pdfViewer.update();
    }

    window.addEventListener('updateviewarea', function () {
        if (!PDFViewerApplication.initialized) {
            return;
        }

        var location = PDFViewerApplication.pdfViewer.location;

        PDFViewerApplication.store.initializedPromise.then(function() {
            PDFViewerApplication.store.setMultiple({
                'exists': true,
                'page': location.pageNumber,
                'zoom': location.scale,
                'scrollLeft': location.left,
                'scrollTop': location.top
            }).catch(function() {
            });
        });
        var href = PDFViewerApplication.getAnchorUrl(location.pdfOpenParams);
        document.getElementById('viewBookmark').href = href;
        document.getElementById('secondaryViewBookmark').href = href;
        PDFHistory.updateCurrentBookmark(location.pdfOpenParams, location.pageNumber);
        var pageNumberInput = document.getElementById('pageNumber');
        var currentPage =
            PDFViewerApplication.pdfViewer.getPageView(PDFViewerApplication.page - 1);

        if (currentPage.renderingState === RenderingStates.FINISHED) {
            pageNumberInput.classList.remove(PAGE_NUMBER_LOADING_INDICATOR);
        } else {
            pageNumberInput.classList.add(PAGE_NUMBER_LOADING_INDICATOR);
        }
    }, true);

    window.addEventListener('resize', function webViewerResize(evt) {
        if (PDFViewerApplication.initialized &&
            (document.getElementById('pageWidthOption').selected ||
                document.getElementById('pageFitOption').selected ||
                document.getElementById('pageAutoOption').selected)) {
            var selectedScale = document.getElementById('scaleSelect').value;
            PDFViewerApplication.setScale(selectedScale, false);
        }
        updateViewarea();
        SecondaryToolbar.setMaxHeight(document.getElementById('viewerContainer'));
    });

    window.addEventListener('hashchange', function webViewerHashchange(evt) {
        if (PDFHistory.isHashChangeUnlocked) {
            PDFViewerApplication.setHash(document.location.hash.substring(1));
        }
    });

    window.addEventListener('change', function webViewerChange(evt) {
        var files = evt.target.files;
        if (!files || files.length === 0) {
            return;
        }
        var file = files[0];

        if (!PDFJS.disableCreateObjectURL &&
            typeof URL !== 'undefined' && URL.createObjectURL) {
            PDFViewerApplication.open(URL.createObjectURL(file), 0);
        } else {
            var fileReader = new FileReader();
            fileReader.onload = function webViewerChangeFileReaderOnload(evt) {
                var buffer = evt.target.result;
                var uint8Array = new Uint8Array(buffer);
                PDFViewerApplication.open(uint8Array, 0);
            };
            fileReader.readAsArrayBuffer(file);
        }
        PDFViewerApplication.setTitleUsingUrl(file.name);
        document.getElementById('viewBookmark').setAttribute('hidden', 'true');
        document.getElementById('secondaryViewBookmark').
        setAttribute('hidden', 'true');
        document.getElementById('download').setAttribute('hidden', 'true');
        document.getElementById('secondaryDownload').setAttribute('hidden', 'true');
    }, true);

    function selectScaleOption(value) {
        var options = document.getElementById('scaleSelect').options;
        var predefinedValueFound = false;
        for (var i = 0; i < options.length; i++) {
            var option = options[i];
            if (option.value !== value) {
                option.selected = false;
                continue;
            }
            option.selected = true;
            predefinedValueFound = true;
        }
        return predefinedValueFound;
    }

    window.addEventListener('localized', function localized(evt) {
        document.getElementsByTagName('html')[0].dir = mozL10n.getDirection();

        PDFViewerApplication.animationStartedPromise.then(function() {
            var container = document.getElementById('scaleSelectContainer');
            if (container.clientWidth === 0) {
                container.setAttribute('style', 'display: inherit;');
            }
            if (container.clientWidth > 0) {
                var select = document.getElementById('scaleSelect');
                select.setAttribute('style', 'min-width: inherit;');
                var width = select.clientWidth + SCALE_SELECT_CONTAINER_PADDING;
                select.setAttribute('style', 'min-width: ' +
                    (width + SCALE_SELECT_PADDING) + 'px;');
                container.setAttribute('style', 'min-width: ' + width + 'px; ' +
                    'max-width: ' + width + 'px;');
            }
            SecondaryToolbar.setMaxHeight(document.getElementById('viewerContainer'));
        });
    }, true);

    window.addEventListener('scalechange', function scalechange(evt) {
        document.getElementById('zoomOut').disabled = (evt.scale === MIN_SCALE);
        document.getElementById('zoomIn').disabled = (evt.scale === MAX_SCALE);

        var customScaleOption = document.getElementById('customScaleOption');
        customScaleOption.selected = false;

        if (!PDFViewerApplication.updateScaleControls &&
            (document.getElementById('pageWidthOption').selected ||
                document.getElementById('pageFitOption').selected ||
                document.getElementById('pageAutoOption').selected)) {
            updateViewarea();
            return;
        }

        if (evt.presetValue) {
            selectScaleOption(evt.presetValue);
            updateViewarea();
            return;
        }

        var predefinedValueFound = selectScaleOption('' + evt.scale);
        if (!predefinedValueFound) {
            var customScale = Math.round(evt.scale * 10000) / 100;
            customScaleOption.textContent =
                mozL10n.get('page_scale_percent', { scale: customScale }, '{{scale}}%');
            customScaleOption.selected = true;
        }
        updateViewarea();
    }, true);

    window.addEventListener('pagechange', function pagechange(evt) {
        var page = evt.pageNumber;
        if (evt.previousPageNumber !== page) {
            document.getElementById('pageNumber').value = page;
            if (PDFViewerApplication.sidebarOpen) {
                PDFViewerApplication.pdfThumbnailViewer.scrollThumbnailIntoView(page);
            }
        }
        var numPages = PDFViewerApplication.pagesCount;

        document.getElementById('previous').disabled = (page <= 1);
        document.getElementById('next').disabled = (page >= numPages);
        document.getElementById('firstPage').disabled = (page <= 1);
        document.getElementById('lastPage').disabled = (page >= numPages);
        if (PDFJS.pdfBug && Stats.enabled) {
            var pageView = PDFViewerApplication.pdfViewer.getPageView(page - 1);
            if (pageView.stats) {
                Stats.add(page, pageView.stats);
            }
        }
        if (evt.updateInProgress) {
            return;
        }
        if (this.loading && page === 1) {
            return;
        }
        PDFViewerApplication.pdfViewer.scrollPageIntoView(page);
    }, true);

    function handleMouseWheel(evt) {
        var MOUSE_WHEEL_DELTA_FACTOR = 40;
        var ticks = (evt.type === 'DOMMouseScroll') ? -evt.detail :
            evt.wheelDelta / MOUSE_WHEEL_DELTA_FACTOR;
        var direction = (ticks < 0) ? 'zoomOut' : 'zoomIn';

        if (PresentationMode.active) {
            evt.preventDefault();
            PDFViewerApplication.mouseScroll(ticks * MOUSE_WHEEL_DELTA_FACTOR);
        } else if (evt.ctrlKey) {
            evt.preventDefault();
            PDFViewerApplication[direction](Math.abs(ticks));
        }
    }

    window.addEventListener('DOMMouseScroll', handleMouseWheel);
    window.addEventListener('mousewheel', handleMouseWheel);

    window.addEventListener('click', function click(evt) {
        if (!PresentationMode.active) {
            if (SecondaryToolbar.opened &&
                PDFViewerApplication.pdfViewer.containsElement(evt.target)) {
                SecondaryToolbar.close();
            }
        } else if (evt.button === 0) {
            evt.preventDefault();
        }
    }, false);

    window.addEventListener('keydown', function keydown(evt) {
        if (OverlayManager.active) {
            return;
        }

        var handled = false;
        var cmd = (evt.ctrlKey ? 1 : 0) |
            (evt.altKey ? 2 : 0) |
            (evt.shiftKey ? 4 : 0) |
            (evt.metaKey ? 8 : 0);
        if (cmd === 1 || cmd === 8 || cmd === 5 || cmd === 12) {
            var pdfViewer = PDFViewerApplication.pdfViewer;
            var inPresentationMode = pdfViewer &&
                (pdfViewer.presentationModeState === PresentationModeState.CHANGING ||
                    pdfViewer.presentationModeState === PresentationModeState.FULLSCREEN);

            switch (evt.keyCode) {
                case 70:
                    if (!PDFViewerApplication.supportsIntegratedFind) {
                        PDFViewerApplication.findBar.open();
                        handled = true;
                    }
                    break;
                case 71:
                    if (!PDFViewerApplication.supportsIntegratedFind) {
                        PDFViewerApplication.findBar.dispatchEvent('again',
                            cmd === 5 || cmd === 12);
                        handled = true;
                    }
                    break;
                case 61:
                case 107:
                case 187:
                case 171:
                    if (!inPresentationMode) {
                        PDFViewerApplication.zoomIn();
                    }
                    handled = true;
                    break;
                case 173:
                case 109:
                case 189:
                    if (!inPresentationMode) {
                        PDFViewerApplication.zoomOut();
                    }
                    handled = true;
                    break;
                case 48:
                case 96:
                    if (!inPresentationMode) {
                        setTimeout(function () {
                            PDFViewerApplication.setScale(DEFAULT_SCALE, true);
                        });
                        handled = false;
                    }
                    break;
            }
        }
        if (cmd === 1 || cmd === 8) {
            switch (evt.keyCode) {
                case 83:
                    PDFViewerApplication.download();
                    handled = true;
                    break;
            }
        }
        if (cmd === 3 || cmd === 10) {
            switch (evt.keyCode) {
                case 80:
                    SecondaryToolbar.presentationModeClick();
                    handled = true;
                    break;
                case 71:
                    document.getElementById('pageNumber').select();
                    handled = true;
                    break;
            }
        }

        if (handled) {
            evt.preventDefault();
            return;
        }
        var curElement = document.activeElement || document.querySelector(':focus');
        var curElementTagName = curElement && curElement.tagName.toUpperCase();
        if (curElementTagName === 'INPUT' ||
            curElementTagName === 'TEXTAREA' ||
            curElementTagName === 'SELECT') {
            if (evt.keyCode !== 27) {
                return;
            }
        }

        if (cmd === 0) {
            switch (evt.keyCode) {
                case 38:
                case 33:
                case 8:
                    if (!PresentationMode.active &&
                        PDFViewerApplication.currentScaleValue !== 'page-fit') {
                        break;
                    }
                case 37:

                    if (PDFViewerApplication.pdfViewer.isHorizontalScrollbarEnabled) {
                        break;
                    }

                case 75:
                case 80:
                    PDFViewerApplication.page--;
                    handled = true;
                    break;
                case 27:
                    if (SecondaryToolbar.opened) {
                        SecondaryToolbar.close();
                        handled = true;
                    }
                    if (!PDFViewerApplication.supportsIntegratedFind &&
                        PDFViewerApplication.findBar.opened) {
                        PDFViewerApplication.findBar.close();
                        handled = true;
                    }
                    break;
                case 40:
                case 34:
                case 32:
                    if (!PresentationMode.active &&
                        PDFViewerApplication.currentScaleValue !== 'page-fit') {
                        break;
                    }
                case 39:
                    if (PDFViewerApplication.pdfViewer.isHorizontalScrollbarEnabled) {
                        break;
                    }

                case 74:
                case 78:
                    PDFViewerApplication.page++;
                    handled = true;
                    break;

                case 36:
                    if (PresentationMode.active || PDFViewerApplication.page > 1) {
                        PDFViewerApplication.page = 1;
                        handled = true;
                    }
                    break;
                case 35:
                    if (PresentationMode.active || (PDFViewerApplication.pdfDocument &&
                            PDFViewerApplication.page < PDFViewerApplication.pagesCount)) {
                        PDFViewerApplication.page = PDFViewerApplication.pagesCount;
                        handled = true;
                    }
                    break;

                case 72:
                    if (!PresentationMode.active) {
                        HandTool.toggle();
                    }
                    break;
                case 82:
                    PDFViewerApplication.rotatePages(90);
                    break;
            }
        }

        if (cmd === 4) {
            switch (evt.keyCode) {
                case 32:
                    if (!PresentationMode.active &&
                        PDFViewerApplication.currentScaleValue !== 'page-fit') {
                        break;
                    }
                    PDFViewerApplication.page--;
                    handled = true;
                    break;

                case 82:
                    PDFViewerApplication.rotatePages(-90);
                    break;
            }
        }

        if (!handled && !PresentationMode.active) {
            if (evt.keyCode >= 33 && evt.keyCode <= 40 &&
                !PDFViewerApplication.pdfViewer.containsElement(curElement)) {
                PDFViewerApplication.pdfViewer.focus();
            }
            if (evt.keyCode === 32 && curElementTagName !== 'BUTTON') {
                if (!PDFViewerApplication.pdfViewer.containsElement(curElement)) {
                    PDFViewerApplication.pdfViewer.focus();
                }
            }
        }

        if (cmd === 2) {
            switch (evt.keyCode) {
                case 37:
                    if (PresentationMode.active) {
                        PDFHistory.back();
                        handled = true;
                    }
                    break;
                case 39:
                    if (PresentationMode.active) {
                        PDFHistory.forward();
                        handled = true;
                    }
                    break;
            }
        }

        if (handled) {
            evt.preventDefault();
            PDFViewerApplication.clearMouseScrollState();
        }
    });

    window.addEventListener('beforeprint', function beforePrint(evt) {
        PDFViewerApplication.beforePrint();
    });

    window.addEventListener('afterprint', function afterPrint(evt) {
        PDFViewerApplication.afterPrint();
    });

    (function animationStartedClosure() {
        PDFViewerApplication.animationStartedPromise = new Promise(
            function (resolve) {
                window.requestAnimationFrame(resolve);
            });
    })();
</script>
</html>