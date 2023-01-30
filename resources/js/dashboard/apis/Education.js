import Api from './Api';

export default {
    get() {
        return Api.get('/educations');
    },
    delete(id) {
        return Api.delete('/educations/'+id);
    },
    store(form) {
        return Api.post('/educations', form);
    },
    update(id, form) {
        return Api.put('/educations/'+id, form);
    }

}