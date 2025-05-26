export function setBookService(state, [loading, response = null]) {
    if (response) {
        state.bookService.data = response.data || {};
        state.bookService.meta = {
            total: response.meta?.total || 0,
            per_page: response.meta?.per_page || 10,
            current_page: response.meta?.current_page || 1,
            last_page: response.meta?.last_page || 1,
            from: response.meta?.from || null,
            to: response.meta?.to || null
        };
        state.bookService.links = {
            first: response.links?.first || null,
            last: response.links?.last || null,
            prev: response.links?.prev || null,
            next: response.links?.next || null
        };
    }
    state.bookService.loading = loading;
}
