import axiosClient from "../../axios.js";

// Create New Car
export function createCar({commit}, car) {
    return axiosClient.post('/cars', car)
}

// Get All Cars
export function getCars({commit}, {url = null, search = '', perPage = 10, sort_field, sort_direction} = {}) {
    if (sort_field === 'updated_at') {
        sort_field = 'id';
    }
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

export function getCarsToAddOwner({commit}, {url = null, search = '', perPage = 10, sort_field, sort_direction} = {}) {
    commit('setCars', [true])

    url = url || '/get-cars-to-add-owner';

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

export function showAllCars({commit}) {
return axiosClient.get(`/show-all-cars`)
}
