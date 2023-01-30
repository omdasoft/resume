import Api from './Api';

export default {
    get() {
        return Api.get('/employments');
    },
    store(form) {
        return Api.post('/employments', form);
    },
    update(id, form) {
        return Api.put('/employments/'+id, form);
    },
    delete(id) {
        return Api.delete('/employments/'+id);
    }
}