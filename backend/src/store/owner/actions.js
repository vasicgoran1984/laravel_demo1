import axiosClient from "../../axios.js";

// Create New Car
export function createCar({commit}, car) {
    return axiosClient.post('/cars', car)
}

export function getCars({commit}, {url = null, search = '', perPage = 10, sort_field, sort_direction} = {}) {
    commit('setCars', [true])

    url = url || '/cars';

    return axiosClient.get(url, {
        params: {
            search,
            per_page: perPage,
            sort_field,
            sort_direction,
        }
    })
        .then(res => {
            commit('setCars', [false, res.data])
        })
        .catch(() => {
            commit('setCars', [false])
        })
}
