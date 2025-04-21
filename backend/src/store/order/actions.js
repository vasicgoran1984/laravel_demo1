import axiosClient from "../../axios.js";

export function getOrders({commit}, {url = null, search = '', perPage = 10, sort_field, sort_direction} = {}) {
    commit('setOrders', [true])

    url = url || '/orders';

    return axiosClient.get(url, {
        params: {
            search,
            per_page: perPage,
            sort_field,
            sort_direction
        }

    })
        .then(res => {
            commit('setOrders', [false, res.data])
        })
        .catch(() => {
            commit('setOrders', [false])
        })
}

export function getSingleOrder({commit}, id) {
    return axiosClient.get(`/orders/${id}`)
}
