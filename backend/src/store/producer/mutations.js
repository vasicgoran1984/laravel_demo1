export function setProducer(state, [loading, response = null]) {
    if (response) {
        state.producer = {
            data: response,
        }
    }
    state.producer.loading = loading;

}
