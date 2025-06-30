export function setMechanic(state, [loading, response = null]) {
    if (response) {
        state.mechanic = {
            data: response.data,
            links: response.meta.links,
            total: response.meta.total,
            limit: response.meta.per_page,
            from: response.meta.from,
            to: response.meta.to,
            page: response.meta.current_page,
        }
    }
    state.mechanic.loading = loading;

}
