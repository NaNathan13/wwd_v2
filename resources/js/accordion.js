jQuery (document).ready (function ($) {
  $ ('.accordion_row').click (function (event) {
    console.log ('accordion clicked');
    event.stopImmediatePropagation ();
    $ (this).find ('.accordion_row_content').toggleClass ('hide');
    $ (this).find ('.accordion_row_icon').toggleClass ('dropdown_active');
  });
});
