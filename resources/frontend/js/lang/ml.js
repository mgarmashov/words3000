import Vue from 'vue'
import { MLInstaller, MLCreate, MLanguage } from 'vue-multilanguage'

Vue.use(MLInstaller)

const russianTexts = {
  'Absolute Phrase': 'Словосочетание',
  'Adjective': 'Прилагательное',
  'Adverb': 'Наречие',
  'Determiner': 'Артикль',
  'Clauses': '',
  'Complements': 'Дополнение',
  'Coordinated Adjective': '',
  'Conjuction': 'Союз',
  'Interjection': 'Междометие',
  'Noun': 'Существительное',
  'Phrase': 'Словестный оборот',
  'Predicate': 'Сказуемое',
  'Preposition': 'Предлог',
  'Pronoun': 'Местоимение',
  'Subject': 'Предмет',
  'Verb': 'Глагол',
  'Numeral': 'Число',

  'Username': 'Имя пользователя',
  'Name': 'Имя пользователя',
  'E-Mail Address': 'E-mail',

  'Password': 'Пароль',
  'Confirm Password': 'Подтвердить пароль',
  'Login': 'Войти',
  'Register': 'Регистрация',

  'All words': 'Все слова',
  'Favorite': 'Отмеченные',
  'Show': 'Показать',
  'Hide': 'Скрыть',
  'Word': 'Слово',
  'Transcription': 'Транскрипция',
  'Definitions': 'Определения',
  'Part of speech': 'Форма речи',
  'Examples': 'Примеры',
  'What is it?': 'Для чего это?'
}

const englishTexts = {
  'Absolute Phrase': 'Absolute Phrase',
  'Adjective': 'Adjective',
  'Adverb': 'Adverb',
  'Determiner': 'Determiner',
  'Clauses': 'Clauses',
  'Complements': 'Complements',
  'Coordinated Adjective': 'Coordinated Adjective',
  'Conjuction': 'Conjuction',
  'Interjection': 'Interjection',
  'Noun': 'Noun',
  'Phrase': 'Phrase',
  'Predicate': 'Predicate',
  'Preposition': 'Preposition',
  'Pronoun': 'Pronoun',
  'Subject': 'Subject',
  'Verb': 'Verb',
  'Numeral': 'Numeral',

  'Username': 'Username',
  'Name': 'Name',
  'E-Mail Address': 'E-Mail Address',

  'Password': 'Password',
  'Confirm Password': 'Confirm Password',
  'Login': 'Login',
  'Register': 'Register',

  'All words': 'All words',
  'Favorite': 'Favorite',
  'Show': 'Show',
  'Hide': 'Hide',
  'Word': 'Word',
  'Transcription': 'Transcription',
  'Definitions': 'Definitions',
  'Part of speech': 'Part of speech',
  'Examples': 'Examples',
  'What is it?': 'What is it??'
}

export default new MLCreate({
  initial: 'ru',
  save: process.env.NODE_ENV === 'production',
  languages: [
    new MLanguage('en').create(englishTexts),

    new MLanguage('ru').create(russianTexts)
  ]
})
