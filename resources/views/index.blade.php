@extends('layout.app')


@section('title', '3000 Words. Welcome')


@section('content')

    @include('components.header')

    <div class="btn-group words__switcher"><a class="btn btn-secondary active" href="#">Все слова</a><a class="btn btn-secondary" href="#">Отмеченные</a></div>

    @include('components.paginator')
    <div class="word__header container-fluid sticky-top">
        <div class="row">
            <div class="word__cell word__cell--number col-1"></div>
            <div class="word__header--cell word__cell--number col-1">#</div>
            <div class="word__header--cell word__cell--word col-4">Слово</div>
            <div class="word__header--cell word__cell--transcription col-3">Транскрипция</div>
            <div class="word__header--cell word__cell--translation col-3">Перевод</div>
        </div>
    </div>
    <div class="word__list container-fluid">
        @foreach($data as $word)
        <div class="word__item" data-id="{{ $word->id }}">
            <div class="row">
                <div class="word__cell word__cell--number col-1">
                    @auth
                        <a class="btn btn-outline-secondary btn-sm btn-favorite {{ $word->isFavorite ? 'active' : '' }}" href="#">
                            <i class="far fa-star"></i>
                        </a>
                    @endauth
                </div>
                <div class="word__cell word__cell--number col-1">{{ $word->id }}</div>
                <div class="word__cell word__cell--word col-4">{{ $word->word }}</div>
                <div class="word__cell word__cell--transcription col-3">{{ $word->transcription }}</div>
                <div class="word__cell word__cell--translation col-3"><a class="badge badge-warning btn-translate" href="#">Показать</a>
                    <p class="text-translation">{{ $word->translation }}, {{ $word->translation_yandex }}</p>
                </div>
            </div>
            <div class="row word__definitions">
@if($word->oxfordNormalized)
                @foreach ($word->oxfordNormalized as $oxfordEntity)
                    <div class="col-sm col-sm-4 col-md-3">
                        <div class="oxford_block">
                            <b>Форма: </b>{{ __($oxfordEntity['lexicalCategory']) }}<br>

                                    <b>Обозначения:</b>
                                    <ul>
                                        @foreach($oxfordEntity['definitions'] as $definition)
                                            <li>{{ $definition }}</li>
                                        @endforeach
                                    </ul>

                                    <b>Примеры:</b>
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

@endsection
