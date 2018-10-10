@extends('layout.app')


@section('title', '3000 Words. Welcome')


@section('content')


    @include('components.header')
    @include('components.about-short')
    <div class="btn-group words__switcher">
        <a class="btn btn-secondary @if(Request::get('onlyFavorite') != 1) active @endif" href="{{ route('index') }}">{{ __('All words') }}</a>
        <a class="btn btn-secondary @if(Request::get('onlyFavorite') == 1) active @endif" href="{{ route('index', ['onlyFavorite' => 1]) }}">{{ __('Favorite') }}
    </a></div>

    @include('components.paginator')
    <div class="word__header container-fluid sticky-top">
        <div class="row">
            @auth
                <div class="word__cell word__cell--number col-1"></div>
            @endauth
            <div class="word__header--cell word__cell--number col-1">#</div>
            <div class="word__header--cell word__cell--word col-4">{{ __('Word') }}</div>
            <div class="word__header--cell word__cell--transcription col-3">{{ __('Transcription') }}</div>
            <div class="word__header--cell word__cell--translation col-3">{{ __('Definitions') }}</div>
        </div>
    </div>
    <div class="word__list container-fluid">
        @foreach($data as $word)
        <div class="word__item" data-id="{{ $word->id }}">
            <div class="row">
                @auth
                    <div class="word__cell word__cell--number col-1">
                        <a class="btn btn-outline-secondary btn-sm btn-favorite {{ $word->isFavorite ? 'active' : '' }}" href="#">
                            <i class="far fa-star"></i>
                        </a>
                    </div>
                @endauth
                <div class="word__cell word__cell--number col-1">{{ $word->id }}</div>
                <div class="word__cell word__cell--word col-4">{{ $word->word }}</div>
                <div class="word__cell word__cell--transcription col-3">{{ $word->transcription }}</div>
                <div class="word__cell word__cell--translation col-3"><a class="badge badge-warning btn-translate" href="#">{{ __('Show') }}</a>
                    <p class="text-translation">
                        @if(\Illuminate\Support\Facades\App::getLocale() === 'ru')
                            {{ $word->translation }}, {{ $word->translation_yandex }}
                        @endif
                    </p>
                </div>
            </div>
            <div class="row word__definitions">
@if($word->oxfordNormalized)
                @foreach ($word->oxfordNormalized as $oxfordEntity)
                    <div class="col-sm col-sm-4 col-md-3">
                        <div class="oxford_block">
                            <b>{{ __('Part of speech') }}: </b>{{ __($oxfordEntity['lexicalCategory']) }}<br>

                                    <b>{{ __('Definitions') }}:</b>
                                    <ul>
                                        @foreach($oxfordEntity['definitions'] as $definition)
                                            <li>{{ $definition }}</li>
                                        @endforeach
                                    </ul>

                                    <b>{{ __('Examples') }}:</b>
                                    <ul>
                                        @foreach($oxfordEntity['examples'] as $example)
                                            <li>{{ $example }}</li>
                                        @endforeach
                                    </ul>
                        </div>
                    </div>
                @endforeach
    @endif
            </div>
        </div>
        @endforeach
    </div>

    @include('components.paginator')

    @include('components.footer')
@endsection

@push('scripts')
    <script>
        $('.btn-translate').click(function (event) {
            event.preventDefault();

            var item = $(this).closest('.word__item');
            console.log(item);
            var word = item.find('.word__cell--word').text();
            console.log(word);

            if (item.find('.text-translation').is(':hidden')){

                item.find('.text-translation').css('display', 'flex');
                item.find('.word__definitions').css('display', 'flex');
                $(this).text('{{ __('Hide') }}');
            } else {
                item.find('.text-translation').hide();
                item.find('.word__definitions').hide();
                $(this).text('{{ __('Show') }}');
            }
        });
    </script>

    <script>
        $('.btn-favorite').click(function (event) {
            event.preventDefault();
            var button = $(this);
            if($(this).hasClass('active')){
                console.log('is active');
                $.get({
                    url: "{{ route('unset-favorite') }}",
                    data: {
                        word_id: button.closest('.word__item').attr('data-id')
                    },
                    success: function (data) {
                        button.removeClass('active');
                    }
                });

            } else {

                $.get({
                    url: "{{ route('set-favorite') }}",
                    data: {
                        word_id: button.closest('.word__item').attr('data-id')
                    },
                    success: function (data) {
                        button.addClass('active');
                    }
                });

            }


        });
    </script>
@endpush