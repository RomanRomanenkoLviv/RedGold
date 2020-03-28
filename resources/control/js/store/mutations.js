export const mutations = {
    setUser (state, user) {
        state.user = user
    },
    setAccesses (state, accesses) {
        state.accesses = accesses
    },
    setNewFeedbackCount (state, count) {
        state.newFeedbackCount = count
    },
    setNewReservationTableCount (state, count) {
        state.newReservationTableCount = count
    },
    setNewOrdersCount (state, count) {
        state.newOrdersCount = count
    },
    setNewReservationCakeCount (state, count) {
        state.newReservationCakeCount = count
    },
    setNewReservationCakeCustomCount (state, count) {
        state.newReservationCakeCustomCount = count
    }
}
