$('.make-fancy').on('click', function () {
  var imgLink = $(this).attr('data-src');
  $('body').append('<div class="full-width-overlay"><img class="image-full-width" src="' + imgLink + '"></div>');
  $('body').append('<span class="close-full-width-image"> x </span>');
});

$('.main-product-image').on('click', function () {
  var imgLink = $(this).attr('data-full-src');
  $('body').append('<div class="full-width-overlay"><img class="image-full-width" src="' + imgLink + '"></div>');
  $('body').append('<span class="close-full-width-image"> x </span>');
});

$(document).on('click', '.close-full-width-image' , function () {
  $(this).remove();
  $('.full-width-overlay').remove();
});

$(document).on('click', '.full-width-overlay' , function () {
  $(this).remove();
  $('.close-full-width-image').remove();
});

$('.chid-product-link').on('click', function () {
  $(this).parents('.product').find('.main-product-image').attr('src', $(this).attr('data-src'));
  $(this).parents('.product').find('.main-product-image').attr('data-full-src', $(this).attr('data-full-src'));
});

$('.gender').on('click', function () {
  $('#glassesModal .type').attr('data-gender', $(this).attr('data-gender'));
  $('#glassesModal').modal('show');
})

$('#glassesModal .type').on('click', function () {
  var type = $(this).attr('data-type');
  var gender = $(this).attr('data-gender');
  var route = $(this).attr('data-route');

  url = route + '?type=' + type + '&gender=' + gender;
  window.open(url, "_self");
});
