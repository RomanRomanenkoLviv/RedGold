export const getters = {
    getAccesses (state) {
        return state.accesses
    },
    getUserName (state) {
        return state.user.name
    },
    getNewFeedbackCount (state) {
        return state.newFeedbackCount
    },
    getNewReservationTableCount (state) {
        return state.newReservationTableCount
    },
    getNewReservationCakeCount (state) {
        return state.newReservationCakeCount
    },
    getNewReservationCakeCustomCount (state) {
        return state.newReservationCakeCustomCount
    },
    getNewOrdersCount (state) {
        return state.newOrdersCount
    }
}
