/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vuex from 'vuex';
import VueModal from 'vue-js-modal';
import VueObserveVisibility from 'vue-observe-visibility';

Vue.use(Vuex);
Vue.use(VueObserveVisibility);

Vue.use(VueModal, {
    dynamic: true,
    injectModalContainers: true,
    dynamicDefaults: {
        pivotY: 0.1,
        height: 'auto',
        classes: 'p-4 !overflow-visible !rounded-lg !bg-gray-900'
    }
});

Vue.prototype.$user = User;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

import conversation from './store/conversation';
import likes from './store/likes';
import notifications from './store/notifications';
import retweets from './store/retweets';
import timeline from './store/timeline';

const store = new Vuex.Store({
    modules: {
        conversation,
        likes,
        notifications,
        retweets,
        timeline
    }
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store
});

Echo.channel('tweets')
    .listen('.TweetLikesWereUpdated', (e) => {
        if (e.user_id === User.id) {
            store.dispatch('likes/syncLike', e.id)
        }

        store.commit('timeline/SET_LIKES', e)
        store.commit('notifications/SET_LIKES', e)
        store.commit('conversation/SET_LIKES', e)
    })
    .listen('.TweetRetweetsWereUpdated', (e) => {
        if (e.user_id === User.id) {
            store.dispatch('retweets/syncRetweet', e.id)
        }

        store.commit('timeline/SET_RETWEETS', e)
        store.commit('notifications/SET_RETWEETS', e)
        store.commit('conversation/SET_RETWEETS', e)
    })
    .listen('.TweetRepliesWereUpdated', (e) => {
        store.commit('timeline/SET_REPLIES', e)
        store.commit('notifications/SET_REPLIES', e)
        store.commit('conversation/SET_REPLIES', e)
    })
    .listen('.TweetWasDeleted', (e) => {
        store.commit('timeline/POP_TWEET', e.id)
    })