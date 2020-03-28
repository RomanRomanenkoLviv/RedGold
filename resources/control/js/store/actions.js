export const actions = {
    setUser ({ commit }, user) {
        commit('setUser', user)
    },
    setAccesses ({ commit }, accesses) {
        commit('setAccesses', accesses)
    },
    setNewFeedbackCount ({ commit }, count) {
        commit('setNewFeedbackCount', count)
    },
    setNewReservationTableCount ({ commit }, count) {
        commit('setNewReservationTableCount', count)
    },
    setNewOrdersCount ({ commit }, count) {
        commit('setNewOrdersCount', count)
    },
    setNewReservationCakeCount ({ commit }, count) {
        commit('setNewReservationCakeCount', count)
    },
    setNewReservationCakeCustomCount ({ commit }, count) {
        commit('setNewReservationCakeCustomCount', count)
    }
}

