import axiosClient from "../../axios.js";

// Create Book Service
export function createBookService({commit}, ownerCar) {
    return axiosClient.post('/bookService', ownerCar)
}

// Get Book Service By ID
export function getBookServiceById({commit}, id) {
    return axiosClient.get(`lastBookService/${id}`)
}

// Get Car Service By ID
export function getCarServiceById({commit}, id) {
    return axiosClient.get(`getCarService/${id}`)
}

// Insert Kilometers In New Book Service
export function insertKilometers({commit}, bookService) {
    const id = bookService.value.book_id;
    const km = bookService.value.kilometers;
    return axiosClient.put(`/insertKilometers/${id}`, {km: km})
}

// Get All Book Service
export function getServiceBooks({commit}, {url = null, search = '', perPage = 10, sort_field, sort_direction} = {}) {
    if (sort_field === 'updated_at') {
        sort_field = 'id';
    }
    commit('setBookService', [true])

    url = url || '/bookService';

    return axiosClient.get(url, {
        params: {
            search,
            per_page: perPage,
            sort_field,
            sort_direction,
        }
    })
        .then(res => {
            commit('setBookService', [false, res.data])
        })
        .catch(() => {
            commit('setBookService', [false])
        })
}

