
function synchronize(src, dest) {
  return function() {
    $('.nav-tabs > li').removeClass('active');
    $('.notice').html('');
    $(dest + '-link').addClass('active');
    $('form' + src).hide();
    $('form' + dest).show();
    var $src = $('form' + src);
    var email = $src.find('input.email').val();
    var password = $src.find('input.password').val();
    var $dest = $('form' + dest);
    $dest.find('input.email').val(email);
    $dest.find('input.password').val(password);
  };
};

$(function() {

  $('.signup-link').click(synchronize('.login', '.signup'));
  $('.login-link') .click(synchronize('.signup', '.login'));

  $('form.login button.login').click(function(e) {
    e.preventDefault();
    var email = $('.login .email').val();
    var password = $('.login .password').val();
    // login
  });

  $('form.signup button.signup').click(function(e) {
    e.preventDefault();
    var name = $('.signup .name').val();
    var email = $('.signup .email').val();
    var password = $('.signup .password').val();
    if(!password) {
      $('.notice').html('Password is a required field');
      return;
    }
    // create account
  });

});
