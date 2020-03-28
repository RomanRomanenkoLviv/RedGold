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
        user: '',
        newFeedbackCount: 0,
        newReservationTableCount: 0,
        newOrdersCount: 0,
        newReservationCakeCount: 0,
        newReservationCakeCustomCount: 0,
    },
    getters,
    actions,
    mutations,
    // modules: {
    //     test
    // }
});
