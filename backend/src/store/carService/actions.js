import axiosClient from "../../axios.js";

// Create New Service for Car
export function createCarService({commit}, carService) {
    return axiosClient.post('/carService', carService)
}

// Update Car Service
export function updateCarService({commit}, carService) {
    return axiosClient.put(`/carService/${carService.id}`, carService)
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

// Show All Services By BookId
export function showAllCarServicesByBookId({commit}, book_id) {
return axiosClient.get(`show-all-services/${book_id}`)
}

// Show Car Service By Serivce Id
export function showCarServiceById({commit}, service_id) {
    return axiosClient.get(`show-service/${service_id}`)
}

// Print Invoice
export function printInvoice({commit}, car_service_id) {
return axiosClient.get(`export-invoice/${car_service_id}`)
}

export function printPdfUnused({commit}, car_service_id) {
    return axios({
        url: `export-invoice/${car_service_id}`,
        method: 'GET',
        responseType: 'blob',
    }).then((response) => {
        const url = window.URL.createObjectURL(new Blob([response.data]));
        const link = document.createElement('a');
        link.href = url;
        link.setAttribute('download', 'file.pdf');
        document.body.appendChild(link);
        link.click();
    })
}
