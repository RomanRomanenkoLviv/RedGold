import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex);

/**
 * Global
 */
import { actions } from './actions';
import { mutations } from './mutations';
import { getters } from './getters';

/**
 * Modules
 */
// import test from './modules/test.js';

export default new Vuex.Store({
    state: {
        user: ''
    },
    getters,
    actions,
    mutations,
});
