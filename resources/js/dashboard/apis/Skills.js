import Api from './Api';

export default {
    get() {
        return Api.get('/skills');
    },
    store(form) {
        return Api.post('/skills', form);
    },
    update(id, form) {
        return Api.put('/skills/'+id, form);
    },
    delete(id) {
        return Api.delete('/skills/'+id);
    }
}