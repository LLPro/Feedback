import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex);

const store = new Vuex.Store({
    state:{
        name_value: null,
        phone_value: null,
        text_area_value: null,
    },
    getters:{
        getName:     state => state.name_value,
        getPhone:    state => state.phone_value,
        getTextArea: state => state.text_area_value,
    },
    actions: {
        change({commit}, payload) {
            commit('changeName',    payload.name_value);
            commit('changePhone',   payload.phone_value);
            commit('changeTextArea',payload.text_area_value);

            return axios.post('/api/feedback', {
                "name":      payload.name_value,
                "phone":     payload.phone_value,
                "text_area": payload.text_area_value,
            }).catch(error => console.log(error))
        }
    },
    mutations:{
        changeName:     (state, newName)     => state.name_value = newName,
        changePhone:    (state, newPhone)    => state.phone_value = newPhone,
        changeTextArea: (state, newTextArea) => state.text_area_value = newTextArea,
    }
});

export default store

