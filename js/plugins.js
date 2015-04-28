// Avoid `console` errors in browsers that lack a console.
(function() {
  var method;
  var noop = function () {};
  var methods = [
    'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
    'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
    'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
    'timeStamp', 'trace', 'warn'
  ];
  var length = methods.length;
  var console = (window.console = window.console || {});

  while (length--) {
    method = methods[length];

    // Only stub undefined methods.
    if (!console[method]) {
        console[method] = noop;
    }
  }
}());

function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + "; " + expires;
};
function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i=0; i<ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0)==' ') c = c.substring(1);
    if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
  }
  return "";
};

var super_bass = '/oneroom/phpscripts/';

function createSched(obj) {
  obj.uID    = obj.uID    || getCookie('uID')    || 0;
  obj.utilID = obj.utilID || getCookie('utilID') || 0;
  obj.begin  = obj.begin  || 0;
  obj.end    = obj.end    || 0;

  var base_url = 'createSched.php?';
  var rem      = 'uID='     + obj.uID;
  rem         += '&utilID=' + obj.utilID;
  rem         += '&begin='  + obj.begin;
  rem         += '&end='    + obj.end;
  var url      = super_bass + base_url + rem;

  $.post(url);
};
function deleteSched(obj) {
  if(typeof(obj) !== 'object') {
    obj = { scheduleID: obj };
  }

  obj.scheduleID = obj.scheduleID || 0;

  var base_url = 'deleteSched.php?';
  var rem      = 'scheduleID=' + obj.scheduleID;
  var url      = super_bass + base_url + rem;

  $.post(url);
};
function updateBegSched(obj) {
  obj.scheduleID = obj.scheduleID || 0;
  obj.begin      = obj.begin      || 0;

  var base_url = 'updateBegSched.php?';
  var rem      = 'scheduleID=' + obj.scheduleID;
  rem         += '&begin='     + obj.begin;
  var url      = super_bass + base_url + rem;

  $.post(url);
};
function updateEndSched(obj) {
  obj.scheduleID = obj.scheduleID || 0;
  obj.end        = obj.end        || 0;

  var base_url = 'updateEndSched.php?';
  var rem      = 'scheduleID=' + obj.scheduleID;
  rem         += '&end='       + obj.end;
  var url      = super_bass + base_url + rem;

  $.post(url);
};
function updateUtilSched(obj) {
  obj.scheduleID = obj.scheduleID || 0;
  obj.utilID     = obj.utilID     || getCookie('utilID') || 0;

  var base_url = 'updateUtilSched.php?';
  var rem      = 'scheduleID=' + obj.scheduleID;
  rem         += '&utilID='    + obj.utilID;
  var url      = super_bass + base_url + rem;

  $.post(url);
};
function createUtil(obj) {
  obj.uID   = obj.uID    || getCookie('uID') || 0;
  obj.state = obj.state  || 0;

  var base_url = 'createUtil.php?';
  var rem      = 'uID='     + obj.uID;
  rem         += '&state='  + obj.state;
  var url      = super_bass + base_url + rem;

  $.post(url);
};
function updateUtil(obj) {
  obj.uID    = obj.uID    || getCookie('uID')    || 0;
  obj.utilID = obj.utilID || getCookie('utilID') || 0;
  obj.state  = obj.state  || 0;

  var base_url = 'updateUtil.php?';
  var rem      = 'uID='     + obj.uID;
  rem         += '&utilID=' + obj.utilID;
  rem         += '&state='  + obj.state;
  var url      = super_bass + base_url + rem;

  $.post(url);
};

// Place any jQuery/helper plugins in here.
$(function() {

  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });

  $(".bs-switch").bootstrapSwitch();
});
