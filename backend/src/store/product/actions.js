import axiosClient from "../../axios.js";

export function getProducts({commit}, {url = null, search = '', perPage = 10, sort_field, sort_direction} = {}) {
    commit('setProducts', [true])

    url = url || '/products';

    return axiosClient.get(url, {
        params: {
            search,
            per_page: perPage,
            sort_field,
            sort_direction
        }

    })
        .then(res => {
            commit('setProducts', [false, res.data])
        })
        .catch(() => {
            commit('setProducts', [false])
        })
}

export function createProduct({commit}, product) {
    if (product.image instanceof File) {
        const form = new FormData();

        form.append('title', product.title);
        form.append('image', product.image);
        form.append('description', product.description || '');
        form.append('price', product.price);
        product = form;
    }
    return axiosClient.post('/products', product)
}

export function updateProduct({commit}, product) {
    const id = product.id;
    if (product.image instanceof File) {
        const form = new FormData();
        form.append('id', product.id);
        form.append('title', product.title);
        form.append('image', product.image);
        form.append('description', product.description || '');
        form.append('price', product.price);
        form.append('_method', 'PUT');
        product = form;
    } else {
        product._method = 'PUT'
    }
    return axiosClient.post(`/products/${id}`, product)
}

// Delete Product
export function deleteProduct({commit}, id) {
    return axiosClient.delete(`/products/${id}`)
}

// Get Single Product
export function getProduct({}, id) {
    return axiosClient.get(`/products/${id}`)
}
