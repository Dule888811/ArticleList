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
            '<input type="file"  name="item_image[]">' +
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
                single.append('<li><img src="../'  + js.main_picture + '"></li>')                                                         ;
                single.append('<li>' + ' ' + js.text +' ' + '</li>');
                jsImg = js.item_image.split(',');
                for(i=1; i< jsImg.length; i++)
                {
                    single.append('<li><img src="../public/images/'  + jsImg[i] + '"></li>');
                }
            });
    });
    var singleUser = $('#userAr');
    var js;
    var jsImg;
    $("#userArticle").submit(function (e) {
        e.preventDefault();
        $.ajax({ url: "/api/article/list?user=" + $('#user').val() , method: "GET" })
            .then(function (response) {
                singleUser.empty();
                js = JSON.parse(JSON.stringify(response.data[0]));
                singleUser.append('<li>'  + js.title +    '</li>');
                singleUser.append('<li><img src="../'  + js.main_picture + '"></li>');
                singleUser.append('<li>' + ' ' + js.text +' ' + '</li>');
                jsImg = js.item_image.split(',');
                for(i=1; i< jsImg.length; i++)
                {
                    singleUser.append('<li><img src="../public/images/'  + jsImg[i] + '"></li>');
                }
            });
    });
    var authorUser = $('#author');
    var js;
    var jsImg;
    $("#authorForm").submit(function (e) {
        e.preventDefault();
        $.ajax({  url: "api/article/list?title=" + $('#authorSingle').val() , method: "GET" })
            .then(function (response) {
                authorUser.empty();
                js = JSON.parse(JSON.stringify(response.data[0]));
                authorUser.append('<li>'  + js.title +    '</li>');
                authorUser.append('<li><img src="../'  + js.main_picture + '"></li>');
                authorUser.append('<li>' + ' ' + js.text +' ' + '</li>');
                jsImg = js.item_image.split(',');
                for(i=1; i< jsImg.length; i++)
                {
                    authorUser.append('<li><img src="../public/images/'  + jsImg[i] + '"></li>');
                }
                authorUser.append('<a class="btn btn-primary" href="article/edit/' + js.id + '"><li>edit</li></a>')
                authorUser.append('<a class="btn btn-primary"  id="deleteArtivle"  href="article/delete/' + js.id + '"><li>delete</li></a>')
            });


    });


});