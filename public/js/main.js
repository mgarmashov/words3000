    //
    // $.getJSON('words.json', function(data){
    //     jsonData=data;
    //
    //     var output;
    //     for (i=0;i<data.length;i++){
    //         $('tbody').append('<tr><td>' + data[i].id + '</td><td>' + data[i].word + '</td><td>' + data[i].transcription + '</td><td>' + data[i].translation + '</td></tr>');
    //     }
    //     afterLoad();
    // });


// function afterLoad(){

    $('.btn-translate').click(function (event) {
        event.preventDefault();

        var item = $(this).closest('.word__item');
        console.log(item);
        var word = item.find('.word__cell--word').text();
        console.log(word);

        if (item.find('.text-translation').is(':hidden')){
            // takeContent(word, item);
            // if (!item.hasClass('yandexDownloaded')){
            //     showFromYandex(word, item);
            // }
            // if (!item.hasClass('oxfordDownloaded')){
            //     showFromOxford(word, item);
            // }

            item.find('.text-translation').css('display', 'flex');
            item.find('.word__definitions').css('display', 'flex');
            $(this).text('Скрыть');
        } else {
            item.find('.text-translation').hide();
            item.find('.word__definitions').hide();
            $(this).text('Показать');
        }
    });


    $('.btn-favorite').click(function (event) {
        event.preventDefault();

        // var item = $(this).parents($('.word__item'));

        if ($(this).hasClass('active')){
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
        }
    });




function showFromJson(item){



}

    function takeContent(word, item){
        console.log(word);
        $.get({
            url: '/translation/'+word,
            data: {
                word: word,
            },
            success: function (data) {
                var translation = data.text[0];
                item.find('.text-translation').append(', '+translation);
                console.log(translation);
                item.addClass('yandexDownloaded');
            }
        });
    }

function showFromYandex(word, item){
    // var text = $(item).children('td:nth-child(2)').text();
    console.log(word);
    $.get({
        url: 'https://translate.yandex.net/api/v1.5/tr.json/translate',
        data: {
            key: "trnsl.1.1.20180428T071218Z.db9f33a5d2b96cab.0a57c5a334025511014969b5a1f2ca79765fb76b",
            text: word,
            lang: "en-ru",
            format: "plain"
            // options: ""
        },
        success: function (data) {
            var translation = data.text[0];
            item.find('.text-translation').append(', '+translation);
            console.log(translation);
            item.addClass('yandexDownloaded');
        }
    });
}



    function showFromOxford(word, item){
        // var text = $(item).children('td:nth-child(2)').text();
        word=word.replace(/^\s*/,'').replace(/\s*$/,'');

        console.log(word);
        $.ajax({
            type: 'get',
            url: 'oxford.php',
            data: {
                text: word
            },
            success: function (data) {
                console.log(data);
                item.find('.word__definitions').html(data);
                item.addClass('oxfordDownloaded');

            }
        });
    }

// }
