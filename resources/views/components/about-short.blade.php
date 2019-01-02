
    <div class="container">
        <div class="row">
            <div class="card about-short mt-4">
                <div class="card-header">
                    {{ __('What is it?') }}
                    <a class="close-btn" data-toggle="collapse" href="#info-block" role="button" aria-expanded="true" aria-controls="info-block">
                        @if( !isset($_COOKIE['about']) || $_COOKIE['about'] != 'hide') <i class="fas fa-angle-up"></i> @else <i class="fas fa-angle-down"></i> @endif

                    </a>
                </div>
                <div class="card-body collapse @if( !isset($_COOKIE['about']) || $_COOKIE['about'] != 'hide') show @endif" id="info-block">
                    @if(\Illuminate\Support\Facades\App::getLocale() === 'ru')
                        <h1>3000 английский слов</h1>

                        <p>
                            Cогласно исследованию авторов словаря Macmillan, 2500 самых частотных слов покрывают 80% английской речи. Авторы определили это, проанализировав тысячи текстов книг, статей, сочинений и обсуждений.
                        </p>
                        <p>
                            Авторы словаря Longman выделили 3000 (в реальности чуть больше) слов, которые, согласно их исследованию, покрывают 86% всех текстов на английском языке.
                            Оксфордский словарь также имеет собственный список самых важных слов английского языка. Здесь их тоже 3000.
                            Другие данные также указывают на цифру в 3000 слов, которых должно быть достаточно, чтобы понимать 95% английской речи.


                            <p class="small font-italic">Подробнее об этом вы можете узнать, например, в <a target="_blank"
                                    href="https://blog.skyeng.ru/gold-3000-%D1%81%D0%B0%D0%BC%D1%8B%D0%B5-%D0%B2%D0%B0%D0%B6%D0%BD%D1%8B%D0%B5-%D0%B0%D0%BD%D0%B3%D0%BB%D0%B8%D0%B9%D1%81%D0%BA%D0%B8%D0%B5-%D1%81%D0%BB%D0%BE%D0%B2%D0%B0-b5b8c2cc90e8">блоге школы SkyEng</a>.
                        </p>

                        <p>В данном сервисе представлены все 3000 слов. Слова можно смотреть без регистрации. Однако, регистрация возволит вам отмечать незнакомые слова, что бы в дальнейшем отфильтровать только их.</p>
                        <p>Для русского языка представлены наиболее частые переводы от Google и Yandex. Далее идет описание слов на английском из оксфордских словарей, с примерами.</p>
                        @else
                        <h1> 3000 English words</h1>
                        <p>
                            With 2,500 to 3,000 words, you can understand 90% of everyday English conversations, English newspaper and magazine articles, and English used in the workplace. The remaining 10% you'll be able to learn from context, or ask questions about. However, it's essential to learn the right English vocabulary words, so you don't waste your time trying to memorize a huge collection with very little benefit. The list below seems long, but when you can use all these words with confidence, your English vocabulary will be fully functional.
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>



@push('scripts')
    <script>
        $('.close-btn').click(function(){
            setTimeout(function(){
                if($('#info-block').hasClass('show')) {
                    setCookie('about','show',14);
                    $('.close-btn').html('<i class="fas fa-angle-up"></i>');
                } else {
                    setCookie('about','hide',14);
                    $('.close-btn').html('<i class="fas fa-angle-down"></i>');
                }
            }, 500);

        });


        function setCookie(name,value,days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days*24*60*60*1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "")  + expires + "; path=/";
        }

    </script>
@endpush