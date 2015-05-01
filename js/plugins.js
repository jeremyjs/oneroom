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

(function() {
  String.prototype.splice = function( idx, rem, s ) {
      return (this.slice(0,idx) + s + this.slice(idx + Math.abs(rem)));
  };
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

function createSched(obj, callback) {
  obj.utilID = obj.utilID || getCookie('utilID') || 0;
  obj.time   = obj.time   || '1200';
  obj.state  = obj.state  || 0;

  var base_url = 'createSched.php?';
  var rem      = 'utilID='  + obj.utilID;
  rem         += '&time='   + obj.time;
  rem         += '&state='  + obj.state;
  var url      = super_bass + base_url + rem;

  $.post(url, callback);
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
function updateSched(obj) {
  obj.id     = obj.id    || 0;
  obj.utilID = getCookie('utilID') || obj.utilID || 0;
  obj.state  = obj.state || 0;
  obj.time   = obj.time  || '1200';

  var base_url = 'updateSched.php?';
  var rem      = 'scheduleID=' + obj.id;
  rem         += '&utilID='    + obj.utilID;
  rem         += '&state='     + obj.state;
  rem         += '&time='      + obj.time;
  var url      = super_bass + base_url + rem;

  console.log('url: ', url);

  $.post(url);
};
function getSchedules(obj, callback) {
  if(typeof obj == 'function') { callback = obj; obj = {}; }
  var utilID   = getCookie('utilID') || obj.id || 0;

  var base_url = 'getSchedules.php?';
  var rem      = 'utilID='  + utilID;
  var url      = super_bass + base_url + rem;

  $.get(url, callback);
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
function createUtil(obj, callback) {
  obj.uID   = obj.uID    || getCookie('uID') || 0;
  obj.state = obj.state  || 0;

  var base_url = 'createUtil.php?';
  var rem      = 'userID='    + obj.uID;
  rem         += '&state='    + obj.state;
  rem         += '&utilName=' + obj.title;
  var url      = super_bass   + base_url + rem;

  $.post(url, callback);
};
function getUtil(utilID, callback) {
  if(typeof utilID == 'function') { callback = utilID; utilID = getCookie('utilID') || 0; }
  console.log('utilID: ', utilID);

  // var base_url = 'getUtil.php?';
  // var rem      = 'utilID='  + utilID;
  // var url      = super_bass + base_url + rem;

  getUtils(function(utils) {
    utils = JSON.parse(utils);
    utils.forEach(function (util) {
      util.id     = util[0];
      util.title  = util[1];
      util.state  = util[2];
      util.userID = util[3];
      if(util.id == utilID) {
        console.log('util: ', util);
        callback(util);
        return false;
      }
    });
  });
};
function getUtils(callback) {
  var uID      = getCookie('uID') || 0;

  var base_url = 'getUtils.php?';
  var rem      = 'userID='  + uID;
  var url      = super_bass + base_url + rem;

  $.get(url, callback);
};
function updateUtil(obj, callback) {
  if(typeof obj == 'function') { callback = obj; obj = {}; }
  obj.uID    = obj.uID    || getCookie('uID')    || 0;
  obj.utilID = obj.utilID || getCookie('utilID') || 0;
  obj.state  = obj.state  || 0;

  var base_url = 'updateUtil.php?';
  var rem      = 'utilID='    + obj.utilID;
  rem         += '&utilName=' + obj.title;
  rem         += '&state='    + obj.state;
  var url      = super_bass   + base_url + rem;

  console.log('url: ', url);

  $.post(url, callback);
};
function getUser(userID, callback) {
  if(typeof userID == 'function') { callback = userID; userID = getCookie('uID') || 0; }
  userID       = userID || getCookie('uID') || 0;
  console.log('userID: ', userID);

  var base_url = 'getUserInfo.php?';
  var rem      = 'id='      + userID;
  var url      = super_bass + base_url + rem;

  $.get(url, callback);
};
function updateUser(user, callback) {
  if(typeof user == 'function') { callback = user; user = {}; }
  user.id       = user.id || getCookie('uID') || 0;

  var base_url;
  if(user.newPassword) base_url = 'editUser.php?';
  else                 base_url = 'editUserNoPass.php?';

  var rem = 'id='        + user.id;
  rem    += '&name='     + user.name;
  rem    += '&email='    + user.email;
  rem    += '&password=' + user.password;
  var url = super_bass   + base_url + rem;

  $.get(url, callback);
};

function gotoUtil(id) {
  setCookie('utilID', id);
  location.href = 'util.html';
};

function gotoUtilEdit(id) {
  setCookie('utilID', id);
  location.href = 'util_edit.html';
};

function onSwitchChange(e, on) {
  var tar = $(e.target);
  var par = tar.parents('.sched');
  if(par.length == 0) par = tar.parents('.util');
  obj = {};

  console.log('par: ', par);
  obj.id = par.attr('id');

  var $title = par.find('.title');
  obj.title = ($title.length > 0) ? $title.html() : null;

  var $time = par.find('.time');
  if($time.length > 0) {
    obj.time = $time.val();
    obj.time = obj.time.substring(0,2) + obj.time.substring(3,5);
  }

  obj.state = on ? 1 : 0;
  if(par) obj.utilID = par.attr('id');
  console.log('updating switch: ', obj);
  var set = 'Setting: ' + (on ? 'On' : 'Off');
  par.find('.setting').html(set);

  console.log('obj: ', obj);

  if(obj.title)     updateUtil(obj);
  else if(obj.time) updateSched(obj);
};

function loadSidebar() {
  console.log('test')
  getUtils(function(utils) {
    utils = JSON.parse(utils);
    var $container = $('.sidebar-nav');
    var newDev = $('.new-device-link');
    utils.forEach(function (util, index, utils) {
      util.id     = util[0];
      util.title  = util[1];
      util.state  = util[2];
      util.userID = util[3];
      var html = '<li> <a href="./util_edit.html">'+util.title+'</a> </li>';
      if(newDev.length > 0) $(html).prependTo(newDev);
      else                  $container.append(html);
    });
  });
};

// Place any jQuery/helper plugins in here.
$(function() {

  $('#menu-toggle').click(function(e) {
    e.preventDefault();
    $('#wrapper').toggleClass('toggled');
  });

  $('.bs-switch').bootstrapSwitch();
  $('.bs-switch').on('switchChange.bootstrapSwitch', onSwitchChange);

  $('.btn-add-option').click(function(e) {
    console.log('add-option');
    e.preventDefault();
    var $btn = $(e.target);
    var num = $btn.parent().children('input').length + 1;
    $btn.before('<input type="text" class="form-control fc-multi" id="option'+num+'" placeholder="Option '+num+'" value="">');
  });

  $('.btn-submit-new-device').click(function(e) {
    e.preventDefault();
    var util = {};
    util.title = $('#title').val();
    var state = $('.bs-switch').val() == 'on' ? 1 : 0;
    // util.options = [];
    // $('.setting-options').children('input').each(function (index, input) {
    //   var val = $(input).val();
    //   util.options.push(val);
    // });
    createUtil(util, function(utilID, message, response) {
      //gotoUtil(utilID);
      location.href = './index.html';
    });
  });

  loadSidebar();

});
