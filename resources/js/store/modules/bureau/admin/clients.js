
//specificclient module

const state = {
    specificclients:[],
    specificclient:[],
  };
const getters = {
    Specificclients(state){
      return state.specificclients;
    },
    Specificclient(state){
      return state.specificclient;
    }
  };
const actions = {
    specificclients(context){//permission.index route laravel
      axios.get('/specificclient/get')
      .then((response)=>{
        console.log(response.data)
        context.commit('specificclients', response.data.specificclients);
      });
    },
    SpecificclientById(context, payload){
        axios.get('/specificclient/show/'+payload)
              .then((response)=>{
                  console.log(response.data);
                  context.commit('specificclient', response.data.specificclient);
              });
  }
}
const mutations = {
    specificclients(state, data){
      return state.specificclients = data;
    },
    specificclient(state, data){
      return state.specificclient = data;
    }
  };

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
};






