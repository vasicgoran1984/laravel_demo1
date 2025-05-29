import axiosClient from "../../axios.js";

// Create New Service for Car
export function createCarService({commit}, carService) {
    return axiosClient.post('/carService', carService)
}

// Get All Cars
export function getCarServices({commit}, {url = null, search = '', perPage = 10, sort_field, sort_direction, service} = {}) {
    if (sort_field === 'updated_at') {
        sort_field = 'id';
    }
    commit('setCarService', [true])

    url = url || '/carService';

    return axiosClient.get(url, {
        params: {
            search,
            per_page: perPage,
            sort_field,
            sort_direction,
            service,
        }
    })
        .then(res => {
            commit('setCarService', [false, res.data])
        })
        .catch(() => {
            commit('setCarService', [false])
        })
}

export function unusedFunc({commit}, {url = null, search = '', perPage = 10, sort_field, sort_direction} = {}) {
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

export function showAllCarServicesByBookId({commit}, book_id) {
return axiosClient.get(`show-all-services/${book_id}`)
}
