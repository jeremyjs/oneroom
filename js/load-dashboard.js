$(function() {
  getUtils(function(utils) {
    console.log('utils: ', utils);
    console.log('typeof utils: ', typeof utils);
    console.log('JSON.parse(utils): ', JSON.parse(utils));
    utils = JSON.parse(utils);
    var $container = $('#page-content-wrapper > .container-fluid');
    var $currentRow;

    utils.forEach(function (util, index, utils) {
      util.id     = util[0];
      util.title  = util[1];
      util.state  = util[2];
      util.userID = util[3];
      getSchedules(util.id, function(schedules) {
        console.log('schedules: ', schedules);
        util.firstSched = schedules[0] ? schedules[0][1] : null;
        util.firstSched = util.firstSched ? util.firstSched.splice(2, 0, ':') : null;
        util.state = (util.state == 1) ? 'On' : 'Off';
        if(index % 3 == 0) {
          $container.append('<div class="row"></div>');
          $currentRow = $container.children('.row').last();
        }
        var toggle = (util.state == 'On') ? 'checked' : '';
        // if(util.options == 2) toggle = '<input class="bs-switch hidden" type="checkbox" checked>';
        var html = '<div class="col-lg-4 device util" id="'+util.id+'">'+
                      '<div class="jumbotron">'+
                        '<h2 class="title">'+util.title+'</h2>';

                        if(util.firstSched) {
                          html += '<p>Scheduled: '+util.firstSched+'</p>'
                        }

        html +=         '<p class="setting">Setting: '+util.state+'</p>'+
                        '<div class="actions">'+
                          '<a class="btn btn-primary" href="javascript:gotoUtil('+util.id+')" role="button">Edit</a>'+
                          '<input class="bs-switch hidden" type="checkbox" '+toggle+'>'+
                        '</div>'+
                      '</div>'+
                    '</div>';
        $currentRow.append(html);

        $('.bs-switch').bootstrapSwitch();

        $('.bs-switch').on('switchChange.bootstrapSwitch', onSwitchChange);

        if(index == utils.length - 1) {
          console.log('test')
          if(utils.length % 3 == 0) $container.append('<div class="row"></div>');
          $currentRow = $container.children('.row').last();

          var html = '<div class="col-lg-4 create-device"> <div class="jumbotron"> <div class="create-wrapper"> <div class="create"> <a href="util_new.html" class="black"><i class="fa fa-plus fa-5x"></i></a> </div> </div> </div> </div>';
          $currentRow.append(html);
        }

      }); // getSchedules

    }); // forEach Util

  });
});
