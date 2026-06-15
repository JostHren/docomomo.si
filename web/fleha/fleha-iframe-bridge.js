/**
 * Fleha Iframe Modal Bridge
 *
 * Drop this script in the parent page that embeds the Fleha app in an iframe.
 * It listens for modal open/close events and expands the iframe to fullscreen.
 *
 * Usage:
 *   1. Add <script src="fleha-iframe-bridge.js"></script> to your parent page
 *   2. Give your iframe a data attribute:  data-fleha-iframe
 *      e.g.  <iframe src="..." data-fleha-iframe></iframe>
 *
 * When the Fleha app opens a modal, the iframe expands to cover
 * the full parent viewport. When the modal closes, it snaps back.
 */
(function () {
  let expandedIframe = null;
  let savedStyles = {};

  var EXPAND_STYLES = {
    position: "fixed",
    top: "0",
    left: "0",
    width: "100vw",
    height: "100vh",
    zIndex: "99999",
    border: "none",
    margin: "0",
    padding: "0",
  };

  var STYLE_KEYS = Object.keys(EXPAND_STYLES);

  window.addEventListener("message", function (event) {
    var msg = event.data;
    if (!msg || msg.type !== "fleha:modal") return;

    // Find the source iframe
    var iframes = document.querySelectorAll("iframe[data-fleha-iframe]");

    var srcIframe = null;
    for (var i = 0; i < iframes.length; i++) {
      if (iframes[i].contentWindow === event.source) {
        srcIframe = iframes[i];
        break;
      }
    }

    // Fallback: use any data-fleha-iframe if we can't match by source
    if (!srcIframe && iframes.length > 0) {
      srcIframe = iframes[0];
    }

    if (!srcIframe) {
      console.warn(
        "[fleha-bridge] No iframe with data-fleha-iframe found. " +
          'Add data-fleha-iframe to your iframe element.'
      );
      return;
    }

    if (msg.action === "open") {
      if (expandedIframe) return; // already expanded
      expandedIframe = srcIframe;

      // Save current styles
      savedStyles = {};
      for (var j = 0; j < STYLE_KEYS.length; j++) {
        var key = STYLE_KEYS[j];
        savedStyles[key] = srcIframe.style.getPropertyValue(key);
      }

      // Expand
      var keys = Object.keys(EXPAND_STYLES);
      for (var k = 0; k < keys.length; k++) {
        var prop = keys[k];
        srcIframe.style.setProperty(prop, EXPAND_STYLES[prop], "important");
      }

      // Prevent parent scroll while modal is open
      document.body.style.overflow = "hidden";
    } else if (msg.action === "close") {
      if (expandedIframe !== srcIframe) return;

      // Restore original styles
      for (var l = 0; l < STYLE_KEYS.length; l++) {
        var styleKey = STYLE_KEYS[l];
        if (savedStyles[styleKey] !== undefined) {
          srcIframe.style.setProperty(styleKey, savedStyles[styleKey]);
        } else {
          srcIframe.style.removeProperty(styleKey);
        }
      }

      document.body.style.overflow = "";
      expandedIframe = null;
      savedStyles = {};
    }
  });
})();
