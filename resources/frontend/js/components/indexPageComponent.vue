<template>
    <div>
        @include('components.header')
        @include('components.about-short')

        <!--<div class="btn-group words__switcher">-->
            <!--<a class="btn btn-secondary @if(Request::get('onlyFavorite') != 1) active @endif" href="{{ route('index') }}">{{ __('All words') }}</a>-->
            <!--<a class="btn btn-secondary @if(Request::get('onlyFavorite') == 1) active @endif" href="{{ route('index', ['onlyFavorite' => 1]) }}">{{ __('Favorite') }}-->
            <!--</a>-->
        <!--</div>-->

        @include('components.paginator')
        <div class="word__header container-fluid sticky-top">
            <div class="row">
                <!--@auth-->
                <!--<div class="word__cell word__cell&#45;&#45;number col-1"></div>-->
                <!--@endauth-->
                <div class="word__header--cell word__cell--number col-1">#</div>
                <div class="word__header--cell word__cell--word col-4" v-text="$ml.get('Word')"></div>
                <div class="word__header--cell word__cell--transcription col-3" v-text="$ml.get('Transcription')"></div>
                <div class="word__header--cell word__cell--translation col-3" v-text="$ml.get('Definitions')"></div>
            </div>
        </div>
        <div class="word__list container-fluid">
            <div v-for="word in words" class="word__item" :key="word.id">
                <div class="row">
                    <!--@auth-->
                    <!--<div class="word__cell word__cell&#45;&#45;number col-1">-->
                        <!--<a class="btn btn-outline-secondary btn-sm btn-favorite {{ $word->isFavorite ? 'active' : '' }}" href="#">-->
                            <!--<i class="far fa-star"></i>-->
                        <!--</a>-->
                    <!--</div>-->
                    <!--@endauth-->
                    <div class="word__cell word__cell--number col-1">{{ word.id }}</div>
                    <div class="word__cell word__cell--word col-4">{{ word.word }}</div>
                    <div class="word__cell word__cell--transcription col-3">{{ word.transcription }}</div>
                    <div class="word__cell word__cell--translation col-3">
                        <a @click.prevent="toggleTranslation(word.id)" class="badge badge-warning btn-translate" href="#" v-text="$ml.get('Show')"></a>
                        <p class="text-translation" :ref="'translation-'+word.id">
                            <span v-if="$ml.current === 'ru'"></span>
                            {{ word.translation }}, {{ word.translation_yandex }}
                        </p>
                    </div>
                </div>
                <div :ref="'translation-'+word.id" v-if="word.oxfordNormalized" class="row word__definitions">
                    <div v-for="oxfordEntity in word.oxfordNormalized" class="col-sm col-sm-4 col-md-3">
                        <div class="oxford_block">
                            <b v-text="$ml.get('Part of speech')+': '"></b>{{ oxfordEntity.lexicalCategory }}<br>

                            <b v-text="$ml.get('Definitions')+': '"></b>
                            <ul>
                                <li v-for="definition in oxfordEntity.definitions">{{ definition }}</li>
                            </ul>

                            <b v-text="$ml.get('Examples')+': '"></b>
                            <ul>
                                <li v-for="example in oxfordEntity.examples">{{ example }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('components.paginator')

        @include('components.footer')
    </div>
</template>

<script>
  import axios from "axios"
  import router from "../router"
    export default {
        data () {
          return {
            words: []
          }
        },
      methods: {
        getWords () {
            return axios.get('api/vue')
        },
        toggleTranslation (id, ) {
          let $elements = this.$refs['translation-'+id]
          $elements[0].style.display = 'flex'
          $elements[1].style.display = 'flex'
        }
      },
      mounted() {
          this.getWords().then((response) => {
            this.words = response.data.data
            console.log(this.words)
          })



      }

    }
</script>
