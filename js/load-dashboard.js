$(function() {
  getUtils(function(utils) {
    var $container = $('#page-content-wrapper > .container-fluid');
    var $currentRow;
    utils.forEach(function (util, index) {
      if(index % 3 == 0) {
        $container.append('<div class="row"></div>');
        $currentRow = $container.children('.row').last();
      }
      var toggle;
      if(util.options == 2) toggle = '<input class="bs-switch hidden" type="checkbox" checked>';
      var html = '<div class="col-lg-4 device">
                    <div class="jumbotron">
                      <h2>'+util.title+'</h2>
                      <p>Scheduled: '+util.firstSched+'</p>
                      <p>Setting: '+util.setting+'</p>
                      <div class="actions">
                        <a class="btn btn-primary" href="util_edit.html" role="button">Edit</a>'
                        +toggle+
                      '</div>
                    </div>
                  </div>';
      $currentRow.append(html);
    });
  });
});
