export function setService(state, [loading, response = null]) {
    if (response) {
        state.service = {
            data: response,
        }
    }
    state.service.loading = loading;

}
