export function setOwners(state, [loading, response = null]) {
    if (response) {
        state.owner = {
            data: response.data,
            links: response.meta.links,
            total: response.meta.total,
            limit: response.meta.per_page,
            from: response.meta.from,
            to: response.meta.to,
            page: response.meta.current_page,
        }
    }
    state.owner.loading = loading;

}
