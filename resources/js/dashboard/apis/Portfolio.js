import Api from './Api';

export default {
    get() {
        return Api.get('/portfolios');
    },
    store(form) {
        return Api.post('/portfolios', form);
    },
    update(id, form) {
        return Api.post('/portfolios/'+id, form);
    },
    delete(id) {
        return Api.delete('/portfolios/'+id);
    }

}