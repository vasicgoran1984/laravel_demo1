import * as bookServiceMutations from './mutations.js'
import * as bookServiceActions from './actions.js'

const bookServiceModule = {
    namespaced: true,
    state: () => (
        {
            bookService: {
                data: {},
                meta: {
                    total: 0,
                    per_page: 10,
                    current_page: 1,
                    last_page: 1,
                    from: null,
                    to: null
                },
                links: {
                    first: null,
                    last: null,
                    prev: null,
                    next: null
                },
                loading: false
            }
        }
    ),
    mutations: bookServiceMutations,
    actions: bookServiceActions,

}

export default bookServiceModule
