export function setType(state, [loading, response = null]) {
    if (response) {
        state.type = {
            data: response,
        }
    }
    state.type.loading = loading;

}
