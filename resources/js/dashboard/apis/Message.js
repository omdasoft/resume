import Api from './Api';

export default {
    get() {
        return Api.get('/messages');
    },
    delete(id) {
        return Api.delete('/messages/'+id);
    }

}