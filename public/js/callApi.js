$(document).ready(function () {
    var photos;
    var divImages;
    divImages = $('#divImages');
    photos =  $('#photos');
    photos.click().click(function (event)
    {
        event.preventDefault();
        divImages.append(' <div class="form-input-items">' +
            '<label for="item_image[]">item image</label>' +
            '<input type="file"  name="item_image">' +
            '</div>');
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Content-Type': 'application/json'
        }
    });
    var  listArticle =  $('.listArticle');
    $('#allA').click(function (e) {
        e.preventDefault();
        $.ajax({ url: "api/article/list" , method: "GET" })
            .then(function (response) {
                listArticle.empty();
                $.each(response.data, function (index, val) {
                    listArticle.append('<li>' + 'title' + ' ' + val.title +  ' ' + 'cteated' + ' ' + val.created_at + '</li>')
                });
            });
    });
    var single = $('#singleArticle');
    var js;
    var jsImg;
    $("#SingleForm").submit(function (e) {
        e.preventDefault();
        $.ajax({ url: "api/article/list?title=" + $('#titleSingle').val() , method: "GET" })
            .then(function (response) {
                single.empty();
                js = JSON.parse(JSON.stringify(response.data[0]));
                single.append('<li>'  + js.title +    '</li>');
                single.append('<li><img src="{{asset(\'js.main_picture\')}} "</li>');
                single.append('<li>' + ' ' + js.text +' ' + '</li>');
                jsImg = js.item_image.split(',');
                for(i=1; i< jsImg.length; i++)
                {
                    single.append('<li><img src="../public/image/'  + jsImg[i] + '"></li>');
                }
            });
    });
    var single = $('#singleArticle');
    var js;
    var jsImg;
    $("#userArticle").submit(function (e) {
        e.preventDefault();
        $.ajax({ url: "/api/article/list?user=" + $('#user').val() , method: "GET" })
            .then(function (response) {
                single.empty();
                js = JSON.parse(JSON.stringify(response.data[0]));
                single.append('<li>'  + js.title +    '</li>');
                single.append('<li><img src="{{asset(\'js.main_picture\')}} "</li>');
                single.append('<li>' + ' ' + js.text +' ' + '</li>');
                jsImg = js.item_image.split(',');
                for(i=1; i< jsImg.length; i++)
                {
                    single.append('<li><img src="../public/image/'  + jsImg[i] + '"></li>');
                }
            });
    });
     $("#upload_form").submit(function (e) {
        e.preventDefault();
        var user_id = $('#user_id');
        var title = $('#title');
        var blog = $('#blog');
        var item_image = $('.item_image');
        var main_picture = $('#main_picture');



        var order = {
            user_id: user_id.val(),
            title: title.val(),
            main_picture: main_picture.val(),
            item_image: item_image.val(),

    }


        $.ajax({ url: '../api/article/created', method: 'POST', data: order })
            .then(function (response) {
                alert('predmet je dodat');
            });
    });
});