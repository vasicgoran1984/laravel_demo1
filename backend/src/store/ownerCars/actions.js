import axiosClient from "../../axios.js";

// Create New Owner Cars
export function createOwner({commit}, ownerCars) {
    return axiosClient.post('/ownerCars', ownerCars)
}

export function getOwnerCars({commit}, {url = null, search = '', perPage = 10, sort_field, sort_direction} = {}) {
    commit('setOwnerCars', [true])

    url = url || '/ownerCars';

    return axiosClient.get(url, {
        params: {
            search,
            per_page: perPage,
            sort_field,
            sort_direction,
        }
    })
        .then(res => {
            commit('setOwnerCars', [false, res.data])
        })
        .catch(() => {
            commit('setOwnerCars', [false])
        })
}
