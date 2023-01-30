import Api from './Api';

export default {
    get() {
        return Api.get('/profiles');
    },
    update(id, form) {
        return Api.post('/profiles/'+id, form);
    },
    store(form) {
        return API.post('/profiles', form);
    }
}