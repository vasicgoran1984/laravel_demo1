import axiosClient from "../../axios.js";

// Create New Owner
export function createOwner({commit}, owner) {
    return axiosClient.post('/owners', owner)
}

export function getOwners({commit}, {url = null, search = '', perPage = 10, sort_field, sort_direction} = {}) {
    if (sort_field === 'updated_at') {
        sort_field = 'id';
    }
    commit('setOwners', [true])

    url = url || '/owners';

    return axiosClient.get(url, {
        params: {
            search,
            per_page: perPage,
            sort_field,
            sort_direction,
        }
    })
        .then(res => {
            commit('setOwners', [false, res.data])
        })
        .catch(() => {
            commit('setOwners', [false])
        })
}

// Get Owner By Id
export function getOwner({commit}, id) {
    return axiosClient.get(`/owners/${id}`)
}

// Update Owner
export function updateOwner({commit}, owner) {
    return axiosClient.put(`/owners/${owner.id}`, owner)
}
