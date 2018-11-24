$('.delete_confirmation').on('click', function (e) {
  e.preventDefault();
  $(document).find('#confirm_modal').attr('action', $(this).attr('data-action'));
});

$('.approve_confirmation').on('click', function (e) {
  e.preventDefault();
  $(document).find('#approve_modal').attr('action', $(this).attr('data-action'));
});

$('.ban_confirmation').on('click', function (e) {
  e.preventDefault();
  $(document).find('#ban_modal').attr('action', $(this).attr('data-action'));
});

//Load seo info
function loadSeoInfo() {
    var details = CKEDITOR.instances.editor1.getData();
    var details = strip(details);
    var name = $("input[name=name]").val();
    $("textarea[name=description]").text(details);
    $("input[name=keywords]").val(name.replace(/ /g, ','));
    $("input[name=permalink]").val(name.toLowerCase().replace(/ /g, '-').substring(0, 50));
}

//Load seo info
function loadNewsSeoInfo() {
    var details = CKEDITOR.instances.editor1.getData();
    var details = strip(details);
    var name = $("input[name=title]").val();
    $("textarea[name=description]").text(details);
    $("input[name=keywords]").val(name.replace(/ /g, ','));
    $("input[name=permalink]").val(name.replace(/ /g, '-').substring(0, 50));
}

//Load seo info
function loadProductsSeoInfo() {
    var details = CKEDITOR.instances.editor1.getData();
    var details = strip(details);
    var code = $("input[name=code]").val();
    $("textarea[name=description]").text(details);
    $("input[name=keywords]").val(code.replace(/ /g, ','));
    $("input[name=permalink]").val(code.toLowerCase().replace(/ /g, '-').substring(0, 50));
}

// Strip html tags
function strip(html) {
   var tmp = document.createElement("DIV");
   tmp.innerHTML = html;
   return tmp.textContent || tmp.innerText || "";
}
