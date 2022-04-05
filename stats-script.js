jQuery('.counter').each(function() {
  var jQuerythis = jQuery(this),
      countTo = jQuerythis.attr('data-count');
  jQuery({ countNum: jQuerythis.text()}).animate({
    countNum: countTo
  },
  {
    duration: 8000,
    easing:'linear',
    step: function() {
      jQuerythis.text(Math.floor(this.countNum));
    },
    complete: function() {
      jQuerythis.text(this.countNum);
    }
  });
});