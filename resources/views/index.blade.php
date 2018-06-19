@extends('layout.app')


@section('title', '3000 Words. Welcome')


@section('content')

    @include('components.header')

    <div class="btn-group words__switcher"><a class="btn btn-secondary active" href="#">Все слова</a><a class="btn btn-secondary" href="#">Отмеченные</a></div>

    <div class="word__header container-fluid sticky-top">
        <div class="row">
            <div class="word__header--cell word__cell--number col-1">#</div>
            <div class="word__header--cell word__cell--word col-4">Слово</div>
            <div class="word__header--cell word__cell--transcription col-3">Транскрипция</div>
            <div class="word__header--cell word__cell--translation col-3">Перевод</div>
        </div>
    </div>
    <div class="word__list container-fluid">
        <?php

        $str = file_get_contents("words.json", "r");
        $arr = json_decode($str, true);

        //                array_splice($arr, 50);
        foreach ($arr as $word){
        ?>
        <div class="word__item" data-id="<?php echo $word['id'] ?>">
            <div class="row">
                <div class="word__cell word__cell--number col-1">
                    <a class="btn btn-outline-secondary btn-sm btn-favorite" href="#">
                        <i class="far fa-star"></i>
                    </a>
                </div>
                <div class="word__cell word__cell--number col-1"><?php echo $word['id'] ?></div>
                <div class="word__cell word__cell--word col-4"><?php echo $word['word'] ?></div>
                <div class="word__cell word__cell--transcription col-3"><?php echo $word['transcription'] ?></div>
                <div class="word__cell word__cell--translation col-3"><a class="badge badge-warning btn-translate" href="#">Показать</a>
                    <p class="text-translation"><?php echo $word['translation'] ?></p>
                </div>
            </div>
            <div class="row word__definitions">

            </div>
        </div>
        <?php }?>
    </div>

    @include('components.paginator')

@endsection
